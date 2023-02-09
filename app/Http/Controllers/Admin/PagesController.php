<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\HomePageUsRequest;
use App\Models\Pages\HomePage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $home_page = HomePage::first();

        return view('admin.home-page.index', compact('home_page'));
    }
    //open Form to add new car
    public function create(){
        return view('admin.home-page.create');
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
            $home_page->h2_title = $request->input('h2_title');
            $home_page->description =  $request->input('description');
            $home_page->call_us =  $request->input('call_us');
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
            $home_page->save();
            DB::commit();
            return redirect()->route('admin.home-page')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.home-page')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


}
