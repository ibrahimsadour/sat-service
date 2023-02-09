<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\SubCar;
use Illuminate\Http\Request;

class SubCarController extends Controller
{
    //show one sub cars with all her tags
    public function show_one_subcar($slugcar,$slugSubcar)
    {
        $subCar = SubCar::where('slug', $slugSubcar)->first();
        $TagssubCars =$subCar->tags()->Active()->paginate(15);
        $car = Car::where('id', $subCar->car_id)->first();

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.cars.sub-cars.index', compact('car','sections','articles','tags','first_articles','last_articles','cars','subCar','TagssubCars'));

    }
    //show one subcar with her tag in article
    public function show_subcar_with_one_tag($slugcar,$slugSubcar,$slugSubcarTag){
        $car = Car::where('slug',$slugcar)->first();
        $subCar = SubCar::where('slug', $slugSubcar)->first();

        // Replace hyphen (-) with space( )
        $arr = explode("-",$slugSubcarTag);
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
        return view('front.pages.cars.sub-cars.subcar-with-tag', compact('car','slugTag','sections','articles','tags','first_articles','last_articles','cars','subCar'));
    }
}
