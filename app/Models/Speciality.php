<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    public function storeSpeciality($request){

        $data = new Speciality;
        
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
        

        
        $image_mob = $request->file('mobile_image'); 
        if($image_mob){
        $mob_img =uniqid().$image_mob->getClientOriginalName(); 
        $image_mob->move('speciality',$mob_img); 
        }
        else {
        $image_mob = null; 
        }


        $home_image = $request->file('home_image'); 
        if($home_image){
        $spec_home_image = uniqid().$home_image->getClientOriginalName(); 
        $home_image->move('speciality',$spec_home_image); 
        }
        else {
        $home_image = null; 
        }

        $centered_image_mob = $request->file('centered_image'); 
        if($centered_image_mob){
        $centered_img =uniqid().$centered_image_mob->getClientOriginalName(); 
        $centered_image_mob->move('speciality',$centered_img); 
        }
        else {
        $centered_image_mob = null; 
        }

        $data->name = $request->name;
        $data->menu_name = $request->menu_name;
        //$data->location_id = implode(',', $request->location_id);
        $data->slug = $request->slug;
        $data->speciality_type = $request->speciality_type;
        $data->price = $request->price;
        $data->special_price = $request->special_price;
        $data->icon = isset($iconnail) ? $iconnail : null;
        $data->image = isset($img) ? $img :null;
        $data->home_image =isset($spec_home_image) ? $spec_home_image : null;
        $data->mobile_image = isset($mob_img) ? $mob_img : null;
        $data->centered_image =  isset($centered_img) ? $centered_img : null;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->centered_content = $request->centered_content;
        $data->h2_heading = $request->h2_heading;
        $data->h3_heading = $request->h3_heading;
        $data->h4_heading = $request->h4_heading;
        $data->h5_heading = $request->h5_heading;
        $data->country = isset($request->country) ? str_replace(' ', '-', strtolower(implode(',',$request->country))) : null; 
        $data->state = isset($request->state) ? str_replace(' ', '-', strtolower($request->state)) : null;
        $data->city = isset($request->city) ? str_replace(' ', '-', strtolower($request->city)) : null; ;
        $data->title = $request->title;
        $data->tag_line= $request->tag_line;
        $data->keyword = $request->keyword;
        $data->description = $request->description;
        $data->yt_link = $request->yt_link;
        $data->quote = $request->quote;
        $data->featured = isset($request->featured) ? $request->featured : null;;
        $data->status = isset($request->status) ? $request->status : 1;
        $data->doc_title= $request->doc_title;
        $data->doc_description = $request->doc_description;
        $data->hos_title = $request->hos_title;
        $data->hos_description = $request->hos_description;
        $data->priority = 0;
        $data->doc_priority = 0;
        $data->specility_priority = 0;
        $data->save();
        return $data;
    }

    public function updateSpeciality($request){

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
        
        

        $update = Speciality::where('id', $request->speciality_id)->update([

            'name' =>$request->name,
            'menu_name' =>$request->menu_name,
            //'location_id' =>implode(',', $request->location_id),
            'slug' =>$request->slug,
            'speciality_type' =>$request->speciality_type,
            'price' =>$request->price,
            'special_price' =>$request->special_price,
            'icon' => isset($iconnail) ? $iconnail : $request->icon_thumb,
            'image' =>isset($img) ? $img : $request->image_thumb,
            'home_image' => isset($spec_home_image) ? $spec_home_image : $request->home_image_thumb,
            'mobile_image'  => isset($mob_img) ? $mob_img : $request->mob_image_thumb,
            'short_description' =>$request->short_description,
            'short_description' =>$request->short_description,
            'centered_image'  =>isset($centered_img) ? $centered_img : $request->centered_img_thumb,
            'long_description' =>$request->long_description,
            'centered_content' =>$request->centered_content,
            'tag_line' =>$request->tag_line,
            'h2_heading' =>$request->h2_heading,
            'h3_heading' =>$request->h3_heading,
            'h3_heading' =>$request->h3_heading,
            'h4_heading' =>$request->h4_heading,
            'h5_heading' =>$request->h5_heading,
            'country'  => isset($request->country) ? str_replace(' ', '-', strtolower(implode(',',$request->country))) : null,
            'state'  =>  isset($request->state) ? str_replace(' ', '-', strtolower($request->state)) : null,
            'city'  =>isset($request->state) ? str_replace(' ', '-', strtolower($request->city)) : null,
            'title' =>$request->title,
            'keyword' =>$request->keyword,
            'description' =>$request->description,
            'yt_link' =>$request->yt_link,
            'quote' =>$request->quote,
            'featured' =>$request->featured,
            'doc_title' => $request->doc_title,
            'doc_description' => $request->doc_description,
            'hos_title' => $request->hos_title,
            'hos_description' => $request->hos_description,
            'status' =>$request->status

        ]);
        return $update;

    }

    
    public function getSpecialityListAdmin($request){
        

        $limit = 10;
        $str = "";
        if ($request->has('limit')) {
            $limit = $request->limit;
        }
        if ($request->has('q')) {
            $str = $request->q;
        }
        $data = Speciality::where('name', 'like', '%' . $str . '%')->paginate($limit); 
        
        return  $data;

    }

    

    public static function getSpecName($id){
      
        $data = Speciality::where('status','1')
        ->whereIn("id", [$id])
        ->select('name')->first();
  
        if(isset($data)){
  
           return $data->name ;
        }
           return false; 
     }
}
