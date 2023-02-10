<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\CitiesRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CitiesController extends Controller
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
        $cities = City::paginate(10);

        return view('admin.cities.index', compact('cities'));

    }
    //open Form to add new city
    public function create()

    {
        return view('admin.cities.create');
    }

    //add new car
    public function store(CitiesRequest $request)

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

        Str::slug($request->input('slug'),'-', null);

        try{
            $city = new City;
            $city->name = $request->input('name');
            $city->slug = Str::slug($request->input('slug'),'-', null);
            $city->active = $request->input('active');
            $city->save();
            DB::commit();
            return redirect()->route('admin.cities.create')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)

    {
        try {
            $city = City::select()->find($id);
            if (!$city) {
                return redirect()->route('admin.cities')->with(['error' => 'هذه المدينة غير موجودة ']);
            }

            return view('admin.cities.edit', compact('city'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, CitiesRequest $request)
    {

        try {
            //find Car
            $city = City::find($id);
            if (!$city) {
                return redirect()->route('admin.cities.edit', $id)->with(['error' => 'هذه المدينة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            City::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->input('slug'),'-', null),
                    'active' => $request->active,
                ]);
            // save image

            return redirect()->route('admin.cities')->with(['success' => 'تمت تحديث المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {

        try {
            $city = City::find($id);
            if (!$city)
                return redirect()->route('admin.cities')->with(['error' => 'هذه المدينة غير موجود ']);


            #delet section
            $city->delete();

            return redirect()->route('admin.cities')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $city = City::find($id);
            if (!$city)
                return redirect()->route('admin.cities')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $city -> active  == 0 ? 1 : 0;

            $city -> update(['active' =>$status ]);

            return redirect()->route('admin.cities')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    //insert_all_tags_to_one_city
    public function insert_all_tags_to_one_city(Request $request){
    
        $validator = $this->validate($request, [
            'id' => 'required|exists:cities,id'
            ],
            [
                'id.required' => 'هذا الحقل مطلوب',
                'id.exists' => 'رقم السيارة غير موجود في قاعدة البيانات'
            ]
        );
        if($validator) {
            $tags = Tag:: get('id');
            foreach($tags as $tag){
                $tag->cities()->attach($request->id);
            }
            return redirect()->route('admin.cities')->with(['success' => ' تم الاضافة بنجاح ']);
        }
        
    }
    public function delete_all_tags_of_one_city($id)
    {

        try {
            $cities =City::find($id); 
            $cities->tags()->detach();
            return redirect()->route('admin.cities')->with(['success' => 'تم حذف جميع العلامات بنجاح بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.cities')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
