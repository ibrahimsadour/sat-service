<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCarRequest;
use App\Models\Car;
use App\Models\SubCar;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class SubCarController extends Controller
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

    //show all cars
    public function index($id)

    {
        // selection() deze methode is gemaakt in de Models
        $sub_cars = SubCar::with('car')->where('car_id',$id)->get();
        $car = Car::find($id);
        // return $sub_cars;
        return view('admin.sub_cars.index', compact('sub_cars','car'));
    }

    //open Form to add new car
    public function create($id)

    {
        $car = Car::find($id);
        // return $car;
        return view('admin.sub_cars.create',compact('car'));
    }

    //add new sub-car
    public function store(SubCarRequest $request)
    {

        // return $request;

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
            $sub_car = new SubCar;
            $sub_car->name = $request->input('name');
            $sub_car->slug = Str::slug($request->input('slug'),'-', null);
            $sub_car->active = $request->input('active');
            $sub_car->car_id = $request->input('car_id');
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $filename=  'images/cars/'.$request->car_id.'/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/cars/'.$request->car_id.'/', $final_filename);
                $sub_car->photo = $final_filename;
            }
            $sub_car->save();
            DB::commit();
            return redirect()->route('admin.sub-cars',$request->car_id)->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.sub-cars',$request->car_id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    
    public function edit($id)
    {
        try {
            $sub_car = SubCar::find($id);
            // return $sub_car;
            if (!$sub_car) {
                return redirect()->route('admin.sub-cars',$sub_car->car_id)->with(['error' => 'هذا الموديل غير موجود ']);
            }
            // return $sub_car;
            return view('admin.sub_cars.edit', compact('sub_car'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.sub-cars',$sub_car->car_id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id,SubCarRequest $request)
    {
            //validation => SubCarRequest

        // try {

            //find Car and check of the exists or not
            $sub_car = SubCar::find($id);
            if (!$sub_car) {
                return redirect()->route('admin.sub-cars.edit', $sub_car ->car_id)->with(['error' => 'هذه السيارة غير موجودة']);
            }

            // check of the status active or not
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $sub_car->name = $request->input('name');
            $sub_car->slug = Str::slug($request->input('slug'),'-', null);
            $sub_car->active = $request->input('active');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($sub_car->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename=  'images/cars/'.$sub_car->car_id.'/'.$file->getClientOriginalName();
                $file->move('assets/images/cars/'.$sub_car->car_id.'/',  $filename);
                $sub_car->photo = $filename;
            }

            $sub_car->update();
            \Illuminate\Support\Facades\DB::commit();
            return redirect()->route('admin.sub-cars',$sub_car ->car_id)->with(['success' => 'تمت التعديل بنجاح']);
        }
        // catch(Exception $e){
        //     DB::rollback();
        //     return redirect()->route('admin.sub-cars',$sub_car ->car_id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        // }

    public function destroy($id)
    {

        try {
            $sub_car = SubCar::find($id);
            if (!$sub_car)
                return redirect()->route('admin.sub-cars',$sub_car->car_id)->with(['error' => 'هذا الموديل غير موجود ']);

            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($sub_car->photo, 'assets/');

            $image = public_path('assets/' . $image);

            unlink($image); //delete from folder


            #delet section
            $sub_car->delete();

            return redirect()->route('admin.sub-cars',$sub_car->car_id)->with(['success' => 'تم حذف الماركة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.sub-cars',$sub_car->car_id)->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function insert_all_tags_to_sub_car_collection(Request $request)
    {
    $sub_cars_id = SubCar::select('id')->where('car_id',$request->car_id)->get();
        $tags = Tag:: get('id');
        // return $tags;

        foreach($tags as $tag){
            $tag->sub_cars()->attach($sub_cars_id);
        }
        return redirect()->route('admin.sub-cars',$request->car_id)->with(['success' => ' تم الاضافة بنجاح ']);
    }
    public function delete_all_tags_of_one_sub_car($id)
    {

        try {
            $sub_cars = SubCar::find($id);
            $sub_cars->tags()->detach();
            return Redirect::back()->with(['success' => 'تم حذف جميع العلامات بنجاح بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return Redirect::back()->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    
}
