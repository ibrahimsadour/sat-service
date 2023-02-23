<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="//gmpg.org/xfn/11" />
    <meta http-equiv='x-dns-prefetch-control' content='on'>

    <link rel="dns-prefetch" href="//www.google-analytics.com">
    <link href="https://www.googletagmanager.com/gtag/js?id=mygtmid" rel="preload" as="script">
    <link rel="preload" href="{{asset('assets/fonts/Cairo-Regular.woff2')}}" as="font" type="font/woff2" crossorigin>

    {{-- SEO seo_keyword  --}}
    @if (trim($__env->yieldContent('seo_keyword')))
        <meta name="keywords" content="@yield('seo_keyword')" />
    @else
        <meta name="keywords" content="{{get_default_seo_keyword()}}" />
    @endif
    {{-- SEO seo_description  --}}
    @if (trim($__env->yieldContent('seo_description')))
        <meta name="description" content="@yield('seo_description')" />
    @else
        <meta name="description" content="{{get_default_seo_description()}}" />
    @endif
    {{-- SEO seo_title  --}}
    @if (trim($__env->yieldContent('title')))
        <meta property="og:title" content="@yield('title')" />
    @else
        <meta property="og:title" content="{{get_default_title()}}" />
    @endif
    {{-- SEO og:description  --}}
    @if (trim($__env->yieldContent('seo_description')))
        <meta property="og:description"content="@yield('seo_description')" />
    @else
        <meta property="og:description"content="{{get_default_seo_description()}}" />
    @endif
    {{-- SEO og:image  --}}
    @if (trim($__env->yieldContent('seo_image')))
        <meta property="og:image" content="@yield('seo_image')" />
    @else
        <meta property="og:image" content="{{asset('assets/images/pages/default_seo_image.webp')}}" />
    @endif
    {{-- SEO og:URL  --}}
    @if (trim($__env->yieldContent('seo_url')))
        <meta property="og:url"  content="@yield('seo_url')" />
    @else
        <meta property="og:url"  content="{{env('APP_URL')}}" />
    @endif
    {{-- SEO og:canonical URL  --}}
    @if (trim($__env->yieldContent('seo_url')))
    <link rel="canonical" href="@yield('seo_url')" />
    @else
    <link rel="canonical" href="{{env('APP_URL')}}" />
    @endif

    <meta property="og:site_name" content="{{get_default_title()}}" />
    <meta name="publisher" content="{{get_default_title()}}" />
    <meta name="author" content="{{get_default_title()}}">
    <meta property="og:locale" content="ar_AR" />
    <meta property="og:type" content="website" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <meta property="og:image:type" content="image/jpeg" />
    {{-- SEO seo_title  --}}
    @if (trim($__env->yieldContent('title')))
        <title>@yield('title')</title>
    @else
        <title>{{get_default_title()}}</title>
    @endif

    {{-- <link rel='stylesheet' href="{{asset('assets/front/css/base.min.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{asset('assets/front/css/style.min.css')}}" type='text/css' media='all' />
    <link rel='stylesheet' href="{{asset('assets/front/css/widgets.min.css')}}" type='text/css' media='all' />
    <link rel="stylesheet" href="{{asset('assets/front/rtl.css')}}" type="text/css" media="screen" /> --}}
    <link rel='stylesheet' href="{{asset('assets/front/css/style.css')}}" type='text/css' media='all' />

    {{-- hier is Google code or insert header code --}}
    {!! googleCodeHeader()!!} 
    <link rel='shortlink' href="./" />

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
 </head>
