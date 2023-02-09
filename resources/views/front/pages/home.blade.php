@extends('front.layouts.master')
@section('content')
    @include('front.pages.sections.sections_group')

    @include('front.pages.articles.featured-articles')

    {{-- End First section --}}

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                    @include('front.pages.articles.middle-articles')
                    </div>
                    @include('front.includes.first-main-sidebar')
                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}

    {{-- Begin last section --}}
    <div id="tiepost-131-section-2915" class="section-wrapper container normal-width">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                    @include('front.pages.articles.first-last-articles')
                    @include('front.pages.articles.new-articles')
                    </div>
                    @include('front.includes.second-main-sidebar')
                </div>
            </div>
        </div>
    </div>
    {{-- End last section --}}
@endsection
