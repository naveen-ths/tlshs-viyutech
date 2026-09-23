<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{

  public function bakeryPatisserie()
  {
    return view('campaign/tlshs_bakery_patisserie');
  }

  public function bakeryPatisserieThankyou()
  {
    return view('campaign/tlshs_bakery_patisserie_thankyou');
  }

  public function foodProduction()
  {
    return view('campaign/tlshs_food_production');
  }

  public function foodProductionThankyou()
  {
    return view('campaign/tlshs_food_production_thankyou');
  }

  public function hotelManagement()
  {
    return view('campaign/tlshs_hotel_management');
  }

  public function hotelManagementThankyou()
  {
    return view('campaign/tlshs_hotel_management_thankyou');
  }

  public function imageLifeSkillsLab()
  {
    return view('campaign/tlshs_image_life_skills_lab');
  }

  public function imageLifeSkillsLabThankyou()
  {
    return view('campaign/tlshs_image_life_skills_lab_thankyou');
  }
}
