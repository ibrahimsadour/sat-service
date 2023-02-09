<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages\About;
use Illuminate\Http\Request;
use App\Http\Requests\Pages\AboutRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
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

    //show About page
    public function index()

    {
        $about = About::first();
        return view('admin.pages.about.index', compact('about'));
    }

    //open Form to add  about
    public function create()
    {
        return view('admin.pages.about.create');
    }

      //add new car
      public function store(AboutRequest $request)

      {

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        try{
            $about = new About;
            $about->name = $request->input('name');
            $about->slug = Str::slug($request->input('slug'),'-', null);
            $about->active = $request->input('active');
            $about->description =  $request->input('description');
            $about->seo_title =  $request->input('seo_title');
            $about->seo_keyword =  $request->input('seo_keyword');
            $about->seo_description =  $request->input('seo_description');
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $filename=  'images/pages/about/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/about/', $final_filename);
                $about->photo = $final_filename;
            }
            $about->save();
            return redirect()->route('admin.about')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)

    {
        $about = About::select()->find($id);
        if (!$about) {
            return redirect()->route('admin.about')->with(['error' => 'هذه المقالة غير موجودة ']);
        }
        return view('admin.pages.about.edit', compact('about'));

    }
    public function update($id, AboutRequest  $request)
    {
            //validation => AboutRequest
            
        try {

            //find about and check of the exists or not
            $about = About::find($id);
            if (!$about) {
                return redirect()->route('admin.about.edit', $id)->with(['error' => 'هذه الماركة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $about = About::find($id);
            $about->name = $request->input('name');
            $about->slug = Str::slug($request->input('slug'),'-', null);
            $about->active = $request->input('active');
            $about->description = $request->input('description');
            $about->seo_title = $request->input('seo_title');
            $about->seo_keyword = $request->input('seo_keyword');
            $about->seo_description = $request->input('seo_description');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($about->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/pages/about/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/about/', $filename);
                $about->photo = $filename;
            }

            $about->update();
            DB  ::commit();
            return redirect()->route('admin.about')->with(['success' => 'تمت تحديث المقالة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $about = About::find($id);
            if (!$about)
                return redirect()->route('admin.about')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($about->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $about->delete();

            return redirect()->route('admin.about')->with(['success' => 'تم حذف المقالة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $about = About::find($id);
            if (!$about)
                return redirect()->route('admin.about')->with(['error' => 'هذه المقالة غير موجود ']);

            $status =  $about -> active  == 0 ? 1 : 0;

            $about -> update(['active' =>$status ]);

            return redirect()->route('admin.about')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.about')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

