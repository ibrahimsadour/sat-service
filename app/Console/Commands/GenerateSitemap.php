<?php

namespace App\Console\Commands;

use App\Models\Car;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // modify this to your own needs
        SitemapGenerator::create(config('app.url'))->getSitemap()
        ->add(Url::create('/about'))
        ->add(Url::create('/privacy-policy'))
        ->add(Url::create('/terms-condition'))
        ->add(Url::create('/contact-us'))
        ->add(Url::create('/404'))
        ->add(Url::create('/tags'))
        ->add(Url::create('/cities'))
        ->add(Url::create('/cars'))
        ->add(Url::create('/articles'))
        ->writeToFile(public_path('sitemap_index.xml'));

    }
}

// code to crate new sitemap for all cars with her tags 

// $cars = Car::with('tags')->get();
// $sitemap =  SitemapGenerator::create(env('APP_URL'))->getSitemap();
// foreach ($cars as $car) {
//     foreach($car->tags as $tag){
//         $sitemap->add(Url::create('cars/'.$tag->slug.'/'.$car->slug))->writeToFile(public_path('sitemap_car_tags.xml'));
        
//     }
    
// }
 