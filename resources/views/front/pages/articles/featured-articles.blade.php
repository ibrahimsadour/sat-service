    {{-- Begin First section --}}
    <div id="tiepost-131-section-1777" class="section-wrapper container-full without-background">
        <div class="section-item is-first-section full-width">
            <div class="container">
                <div class="mag-box-title the-global-title section-name">
                    <h3> خدمات مميزة </h3>
                </div>
                <div class="tie-row main-content-row">
                <div class="main-content tie-col-md-12">
                    <section id="tie-block_2426" class="slider-area mag-box">
                        <div class="slider-area-inner">
                            <div id="" class="tie-main-slider main-slider grid-5-first-big grid-5-slider boxed-slider grid-slider-wrapper tie-slick-slider-wrapper">
                                <div class="slide">
                                    @isset($articles)
                                        @foreach($articles as $article)
                                            <div class="grid-item">
                                                    <img class="size-jannah-image-large lazy-img " height="480" width="680" alt="{{$article ->name}}"  title="{{$article ->name}}" decoding="async" loading="lazy" src="{{$article->photo}}">
                                                    <a href="{{ URL::route('article.index',$article -> slug) }}" title="{{ $article -> name}}" class="all-over-thumb-link" aria-label="{{$article ->name}}"></a>
                                                <div class="thumb-overlay">
                                                    <span class="post-cat-wrap post-cat tie-cat-8">{{$article -> service->name}}  </span>
                                                    <div class="thumb-content">
                                                        <div class="thumb-meta"><span class="date meta-item tie-icon">{{$article -> created_at->diffForHumans()}}</span></div>
                                                        <h2 class="thumb-title"><a href="{{ URL::route('article.index',$article -> slug) }}" title="{{ $article -> name}}" >{{ Str::limit($article -> seo_description, 50) }}</a></h2>
                                                        <div class="thumb-desc">{{ Str::limit($article -> seo_description, 60) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                </div>
            </div>
        </div>
    </div>
