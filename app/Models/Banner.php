<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public function storBanner($request){

        $data = new Banner;
        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('banner',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $iconm = $request->file('mobicon'); 
        if($iconm){
        $iconnailm =uniqid().$iconm->getClientOriginalName(); 
        $iconm->move('banner',$iconnailm); 
        }
        else {
        $iconm = null ; 
        } 

         

        $data->name = $request->name;
        $data->slug= $request->slug;
        $data->type =    $request->type;
        $data->version_type = $request->version_type;
        $data->icon = isset($iconnail) ? $iconnail : null;
        $data->mobicon = isset($iconnailm) ? $iconnailm : null;
        $data->type = $request->type;
        $data->description  = $request->description;
        $data->yt_link = $request->yt_link;
       
        $data->status = $request->status;
        $data->save();
        return $data;
    }

    public function updateBanner($request){

        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('banner',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $iconm = $request->file('mobicon'); 
        if($iconm){
        $iconnailm =uniqid().$iconm->getClientOriginalName(); 
        $iconm->move('banner',$iconnailm); 
        }
        else {
        $iconm = null ; 
        } 
 
        $upadte = Banner::where('id', $request->banner_id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => isset($iconnail) ? $iconnail : $request->icon_thumb,
            'mobicon' => isset($iconnailm) ? $iconnailm : null,
            'type' => $request->type,
            'version_type' =>$request->version_type,
            'description' => $request->description,
            'yt_link' => $request->yt_link,
            'status' => $request->status
        ]);
        return $upadte;
    }
}
