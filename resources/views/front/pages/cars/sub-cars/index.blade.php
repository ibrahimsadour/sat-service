@extends('front.layouts.master')
@if(isset($subCar))
    @section('title',$subCar ->name)
@section('seo_keyword',$subCar ->seo_keyword)
@section('seo_description',$subCar ->seo_description)
@section('seo_url', URL::route('car.index',$subCar ->slug) )
@endif
@section('content')

    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index') }}" title="الرئيسية">الرئيسية</a><em class="delimiter">/</em>
                <a href="{{ URL::route('cars.index')}}" title="جميع السيارات">جميع السيارات</a><em class="delimiter">/</em>
                <a href="{{url('cars/'.$car -> slug)}}" title="{{$car -> name}}">{{$car ->name}}</a><em class="delimiter">/</em>
                <span title="{{$subCar -> name}}">{{$subCar ->name}}</span><em class="delimiter"></em>
            </nav>
    
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    {{--title of the article--}}
                    <header class="entry-header-outer">
                        <div class="entry-header">
                            {{--Catogry of the article--}}
                            <h1 class="post-title entry-title">جميع الخدمات الخاصة بسيارة {{$car ->name}} {{$subCar -> name}}</h1>
                            <div class="">
                                <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                                    <div class="tagcloud">
                                        @isset($TagssubCars)
                                            @foreach($TagssubCars as $TagssubCar)
                                                <a href="{{route('subcar.tag.index',['slugSubcar' => $subCar->slug, 'slugcar' => $car -> slug, 'slugSubcarTag' => $TagssubCar -> slug])}}" title="{{$TagssubCar ->name}} {{$car -> name}} {{$subCar ->name}}" >{{$TagssubCar ->name}} {{$car ->name}} {{$subCar ->name}}</a>
                                            @endforeach
                                            <div>{{$TagssubCars->links()}}</div>
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