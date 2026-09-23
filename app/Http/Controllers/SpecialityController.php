<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Sub_Speciality;
use App\Http\Requests\SpecialityRequest;
use App\Models\Treatments;
use App\Models\Hospital;
use DB;

class SpecialityController extends Controller
{

  public function __construct()
  {
    $this->speciality = new Speciality;
  }

  public function index(Request $request)
  {
    #return $request->location;
    if (isset($request->location)) {
      $hospital_details = Hospital::where(['status' => 1, 'slug' => $request->location])->first();

      $data = DB::table("specialities")
                      ->select('id', 'slug', 'status', 'name', 'icon', 'h5_heading', 'quote', 'home_image')
                      ->where('status', '1')
                      ->whereIn('id', explode(',', $hospital_details['speciality_id']))->get();
    } else {

      $data = Speciality::where(['status' => '1'])->orderByRaw('CONVERT(priority, SIGNED) ASC')->get();
    }
    return view('program')->with([
                'data' => $data
    ]);
  }

  public function specialityDetails($slug)
  {

    $data = Speciality::where(['status' => '1', 'slug' => $slug])->first();
    #return $data['id'];
    $restdata = Speciality::where('status', '1')->whereNotIn('id', [$data['id']])->get();
    $sub_specialityList = Sub_Speciality::where(['status' => '1'])
            //    ->whereIn('speciality_id', [$data['id']])
            ->get();
    return view('programmes')->with([
                'data' => $data,
                'restdata' => $restdata,
                'sub_specialityList' => $sub_specialityList
    ]);
  }
}
