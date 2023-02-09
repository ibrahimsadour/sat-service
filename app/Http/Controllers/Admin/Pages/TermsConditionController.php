<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\TermsConditionRequest;
use App\Models\Pages\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DB;
class TermsConditionController extends Controller
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

    //show terms-condition page
    public function index()

    {
        $terms_condition = TermsCondition::first();
        return view('admin.pages.terms-condition.index', compact('terms_condition'));
    }

    //open Form to add  terms-condition
    public function create()
    {
        return view('admin.pages.terms-condition.create');
    }

      //add new car
      public function store(TermsConditionRequest $request)

      {

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        try{
            $terms_condition = new TermsCondition;
            $terms_condition->name = $request->input('name');
            $terms_condition->slug = Str::slug($request->input('slug'),'-', null);
            $terms_condition->active = $request->input('active');
            $terms_condition->description =  $request->input('description');
            $terms_condition->seo_title =  $request->input('seo_title');
            $terms_condition->seo_keyword =  $request->input('seo_keyword');
            $terms_condition->seo_description =  $request->input('seo_description');
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $filename=  'images/pages/terms-condition/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/terms-condition/', $final_filename);
                $terms_condition->photo = $final_filename;
            }
            $terms_condition->save();
            return redirect()->route('admin.terms-condition')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            return redirect()->route('admin.terms-condition')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)

    {
        $terms_condition = TermsCondition::select()->find($id);
        if (!$terms_condition) {
            return redirect()->route('admin.terms-condition')->with(['error' => 'هذه المقالة غير موجودة ']);
        }
        return view('admin.pages.terms-condition.edit', compact('terms_condition'));

    }
    public function update($id, TermsConditionRequest  $request)
    {
            //validation => TermsConditionRequest
            
        try {

            //find terms-condition and check of the exists or not
            $terms_condition = TermsCondition::find($id);
            if (!$terms_condition) {
                return redirect()->route('admin.terms-condition.edit', $id)->with(['error' => 'هذه الماركة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $terms_condition = TermsCondition::find($id);
            $terms_condition->name = $request->input('name');
            $terms_condition->slug = Str::slug($request->input('slug'),'-', null);
            $terms_condition->active = $request->input('active');
            $terms_condition->description = $request->input('description');
            $terms_condition->seo_title = $request->input('seo_title');
            $terms_condition->seo_keyword = $request->input('seo_keyword');
            $terms_condition->seo_description = $request->input('seo_description');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($terms_condition->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/pages/terms-condition/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/terms-condition/', $filename);
                $terms_condition->photo = $filename;
            }

            $terms_condition->update();
            DB::commit();
            return redirect()->route('admin.terms-condition')->with(['success' => 'تمت تحديث المقالة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.terms-condition')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $terms_condition = TermsCondition::find($id);
            if (!$terms_condition)
                return redirect()->route('admin.terms-condition')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($terms_condition->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $terms_condition->delete();

            return redirect()->route('admin.terms-condition')->with(['success' => 'تم حذف المقالة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.terms-condition')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $terms_condition = TermsCondition::find($id);
            if (!$terms_condition)
                return redirect()->route('admin.terms-condition')->with(['error' => 'هذه المقالة غير موجود ']);

            $status =  $terms_condition -> active  == 0 ? 1 : 0;

            $terms_condition -> update(['active' =>$status ]);

            return redirect()->route('admin.terms-condition')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.terms-condition')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

