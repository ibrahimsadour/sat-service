{{-- Begin section --}}
<div id="tie-s_1441" class="mag-box big-posts-box has-custom-color" data-current="1">
    <div class="container">
        <div class="mag-box-title the-global-title section-name">
            <h3> إكتشف أقسامنا </h3>
        </div>
        <div class="mag-box-container clearfix">
            <ul class="posts-items posts-list-container">
                @isset($sections)
                    @foreach($sections as $section)
                        <li class="post-item post-1892 post type-post status-publish format-standard has-post-thumbnail category-64 tag-94 tie-standard section-items">
                    <a href="{{url('sections/'.$section -> slug)}}" title="{{ $section -> name}}" class="post-thumb"><img src="{{ $section -> photo}}"  alt="{{ $section -> name}}" title="{{ $section -> name}}" height="300" width="300" class="attachment-jannah-image-large size-jannah-image-large lazy-img wp-post-image box-shadow"
                            alt="{{ $section -> name}}" decoding="async" loading="lazy"/>
                    </a>
                    <div class="post-details">
                        <h5 class="post-title section-title"><a href="{{url('sections/'.$section -> slug)}}" title="{{ $section -> name}}">{{ $section -> name}}</a></h5>
                    </div>
                </li>
                    @endforeach
                @endisset
            </ul>
        </div>
    </div>
</div>
