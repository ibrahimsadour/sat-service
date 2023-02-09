<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Pages\PrivacyPolicyRequest;
use App\Models\Pages\PrivacyPolicy;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class PrivacyPolicyController extends Controller
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

    //show PrivacyPolicy page
    public function index()

    {
        $PrivacyPolicy = PrivacyPolicy::first();
        return view('admin.pages.privacy-policy.index', compact('PrivacyPolicy'));
    }

    //open Form to add  privacy_policy
    public function create()
    {
        return view('admin.pages.privacy-policy.create');
    }

      //add new car
      public function store(PrivacyPolicyRequest $request)

      {

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);
        try{
            $privacy_policy = new PrivacyPolicy;
            $privacy_policy->name = $request->input('name');
            $privacy_policy->slug = Str::slug($request->input('slug'),'-', null);
            $privacy_policy->active = $request->input('active');
            $privacy_policy->description =  $request->input('description');
            $privacy_policy->seo_title =  $request->input('seo_title');
            $privacy_policy->seo_keyword =  $request->input('seo_keyword');
            $privacy_policy->seo_description =  $request->input('seo_description');
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $filename=  'images/pages/privacy-policy/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/pages/privacy-policy/', $final_filename);
                $privacy_policy->photo = $final_filename;
            }
            $privacy_policy->save();
            return redirect()->route('admin.privacy-policy')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            return redirect()->route('admin.privacy-policy')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)

    {
        $privacy_policy = PrivacyPolicy::select()->find($id);
        if (!$privacy_policy) {
            return redirect()->route('admin.privacy-policy')->with(['error' => 'هذه المقالة غير موجودة ']);
        }
        return view('admin.pages.privacy-policy.edit', compact('privacy_policy'));

    }
    public function update($id, PrivacyPolicyRequest  $request)
    {
            //validation => PrivacyPolicyRequest
            
        try {

            //find privacy_policy and check of the exists or not
            $privacy_policy = PrivacyPolicy::find($id);
            if (!$privacy_policy) {
                return redirect()->route('admin.privacy-policy.edit', $id)->with(['error' => 'هذه الماركة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $privacy_policy = PrivacyPolicy::find($id);
            $privacy_policy->name = $request->input('name');
            $privacy_policy->slug = Str::slug($request->input('slug'),'-', null);
            $privacy_policy->active = $request->input('active');
            $privacy_policy->description = $request->input('description');
            $privacy_policy->seo_title = $request->input('seo_title');
            $privacy_policy->seo_keyword = $request->input('seo_keyword');
            $privacy_policy->seo_description = $request->input('seo_description');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($privacy_policy->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/pages/privacy-policy/'.$file->getClientOriginalName();
                $file->move('assets/images/pages/privacy-policy/', $filename);
                $privacy_policy->photo = $filename;
            }

            $privacy_policy->update();
            DB::commit();
            return redirect()->route('admin.privacy-policy')->with(['success' => 'تمت تحديث المقالة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.privacy-policy')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroy($id)
    {

        try {
            $privacy_policy = PrivacyPolicy::find($id);
            if (!$privacy_policy)
                return redirect()->route('admin.privacy-policy')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($privacy_policy->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $privacy_policy->delete();

            return redirect()->route('admin.privacy-policy')->with(['success' => 'تم حذف المقالة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.privacy-policy')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $privacy_policy = PrivacyPolicy::find($id);
            if (!$privacy_policy)
                return redirect()->route('admin.privacy-policy')->with(['error' => 'هذه المقالة غير موجود ']);

            $status =  $privacy_policy -> active  == 0 ? 1 : 0;

            $privacy_policy -> update(['active' =>$status ]);

            return redirect()->route('admin.privacy-policy')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.privacy-policy')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}

