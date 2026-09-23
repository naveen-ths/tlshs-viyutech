<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\Sub_SpecialityController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//home page
Route::get('/', [IndexController::class, 'index']);

//speciality and sub spoeciality
Route::get('/program', [SpecialityController::class, 'index']);
Route::get('/program/{slug}', [SpecialityController::class, 'specialityDetails']);
Route::get('/program/{slug}/{sub_slug}', [Sub_SpecialityController::class, 'index']);

//Route::get('/login', [SpecialityController::class, 'index']);

Route::get('/campaign-new/tlshs-bakery-patisserie', [CampaignController::class, 'bakeryPatisserie']);
Route::get('/campaign-new/tlshs-food-production', [CampaignController::class, 'foodProduction']);
Route::get('/campaign-new/tlshs-hotel-management', [CampaignController::class, 'hotelManagement']);
Route::get('/campaign-new/tlshs-image-life-skills-lab', [CampaignController::class, 'imageLifeSkillsLab']);
Route::get('/campaign-new/tlshs-bakery-patisserie/thankyou.html', [CampaignController::class, 'bakeryPatisserieThankyou']);
Route::get('/campaign-new/tlshs-food-production/thankyou.html', [CampaignController::class, 'foodProductionThankyou']);
Route::get('/campaign-new/tlshs-hotel-management/thankyou.html', [CampaignController::class, 'hotelManagementThankyou']);
Route::get('/campaign-new/tlshs-image-life-skills-lab/thankyou.html', [CampaignController::class, 'imageLifeSkillsLabThankyou']);

// Blog
Route::get('/blogs', [blogController::class, 'index']);
Route::get('/blog/{slug}', [blogController::class, 'blogDetails']);

Auth::routes();

//admin area start
Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
  Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
  Route::get('/dashboard/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

  //Blogs
  Route::get('blogs/add', [BlogController::class, 'add']);
  Route::get('blogs/list', [BlogController::class, 'list']);
  Route::get('blogs/edit/{id}', [BlogController::class, 'edit']);
  Route::get('blogs/delete/{id}', [BlogController::class, 'delete']);
  Route::post('blogs/store', [BlogController::class, 'store']);
  Route::post('blogs/update', [BlogController::class, 'update']);
  Route::post('blogs/priority/update', [BlogController::class, 'updatePriority']);
  Route::get('blogs/list', [BlogController::class, 'getblogListAdmin']);
});


