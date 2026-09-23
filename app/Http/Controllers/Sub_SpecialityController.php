<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Sub_Speciality;

class Sub_SpecialityController extends Controller
{

  public function __construct()
  {
    $this->subspeciality = new Sub_Speciality;
  }

  public function index($slug, $sub_slug)
  {

    $data = Speciality::where(['status' => '1', 'slug' => $slug])->first();
    $restdata = Speciality::where('status', '1')->whereNotIn('id', [$data['id']])->get();
    $sub_speciality = Sub_Speciality::where(['status' => '1', 'slug' => $sub_slug])->first();
    $sub_specialityList = Sub_Speciality::where(['status' => '1'])
            // ->whereIn('speciality_id', [$data['id']])
            ->get();
    return view('program_details')->with([
                'data' => $data,
                'sub_speciality' => $sub_speciality,
                'restdata' => $restdata,
                'sub_specialityList' => $sub_specialityList
    ]);
  }
}
