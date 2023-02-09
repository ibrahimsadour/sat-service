<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\City;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    //show all cities
    public function show_all_cars()
    {
        $cars = Car::select()->Active()->get();
        //get all section from Data base
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.cars.cars_group', compact('cars','sections','articles','tags','first_articles','last_articles'));
    }
    //show one cars with all her tags
    public function show_one_car($slug)
    {

        $car = Car::where('slug', $slug)->first();
        $subCars = $car->sub_cars()->Active()->get();
        $carTags = $car->tags()->Active()->paginate(PAGINATION_COUNT);
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();

        // return $subCar;
        return view('front.pages.cars.car', compact('car','sections','articles','tags','first_articles','last_articles','cars','carTags','subCars'));

    }
    //show one car with her tag
    public function show_car_tag($slugTag,$slugcar){
        $car = Car::where('slug',$slugcar)->first();

        // Replace hyphen (-) with space( )
        $arr = explode("-",$slugTag);
        $slugTag = implode(" ",$arr);

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        if (!$car) {
        return redirect()->route('404.index');
        }
        return view('front.pages.cars.car-with-tag', compact('car','slugTag','sections','articles','tags','first_articles','last_articles','cars'));


    }

}
