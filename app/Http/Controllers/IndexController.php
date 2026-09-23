<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Cms;
use App\Models\ImageUpload;

class IndexController extends Controller
{

  public function __construct()
  {
    $this->banner = new ImageUpload;
  }

  public function index()
  {

    //speciality   
    $Speciality = Speciality::where(['status' => '1'])->orderByRaw('CONVERT(priority, SIGNED) ASC')->take('3')->get();

    //blogs  
    $blogs = Blog::where(['status' => '1'])->orderby('id', 'desc')->select('id', 'icon', 'slug', 'name', 'short_description', 'speciality_id', 'created_at', 'priority', 'bloglikes', 'count')->take(6)->orderBy('id', 'desc')->get();

    $banner = Banner::where(['status' => '1', 'version_type' => 'desktop'])->orderByRaw('CONVERT(priority, SIGNED) ASC')->get();

    $hospitality = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 14])->first();
    $placement = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 15])->first();
    $brand = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 16])->first();
    $notice = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 17])->first();
    $hundred = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 18])->first();
    $diffrent = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 19])->first();
    $industry_spk = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 20])->first();
    $faq = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 21])->first();
    $contact_home = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 22])->first();

    $jsondata = [
        'Speciality' => $Speciality,
        'banner' => $banner,
        'blogs' => $blogs,
        'hospitality' => $hospitality,
        'placement' => $placement,
        'brand' => $brand,
        'notice' => $notice,
        'hundred' => $hundred,
        'diffrent' => $diffrent,
        'industry_spk' => $industry_spk,
        'faq' => $faq,
        'contact_home' => $contact_home,
    ];
//    echo '<pre>';
//    print_r($jsondata);
//    die;

    return view('index')->with($jsondata);
  }

  public function contactUs()
  {

    $contact_page = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 23])->first();

    return view('contact-us')->with(['contact_page' => $contact_page]);
  }

  public function thankyouPage()
  {
    return view('thankyou');
  }

  public function ApplyNow()
  {
    return view('ApplyNow');
  }

  public function ApplyNow2()
  {
    return view('ApplyNow2');
  }

  public function newsLetter()
  {
    return view('newsletter-thankyou');
  }

  public function aboutUs()
  {

    $cms = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 12])->first();
    return view('about-us')->with([
                'about_us' => $cms
    ]);
  }

  public function Admission()
  {

    $cms = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 13])->first();
    return view('admission')->with([
                'admission' => $cms
    ]);
  }

  public function privacypolicyIndex()
  {

    $cms = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 11])->first();
    return view('privacy-policy')->with([
                'cms' => $cms
    ]);
  }

  public function termsConditionIndex()
  {

    $cms = Cms::where(['status' => '1', 'cms_type' => '1', 'id' => 10])->first();
    return view('terms_conditions')->with([
                'cms' => $cms
    ]);
  }

  public function add()
  {

    return view('admin/image/add');
  }

  public function store(Request $request)
  {
    $var = explode('/', request()->route()->uri);
    $data = $this->banner->storBanner($request);
    if ($data) {
      return redirect($var[0] . '/image/list')->with('success', 'Data added successfully !');
    }
  }

  public function edit($id)
  {

    $data = ImageUpload::where('id', $id)->first();
    return view('admin/image/add')->with(
                    [
                        'data' => $data
    ]);
  }

  public function delete($id)
  {

    $var = explode('/', request()->route()->uri);
    $delete = ImageUpload::where('id', $id)->delete();

    $data = ImageUpload::where('id', $id)->first();
    //$image_path = public_path('/image/').$data['icon'];  // Value is not URL but directory file path
    //if(File::exists($image_path)) {
    //File::delete($image_path);
    // }
    if ($delete) {
      return redirect($var[0] . '/image/list')->with('success', 'Data deleted successfully !');
    }
  }

  public function update(Request $request)
  {
    $var = explode('/', request()->route()->uri);
    $data = $this->banner->updateBanner($request);
    if ($data) {
      return redirect($var[0] . '/image/list')->with('success', 'Data Updated successfully !');
    }
  }

  public function getimageListAdmin(Request $request)
  {

    $limit = 40;
    $str = "";
    if ($request->has('limit')) {
      $limit = $request->limit;
    }
    if ($request->has('q')) {
      $str = $request->q;
    }
    $data = ImageUpload::paginate($limit);

    return view('admin/image/list')->with([
                'data' => $data
    ]);
  }

  public function list()
  {
    $data = ImageUpload::get();
    return view('admin/image/list')->with(['data' => $data]);
  }

  public function updatePriority(Request $request)
  {

    if (isset($request->p)) {
      foreach ($request['priority'] as $key => $val) {
        $updatePriority = ImageUpload::where('id', $key)->update([
            'priority' => $val,
        ]);
      }
    } else if (isset($request->d)) {
      foreach ($request['doc_priority'] as $key => $val) {
        $updatePriority = ImageUpload::where('id', $key)->update([
            'doc_priority' => $val,
        ]);
      }
    } else if (isset($request->s)) {
      foreach ($request['specility_priority'] as $key => $val) {
        $updatePriority = ImageUpload::where('id', $key)->update([
            'specility_priority' => $val,
        ]);
      }
    }

    return redirect('admin/image/list')->with(['success' => 'priority updated']);
  }

  public function Scholarship()
  {

    return view('scholarship');
  }

  public function anScholor()
  {

    return view('aditya-nanda-scholarship');
  }

  public function ahScholor()
  {

    return view('apna-heera-scholarship');
  }
}
