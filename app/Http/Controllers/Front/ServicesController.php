<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\Section;
use App\Models\Service;
use App\Models\Tag;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //show all services
    public function show_all_services()
    {
        $services = Service::Active()->get();

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.services.services_group', compact('services','sections','articles','tags','first_articles','last_articles','cars'));
    }

    //show one service
    public function show_one_service($slug)
    {
        $service = Service::where('slug', $slug)->first();

        if (!$service) {
            return redirect()->route('404.index');
        }
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.services.service', compact('service','sections','articles','tags','first_articles','last_articles','cars'));

    }
}
