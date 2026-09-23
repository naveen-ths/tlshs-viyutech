<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Blog;
use App\Http\Requests\blogRequest;
use Redirect;
use DB;

class BlogController extends Controller
{

  public function __construct()
  {

    $this->blog = new Blog;
  }

  public function index(Request $request)
  {

    $limit = 12;
    if ($request->has('limit')) {
      $limit = $request->limit;
    }

    $blogList = Blog::where('status', '1')
      ->select('id', 'name', 'status', 'speciality_id', 'image', 'icon', 'imgmobicon', 'short_description', 'featured', 'created_at', 'updated_at', 'slug')
      ->orderBy('id', 'desc')->simplePaginate($limit);
    $jsondata = ['blogs' => $blogList];
    return view('blog_list')->with($jsondata);
  }

  public function blogDetails($slug)
  {
    $blog_details = Blog::where(['status' => 1, 'slug' => $slug])->first();
    Blog::where('id', $blog_details['id'])
      ->update([
        'count' => $blog_details['count'] + 1
      ]);

    $related_blog = Blog::where('status', '1')->whereNotIn('id', [$blog_details['id']])->take(15)->orderby('id', 'desc')->get();
    #$related_article = Blog::where('status','1')->whereIn('speciality_id', [$blog_details['speciality_id']])->get();

    $trending_blog = Blog::where(['status' => '1', 'featured' => '1'])->whereNotIn('id', [$blog_details['id']])->get();

    $next_post = Blog::where('slug', '>', $slug)->where('status', '1')->min('slug');
    $previous_post = Blog::where('slug', '<', $slug)->where('status', '1')->max('slug');
    #return view('welcome',compact('blog_details','next_post','previous_post'));
//    $comments = Comment::where([['post_id', '=', $blog_details['id']], ['parent_id', '=', null]])->orderby('id', 'desc')->get()->toArray();
    $comments = DB::table('comments as c')
      ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
      ->where('c.post_id', $blog_details['id'])
      ->where('c.parent_id', null)
      ->orderBy('c.id', 'desc')
      ->select('c.*', 'u.name as name') // select parent data as needed
      ->get()
      ->map(function ($item) {
        return (array) $item; // convert stdClass to array
      })
      ->toArray();
    if (!empty($comments)) {
      foreach ($comments as $key => $comment) {
        //        $comments[$key]['replies'] = Comment::where([['post_id', '=', $blog_details['id']], ['parent_id', '=', $comment['id']],])->orderby('id', 'desc')->get()->toArray();
        $comments[$key]['replies'] = $replies = DB::table('comments as c')
          ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
          ->where('c.post_id', $blog_details['id'])
          ->where('c.parent_id', $comment['id'])
          ->orderBy('c.id', 'desc')
          ->select('c.*', 'u.name as name') // select parent data as needed
          ->get()
          ->map(function ($item) {
            return (array) $item; // convert stdClass to array
          })
          ->toArray();
      }
    }
    //    echo '<pre>';
//    print_r($comments);
//    die;
//    echo Auth::user()->name;
//    die;
    $data = [
      'blog_info' => $blog_details,
      'comments' => $comments,
      'next_post' => $next_post,
      'previous_post' => $previous_post,
      'related_blog' => $related_blog,
      'trending_blog' => $trending_blog
    ];
    //    echo '<pre>';
//    print_r($data['comments']);
//    die;
    return view('blog_details', $data);
  }

  public function add()
  {
    $speciality = Speciality::where(['status' => '1'])->get();
    return view('admin/blogs/add')->with(
      [
        'speciality' => $speciality,
      ]
    );
  }

  public function store(blogRequest $request)
  {

    $prefix = explode('/', request()->route()->uri)[0];
    $var = explode('/', request()->route()->uri);
    $data = $this->blog->storBlog($request);

    if ($data) {
      return redirect("$prefix/blogs/list")->with('success', 'Blog submitted successfully!');
    }
  }

  public function edit($id)
  {

    $speciality = Speciality::where(['status' => '1'])->get();
    $data = Blog::where('id', $id)->first();
    return view('admin/blogs/add')->with(
      [
        'speciality' => $speciality,
        'data' => $data,
      ]
    );
  }

  public function delete($id)
  {

    $var = explode('/', request()->route()->uri);
    $delete = Blog::where('id', $id)->delete();
    if ($delete) {
      return redirect($var[0] . '/blogs/list')->with('success', 'Data deleted successfully !');
    }
  }

  public function update(Request $request)
  {
    $var = explode('/', request()->route()->uri);
    $data = $this->blog->updateBlog($request);
    if ($data) {
      return redirect($var[0] . '/blogs/list')->with('success', 'Data Updated successfully !');
    }
  }

  public function getblogListAdmin(Request $request)
  {

    $limit = 40;
    $str = "";
    if ($request->has('limit')) {
      $limit = $request->limit;
    }
    if ($request->has('q')) {
      $str = $request->q;
    }
    $data = Blog::where('name', 'like', '%' . $str . '%')->orderBy('id', 'desc')->paginate($limit);

    return view('admin/blogs/list')->with([
      'data' => $data
    ]);
  }

  public function listBlogAdmin(Request $request)
  {

    $data = $this->speciality->getBlogAdmin($request);
    // Speciality::all();

    return view('admin/blogs/list')->with([
      'specialityList' => $data
    ]);
  }

  public function updatePriority(Request $request)
  {

    if (isset($request->p)) {
      foreach ($request['priority'] as $key => $val) {
        $updatePriority = Blog::where('id', $key)->update([
          'priority' => $val,
        ]);
      }
    } else if (isset($request->d)) {
      foreach ($request['doc_priority'] as $key => $val) {
        $updatePriority = Blog::where('id', $key)->update([
          'doc_priority' => $val,
        ]);
      }
    } else if (isset($request->s)) {
      foreach ($request['specility_priority'] as $key => $val) {
        $updatePriority = Blog::where('id', $key)->update([
          'specility_priority' => $val,
        ]);
      }
    }

    return redirect('admin/blogs/list')->with(['success' => 'priority updated']);
  }

  public function likePost(Request $request, $id)
  {

    $blog_details = Blog::where(['status' => 1, 'id' => $id])->first();
    #dd($request->lik);
    Blog::where('id', $id)
      ->update([
        'bloglikes' => $blog_details['bloglikes'] + 1
      ]);
    return Redirect::back()->withMessage('Profile saved!');
  }

}
