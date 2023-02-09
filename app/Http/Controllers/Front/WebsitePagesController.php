<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\Pages\About;
use App\Models\Pages\ContactUs;
use App\Models\Pages\HomePage;
use App\Models\Pages\PrivacyPolicy;
use App\Models\Pages\TermsCondition;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Http\Request;

class WebsitePagesController extends Controller
{

    public function show_home_page (){

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
                
        $home_page = HomePage::first();
        return view('front.pages.home', compact(['sections','articles','tags','first_articles','last_articles','home_page','cars']));
    }

    public function about_page (){
        $about = About::first();
        
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();


        return view('front.pages.about.index', compact('about','sections','articles','tags','first_articles','last_articles','cars'));
    }

    public function privacy_policy_page (){
        $privacy_policy_page = PrivacyPolicy::first();

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();

        return view('front.pages.privacy-policy.index', compact('privacy_policy_page','sections','articles','tags','first_articles','last_articles','cars'));
    }

    public function terms_condition_page (){
        $terms_condition_page = TermsCondition::first();

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();

        return view('front.pages.terms-condition.index', compact('terms_condition_page','sections','articles','tags','first_articles','last_articles','cars'));
    }
    public function contact_us_page (){
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.contact-us.index', compact('sections','articles','tags','first_articles','last_articles','cars'));
    }


    public function page_404 (){
        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $cars = select3ActiveCars();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();
        return view('front.pages.404.index', compact('sections','articles','tags','first_articles','last_articles'));
    }
    public function sitemap (){
        return view('front.pages.sitemap.index');
    }

}
