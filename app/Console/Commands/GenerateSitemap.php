<?php

namespace App\Console\Commands;

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
        ->add(Url::create('/articles'))
        ->writeToFile(public_path('sitemap_index.xml'));

    }
}
