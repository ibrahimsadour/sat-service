<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoogleRequest;
use App\Models\Google;
use Illuminate\Http\Request;

class GoolgeController extends Controller
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
        $codes = Google::all();

        return view('admin.google.index', compact('codes'));

    }
    //open Form to add new city
    public function create()

    {
        return view('admin.google.create');
    }
    //add new car
    public function store(GoogleRequest $request)

    {
        DB::beginTransaction();
        if (!$request->has('active'))
            $request->request->add(['active' => 0]);
        else
            $request->request->add(['active' => 1]);

        try{
            $code = new Google;
            $code->title =  $request->input('title');
            $code->code =  $request->input('code');
            $code->place =  $request->input('place');
            $code->active =  $request->input('active');
            $code->save();
            DB::commit();
            return redirect()->route('admin.google')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }
    public function edit($id)

    {
        try {
            $code = Google::select()->find($id);
            if (!$code) {
                return redirect()->route('admin.google')->with(['error' => 'هذه المدينة غير موجودة ']);
            }

            return view('admin.google.edit', compact('code'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, GoogleRequest $request)
    {
        //validation => CarsRequest

        try {
            //find Car
            $code = Google::find($id);
            if (!$code) {
                return redirect()->route('admin.google.edit', $id)->with(['error' => 'هذه المدينة غير موجودة']);
            }

            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            Google::where('id', $id)
                ->update([
                    'title' => $request->title,
                    'code' => $request->code,
                    'place' => $request->place,
                    'active' => $request->active,
                ]);
            // save image

            return redirect()->route('admin.google')->with(['success' => 'تمت تحديث المدينة بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }


    public function destroy($id)
    {

        try {
            $code = Google::find($id);
            if (!$code)
                return redirect()->route('admin.google')->with(['error' => 'هذه المدينة غير موجود ']);


            #delet section
            $code->delete();

            return redirect()->route('admin.google')->with(['success' => 'تم حذف المدينة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $code = Google::find($id);
            if (!$code)
                return redirect()->route('admin.google')->with(['error' => 'هذه المدينة غير موجود ']);

            $status =  $code -> active  == 0 ? 1 : 0;

            $code -> update(['active' =>$status ]);

            return redirect()->route('admin.google')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.google')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    
}
