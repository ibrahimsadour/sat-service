{{-- Main side menu  --}}
<aside class="sidebar tie-col-md-4 tie-col-xs-12 normal-side is-sticky" aria-label="القائمة الجانبية الرئيسية">
    <div class="theiaStickySidebar">
        <div id="posts-list-widget-42" class="container-wrapper widget posts-list">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">الأكثر مشاهدة<span class="widget-title-icon tie-icon"></span></div>
            </div>
            <div class="widget-posts-list-wrapper">
                <div class="widget-posts-list-container posts-list-counter">
                    <ul class="posts-list-items widget-posts-wrapper">
                        @isset($cars)
                            @foreach($cars as $car)
                                <li class="widget-single-post-item widget-post-list tie-standard">
                                    <div class="post-widget-thumbnail">
                                        <a
                                            aria-label="{{$car -> name}}"
                                            href="{{ URL::route('car.index',$car -> slug) }}" title="{{ $car -> name}}"
                                            class="post-thumb"
                                        ><span class="post-cat-wrap"><span class="post-cat tie-cat-8">{{$car ->name}}</span></span>
                                            <img
                                                width="220"
                                                height="150"
                                                src="{{$car -> photo}}"
                                                class="attachment-jannah-image-small size-jannah-image-small lazy-img tie-small-image wp-post-image"
                                                alt="{{$car -> name}}"
                                                title="{{$car -> name}}"
                                                decoding="async"
                                                loading="lazy"
                                            />
                                        </a>
                                    </div>
                                    <div class="post-widget-body">
                                        <a class="post-title the-subtitle" href="{{ URL::route('car.index',$car -> slug) }}" title="{{ $car -> name}}">الخدمات الخاصة بسيارة {{$car ->name}}</a>
                                        <br>
                                        <a
                                        class="more-link button"
                                        href="{{ URL::route('car.index',$car -> slug) }}" title="{{$car ->name}}"
                                    >
                                        أكمل القراءة »
                                    </a>
                                    </div>
                                    <div class="post-meta">
                                        <span class="date meta-item tie-icon">{{$car -> created_at->diffForHumans()}}</span>
                                    </div>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>
