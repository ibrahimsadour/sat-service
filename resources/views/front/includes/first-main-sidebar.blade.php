{{-- Main side menu  --}}
<aside class="sidebar tie-col-md-4 tie-col-xs-12 normal-side is-sticky" aria-label="القائمة الجانبية الرئيسية">
    <div class="theiaStickySidebar">
        <div id="posts-list-widget-42" class="container-wrapper widget posts-list">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">الأقسام الأكثر مشاهدة<span class="widget-title-icon tie-icon"></span></div>
            </div>
            <div class="widget-posts-list-wrapper">
                <div class="widget-posts-list-container posts-list-counter">
                    <ul class="posts-list-items widget-posts-wrapper">
                        @isset($sections)
                            @foreach($sections as $section)
                                <li class="widget-single-post-item widget-post-list tie-standard">
                                    <div class="post-widget-thumbnail">
                                        <a
                                            aria-label="{{$section -> name}}"
                                            href="{{ URL::route('section.index',$section -> slug) }}" title="{{ $section -> name}}"
                                            class="post-thumb"
                                        >
                                            <img
                                                width="220"
                                                height="150"
                                                src="{{$section -> photo}}"
                                                class="attachment-jannah-image-small size-jannah-image-small lazy-img tie-small-image wp-post-image"
                                                alt="{{$section -> name}}"
                                                title="{{$section -> name}}"
                                                decoding="async"
                                                loading="lazy"
                                            />
                                        </a>
                                    </div>
                                    <div class="post-widget-body">
                                        <a class="post-title the-subtitle" href="{{ URL::route('section.index',$section -> slug) }}" title="{{ $section -> name}}">{{$section ->name}}</a>
                                        <br>
                                        <a
                                        class="more-link button"
                                        href="{{ URL::route('section.index',$section -> slug) }}" title="{{$section ->name}}"
                                    >
                                        أكمل القراءة »
                                    </a>
                                    </div>
                                    <div class="post-meta">
                                        <span class="date meta-item tie-icon">{{$section -> created_at->diffForHumans()}}</span>
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
