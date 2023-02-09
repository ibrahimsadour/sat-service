<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Section;
use App\Models\Tag;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    //show all articles
    public function show_all_sections()
    {
        $sections = Section::all();
        return view('front.pages.sections.sections_group', compact('sections'    ));
    }

    //show one article
    public function show_one_section($slug)
    {
        // $section = Section::with('articles')->where('slug', $slug)->first();
        $section = Section::where('slug', $slug)->first();
        $sectionTags = $section->tags()->paginate(15);
        // return $sectionTags;
    //    return $section->articles->;

        if (!$section) {
            return redirect()->route('404.index');
        }

        // Group query to show some items
        $sections = selectActiveSctions();
        $articles = select5ActiveArticles();
        $first_articles = selectFirst_Articles();
        $last_articles = selectLast_Articles();
        $tags = select10ActiveTags();

        return view('front.pages.sections.section', compact('section','articles','tags','sections','sectionTags'));
    }
}
