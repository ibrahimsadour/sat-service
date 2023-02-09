@extends('front.layouts.master')
@if(isset($privacy_policy_page))
    @section('title',$privacy_policy_page -> name)
    @section('seo_keyword',$privacy_policy_page ->seo_keyword)
    @section('seo_description',$privacy_policy_page ->seo_description)
    @section('seo_image',$privacy_policy_page->photo)
@endif

@section('seo_url', URL::route('privacy-policy.index') )
@section('content')
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        {{-- check if the page exists --}}
                        @if(isset($privacy_policy_page))
                            {{-- check if the page active --}}
                            @if($privacy_policy_page ->active != 0)
                                {{--title of the article--}}
                                <header class="entry-header-outer">
                                    <div class="entry-header">
                                        <h1 class="post-title entry-title">{{$privacy_policy_page ->name}}</h1>
                                    </div>
                                </header>
                                {{--Imgage of the article--}}
                                <div class="featured-area">
                                    <div class="featured-area-inner">
                                        <figure class="single-featured-image">
                                            <img
                                                width="780"
                                                height="470"
                                                src="{{$privacy_policy_page ->photo}}"
                                                class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                                alt="{{$privacy_policy_page ->name}}"
                                                title="{{$privacy_policy_page ->name}}"
                                                decoding="async"
                                                data-main-img="1"
                                                loading="lazy"
                                            />
                                        </figure>
                                    </div>
                                </div>
                                {{--Content of the article--}}
                                <div class="entry-content entry clearfix">
                                    <p>{!! $privacy_policy_page ->description!!}</p>
                                </div>
                            @else
                                {{--Imgage of the article--}}
                                <div class="featured-area">
                                    <div class="featured-area-inner">
                                        <figure class="single-featured-image">
                                            <img
                                                width="780"
                                                height="470"
                                                src="{{asset('assets/images/pages/page-is-not-added.webp')}}"
                                                class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                                alt="page-is-not-added"
                                                title="page-is-not-added"
                                                decoding="async"
                                                data-main-img="1"
                                                loading="lazy"
                                            />
                                        </figure>
                                    </div>
                                </div>
                            @endif
                        @else
                            {{--Imgage of the article--}}
                            <div class="featured-area">
                                <div class="featured-area-inner">
                                    <figure class="single-featured-image">
                                        <img
                                            width="780"
                                            height="470"
                                            src="{{asset('assets/images/pages/page-is-not-added.webp')}}"
                                            class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                            alt="page-is-not-added"
                                            title="page-is-not-added"
                                            decoding="async"
                                            data-main-img="1"
                                            loading="lazy"
                                        />
                                    </figure>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{-- Main side menu  --}}
                    @include('front.includes.first-main-sidebar')

                    @include('front.includes.second-main-sidebar')

                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
