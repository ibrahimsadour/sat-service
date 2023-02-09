<?php

namespace App\Http\Controllers\Admin;
use App\Models\Car;
use App\Http\Requests\CarsRequest;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CarsController extends Controller
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
    public function index()

    {
        // selection() deze methode is gemaakt in de Models
        $cars = Car::with('tags')->paginate(10);
        // return $cars;
        return view('admin.cars.index', compact('cars'));
    }
    //open Form to add new car
    public function create()

    {
        return view('admin.cars.create');
    }

    //add new car
    public function store(CarsRequest $request)

    {
        Db::beginTransaction();
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
            $car = new Car;
            $car->name = $request->input('name');
            $car->slug = Str::slug($request->input('slug'),'-', null);
            $car->active = $request->input('active');
            if($request->hasfile('photo'))
            {
                $file = $request->file('photo');
                $filename=  'images/cars/'.$file->getClientOriginalName();
                $final_filename = preg_replace('#[ -]+#', '-', $filename);
                $file->move('assets/images/cars/', $final_filename);
                $car->photo = $final_filename;
            }
            $car->save();
            DB::commit();
            return redirect()->route('admin.cars')->with(['success' => 'تمت الاضافة بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }

    public function edit($id)
    {
        try {
            $car = Car::select()->find($id);
            if (!$car) {
                return redirect()->route('admin.cars')->with(['error' => 'هذه الماركة غير موجودة ']);
            }

            return view('admin.cars.edit', compact('car'));

        } catch (\Exception $ex) {
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function update($id, CarsRequest $request)
    {
            //validation => CarsRequest

        try {

            //find Car and check of the exists or not
            $car = Car::find($id);
            if (!$car) {
                return redirect()->route('admin.cars.edit', $id)->with(['error' => 'هذه السيارة غير موجودة']);
            }

            // check of the status active or not
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            $car->name = $request->input('name');
            $car->slug = Str::slug($request->input('slug'),'-', null);
            $car->active = $request->input('active');

            // check if the user uplode new image than delete the old image
            if($request->hasfile('photo'))
            {
                $image = Str::after($car->photo, 'assets/');
                $image = public_path('assets/' . $image);

                if(File::exists($image))
                {
                    File::delete($image); //delete from folder
                }
                $file = $request->file('photo');
                $filename =  'images/cars/'.$file->getClientOriginalName();
                $file->move('assets/images/cars/', $filename);
                $car->photo = $filename;
            }

            $car->update();
            \Illuminate\Support\Facades\DB::commit();
            return redirect()->route('admin.cars')->with(['success' => 'تمت التعديل بنجاح']);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function destroy($id)
    {

        try {
            $car = Car::find($id);
            if (!$car)
                return redirect()->route('admin.cars')->with(['error' => 'هذه الماركة غير موجود ']);


            ## Delet image
            ##Srt is cutting helper method
            $image = Str::after($car->photo, 'assets/');
            $image = public_path('assets/' . $image);
            unlink($image); //delete from folder


            #delet section
            $car->delete();

            return redirect()->route('admin.cars')->with(['success' => 'تم حذف الماركة بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
    public function changeStatus($id)
    {
        try {
            $car = Car::find($id);
            if (!$car)
                return redirect()->route('admin.cars')->with(['error' => 'هذه الماركة غير موجود ']);

            $status =  $car -> active  == 0 ? 1 : 0;

            $car -> update(['active' =>$status ]);

            return redirect()->route('admin.cars')->with(['success' => ' تم تغيير الحالة بنجاح ']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    
    //insert_all_tags_to_one_car
    public function insert_all_tags_to_one_car(Request $request){
       
        $validator = $this->validate($request, [
            'id' => 'required|exists:cars,id'
            ],
            [
                'id.required' => 'هذا الحقل مطلوب',
                'id.exists' => 'رقم السيارة غير موجود في قاعدة البيانات'
            ]
        );
        if($validator) {
            $tags = Tag:: get('id');
            foreach($tags as $tag){
                $tag->cars()->attach($request->id);
            }
            return redirect()->route('admin.cars')->with(['success' => ' تم الاضافة بنجاح ']);
        }
      
    }
    public function delete_all_tags_of_one_car($id)
    {

        try {
            $cars =Car::find($id); 
            $cars->tags()->detach();
            return redirect()->route('admin.cars')->with(['success' => 'تم حذف جميع العلامات بنجاح بنجاح']);

        } catch (\Exception $ex) {
            // return $ex;
            return redirect()->route('admin.cars')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
        
}