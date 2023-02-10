<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
use App\Models\Article;
use App\Models\City;
use App\Models\Section;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Spatie\Sitemap\Sitemap;

class ArticlesController extends Controller
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

    public function article_sitemap(){
        Sitemap::create()
            ->add(Article::all());
    }

    //show all articles
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $articles = Article::paginate(10);
//        return $articles;

        return view('admin.articles.index', compact('articles'));
    }
    //open Form to add new articles
    public function create()

    {
        $data = [];
        $data['sections'] = Section::active()->select('id','name')->get();
        $data['cities'] = City::active()->select('id','name')->get();
        $data['services'] = Service::active()->select('id','name')->get();
        $data['tags'] = Tag::select('id','name')->get();


        return view('admin.articles.create', $data);
    }

    //add new car
    public function store(ArticlesRequest $request)

    {
//    return $request;
        DB::beginTransaction();
        //Deze gemaakt om te checken als het goed gaat met insert proces:
        ### try {
        ### DB::beginTransaction();
        ### code hier
        ### DB::commit();
        ### } catch (\Exception $ex) {
        ### DB::rollback();
        ### }

        if($request->hasfile('photo'))
        {

            $file = $request->file('photo');
            $filename =  'images/articles/'.$file->getClientOriginalName();
            $file->move('assets/images/articles/', $filename);
            $request->photo = $filename;
        }

        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        // section_id
        if($request->section_id != 0 ){
            $section_id = $request->section_id;
        }else{
            $section_id = Null;
        }
        // city_id
        if($request->city_id != 0 ){
            $city_id = $request->city_id;
        }else{
            $city_id = Null;
        }
        // service_id
        if($request->service_id != 0 ){
            $service_id = $request->service_id;
        }else{
            $service_id = Null;
        }


        try{
            $article = Article::create([
                'name' =>$request->name,
                'slug' => Str::slug($request->slug,'-', null),
                'active' => $request->active,
                'photo' => $filename,
                'description' =>$request->description,
                'seo_title' =>$request->seo_title,
                'seo_keyword' =>$request->seo_keyword,
                'seo_description' =>$request->seo_description,
                'section_id' => $section_id,
                'city_id' => $city_id,
                'service_id' => $service_id
            ]);
            $tags = $request->tags;
            $article->tags()->syncWithoutDetaching($tags);


            DB::commit();
            return redirect()->route('admin.articles')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)

    {
//        try {
            $article = Article::select()->Active()->find($id);

            $articleCities =  $article->city()->get();
            $cities = City::active()->select('id','name')->get();

            $articleServices =  $article->service()->get();
            $services = Service::active()->select('id','name')->get();

            $articleTags =  $article->tags()->get();
            $tags=  Tag::active()->select('id','name')->get();

            if (!$article) {
                return redirect()->route('admin.articles')->with(['error' => 'هذه المقالة غير موجودة ']);
            }
            return view('admin.articles.edit', compact('article','cities','services','tags','articleTags','articleCities','articleServices'));

//        } catch (\Exception $ex) {
//            return redirect()->route('admin.articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
//        }
    }

    public function update(ArticlesRequest $request)
    {
            //validation => ArticlesRequest

        try {
            // return $request;
            //find Article and check of the exists or not
            $article = Article::find($request->id);
            if (!$article) {
                return redirect()->route('admin.articles.edit', $request->id)->with(['error' => 'هذه المقالة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $article->name = $request->input('name');
            $article->slug = Str::slug($request->input('slug'),'-', null);
            $article->active = $request->input('active');

            $article->description = $request->input('description');
            $article->seo_title = $request->input('seo_title');
            $article->seo_keyword = $request->input('seo_keyword');
            $article->seo_description = $request->input('seo_description');

            $article->car_id = $request->input('car_id');
            $article->city_id = $request->input('city_id');
            $article->service_id = $request->input('service_id');

            $article-> tags()->syncWithoutDetaching ($request->tags);

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($article->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/articles/'.$file->getClientOriginalName();
                $file->move('assets/images/articles/', $filename);
                $article->photo = $filename;
            }

            $article->update();
            DB::commit();
            return redirect()->route('admin.articles')->with(['success' => 'تمت تحديث المقالة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function delete_all_tags_of_one_article($id)
    {
        $article =Article::find($id); 
        $article->tags()->detach();
        return Redirect::back()->with(['success' => 'تمت تحديث العلامات الدلالية بنجاح']);

    }
    public function destroy($id)
    {

        try {
            $article = Article::find($id);
            if (!$article)
                return redirect()->route('admin.articles')->with(['error' => 'هذه المقالة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($article->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $article->delete();

            return redirect()->route('admin.articles')->with(['success' => 'تم حذف المقالة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $article = Article::find($id);
            if (!$article)
                return redirect()->route('admin.articles')->with(['error' => 'هذه المقالة غير موجود ']);

            $status =  $article -> active  == 0 ? 1 : 0;

            $article -> update(['active' =>$status ]);

            return redirect()->route('admin.articles')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.articles')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


}
