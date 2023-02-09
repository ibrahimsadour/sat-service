<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesController extends Controller
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
        $services = Service::paginate(10);

        return view('admin.services.index', compact('services'));

    }
    //open Form to add new Service
    public function create()

    {
        return view('admin.services.create');
    }

    //add new car
    public function store(ServicesRequest $request)

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
            $service = new Service;
            $service->name = $request->input('name');
            $service->slug = Str::slug($request->input('slug'),'-', null);
            $service->description =  $request->input('description');
            $service->seo_title =  $request->input('seo_title');
            $service->seo_keyword =  $request->input('seo_keyword');
            $service->seo_description =  $request->input('seo_description');
            $service->active = $request->input('active');
            $service->save();
            DB::commit();
            return redirect()->route('admin.services')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)

    {
        try {
            $service = Service::select()->find($id);
            if (!$service) {
                return redirect()->route('admin.services')->with(['error' => 'هذه المدينة غير موجودة ']);
            }

            return view('admin.services.edit', compact('service'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, ServicesRequest $request)
    {
        //validation => CarsRequest

        try {
            //find Service
            $service = Service::find($id);
            if (!$service) {
                return redirect()->route('admin.services.edit', $id)->with(['error' => 'هذه المدينة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            Service::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'slug' =>Str::slug($request->input('slug'),'-', null),
                    'description' => $request->description,
                    'seo_title' => $request->seo_title,
                    'seo_keyword' => $request->seo_keyword,
                    'seo_description' => $request->seo_description,
                    'active' => $request->active,
                ]);
            // save image

            return redirect()->route('admin.services')->with(['success' => 'تمت تحديث المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {

        try {
            $service = Service::find($id);
            if (!$service)
                return redirect()->route('admin.services')->with(['error' => 'هذه المدينة غير موجود ']);


            #delet section
            $service->delete();

            return redirect()->route('admin.services')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $service = Service::find($id);
            if (!$service)
                return redirect()->route('admin.services')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $service -> active  == 0 ? 1 : 0;

            $service -> update(['active' =>$status ]);

            return redirect()->route('admin.services')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
