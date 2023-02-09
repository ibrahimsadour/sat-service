<div id="tie-block_304" class="mag-box tie-col-sm-6 half-box has-first-big-post has-custom-color first-half-box">
    <div class="container-wrapper">
        <div class="mag-box-title the-global-title">
            <h3>اول الخدمات المضافة</h3>
        </div>
        <div class="mag-box-container clearfix">
            <ul class="posts-items posts-list-container">
                <?php $count = 0; ?>
                @isset($first_articles) @foreach($first_articles as $article)
                <?php if($count == 3) break; ?>
                <li class="post-item tie-standard">
                    <a
                    aria-label="{{$article ->name}}"
                    href="{{url($article ->slug)}}" title="{{ $article -> name}}"
                    class="post-thumb"
                    >
                        <span class="post-cat-wrap"><span class="post-cat tie-cat-48">{{$article ->service->name}}</span></span>
                        <img width="390" height="220" src="{{ $article->photo}}" alt="{{$article ->name}}" title="{{$article ->name}}" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image" alt="" decoding="async" loading="lazy" />
                    </a>
                    <div class="post-details">
                        <h2 class="post-title">
                            <a
                                href="{{url($article ->slug)}}" title="{{ $article -> name}}"
                            >
                            {{$article ->name}}
                            </a>
                        </h2>
                    </div>
                </li>

                <?php $count++; ?>
                @endforeach @endisset
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div id="tie-block_304" class="mag-box tie-col-sm-6 half-box has-first-big-post has-custom-color second-half-box">
    <div class="container-wrapper">
        <div class="mag-box-title the-global-title">
            <h3>اخر الخدمات المضافة</h3>
        </div>
        <div class="mag-box-container clearfix">
            <ul class="posts-items posts-list-container">
                <?php $count = 0; ?>
                @isset($last_articles)
                @foreach($last_articles   as $article)
                <?php if($count == 3) break; ?>
                <li class="post-item tie-standard">
                    <a
                    aria-label="{{$article ->name}}"
                    href="{{url($article ->slug)}}" title="{{ $article -> name}}"
                    class="post-thumb"
                    >
                        <span class="post-cat-wrap"><span class="post-cat tie-cat-48">{{$article ->service->name}}</span></span>
                        <img width="390" height="220" src="{{ $article->photo}}" alt="{{$article ->name}}" title="{{$article ->name}}" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image" alt="" decoding="async" loading="lazy" />
                    </a>
                    <div class="post-details">
                        <h2 class="post-title">
                            <a
                                href="{{url($article ->slug)}}" title="{{$article -> name}}"
                            >
                            {{$article ->name}}
                            </a>
                        </h2>
                    </div>
                </li>
                <?php $count++; ?>
                @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
