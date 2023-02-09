@extends('front.layouts.master')
@if(isset($car))
    @section('title',$car ->name)
@section('seo_keyword',$car ->seo_keyword)
@section('seo_description',$car ->seo_description)
@section('seo_url', URL::route('car.index',$car ->slug) )
@endif
@section('content')

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index') }}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                <a href="{{ URL::route('cars.index')}}" title="جميع السيارات">جميع السيارات</a><em class="delimiter">/</em>
                <span title="{{$car -> name}}">{{$car ->name}}</span><em class="delimiter"></em>
            </nav>
    
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    {{--title of the article--}}
                    <header class="entry-header-outer">
                        <div class="entry-header">
                            {{--Catogry of the article--}}
                            <h1 class="post-title entry-title">جميع الخدمات الخاصة بسيارة {{$car ->name}}</h1>
                            <div id="tie-s_1441" class="mag-box big-posts-box has-custom-color" data-current="1">
                                <div class="container">
                                    <div class="mag-box-container clearfix">
                                        <ul class="posts-items posts-list-container">
                                            @isset($subCars)
                                                @foreach($subCars as $subCar) 
                                                    <li class="post-item post-1892 post type-post status-publish format-standard has-post-thumbnail category-64 tag-94 tie-standard section-items">
                                                <a href="{{route('subcar.index',['slugSubcar' => $subCar->slug, 'slugcar' => $car -> slug])}}" title="{{$car ->name}} {{ $subCar -> name}}" class="post-thumb"><img src="{{ $subCar -> photo}}"  alt="{{$car ->name}} {{ $subCar -> name}}" title="{{$car ->name}} {{ $subCar -> name}}" height="300" width="300" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow"
                                                        alt="{{$car ->name}} {{ $subCar -> name}}" decoding="async" loading="lazy"/>
                                                </a>
                                                <div class="post-details">
                                                    <h5 class="post-title section-title"><a href="{{route('subcar.index',['slugSubcar' => $subCar->slug, 'slugcar' => $car -> slug])}}" title="{{$car ->name}} {{ $subCar -> name}}">{{$car ->name}} {{ Str::limit($subCar ->name, 12) }}</a></h5>
                                                </div>
                                            </li>
                                                @endforeach
                                            @endisset
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p>{{$car -> description}} </p>
                                <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                                    <div class="tagcloud">
                                        @isset($carTags)
                                            @foreach($carTags as $tag)
                                                <a href="{{url('cars/'.$tag ->slug.'/'.$car -> slug) }}" title="{{$tag -> name}} {{$car -> name}}" >{{ Str::limit($tag -> name, 45)}} {{$car -> name}}</a>
                                                @endforeach
                                                <div>{{$carTags->links()}}</div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    {{--Content of the article--}}
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection