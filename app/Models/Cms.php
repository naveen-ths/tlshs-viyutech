<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    public function storeCSR($request){

        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('cms',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $data = new Cms;
        $data->name = $request->name;
        $data->icon = isset($iconnail) ? $iconnail : null;
        $data->slug = $request->slug;
        $data->parent_id = $request->parent_id;
        $data->ext_link = $request->ext_link;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->title = $request->title;
        $data->keyword = $request->keyword;
        $data->description = $request->description;
        $data->status = isset($request->status) ? $request->status : 1;
        $data->priority = 0;
        $data->cms_type = isset($request->cms_type) ? $request->cms_type :null;
        $data->save();
        return $data;
    }

    public function updateCSR($request){

        $icon = $request->file('icon'); 
        if($icon){
        $iconnail =uniqid().$icon->getClientOriginalName(); 
        $icon->move('cms',$iconnail); 
        }
        else {
        $icon = null ; 
        } 

        $update = Cms::where('id', $request->cms_id)->update([

        'name' => $request->name,
        'slug' => $request->slug,
        'icon' => isset($iconnail) ? $iconnail : $request->icon_thumb,
        'ext_link'   => $request->ext_link,
        'parent_id' =>$request->parent_id,
        'short_description'    =>$request->short_description,
        'long_description'    =>$request->long_description,
        'short_description'    =>$request->short_description,
        'title'    =>$request->title,
        'keyword'    =>$request->keyword,
        'description'    =>$request->description,
        'status' => isset($request->status) ? $request->status : 1,
        'cms_type' =>isset($request->cms_type) ? $request->cms_type :null

        ]);
        return $update;
    }
}
