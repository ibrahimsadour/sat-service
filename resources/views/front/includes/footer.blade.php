<footer id="footer" class="site-footer dark-skin dark-widgetized-area">
    <div id="footer-widgets-container">
        <div class="container">
            <div class="footer-widget-area">
                <div class="tie-row">
                    <div class="tie-col-md-3 normal-side">
                        <div id="posts-list-widget-9" class="container-wrapper widget posts-list">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">صفحات الموقع<span class="widget-title-icon tie-icon"></span></div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container timeline-widget">
                                    <ul class="posts-list-items widget-posts-wrapper">
                                      
                                        <li class="widget-single-post-item">
                                            <a href="{{route('cities.index')}}">
                                                <h3>خدمات لجميع مدن الكويت</h3>
                                            </a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{route('cars.index')}}">
                                                <h3>خدمات سيارات الكويت</h3>
                                            </a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{route('tags.index')}}">
                                                <h3>بنشر متنقل الكويت</h3>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="posts-list-widget-8" class="container-wrapper widget posts-list">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">جديد الخدمات<span class="widget-title-icon tie-icon"></span></div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container posts-pictures-widget">
                                    <div class="tie-row widget-posts-wrapper">
                                        <?php $count = 0; ?>
                                        @isset($articles)
                                            @foreach($articles as $article)
                                                <?php if($count == 6) break; ?>
                                                    <div class="widget-single-post-item tie-col-xs-4 tie-standard">
                                                        <a
                                                            aria-label="{{ Str::limit($article -> name, 45) }}"
                                                            href="{{url($article ->slug)}}"
                                                            class="post-thumb"
                                                        >
                                                            <img
                                                                src="{{$article ->photo}}"
                                                                class="attachment-jannah-image-large size-jannah-image-large wp-post-image"
                                                                alt="{{ Str::limit($article -> name, 45) }}"
                                                                title="{{ Str::limit($article -> name, 45) }}"
                                                                decoding="async"
                                                                loading="lazy"
                                                                data-src="{{$article ->photo}}"
                                                                width="780" height="470"
                                                            />
                                                        </a>
                                                    </div>
                                                <?php $count++; ?>
                                            @endforeach
                                         @endisset

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="tag_cloud-6" class="container-wrapper widget widget_tag_cloud">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle">سحابة الوسوم<span class="widget-title-icon tie-icon"></span></div>
                            </div>
                            <div class="tagcloud">
                                @isset($tags)
                                    @foreach($tags as $tag)
                                        <a href="{{ URL::route('tag.index',$tag -> slug) }}">{{ Str::limit($tag -> name, 10) }}</a>
                                    @endforeach
                                @endisset
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="tie-col-md-3 normal-side">
                        <div id="latest_tweets_widget-4" class="container-wrapper widget latest-tweets-widget">
                            <div class="widget-title the-global-title">
                                <div class="the-subtitle"><a href="//twitter.com/tielabs" rel="nofollow noopener">تابعنا:</a><span class="widget-title-icon tie-icon"></span></div>
                            </div>
                            <div class="widget-posts-list-wrapper">
                                <div class="widget-posts-list-container timeline-widget">
                                    <ul class="posts-list-items widget-posts-wrapper">

                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_facebook()}}" rel="nofollow"><h3>فيس بوك</h3></a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_instagram()}}" rel="nofollow"><h3> انستغرام</h3></a>
                                        </li>
                                        <li class="widget-single-post-item">
                                            <a href="{{get_default_social_link_twitter()}}" rel="nofollow"><h3>تويتر</h3></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="site-info" class="site-info site-info-layout-2">
        <div class="container">
            <div class="tie-row">
                <div class="tie-col-md-12">
                    <div class="copyright-text copyright-text-first">جميع الحقوق محفوظة {{ now()->year }} <a href="https://ibrahim.sadour.nl/ar" rel="nofollow" >تصميم إبراهيم صدور</a> </div>
                    <div class="footer-menu">
                        <ul class="menu">
                            <li id="menu-item-2609" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-131 current_page_item menu-item-2609 tie-current-menu">
                                <a href="{{ URL::route('site.index')}}" aria-current="page" title="الرئيسية">الرئيسية</a>
                            </li>
                            <li id="menu-item-2613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2613"><a href="{{ URL::route('about.index')}}" title="من نحن">من نحن</a></li>
                            <li id="menu-item-2610" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2610"><a href="{{ URL::route('privacy-policy.index')}}" title="سياسة الخصوصية">سياسة الخصوصية</a></li>
                            <li id="menu-item-2611" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2611"><a href="{{ URL::route('contact-us.index')}}" title="إتصل بنا">إتصل بنا</a></li>
                            <li id="menu-item-2612" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2612"><a href="{{ URL::route('sitemap')}}" title="خارطة الموقع">خارطة الموقع</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
