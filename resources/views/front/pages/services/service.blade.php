@extends('front.layouts.master')
@if(isset($service))
    @section('title',$service -> name)
    @section('seo_keyword',$service ->seo_keyword)
    @section('seo_description',$service ->seo_description)
    @section('seo_url', URL::route('tag.index',$service -> slug) )
@endif

@section('content')

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index') }}" title="الرئيسية"><span class="tie-icon-home"></span> الرئيسية</a><em class="delimiter">/</em>
                <a>{{$service -> name}}</a><em class="delimiter"></em>
            </nav>
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    {{--title of the article--}}
                    <header class="entry-header-outer">
                        <div class="entry-header">
                            {{--Catogry of the article--}}
                            <h1 class="post-title entry-title">{{$service -> name}}</h1>
                            <div class="entry-content entry clearfix">
                                <p>{{$service -> description}} </p>
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
