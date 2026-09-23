<?php

namespace App\Providers;
use Blade; 
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Speciality;
use App\Models\Sub_Speciality;

class AppServiceProvider extends ServiceProvider
{

  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    // $data=[]; 
    Paginator::defaultView('simple-tailwind');
    Paginator::defaultSimpleView('simple-tailwind');

    Blade::withoutDoubleEncoding();
    view()->composer('frontend.main', function ($view) {
      $specfooter = Speciality::where(['status' => '1'])->orderByRaw('CONVERT(priority, SIGNED) ASC')->get();
      $spec = Speciality::where(['status' => '1'])->orderByRaw('CONVERT(priority, SIGNED) ASC')->get()->toArray();

      $sub = Sub_Speciality::where('status', '1')->orderByRaw('CONVERT(priority, SIGNED) ASC')->get();

      $view->with([
          'speciality' => $spec,
          'sub' => $sub,
          'specfooter' => $specfooter,
      ]);
    });
  }
}
