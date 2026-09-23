<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{

  use HasFactory;

  public function storBlog($request)
  {

    $data = new Blog;
    $icon = $request->file('icon');
    if ($icon) {
      $iconnail = uniqid() . $icon->getClientOriginalName();
      $icon->move('blog', $iconnail);
    } else {
      $icon = null;
    }

    $image = $request->file('image');
    if ($image) {
      $img = uniqid() . $image->getClientOriginalName();
      $image->move('blog', $img);
    } else {
      $image = null;
    }

    $imagemobicon = $request->file('mobicon');
    if ($imagemobicon) {
      $imgmobicon = uniqid() . $imagemobicon->getClientOriginalName();
      $imagemobicon->move('blog', $imgmobicon);
    } else {
      $imagemobicon = null;
    }

    $data->name = $request->name;
    $data->slug = $request->slug;
    $data->speciality_id = isset($request->speciality_id) ? implode(',', $request->speciality_id) : null;
    $data->subspeciality_id = isset($request->subspeciality_id) ? implode(',', $request->subspeciality_id) : null;
    $data->treatments = isset($request->treatments) ? implode(',', $request->treatments) : null;
    $data->hospital_id = isset($request->hospital_id) ? implode(',', $request->hospital_id) : null;
    $data->icon = isset($iconnail) ? $iconnail : null;
    $data->image = isset($img) ? $img : null;
    $data->imgmobicon = isset($imgmobicon) ? $imgmobicon : null;
    $doctor_id = isset($request->doctor_id) ? implode(',', $request->doctor_id) : null;
    $data->short_description = $request->short_description;
    $data->long_description = $request->long_description;
    $data->heading1 = $request->heading1;
    $data->heading2 = $request->heading2;
    $data->long_description2 = $request->long_description2;
    $data->long_description3 = $request->long_description3;
    $data->heading4 = $request->heading4;
    $data->long_description4 = $request->long_description4;
    $data->heading5 = $request->heading5;
    $data->long_description5 = $request->long_description5;
    $data->heading6 = $request->heading6;
    $data->long_description6 = $request->long_description6;
    $data->heading7 = $request->heading7;
    $data->long_description7 = $request->long_description7;
    $data->heading8 = $request->heading8;
    $data->long_description8 = $request->long_description8;

    $data->heading9 = $request->heading9;
    $data->long_description9 = $request->long_description9;

    $data->heading10 = $request->heading10;
    $data->long_description10 = $request->long_description10;

    $data->heading11 = $request->heading11;
    $data->long_description11 = $request->long_description11;

    $data->heading12 = $request->heading12;
    $data->long_description12 = $request->long_description12;

    $data->heading13 = $request->heading13;
    $data->long_description13 = $request->long_description13;

    $data->heading14 = $request->heading14;
    $data->long_description14 = $request->long_description14;

    $data->heading15 = $request->heading15;
    $data->long_description15 = $request->long_description15;

    $data->heading16 = $request->heading16;
    $data->long_description16 = $request->long_description16;

    $data->heading17 = $request->heading17;
    $data->long_description17 = $request->long_description17;

    $data->other = $request->other;
    $data->long_other = $request->long_other;
    $data->title = $request->title;
    $data->keyword = $request->keyword;
    $data->description = $request->description;
    $data->yt_link = $request->yt_link;
    $data->featured = $request->featured;
    $data->status = $request->status;
    $data->save();
    return $data;
  }

  public function updateBlog($request)
  {

    $icon = $request->file('icon');
    if ($icon) {
      $iconnail = uniqid() . $icon->getClientOriginalName();
      $icon->move('blog', $iconnail);
    } else {
      $icon = null;
    }

    $image = $request->file('image');

    if ($image) {
      $img = uniqid() . $image->getClientOriginalName();
      $image->move('blog', $img);
    } else {
      $image = null;
    }

    $imagemobicon = $request->file('mobicon');
    if ($imagemobicon) {
      $imgmobicon = uniqid() . $imagemobicon->getClientOriginalName();
      $imagemobicon->move('blog', $imgmobicon);
    } else {
      $imagemobicon = null;
    }

    $upadte = Blog::where('id', $request->blogs_id)->update([
        'name' => $request->name,
        'slug' => $request->slug,
        'speciality_id' => isset($request->speciality_id) ? implode(',', $request->speciality_id) : null,
        'subspeciality_id' => isset($request->subspeciality_id) ? implode(',', $request->subspeciality_id) : null,
        'treatments' => isset($request->treatments) ? implode(',', $request->treatments) : null,
        'hospital_id' => isset($request->hospital_id) ? implode(',', $request->hospital_id) : null,
        'icon' => isset($iconnail) ? $iconnail : $request->icon_thumb,
        'image' => isset($img) ? $img : $request->image_thumb,
        'imgmobicon' => isset($imgmobicon) ? $imgmobicon : $request->mobicon_thumb,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'title' => $request->title,
        'doctor_id' => isset($request->doctor_id) ? implode(',', $request->doctor_id) : null,
        'keyword' => $request->keyword,
        'description' => $request->description,
        'heading1' => $request->heading1,
        'heading2' => $request->heading2,
        'long_description2' => $request->long_description2,
        'heading3' => $request->heading3,
        'long_description3' => $request->long_description3,
        'heading4' => $request->heading4,
        'long_description4' => $request->long_description4,
        'heading5' => $request->heading5,
        'long_description5' => $request->long_description5,
        'heading6' => $request->heading6,
        'long_description6' => $request->long_description6,
        'heading7' => $request->heading7,
        'long_description7' => $request->long_description7,
        'heading8' => $request->heading8,
        'long_description8' => $request->long_description8,
        'heading9' => $request->heading9,
        'long_description9' => $request->long_description9,
        'heading10' => $request->heading10,
        'long_description10' => $request->long_description10,
        'heading11' => $request->heading11,
        'long_description11' => $request->long_description11,
        'heading12' => $request->heading12,
        'long_description12' => $request->long_description12,
        'heading13' => $request->heading13,
        'long_description13' => $request->long_description13,
        'heading14' => $request->heading14,
        'long_description14' => $request->long_description14,
        'heading15' => $request->heading15,
        'long_description15' => $request->long_description15,
        'heading16' => $request->heading16,
        'long_description16' => $request->long_description16,
        'heading17' => $request->heading17,
        'long_description17' => $request->long_description17,
        'other' => $request->other,
        'long_other' => $request->long_other,
        'yt_link' => $request->yt_link,
        'featured' => $request->featured,
        'status' => $request->status
    ]);
    return $upadte;
  }

  public function getBlogAdmin($request)
  {


    $limit = 10;
    $str = "";
    if ($request->has('limit')) {
      $limit = $request->limit;
    }
    if ($request->has('q')) {
      $str = $request->q;
    }
    $data = Blog::where('name', 'like', '%' . $str . '%')->paginate($limit);

    return $data;
  }

  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
  }
}
