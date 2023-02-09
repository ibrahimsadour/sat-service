<aside class="sidebar tie-col-md-4 tie-col-xs-12 normal-side is-sticky" aria-label="القائمة الجانبية الرئيسية">
    <div class="theiaStickySidebar">
        <div id="stream-item-widget-13" class="widget stream-item-widget widget-content-only">
            <div class="stream-item-widget-content"><img class="widget-stream-image" alt="{{get_default_title()}}" title="{{get_default_title()}}" src="{{get_default_ads_sidebare()}}" loading="lazy" data-src="" width="336" height="280"></div>
        </div>

        <div id="tie-newsletter-5" class="container-wrapper widget subscribe-widget">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">القائمة البريدية<span class="widget-title-icon tie-icon"></span></div>
            </div>
            <div class="widget-inner-wrap">
                <span class="tie-icon-envelope newsletter-icon" aria-hidden="true"></span>
                <div class="subscribe-widget-content">
                    <h4>مع كل متابعة جديدة</h4>
                    <h3>إشترك في القائمة البريدية سيصلك كل جديد</h3>
                    <p>كن متابعاً أولاً بأول، خطوة بسيطة وتكون ممن يطلعون على الخبر في بداية ظهورة، اشترك الآن في القائمة البريدية</p>
                </div>
                <div id="mc_embed_signup-tie-newsletter-5">
                    <form action="mo3aser" method="post" id="mc-embedded-subscribe-form-tie-newsletter-5" name="mc-embedded-subscribe-form" class="subscribe-form validate" target="_blank" novalidate>
                        <div class="mc-field-group"> <label class="screen-reader-text" for="mce-EMAIL-tie-newsletter-5">أدخل بريدك الإلكتروني</label> <input type="email" id="mce-EMAIL-tie-newsletter-5" placeholder="أدخل بريدك الإلكتروني" name="EMAIL"
                                                                                                                                                             class="subscribe-input required email"> </div>
                        <input type="submit" value="إشترك" name="subscribe" class="button subscribe-submit">
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div id="tie-widget-categories-8" class="container-wrapper widget widget_categories tie-widget-categories">
            <div class="widget-title the-global-title">
                <div class="the-subtitle">التصنيفات<span class="widget-title-icon"></span></div>
            </div>
            <ul>
                @isset($sections)
                    @foreach($sections as $section)
                        <li class=" cat-counter "><a href="{{url('sections/'.$section ->slug)}}" title="{{$section ->name}}">  {{ $section -> name}}</a> <span>1</span> </li>
                    @endforeach
                @endisset
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
</aside>
