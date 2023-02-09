<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\WebsitePagesController;
use App\Http\Controllers\Front\ArticlesController;
use App\Http\Controllers\Front\TagsController;
use App\Http\Controllers\Front\CitiesController;
use App\Http\Controllers\Admin\SitemapController;
use App\Http\Controllers\Front\SubCarController;
use App\Http\Controllers\Front\ServicesController;
use App\Http\Controllers\Front\CarsController;
use App\Http\Controllers\Front\SectionsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::fallback(function () {  return redirect()->route('404.index');});

Route::group( [
    'prefix' => '/'
],function() {

    /** Home Page route
    * @todo URL:www.DomeinName.com
    * @todo Route name : site.index
    */
    Route::get('',[WebsitePagesController::class ,'show_home_page']) -> name('site.index');
    Route::get('about',[WebsitePagesController::class ,'about_page']) -> name('about.index');
    Route::get('privacy-policy',[WebsitePagesController::class ,'privacy_policy_page']) -> name('privacy-policy.index');
    Route::get('terms-condition',[WebsitePagesController::class ,'terms_condition_page']) -> name('terms-condition.index');
    Route::get('contact-us',[WebsitePagesController::class ,'contact_us_page']) -> name('contact-us.index');

    Route::get('404',[WebsitePagesController::class ,'page_404']) -> name('404.index');
    ###########################################

    ###########################################
    Route::get('tags',[TagsController::class ,'show_all_tags']) -> name('tags.index');
    Route::get('tags/{id}/cars',[TagsController::class ,'show_tag_cars']) -> name('tag.cars.index');
    Route::get('tags/{slug}',[TagsController::class ,'show_one_tag']) -> name('tag.index');
    ###########################################

    ###########################################
    Route::get('services',[ServicesController::class ,'show_all_services']) -> name('services.index');
    Route::get('services/{slug}',[ServicesController::class ,'show_one_service']) -> name('service.index');
    ###########################################

    ###########################################
    Route::get('cities',[CitiesController::class ,'show_all_cities']) -> name('cities.index');
    Route::get('cities/{slug}',[CitiesController::class ,'show_one_city']) -> name('city.index');
    Route::get('cities/{slugcity}/{slugTag}',[CitiesController::class ,'show_city_tag']) -> name('city.tag.index');
    ###########################################

    ###########################################
    Route::get('cars',[CarsController::class ,'show_all_cars']) -> name('cars.index');
    Route::get('cars/{slug}',[CarsController::class ,'show_one_car']) -> name('car.index');
    Route::get('cars/{slugcar}/{slugTag}',[CarsController::class ,'show_car_tag']) -> name('car.tags.index');

    ##################
    Route::get('sub-cars/{slugcar}/{slugSubcar}',[SubCarController::class ,'show_one_subcar']) -> name('subcar.index');
    Route::get('sub-cars/{slugcar}/{slugSubcar}/{slugSubcarTag}',[SubCarController::class ,'show_subcar_with_one_tag']) -> name('subcar.tag.index');

    ###########################################

    ###########################################
    Route::get('sections',[SectionsController::class ,'show_all_sections']) -> name('sections.index');
    Route::get('sections/{slug}',[SectionsController::class ,'show_one_section']) -> name('section.index');
    ###########################################

    // Sitemap Routs
    ###########################################
    Route::get('sitemap-index',[SitemapController::class ,'sitemap_index'])-> name('sitemap-index');
    Route::get('sitemap-articles',[SitemapController::class ,'sitemap_article'])-> name('sitemap-articles');
    // sitemap for all cities + sitemap for evry city with her tags
    Route::get('sitemap-cities', [SitemapController::class ,'sitemap_cities'])-> name('sitemap-cities');
    Route::get('sitemap-city-tags', [SitemapController::class ,'sitemap_city_tags'])-> name('sitemap-city-tags');
    // sitemap for all cars + sitemap for evry car with her tags
    Route::get('sitemap-cars', [SitemapController::class ,'sitemap_cars'])-> name('sitemap-cars');
    Route::get('sitemap-car-tags', [SitemapController::class ,'sitemap_car_tags'])-> name('sitemap-car-tags');

    Route::get('sitemap-tags', [SitemapController::class ,'sitemap_tags'])-> name('sitemap-tags');
    Route::get('sitemap-services',[SitemapController::class ,'sitemap_services'])-> name('sitemap-services');
    Route::get('sitemap-sections',[SitemapController::class ,'sitemap_sections'])-> name('sitemap-sections');

    
    // صفحة خارطة الموقع
    Route::get('sitemap',[WebsitePagesController::class ,'sitemap']) -> name('sitemap');

    ###########################################


    ###########################################
    Route::get('articles',[ArticlesController::class ,'show_all_articles']) -> name('articles.index');
    Route::get('{slug}',[ArticlesController::class ,'show_one_article']) -> name('article.index');
});

// run command throu commandline
// Route::get('/generate-sitemap', function() {
//     $exitCode = Artisan::call('sitemap:generate');
//     return 'Sitemap Created Successfully'; //Return anything
// });




