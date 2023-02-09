@extends('front.layouts.master')
@if(isset($city))
    @section('title','خدمات فني ستلايت و الاشتراك بقنوات بي ان سبورت  في مدينة  '.$city ->name)
    @section('seo_keyword','فني ستلايت '.$city ->name.','.' رقم فني ستلايت '.$city ->name.','.' بي ان سبورت '.$city ->name.','.' محلات ستلايت '.$city ->name)
    @section('seo_description','فني ستلايت في مدينة '.$city ->name.' - '.' رقم فني ستلايت في مدينة '.$city ->name.' فني ستلايت هندي'.' - '.'اشتراكات اي بي تي في  بمدينة '.$city ->name.' - '.'الاشتراك بقنوات بي ان سبورت')
    @section('seo_url', URL::route('city.index',$city ->slug) )
@endif
@section('content')

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index') }}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                <a href="{{ URL::route('cities.index')}}" title="جميع المدن">جميع المدن</a><em class="delimiter">/</em>
                <span title="{{$city -> name}}" >{{$city -> name}}</span><em class="delimiter"></em>
            </nav>
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    {{--title of the article--}}
                    <header class="entry-header-outer">
                        <div class="entry-header">
                            {{--Catogry of the article--}}
                            <h2 class="post-title entry-title">جميع خدمات فني الستلايت الخاصة بمدينة  {{$city -> name}}</h2>
                            <div class="">
                                <p>{{$city -> description}} </p>
                                <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                                    <div class="tagcloud">
                                        @isset($cityTags)
                                            @foreach($cityTags as $tag)
                                                <a href="{{url('cities/'.$tag ->slug.'/'.$city -> slug) }}" title="{{$tag -> name}} في {{$city -> name}}" >{{ Str::limit($tag -> name, 45)}} في {{$city -> name}}</a>
                                            @endforeach
                                            <div>{{$cityTags->links()}}</div>
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
