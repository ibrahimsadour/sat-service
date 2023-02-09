@extends('front.layouts.master')
@section('title',"جميع المدن")
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('cities.index') )
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            <div class="mag-box-title the-global-title">
                <h3>جميع المدن</h3>
            </div>
            <ul class="posts-items posts-list-container">
                <li style="display: none"></li>
                @isset($cities)
                    @foreach($cities as $city)
                        <li class="post-item tie-standard">
                            <div class="post-overlay">
                                <div class="post-content">
                                    <h2 class="post-title"><a href="{{url('cities/'.$city -> slug)}}" title="{{ $city -> name}}">{{ Str::limit($city ->name, 40) }}</a></h2>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
