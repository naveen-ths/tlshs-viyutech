<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Speciality extends Model
{
    use HasFactory;

    public function storeSubSpeciality($request){
        
        $data = new Sub_Speciality;
        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('speciality',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $image = $request->file('image'); 

        if($image){
        $img =uniqid().$image->getClientOriginalName(); 
        $image->move('speciality',$img); 
        }
        else {
        $image = null; 
        }

        $home_image = $request->file('home_image'); 
        if($home_image){
        $spec_home_image = uniqid().$home_image->getClientOriginalName(); 
        $home_image->move('speciality',$spec_home_image); 
        }
        else {
        $home_image = null; 
        }

        $image_mob = $request->file('mobile_image'); 
        if($image_mob){
        $mob_img =uniqid().$image_mob->getClientOriginalName(); 
        $image_mob->move('speciality',$mob_img); 
        }
        else {
        $image_mob = null; 
        }

        $centered_image_mob = $request->file('centered_image'); 
        if($centered_image_mob){
        $centered_img =uniqid().$centered_image_mob->getClientOriginalName(); 
        $centered_image_mob->move('speciality',$centered_img); 
        }
        else {
        $centered_image_mob = null; 
        }

        $data->speciality_id = $request->speciality_id;
        $data->name = $request->name;
        $data->menu_name = $request->menu_name;
        
        $data->slug = $request->slug;
        $data->price = $request->price;
        //$data->location_id = implode(',', $request->location_id);
        $data->special_price = $request->special_price;
        $data->icon = isset($iconnail) ? $iconnail : null;
        $data->image = isset($img) ? $img :null;
        $data->mobile_image = isset($mob_img) ? $mob_img :null;
        $data->home_image =isset($spec_home_image) ? $spec_home_image : null;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->centered_content = $request->centered_content;
        $data->tag_line= $request->tag_line;
        $data->centered_image =  isset($centered_img) ? $centered_img : null;
        $data->h2_heading = $request->h2_heading;
        $data->h3_heading = $request->h3_heading;
        $data->h4_heading = $request->h4_heading;
        $data->h5_heading = $request->h5_heading;
        $data->title = $request->title;
        $data->keyword = $request->keyword;
        $data->description = $request->description;
        $data->yt_link = $request->yt_link;
        $data->quote = $request->quote;
        $data->featured = isset($request->featured) ? $request->featured : null;;
        $data->status = isset($request->status) ? $request->status : 1;
        $data->priority = 0;
        $data->doc_priority = 0;
        $data->specility_priority = 0;
        $data->save();
        return $data;

    }

    public function updateSubSpeciality($request){

        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('speciality',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $image = $request->file('image'); 

        if($image){
        $img =uniqid().$image->getClientOriginalName(); 
        $image->move('speciality',$img); 
        }
        else {
        $image = null; 
        }

        $home_image = $request->file('home_image'); 
        if($home_image){
        $spec_home_image = uniqid().$home_image->getClientOriginalName(); 
        $home_image->move('speciality',$spec_home_image); 
        }
        else {
        $home_image = null; 
        }

        $image_mob = $request->file('mobile_image'); 
        if($image_mob){
        $mob_img =uniqid().$image_mob->getClientOriginalName(); 
        $image_mob->move('speciality',$mob_img); 
        }
        else {
        $image_mob = null; 
        }

        $centered_image_mob = $request->file('centered_image'); 
        if($centered_image_mob){
        $centered_img =uniqid().$centered_image_mob->getClientOriginalName(); 
        $centered_image_mob->move('speciality',$centered_img); 
        }
        else {
        $centered_image_mob = null; 
        }
        

        $update = Sub_Speciality::where('id', $request->subspeciality_id)->update([

            'speciality_id' =>$request->speciality_id,
            'name' =>$request->name,
            'menu_name' =>$request->menu_name,
            'slug' =>$request->slug,
            'price' =>$request->price,
           // 'location_id' => implode(',', $request->location_id),
            'special_price' =>$request->special_price,
            'centered_content' => $request->centered_content,
            'tag_line'=> $request->tag_line,
            'centered_image' =>  isset($centered_img) ? $centered_img : $request->centered_img_thumb,
            'icon' => isset($iconnail) ? $iconnail : $request->icon_thumb,
            'image' =>isset($img) ? $img : $request->image_thumb,
            'mobile_image'  => isset($mob_img) ? $mob_img : $request->mob_image_thumb,
            'home_image' => isset($spec_home_image) ? $spec_home_image : $request->home_image_thumb,
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
            'h2_heading' =>$request->h2_heading,
            'h3_heading' =>$request->h3_heading,
            'h3_heading' =>$request->h3_heading,
            'h4_heading' =>$request->h4_heading,
            'h5_heading' =>$request->h5_heading,
            'title' =>$request->title,
            'keyword' =>$request->keyword,
            'description' =>$request->description,
            'yt_link' =>$request->yt_link,
            'quote' =>$request->quote,
            'featured' =>$request->featured,
            'status' =>$request->status

        ]);
        return $update;
    }

    public static function getSubSpecialityName($id){
      
        $data = Sub_Speciality::where(['status'=>'1', 'id'=>$id])->select('name')->first();
  
        if(isset($data)){
  
           return $data->name ;
        }
           return false; 
     }

     
    public function getSubSpecialityListAdmin($request){
        

        $limit = 10;
        $str = "";
        if ($request->has('limit')) {
            $limit = $request->limit;
        }
        if ($request->has('q')) {
            $str = $request->q;
        }
        $data = Sub_Speciality::where('name', 'like', '%' . $str . '%')->paginate($limit); 
        
        return  $data;

    }

    public static function getSubSpecName($id){
      
        $data = Sub_Speciality::where('status','1')
        ->whereIn("id", [$id])
        ->select('name')->first();
  
        if(isset($data)){
  
           return $data->name ;
        }
           return false; 
     }
}
