@extends('front.layouts.master')
@section('title','صفحة غير موجودة')
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('content')
<div id="content" class="site-content container">
    <div id="main-content-row" class="tie-row main-content-row">
        <div class="main-content tie-col-md-12" role="main">
            <div class="container-404">
                <h2>404 :(</h2>
                <h3>المعذرة، هذه الصفحة غير موجودة.</h3>
                <h4>يبدوا أننا لم ’ نستطع أن نجد ما ’ تبحث عنه. من الممكن أن يساعدك البحث.</h4>
                <div id="content-404">
                    <form role="search" method="get" class="search-form" action="./">
                        <label> <span class="screen-reader-text">البحث عن:</span> <input type="search" class="search-field" placeholder="بحث …" name="s" /> </label> <input type="submit" class="search-submit" value="بحث" />
                    </form>
                </div>
                <div id="menu-404">
                    <ul id="menu-404" class="menu">
                        <li id="menu-item-2613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2613"><a href="{{ URL::route('site.index')}}" title="الرئيسية">الرئيسية</a></li>
                        <li id="menu-item-2613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2613"><a href="{{ URL::route('about.index')}}" title="من نحن">من نحن</a></li>
                        <li id="menu-item-2610" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2610"><a href="{{ URL::route('privacy-policy.index')}}" title="سياسة الخصوصية">سياسة الخصوصية</a></li>
                        <li id="menu-item-2611" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2611"><a href="{{ URL::route('contact-us.index')}}" title="إتصل بنا">إتصل بنا</a></li>
                        <li id="menu-item-2612" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2612"><a href="{{ URL::route('site.index')}}"  title="خارطة الموقع">خارطة الموقع</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
