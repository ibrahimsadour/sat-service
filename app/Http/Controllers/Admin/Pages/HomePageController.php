<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\About;
use App\Models\Pages\HomePage;
use Illuminate\Http\Request;
use App\Http\Requests\Pages\HomePageUsRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use DB;
class HomePageController extends Controller
{
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $home_page = HomePage::first();
        return view('admin.pages.home-page.index', compact('home_page'));
    }
    //open Form to add new car
    public function create(){
        return view('admin.pages.home-page.create');
    }

    //add new car
    public function store(HomePageUsRequest $request)
    {
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        try{
            $home_page = new HomePage;
            $home_page->title = $request->input('title');
            $home_page->h2title = $request->input('h2title');
            $home_page->default_country =  $request->input('default_country');
            $home_page->description =  $request->input('description');
            $home_page->call_us =  $request->input('call_us');
            $home_page->facebook_link =  $request->input('facebook_link');
            $home_page->instagram_link =  $request->input('instagram_link');
            $home_page->twitter_link =  $request->input('twitter_link');
            $home_page->seo_title =  $request->input('seo_title');
            $home_page->seo_keyword =  $request->input('seo_keyword');
            $home_page->seo_description =  $request->input('seo_description');
            $home_page->active = $request->input('active');

            if($request->hasfile('logo')) {
                $file = $request->file('logo');
                $filename=  'images/pages/logo/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/logo/', $final_filename);
                $home_page->logo = $final_filename;
            }

            if($request->hasfile('background')) {
                $file = $request->file('background');
                $filename=  'images/pages/background/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/background/', $final_filename);
                $home_page->background = $final_filename;
            }
            if($request->hasfile('default_seo_image')) {
                $file = $request->file('default_seo_image');
                $filename=  'images/pages/default_seo_image/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/default_seo_image/', $final_filename);
                $home_page->default_seo_image = $final_filename;
            }
            if($request->hasfile('ads_sidebar')) {
                $file = $request->file('ads_sidebar');
                $filename=  'images/pages/ads_sidebar/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/ads_sidebar/', $final_filename);
                $home_page->ads_sidebar = $final_filename;
            }
            $home_page->save();
            DB::commit();
            return redirect()->route('admin.home-page')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)

    {
        $home_page = HomePage::select()->find($id);
        if (!$home_page) {
            return redirect()->route('admin.home-page')->with(['error' => 'هذه المقالة غير موجودة ']);
        }
//        return $home_page;
        return view('admin.pages.home-page.edit', compact('home_page'));

    }
    public function update($id, HomePageUsRequest $request)
    {
            //validation => ArticlesRequest

        try {

            //find Article and check of the exists or not
            $home_page = HomePage::find($id);
            if (!$home_page) {
                return redirect()->route('admin.home-page', $id)->with(['error' => 'هذه الصفحة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $home_page->title = $request->input('title');
            $home_page->h2title = $request->input('h2title');
            $home_page->default_country =  $request->input('default_country');
            $home_page->description =  $request->input('description');
            $home_page->call_us =  $request->input('call_us');
            $home_page->facebook_link =  $request->input('facebook_link');
            $home_page->instagram_link =  $request->input('instagram_link');
            $home_page->twitter_link =  $request->input('twitter_link');
            $home_page->seo_title =  $request->input('seo_title');
            $home_page->seo_keyword =  $request->input('seo_keyword');
            $home_page->seo_description =  $request->input('seo_description');
            $home_page->active = $request->input('active');
            
            // check if the user uplode new logo  than delete the old logo
            if($request->hasfile('logo'))
            {
                $image = Str::after($home_page->logo, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('logo');
                $filename =  'images/pages/logo/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/logo/', $filename);
                $home_page->logo = $filename;
            }

            // check if the user uplode new background  than delete the old background
            if($request->hasfile('background'))
            {
                $image = Str::after($home_page->background, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('background');
                $filename =  'images/pages/background/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/background/', $filename);
                $home_page->background = $filename;
            }

            // check if the user uplode new default_seo_image  than delete the old default_seo_image
            if($request->hasfile('default_seo_image'))
            {
                $image = Str::after($home_page->default_seo_image, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('default_seo_image');
                $filename =  'images/pages/default_seo_image/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/default_seo_image/', $filename);
                $home_page->default_seo_image = $filename;
            }

            // check if the user uplode new ads_sidebar  than delete the old ads_sidebar
            if($request->hasfile('ads_sidebar'))
            {
                $image = Str::after($home_page->ads_sidebar, 'assets/');
                $image = public_path('assets/' . $image);
                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('ads_sidebar');
                $filename =  'images/pages/ads_sidebar/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/ads_sidebar/', $filename);
                $home_page->ads_sidebar = $filename;
            }
            $home_page->update();
            DB::commit();
            return redirect()->route('admin.home-page')->with(['success' => 'تمت تحديث المقالة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        // try {
            $home_page = HomePage::find($id);
            // if (!$home_page)
            //     return redirect()->route('admin.home-page')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet logo
            ##Srt is cutting helper method
            $logo = Str::after($home_page->logo, 'assets/');
            $logo = public_path('assets/' . $logo);
            if(!$logo != false ){
                unlink($logo); //delete from folder
            }

            ## Delet background
            ##Srt is cutting helper method
            $background = Str::after($home_page->background, 'assets/');
            $background = public_path('assets/' . $background);
            if(!$background != false ){
                unlink($background); //delete from folder
            }

            ## Delet background
            ##Srt is cutting helper method
            $default_seo_image = Str::after($home_page->default_seo_image, 'assets/');
            $default_seo_image = public_path('assets/' . $default_seo_image);
            if(!$default_seo_image != false ){
                unlink($default_seo_image); //delete from folder
            }

            ## Delet ads_sidebar
            ##Srt is cutting helper method
            $ads_sidebar = Str::after($home_page->ads_sidebar, 'assets/');
            $ads_sidebar = public_path('assets/' . $ads_sidebar);
            if(!$ads_sidebar != false ){
                unlink($ads_sidebar); //delete from folder
            }

            #delet section
            $home_page->delete();

            return redirect()->route('admin.home-page')->with(['success' => 'تم حذف المقالة بنجاح']);

        // } catch (\Exception $ex) {
        //     // return $ex;
        //     return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }
    }
}
