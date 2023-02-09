<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;
class TagsController extends Controller
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

    //show all cities
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $tags = Tag::paginate(10);

        return view('admin.tags.index', compact('tags'));

    }
    //open Form to add new city
    public function create()

    {
        return view('admin.tags.create');
    }

    //add new car
    public function store(TagsRequest $request)

    {
        DB::beginTransaction();
        //Deze gemaakt om te checken als het goed gaat met insert proces:
        ### try {
        ### DB::beginTransaction();
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
            $tag = new Tag;
            $tag->name =  $request->input('name');
            $tag->slug =  Str::slug($request->input('slug'),'-', null);
            $tag->description =  $request->input('description');
            $tag->seo_title =  $request->input('seo_title');
            $tag->seo_keyword =  $request->input('seo_keyword');
            $tag->seo_description =  $request->input('seo_description');
            $tag->active =  $request->input('active');
            $tag->save();
            DB::commit();
            return redirect()->route('admin.tags')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)

    {
        try {
            $tag = Tag::select()->find($id);
            if (!$tag) {
                return redirect()->route('admin.tags')->with(['error' => 'هذه المدينة غير موجودة ']);
            }

            return view('admin.tags.edit', compact('tag'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, TagsRequest $request)
    {
        //validation => CarsRequest

        try {
            //find Car
            $tag = Tag::find($id);
            if (!$tag) {
                return redirect()->route('admin.tags.edit', $id)->with(['error' => 'هذه المدينة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            Tag::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->input('slug'),'-', null),
                    'description' => $request->description,
                    'seo_title' => $request->seo_title,
                    'seo_keyword' => $request->seo_keyword,
                    'seo_description' => $request->seo_description,
                    'active' => $request->active,
                ]);
            // save image

            return redirect()->route('admin.tags')->with(['success' => 'تمت تحديث المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {

        try {
            $tag = Tag::find($id);
            if (!$tag)
                return redirect()->route('admin.tags')->with(['error' => 'هذه المدينة غير موجود ']);


            #delet section
            $tag->delete();

            return redirect()->route('admin.tags')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function destroyAll()
    {
        Tag::whereNotNull('id')->delete();  
        return redirect()->route('admin.tags')->with(['success' => 'تم حذف الجميع بنجاح']);
    }
    public function changeStatus($id)
    {
        try {
            $tag = Tag::find($id);
            if (!$tag)
                return redirect()->route('admin.tags')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $tag -> active  == 0 ? 1 : 0;

            $tag -> update(['active' =>$status ]);

            return redirect()->route('admin.tags')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.tags')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
