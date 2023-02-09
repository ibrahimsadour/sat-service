@extends('front.layouts.master')
@section('title','جميع  السيارات')
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('cars.index'))
@section('content')
{{-- Begin section --}}
<div id="tie-s_1441" class="mag-box big-posts-box has-custom-color" data-current="1">
    <div class="container">
        <div class="mag-box-title the-global-title section-name">
            <h3>كل السيارات</h3>
        </div>
        <div class="mag-box-container clearfix">
            <ul class="posts-items posts-list-container">
                @isset($cars)
                    @foreach($cars as $car)
                        <li class="post-item post-1892 post type-post status-publish format-standard has-post-thumbnail category-64 tag-94 tie-standard section-items">
                    <a href="{{url('cars/'.$car -> slug)}}" title="{{ $car -> name}}" class="post-thumb"><img src="{{ $car -> photo}}"  alt="{{ $car -> name}}" title="{{ $car -> name}}" height="300" width="300" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow"
                            alt="{{ $car -> name}}" decoding="async" loading="lazy"/>
                    </a>
                    <div class="post-details">
                        <h5 class="post-title section-title"><a href="{{url('cars/'.$car -> slug)}}" title="{{ $car -> name}}">{{ Str::limit($car ->name, 12) }}</a></h5>
                    </div>
                </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
@endsection
