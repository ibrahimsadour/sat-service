<div id="tie-block_1160" class="mag-box big-post-top-box has-first-big-post box-dark-skin dark-skin has-custom-color" data-current="1">
    <div class="container-wrapper">
        <div class="mag-box-title the-global-title">
            <h3>خدمات صيانة السيارات</h3>
        </div>
        <div class="mag-box-container clearfix">
            <ul class="posts-items posts-list-container">
                <?php $count = 0; ?>
                @isset($first_articles)
                    @foreach($first_articles as $article)
                    <?php if($count == 1) break; ?>
                        <li class="post-item tie-thumb">
                            <a
                                aaria-label="{{$article ->name}}" href="{{ url($article ->slug) }}" title="{{$article ->name}}"
                                class="post-thumb"
                            >
                                <span class="post-cat-wrap"><span class="post-cat tie-cat-8">{{$article ->service->name}}</span></span>
                                <img
                                    width="390"
                                    height="220"
                                    src="{{$article ->photo}}"
                                    class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image"
                                    alt="{{$article ->name}}"
                                    title="{{$article ->name}}"
                                    decoding="async"
                                    loading="lazy"
                                />
                            </a>
                            <div class="post-details">
                                <div class="post-meta clearfix">
                                    <span class="date meta-item tie-icon">{{$article -> created_at->diffForHumans()}}</span>
                                </div>
                                <h2 class="post-title">
                                    <a
                                        href="{{url($article ->slug)}}" title="{{$article ->name}}"
                                    >
                                    {{ Str::limit($article -> name, 45) }}
                                    </a>
                                </h2>
                                <p class="post-excerpt">{{ Str::limit($article -> seo_description, 150 ) }}</p>
                                <a
                                    class="more-link button"
                                    href="{{url($article ->slug)}}" title="{{$article ->name}}"
                                >
                                    أكمل القراءة »
                                </a>
                            </div>
                        </li>
                    <?php $count++; ?>
                    @endforeach
                @endisset
                <?php $count = 0; ?>
                @isset($last_articles)
                    @foreach($last_articles as $article)
                    <?php if($count == 4) break; ?>
                    <li class="post-item tie-standard middle-article">
                        <a
                        aaria-label="{{$article ->name}}" href="{{url($article ->slug)}}" title="{{$article ->name}}"
                            class="post-thumb"
                        >
                            <img
                                width="220"
                                height="150"
                                src="{{$article ->photo}}"
                                class="attachment-jannah-image-small size-jannah-image-small lazy-img tie-small-image wp-post-image"
                                alt="{{$article ->name}}"
                                title="{{$article ->name}}"
                                decoding="async"
                                loading="lazy"
                            />
                        </a>
                        <div class="post-details">
                            <div class="post-meta clearfix"><span class="date meta-item tie-icon">{{$article -> created_at->diffForHumans()}}</span></div>
                            <h2 class="post-title">
                                <a
                                    href="{{url($article ->slug)}}" title="{{$article ->name}}"
                                >
                                {{ Str::limit($article -> name, 45) }}
                                </a>
                            </h2>
                        </div>
                    </li>
                    <?php $count++; ?>
                    @endforeach
                @endisset
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
