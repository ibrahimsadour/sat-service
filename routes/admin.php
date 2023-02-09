<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Relation\RelationsController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\Pages\PrivacyPolicyController;
use App\Http\Controllers\Admin\Pages\AboutController;
use App\Http\Controllers\Admin\Pages\TermsConditionController;
use App\Http\Controllers\Admin\Pages\HomePageController;
use App\Http\Controllers\Admin\ImportExcelController;
use App\Http\Controllers\Admin\GoolgeController;
use App\Http\Controllers\Admin\SubCarController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
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
// Dzee Route is gemaakt door Ibrahim sadour 06-10-2020
// Er wordt een namespace gemaakt ook in de bestaand /RouteServiceProvider/
// Hier wordt alle admin (Routes) toegevoegd.
// wordt hier in de bestand  /RouteServiceProvider/ een apart prefix ('admin') gemaakt

Auth::routes();


############################# Begin admin Dashboard Route ###############################

Route::group( ['prefix' => 'admin', 'middleware' => 'auth'],function() {
    Route::get('/dashboard',[DashboardController::class ,'show_dashboard']) -> name('admin.dashboard');

    ############################# Begin Cars Route ###############################
    Route::group(['prefix' => 'cars'], function () {
        Route::get('/',[CarsController::class ,'index']) -> name('admin.cars');
        Route::get('create',[CarsController::class ,'create']) -> name('admin.cars.create');
        Route::post('store',[CarsController::class ,'store']) -> name('admin.cars.store');
        Route::get('edit/{id}',[CarsController::class ,'edit']) -> name('admin.cars.edit');
        Route::post('update/{id}',[CarsController::class ,'update']) -> name('admin.cars.update');
        Route::get('delete/{id}',[CarsController::class ,'destroy']) -> name('admin.cars.delete');
        //change Status the category and the vendors
        Route::get('changeStatus/{id}',[CarsController::class ,'changeStatus']) -> name('admin.cars.status');
        // insert_all_tags_to_one_car
        Route::post('insert',[CarsController::class ,'insert_all_tags_to_one_car']) -> name('insert-all-tags-to-one-car');
        //delete_all_tags_of_one_car 
        Route::get  ('delete-tags/{id}',[CarsController::class ,'delete_all_tags_of_one_car']) -> name('delete-all-tags-of-one-car');
    });
    ############################# End Cars Route ################################


    ###################### Brgin Sub Cars Route ###############################
        Route::group(['prefix' => 'sub-cars'], function () {
            Route::get('{id}',[SubCarController::class ,'index']) -> name('admin.sub-cars');
            Route::get('/{id}/create',[SubCarController::class ,'create']) -> name('admin.sub-cars.create');
            Route::post('store',[SubCarController::class ,'store']) -> name('admin.sub-cars.store');
            Route::get('/edit/{id}',[SubCarController::class ,'edit']) -> name('admin.sub-cars.edit');
            Route::post('update/{id}',[SubCarController::class ,'update']) -> name('admin.sub-cars.update');
            Route::get('delete/{id}',[SubCarController::class ,'destroy']) -> name('admin.sub-cars.delete');
            //change Status the category and the vendors
            Route::get('changeStatus/{id}',[SubCarController::class ,'changeStatus']) -> name('admin.sub-cars.status');
            // insert_all_tags_to_ ( one_sub car collection ) -> one car
            Route::post('insert',[SubCarController::class ,'insert_all_tags_to_sub_car_collection']) -> name('insert-all-tags-to-sub-car-collection');
            // //delete_all_tags_of_one_car 
            Route::get  ('delete-tags/{id}',[SubCarController::class ,'delete_all_tags_of_one_sub_car']) -> name('delete-all-tags-of-one-sub-car');
        });
    ###################### End Sub Cars Route #################################


    ############################# Begin Cities Route ###############################
    Route::group(['prefix' => 'cities'], function () {
        Route::get('/',[CitiesController::class ,'index']) -> name('admin.cities');
        Route::get('create',[CitiesController::class ,'create']) -> name('admin.cities.create');
        Route::post('store',[CitiesController::class ,'store']) -> name('admin.cities.store');
        Route::get('edit/{id}',[CitiesController::class ,'edit']) -> name('admin.cities.edit');
        Route::post('update/{id}',[CitiesController::class ,'update']) -> name('admin.cities.update');
        Route::get('delete/{id}',[CitiesController::class ,'destroy']) -> name('admin.cities.delete');
        //change Status the category and the vendors
        Route::get('changeStatus/{id}',[CitiesController::class ,'changeStatus']) -> name('admin.cities.status');
        // insert_all_tags_to_one_city
        Route::post('insert',[CitiesController::class ,'insert_all_tags_to_one_city']) -> name('insert-all-tags-to-one-city');
        //delete_all_tags_of_one_city 
        Route::get  ('delete-tags/{id}',[CitiesController::class ,'delete_all_tags_of_one_city']) -> name('delete-all-tags-of-one-city');
    });
    ############################# End Cities Route ###############################

    ############################# Begin Services Route #############################
    Route::group(['prefix' => 'services'], function () {
        Route::get('/',[ServicesController::class ,'index']) -> name('admin.services');
        Route::get('create',[ServicesController::class ,'create']) -> name('admin.services.create');
        Route::post('store',[ServicesController::class ,'store']) -> name('admin.services.store');
        Route::get('edit/{id}',[ServicesController::class ,'edit']) -> name('admin.services.edit');
        Route::post('update/{id}',[ServicesController::class ,'update']) -> name('admin.services.update');
        Route::get('delete/{id}',[ServicesController::class ,'destroy']) -> name('admin.services.delete');
        //change Status the category and the vendors
        Route::get('changeStatus/{id}',[ServicesController::class ,'changeStatus']) -> name('admin.services.status');
    });
    ############################# End Services Route ###############################

    ############################# Begin tags Route #############################
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/',[TagsController::class ,'index']) -> name('admin.tags');
        Route::get('create',[TagsController::class ,'create']) -> name('admin.tags.create');
        Route::post('store',[TagsController::class ,'store']) -> name('admin.tags.store');
        Route::get('edit/{id}',[TagsController::class ,'edit']) -> name('admin.tags.edit');
        Route::post('update/{id}',[TagsController::class ,'update']) -> name('admin.tags.update');
        Route::get('delete/{id}',[TagsController::class ,'destroy']) -> name('admin.tags.delete');
        Route::get('changeStatus/{id}',[TagsController::class ,'changeStatus']) -> name('admin.tags.status');
        Route::get('deleteAll',[TagsController::class ,'destroyAll']) -> name('admin.tags.destroyAll');

        //show all articles by one tag
        Route::post('/import',[ImportExcelController::class ,'import'])-> name('admin.tags.import');

//        Route::get('articles',[RelationsController::class ,'show_tags_article']) -> name('admin.tags.articles');

    });
    ############################# End tags Route ###############################

    ############################# Begin Articles Route #############################
    Route::group(['prefix' => 'articles'], function () {
        Route::get('/',[ArticlesController::class ,'index']) -> name('admin.articles');
        Route::get('create',[ArticlesController::class ,'create']) -> name('admin.articles.create');
        Route::post('store',[ArticlesController::class ,'store']) -> name('admin.articles.store');
        Route::get('edit/{id}',[ArticlesController::class ,'edit']) -> name('admin.articles.edit');
        Route::post('update/{id}',[ArticlesController::class ,'update']) -> name('admin.articles.update');
        Route::get('delete/{id}',[ArticlesController::class ,'destroy']) -> name('admin.articles.delete');
        //change Status the category and the vendors
        Route::get('changeStatus/{id}',[ArticlesController::class ,'changeStatus']) -> name('admin.articles.status');

        //show all tags by one article
        Route::get('tags/{articleId}',[RelationsController::class ,'show_tags_article']) -> name('admin.articles.tags');
        Route::get  ('delete-tags/{id}',[ArticlesController::class ,'delete_all_tags_of_one_article']) -> name('delete-all-tags-of-one-article');

    });
    ############################# End Articles Route ###############################

    ############################# Begin sections Route ###############################
    Route::group(['prefix' => 'sections'], function () {
        Route::get('/',[SectionsController::class ,'index']) -> name('admin.sections');
        Route::get('create',[SectionsController::class ,'create']) -> name('admin.sections.create');
        Route::post('store',[SectionsController::class ,'store']) -> name('admin.sections.store');
        Route::get('edit/{id}',[SectionsController::class ,'edit']) -> name('admin.sections.edit');
        Route::post('update/{id}',[SectionsController::class ,'update']) -> name('admin.sections.update');
        Route::get('delete/{id}',[SectionsController::class ,'destroy']) -> name('admin.sections.delete');
        //change Status the category and the section
        Route::get('changeStatus/{id}',[SectionsController::class ,'changeStatus']) -> name('admin.sections.status');
        Route::get('{id}/tags',[SectionsController::class ,'section_tags']) -> name('admin.sections.section-tags');
        Route::post('tags/insert',[SectionsController::class ,'insert_tags_to_section']) -> name('admin.sections.insert-tags-to-section');

        Route::get('{id}/tag/delete',[SectionsController::class ,'delete_tag_from_section']) -> name('admin.sections.delete-tag-from-section');

    });
    ############################# End sections Route ###############################

    ############################# Begin privacy-policy Route #######################
    Route::group(['prefix' => 'privacy-policy'], function () {

        Route::get('/',[PrivacyPolicyController::class ,'index']) -> name('admin.privacy-policy');
        Route::get('create',[PrivacyPolicyController::class ,'create']) -> name('admin.privacy-policy.create');
        Route::post('store',[PrivacyPolicyController::class ,'store']) -> name('admin.privacy-policy.store');
        Route::get('edit/{id}',[PrivacyPolicyController::class ,'edit']) -> name('admin.privacy-policy.edit');
        Route::post('update/{id}',[PrivacyPolicyController::class ,'update']) -> name('admin.privacy-policy.update');
        Route::get('delete/{id}',[PrivacyPolicyController::class ,'destroy']) -> name('admin.privacy-policy.delete');
        //change Status the category and the section
        Route::get('changeStatus/{id}',[PrivacyPolicyController::class ,'changeStatus']) -> name('admin.privacy-policy.status');

    });
    ############################# End privacy-policy Route ###############################

    ############################# Begin Terms-Condition Route #######################
    Route::group(['prefix' => 'terms-condition'], function () {

        Route::get('/',[TermsConditionController::class ,'index']) -> name('admin.terms-condition');
        Route::get('create',[TermsConditionController::class ,'create']) -> name('admin.terms-condition.create');
        Route::post('store',[TermsConditionController::class ,'store']) -> name('admin.terms-condition.store');
        Route::get('edit/{id}',[TermsConditionController::class ,'edit']) -> name('admin.terms-condition.edit');
        Route::post('update/{id}',[TermsConditionController::class ,'update']) -> name('admin.terms-condition.update');
        Route::get('delete/{id}',[TermsConditionController::class ,'destroy']) -> name('admin.terms-condition.delete');
        //change Status the category and the section
        Route::get('changeStatus/{id}',[TermsConditionController::class ,'changeStatus']) -> name('admin.terms-condition.status');

    });
    ############################# End terms-condition Route ###############################

    ############################# Begin about Route ##############################
    Route::group(['prefix' => 'about'], function () {

        Route::get('/',[AboutController::class ,'index']) -> name('admin.about');
        Route::get('create',[AboutController::class ,'create']) -> name('admin.about.create');
        Route::post('store',[AboutController::class ,'store']) -> name('admin.about.store');
        Route::get('edit/{id}',[AboutController::class ,'edit']) -> name('admin.about.edit');
        Route::post('update/{id}',[AboutController::class ,'update']) -> name('admin.about.update');
        Route::get('delete/{id}',[AboutController::class ,'destroy']) -> name('admin.about.delete');
        //change Status the category and the section
        Route::get('changeStatus/{id}',[AboutController::class ,'changeStatus']) -> name('admin.about.status');

    });
    ############################# End about Route ###############################

    ############################# Begin home-page Route ###############################
    Route::group(['prefix' => 'home-page'], function () {
        Route::get('/',[HomePageController::class ,'index']) -> name('admin.home-page');
        Route::get('create',[HomePageController::class ,'create']) -> name('admin.home-page.create');
        Route::post('store',[HomePageController::class ,'store']) -> name('admin.home_page.store');
        Route::get('edit/{id}',[HomePageController::class ,'edit']) -> name('admin.home-page.edit');
        Route::post('update/{id}',[HomePageController::class ,'update']) -> name('admin.home-page.update');
        Route::get('delete/{id}',[HomePageController::class ,'destroy']) -> name('admin.home-page.delete');
        //change Status the category and the vendors
        Route::get('changeStatus/{id}',[HomePageController::class ,'changeStatus']) -> name('admin.home-page.status');
        
    });
    ############################# End Cars Route ################################
        ############################# Begin home-page Route ###############################
        Route::group(['prefix' => 'google'], function () {
            Route::get('/',[GoolgeController::class ,'index']) -> name('admin.google');
            Route::get('create',[GoolgeController::class ,'create']) -> name('admin.google.create');
            Route::post('store',[GoolgeController::class ,'store']) -> name('admin.google.store');
            Route::get('edit/{id}',[GoolgeController::class ,'edit']) -> name('admin.google.edit');
            Route::post('update/{id}',[GoolgeController::class ,'update']) -> name('admin.google.update');
            Route::get('delete/{id}',[GoolgeController::class ,'destroy']) -> name('admin.google.delete');
            Route::get('changeStatus/{id}',[GoolgeController::class ,'changeStatus']) -> name('admin.google.status');

        });
        ############################# End Cars Route ################################
    ############################# Begin cache Route ###############################
    Route::get('cache/application',[CacheController::class ,'application_cache']) -> name('admin.cache.application');
    ############################# End cache Route ###############################
});
############################# End admin Dashboard Route ###############################

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Disable Auth Register route and also you need to chane the middelware in the app\Http\Controllers\Auth\RegisterController.php 

Route::get('/register', function() {
    return redirect('/login');
});
Route::get('/admin-login', function() {
    return redirect('/login');
});
Route::post('/register', function() {
    return redirect('/login');
});


