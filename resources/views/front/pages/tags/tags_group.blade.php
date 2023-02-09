@extends('front.layouts.master')
@section('title','جميع العلامات الدلالية')
@section('seo_url', URL::route('tags.index'))
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            <nav id="breadcrumb">
                <a href="{{ URL::route('site.index')}}" title="الرئيسية"><span class="tie-icon-home"></span>الرئيسية</a><em class="delimiter">/</em>
                <span>سحابة الوسوم</span><em class="delimiter"></em>
            </nav>
            <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                <div class="widget-title the-global-title">
                    <div class="the-subtitle">سحابة الوسوم<span class="widget-title-icon tie-icon"></span></div>
                </div>
                <div class="tagcloud">
                    @isset($show_all_tags)
                        @foreach($show_all_tags as $tag)
                            <a href="{{ URL::route('tag.index',$tag -> slug) }}" title="{{$tag -> name}}" >{{ Str::limit($tag -> name, 45) }}</a>
                        @endforeach
                        <div>{{$show_all_tags->links()}}</div>
                    @endisset
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
