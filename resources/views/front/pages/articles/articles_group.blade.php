@extends('front.layouts.master')
@section('title',"جميع الخدمات")
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            <div class="mag-box-title the-global-title">
                <h3>جميع الخدمات</h3>
            </div>
                <ul class="posts-items posts-list-container">
                    <li style="display: none"></li>
                    @isset($articles)
                        @foreach($articles as $article)
                            <li class="post-item tie-standard">
                                <a  href="{{URL::route('article.index',$article -> slug)}}" title="{{$article ->name}}" class="post-thumb">
                                    <img style="width:100%; height:100%"  src="{{$article ->photo}}" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow" alt="{{$article ->name}}" title="{{$article ->name}}" decoding="async" loading="lazy"  /></a>
                                <div class="clearfix"></div>
                                <div class="post-overlay">
                                    <div class="post-content">
                                        <div class="post-meta clearfix">
                                            <span class="post-cat tie-cat-75">{{$article ->section-> name}}</span>

                                            <span class="date meta-item tie-icon" style="float: left;">{{$article -> created_at->diffForHumans()}}</span>
                                        </div>
                                        <h2 class="post-title"><a href="{{ URL::route('article.index',$article -> slug) }}" title="{{$article ->name}}">{{ Str::limit($article -> name, 45) }}</a></h2>
        {{--                                <div class="post-meta" style="    margin-top: 15px;">--}}
        {{--                                    <span style=" background-color: #0c3;" class="button subscribe-submit"><a style="color:#eee; " target="_blank" href="tel:+1123-456-7890" >اتصل الان</a></span>--}}
        {{--                                    <div class="tie-alignright">--}}
        {{--                                        <span class="button"><a style="color:#eee; " target="_blank" href="tel:+1123-456-7890" >واتس أب</a></span>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
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
