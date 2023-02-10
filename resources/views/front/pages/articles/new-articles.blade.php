<div id="tie-s_1441" class="mag-box big-posts-box has-custom-color" data-current="1">
    <div class="container-wrapper">
        <div class="mag-box-title the-global-title">
        <h3>الخدمات الجديدة</h3>
        </div>
        <div class="mag-box-container clearfix">
        <ul class="posts-items posts-list-container">
            <?php $count = 0; ?>
            @isset($articles)
                @foreach($articles as $article)
                <?php if($count == 2) break; ?>
                    <li class="post-item post-1892 post type-post status-publish format-standard has-post-thumbnail category-64 tag-94 tie-standard">
                        <a aria-label="{{$article ->name}}" href="{{ url($article ->slug) }}"
                            class="post-thumb"><span class="post-cat-wrap"><span class="post-cat tie-cat-64">{{$article ->service->name}}</span></span><img width="390" height="220" src="{{$article ->photo}}" alt="{{$article ->name}}" title="{{$article ->name}}" /></a>
                        <div class="post-details">
                            <div class="post-meta clearfix">
                            <span class="author-meta single-author no-avatars">
                                <span class="meta-item meta-author-wrapper meta-author-63">
                                    <span class="meta-author">
                                        <span class="author-name tie-icon"></span>
                                    </span>
                                </span>
                            </span>
                            <span class="date meta-item tie-icon">{{$article -> created_at->diffForHumans()}}</span>
                            </div>
                            <h2 class="post-title"><a href="{{url($article ->slug)}}" title="{{$article ->name}}" >{{ Str::limit($article -> name, 45) }}</a></h2>
                            <p class="post-excerpt">{{ Str::limit($article -> seo_description, 100) }}</p>
                        </div>
                    </li>
                    <?php $count++; ?>
                @endforeach
            @endisset
        </ul>
        <div class="clearfix"></div>
        </div>
            <a href="{{ URL::route('articles.index')}}" class="block-pagination next-posts show-more-button load-more-button" data-text="تحميل المزيد">تحميل المزيد</a>
    </div>
</div>
