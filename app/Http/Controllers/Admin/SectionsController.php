<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionsRequest;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SectionsController extends Controller
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

    //show all section
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $sections = Section::paginate(10);

        return view('admin.sections.index', compact('sections'));

    }
    //open Form to add new section
    public function create()

    {
        return view('admin.sections.create');
    }
    //add new car
    public function store(SectionsRequest $request)

    {
        DB::beginTransaction();
        //Deze gemaakt om te checken als het goed gaat met insert proces:
        ### try {
        ### code hier
        ### DB::commit();
        ### } catch (\Exception $ex) {
        ### DB::rollback();
        ### }

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        try{
            $section = new Section;
            $section->name = $request->input('name');
            $section->slug = Str::slug($request->input('slug'),'-', null);
            $section->description =  $request->input('description');
            $section->seo_title =  $request->input('seo_title');
            $section->seo_keyword =  $request->input('seo_keyword');
            $section->seo_description =  $request->input('seo_description');
            $section->active = $request->input('active');
            if($request->hasfile('photo'))
            {

                $file = $request->file('photo');
                $filename =  'images/sections/'.$file->getClientOriginalName();
                $file->move('assets/images/sections/', $filename);
                $section->photo = $filename;
            }
            $section->save();
            DB::commit();
            return redirect()->route('admin.sections')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }




    }
    public function edit($id)

    {
        try {
            $section = Section::select()->find($id);
            if (!$section) {
                return redirect()->route('admin.sections')->with(['error' => 'هذه الماركة غير موجودة ']);
            }

            return view('admin.sections.edit', compact('section'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, SectionsRequest $request)
    {
        //validation => CarsRequest

        try {
            //find Car
            $section = Section::find($id);
            if (!$section) {
                return redirect()->route('admin.sections.edit', $id)->with(['error' => 'هذه الماركة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $section = Section::find($id);
            $section->name = $request->input('name');
            $section->slug = Str::slug($request->input('slug'),'-', null);
            $section->description =  $request->input('description');
            $section->seo_title =  $request->input('seo_title');
            $section->seo_keyword =  $request->input('seo_keyword');
            $section->seo_description =  $request->input('seo_description');
            $section->active = $request->input('active');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($section->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/sections/'.$file->getClientOriginalName();
                $file->move('assets/images/sections/', $filename);
                $section->photo = $filename;
            }
            $section->update();
            DB::commit();
            return redirect()->route('admin.sections')->with(['success' => 'تمت التعديل بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {

        try {
            $section = Section::find($id);
            if (!$section)
                return redirect()->route('admin.sections')->with(['error' => 'هذه الماركة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($section->photo, 'assets/');
            $image = public_path('assets/' . $image);

            unlink($image); //delete from folder


            #delet section
            $section->delete();

            return redirect()->route('admin.sections')->with(['success' => 'تم حذف الماركة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $section = Section::find($id);
            if (!$section)
                return redirect()->route('admin.sections')->with(['error' => 'هذه الماركة غير موجود ']);

            $status =  $section -> active  == 0 ? 1 : 0;

            $section -> update(['active' =>$status ]);

            return redirect()->route('admin.sections')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function section_tags($id)
    {
        try {
            $section = Section::select()->find($id);
            $sectionTags = $section->tags()->paginate(PAGINATION_COUNT);
            $tags = Tag::all();
            // return $sectionTags;
            if (!$section) {
                return redirect()->route('admin.sections')->with(['error' => 'هذه الماركة غير موجودة ']);
            }

            return view('admin.sections.section-tags.index', compact('section','sectionTags','tags'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.sections')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function insert_tags_to_section(Request $request)
    {
        $section = Section::find($request->section_id);

        $section-> tags()->syncWithoutDetaching ($request->tags);
        
        return redirect()->route('admin.sections.section-tags',$request->section_id)->with(['success' => 'تمت الاضافة بنجاح']);
        
    }
    public function delete_tag_from_section($id)
    {

        $tag =Tag::find($id); 
        $tag->sections()->detach();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
        
    }
    

}
