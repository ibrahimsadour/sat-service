<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\City;
use App\Models\Section;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //show all cities
    public function show_all_cities()
    {
        $cities = City::all();
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.cities.cities_group', compact('cities','sections','articles','tags','first_articles','last_articles'));
    }
    //show one city with her all tags
    public function show_one_city($slug)
    {
        $city = City::where('slug', $slug)->first();
        $cityTags = $city->tags()->paginate(PAGINATION_COUNT);
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.cities.city', compact('city','sections','articles','tags','first_articles','last_articles','cars','cityTags'));

    }
    //show one city with his tag
    public function show_city_tag($slugTag,$slugcity){
        $city = City::where('slug',$slugcity)->first();

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

        if (!$city) {
        return redirect()->route('404.index');
        }
        return view('front.pages.cities.city-with-tag', compact('city','slugTag','sections','articles','tags','first_articles','last_articles','cars'));


    }
}
