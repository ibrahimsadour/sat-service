<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\City;
use App\Models\Section;
use App\Models\Service;
use App\Models\Tag;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{

    public function sitemap_index(){

        return Sitemap::create(env('APP_URL'))  
            ->add(Url::create('/about'))
            ->add(Url::create('/privacy-policy'))
            ->add(Url::create('/terms-condition'))
            ->add(Url::create('/contact-us'))
            ->add(Url::create('/tags'))
            ->add(Url::create('/cities'))
            ->add(Url::create('/cars'))
            ->add(Url::create('/articles'))
            ->writeToFile('sitemap_index.xml');
    }

    public function sitemap_article(){
        $articles = Article::Active()->get();
        $sitemap = Sitemap::create();
        foreach ($articles as $article) {
            $sitemap ->add(Url::create($article->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_articles.xml'));
    }
    public function sitemap_cities(){
        $cities = City::Active()->get();
        $sitemap = Sitemap::create();
        foreach ($cities as $city) {
            $sitemap ->add(Url::create('cities/'.$city->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_cities.xml'));
    }
    public function sitemap_city_tags(){
        $cities = City::with('tags')->get();

        $sitemap = Sitemap::create();
        foreach ($cities as $city) {
            foreach($city->tags as $tag){
                $sitemap ->add(Url::create('cities/'.$tag->slug.'/'.$city->slug));
            }

        }
        return  $sitemap->writeToFile(public_path('sitemap_city_tags.xml'));
    }
    public function sitemap_tags(){
        $tags = Tag::Active()->get();
        $sitemap = Sitemap::create();
        foreach ($tags as $tag) {
            $sitemap ->add(Url::create('tags/'.$tag->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_tags.xml'));
    }
    public function sitemap_cars(){
        $cars = Car::Active()->get();
        $sitemap = Sitemap::create();
        foreach ($cars as $car) {
            $sitemap ->add(Url::create('cars/'.$car->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_cars.xml'));
    }
    public function sitemap_car_tags(){
        $cars = Car::with('tags')->get();

        $sitemap = Sitemap::create();
        foreach ($cars as $car) {
            foreach($car->tags as $tag){
                $sitemap ->add(Url::create('cars/'.$tag->slug.'/'.$car->slug));
            }
        }
        return  $sitemap->writeToFile(public_path('sitemap_car_tags.xml'));
    }
    public function sitemap_services(){
        $services = Service::all();
        $sitemap = Sitemap::create();
        foreach ($services as $service) {
            $sitemap ->add(Url::create('services/'.$service->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_services.xml'));
    }
    public function sitemap_sections(){
        $sections = Section::all();
        $sitemap = Sitemap::create();
        foreach ($sections as $section) {
            $sitemap ->add(Url::create('sections/'.$section->slug));
        }
        return  $sitemap->writeToFile(public_path('sitemap_sections.xml'));
    }



}
