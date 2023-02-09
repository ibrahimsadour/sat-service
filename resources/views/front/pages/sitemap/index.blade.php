@extends('front.layouts.master')
@section('title','خريطة الموقع')
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('sitemap'))

<style>
#content {
    padding: 20px 30px;
    background: #fff;
    max-width: 75%;
    margin: 0 auto;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
table {
    border: none;
    border-collapse: collapse;
    font-size: .9em;
    width: 100%;
}
table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    white-space: normal;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: -internal-quirk-inherit;
    text-align: start;
    border-spacing: 2px;
    border-color: grey;
    font-variant: normal;
}
th {
    background-color: #4275f4;
    color: #fff;
    text-align: right;
    padding: 15px 10px;
    font-size: 14px;
    cursor: pointer;
}

</style>
@section('content')
    {{-- Begin Second section --}}
    <div id="tie-block_1837" class="mag-box miscellaneous-box first-post-gradient has-first-big-post media-overlay has-custom-color">
        <div class="container">
            


                <div id="content">
                    <p>جميع الروابط الخاصة بخريطة الموقع</p>
                    <table id="sitemap" cellpadding="3">
                        <thead>
                            <tr>
                                <th width="75%">الرابط</th>
                                <th width="25%">العنوان</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ url('sitemap_index.xml')}}">{{ url('sitemap_index.xml')}}</a></td>
                                <td>الرئيسية</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_articles.xml')}}">{{ url('sitemap_articles.xml')}}</a></td>
                                <td>المقالات</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_tags.xml')}}">{{ url('sitemap_tags.xml')}}</a></td>
                                <td>العلامات الدلالية</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_services.xml')}}">{{ url('sitemap_services.xml')}}</a></td>
                                <td>الخدمات</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_sections.xml')}}">{{ url('sitemap_sections.xml')}}</a></td>
                                <td>الاقسام</td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('sitemap_cities.xml')}}">{{ url('sitemap_cities.xml')}}</a></td>
                                <td>المدن</td>
                            </tr> <tr>
                                <td><a href="{{ url('sitemap_city_tags.xml')}}">{{ url('sitemap_city_tags.xml')}}</a></td>
                                <td>المدن مع  العلامات الدلالية</td>
                            </tr>
                        </tbody>
                    </table>
                <div class="clearfix"></div>
            </div>




            <div class="clearfix"></div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
