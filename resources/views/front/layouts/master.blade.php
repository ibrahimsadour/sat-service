<!DOCTYPE html>
<html dir="rtl" lang="ar" data-lt-installed="true"  prefix="og: http://ogp.me/ns#">
    @include('front.includes.head')
   <body id="tie-body" class="home-page bp-nouveau rtl home page-template-default page page-id-131 theme-jannah tie-no-js woocommerce-no-js wrapper-has-shadow block-head-1 magazine1 demo is-lazyload is-thumb-overlay-disabled is-mobile is-header-layout-3 has-header-ad has-builder hide_share_post_top hide_share_post_bottom no-js">

        <div class="background-overlay">
            <div id="tie-container" class="site tie-container">
                  <div id="tie-wrapper">

                    @include('front.includes.header')

                    @yield('content')

                    @include('front.includes.footer')
                      @include('front.includes.call-now-button')

                  </div>
            </div>
        </div>
        @include('front.includes.script')
        {!! googleCodeFooter()!!} 

   </body>
</html>
