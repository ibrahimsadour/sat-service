<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    //show all articles
    public function show_all_articles()
    {
        $articles = Article::select()->Active()->get();
        return view('front.pages.articles.articles_group', compact('articles'    ));
    }

    //show one article
    public function show_one_article($slug)
    {
        $article = Article::with(
            [
                'tags' => function ($tag) {
                        $tag->limit(5);
                    }
            ]
        )->where('slug', $slug)->first();

        if (!$article) {
            return redirect()->route('404.index');
        }
       $articles = Article::Active()->inRandomOrder()->limit(5)->get();
       $tags = Tag::Active()->inRandomOrder()->limit(10)->get();
       $sections = Section::select()->Active()->get();

        return view('front.pages.articles.article', compact('article','articles','tags','sections'));
    }

}
