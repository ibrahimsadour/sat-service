<?php

namespace App\Http\Controllers\Relation;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;

use Illuminate\Http\Request;

class RelationsController extends Controller
{
//    show the article page and all tags of the one article
    public function show_tags_article($articled){
//        $tags = Tag::with(['articles'=>function($q){
//        $q->select('id','name','slug');
//        }])->find($articled);
        $article = Article::with('tags')->find($articled);
//        return $article->tags()
        return view('admin.articles.show', compact('article'));

    }
//    public function show_tags_article(){
//
//        $article = Article::with(['tags'=>function($q){
//            $q->select('id','name','slug');
//        }])->find(1);
//
//    }
}
