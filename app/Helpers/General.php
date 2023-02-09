<?php
#################################################################################
// Deze bestaand is gemaakt door Ibrahim Sadour 06-10-2020
// hier wordt een bepalde methode gemaakt
// deze methode kan ik in de heel website gebruiken.
##################################################################################

use App\Models\Article;
use App\Models\Car;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Support\Facades\Config;



// deze method pakket de huidig taal
function get_default_lang(){
  return   Config::get('app.locale');
}
// deze method pakket de huidig taal
function get_default_country(){
    $default_country =  \App\Models\Pages\HomePage::select('default_country')->first();
    if(!$default_country)
        return 'default_country_is_empty';
    return $default_country = $default_country['default_country'];
  }

// deze method pakket de default_number
function get_default_phone_number(){
    $call_us =  \App\Models\Pages\HomePage::select('call_us')->first();
    if(!$call_us)
        return 'call_us_is_empty';
    return $call_us = $call_us['call_us'];
}
// deze method pakket de get_default_logo
function get_default_logo(){
    $logo =  \App\Models\Pages\HomePage::select('logo')->first();
    if(!$logo != Null) {
        return asset('assets/images/pages/default-logo.webp');
    }
    return $logo = asset('assets/'.$logo['logo']);
}
// deze method pakket de get_default_logo
function get_default_background(){
    $default_background =  \App\Models\Pages\HomePage::select('background')->first();
    if(!$default_background != Null)
        return asset('assets/images/pages/header_bg.webp');
    return $default_background = asset('assets/'.$default_background['background']);
}
// deze method pakket de get_default_logo
function get_default_ads_sidebare(){
    $ads_sidebar =  \App\Models\Pages\HomePage::select('ads_sidebar')->first();
    if(!$ads_sidebar != Null)
        return asset('assets/images/pages/default_ads_sidebare.webp');
    return $ads_sidebar = asset('assets/'.$ads_sidebar['ads_sidebar']);
}
// deze method pakket de get_default_logo
function get_default_seo_image(){
    $default_seo_image =  \App\Models\Pages\HomePage::select('default_seo_image')->first();
    if(!$default_seo_image != Null)
        return asset('assets/images/pages/default_seo_image.webp');
    return $default_seo_image = asset('assets/'.$default_seo_image['default_seo_image']);
}
// deze method pakket de default_title
function get_default_title(){
    $title =  \App\Models\Pages\HomePage::select('title')->first();
    if(!$title != Null)
        return 'title_is_empty';

    return $title = $title['title'];
}
// deze method pakket de get_default_social_link_facebook
function get_default_social_link_facebook(){
    $facebook =  \App\Models\Pages\HomePage::select('facebook_link')->first();
    if(!$facebook != Null){
        return 'facebook_social_link_is_empty';
    }
    return $facebook['facebook_link'];
}
// deze method pakket de get_default_social_link_instagram
function get_default_social_link_instagram(){
    $instagram =  \App\Models\Pages\HomePage::select('instagram_link')->first();

    if(!$instagram != Null){
        return 'instagram_social_link_is_empty';
    }
    return $instagram = $instagram['instagram_link'];
}
// deze method pakket de get_default_social_link_twitter
function get_default_social_link_twitter(){
    $twitter =  \App\Models\Pages\HomePage::select('twitter_link')->first();

    if(!$twitter != Null){
        return 'twitter_social_link_is_empty';
    }
    return $twitter = $twitter['twitter_link'];
}
// deze method pakket de default_description
function get_default_description(){
    $description =  \App\Models\Pages\HomePage::select('description')->first();
    if(!$description != Null)
        return 'description_is_empty';
    return $description = $description['description'];
}

// deze method pakket de default_seo_keyword
function get_default_seo_keyword(){
    $seo_keyword =  \App\Models\Pages\HomePage::select('seo_keyword')->first();
    if(!$seo_keyword != Null)
        return 'seo_keyword_is_empty';
    return $seo_keyword = $seo_keyword['seo_keyword'];
}


// deze method pakket de default_seo_keyword
function get_default_seo_description(){
    $seo_description =  \App\Models\Pages\HomePage::select('seo_description')->first();
    if(!$seo_description != Null)
        return 'seo_description_is_empty';
    return $seo_description = $seo_description['seo_description'];
}

// deze method gemaakt voor het insert van de images
function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}


function uploadVideo($folder, $video)
{
    $video->store('/', $folder);
    $filename = $video->hashName();
    $path = 'video/' . $folder . '/' . $filename;
    return $path;
}

function googleCodeHeader()
{
    $codes =  \App\Models\Google::where('active',1)->where('place','header')->get();
    $newline = "\n";
    foreach($codes as $code){
        if(!$code->code){
            return '';
        }else{
            echo  $code->code. $newline;
        }
    }
}
function googleCodeFooter()
{
    $codes =  \App\Models\Google::all()->where('active',1)->where('place','footer');
    $newline = "\n";
    foreach($codes as $code){
        if(!$code->code){
            return '';
        }else{
            echo  $code->code. $newline;
        }
    }
}

// function groupQury($sections,$articles,$cars,$first_articles, $last_articles,$tags)
// {
//    return  $sections = Section::select()->Active()->get();
//    return $articles = Article::with('service')->Active()->inRandomOrder()->limit(5)->get();
//    return $cars = Car::Active()->inRandomOrder()->limit(3)->get();
//    return $first_articles = Article::Active()->take(10)->get();
//    return $last_articles = Article::Active()->latest()->get();
//    return $tags = Tag::Active()->inRandomOrder()->limit(10)->get();
// }
function selectActiveSctions(){
    return Section::select()->Active()->get();
}
function select5ActiveArticles(){
    return Article::with('service')->Active()->inRandomOrder()->limit(5)->get();
}
function select3ActiveCars(){
    return Car::Active()->inRandomOrder()->limit(3)->get();
}
function selectFirst_Articles(){
    return Article::Active()->take(10)->get();
}
function selectLast_Articles(){
    return Article::Active()->latest()->get();
}
function select10ActiveTags(){
    return Tag::Active()->inRandomOrder()->limit(10)->get();
}
define('PAGINATION_COUNT',15); // PAGINATION_COUNT : een vast variabel  om alleen 10 items te laat zien om de pagina
