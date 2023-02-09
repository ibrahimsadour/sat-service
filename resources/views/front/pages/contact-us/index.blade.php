@extends('front.layouts.master')
@section('title','إتصل بنا')
@section('seo_keyword',get_default_seo_keyword())
@section('seo_description',get_default_seo_description())
@section('seo_url', URL::route('contact-us.index') )
@section('content')
<style>

div.form {
  background-color: #eee;
}
.contact-submit-btn {
  float: left;
}
.reset-btn {
  float: right;
}

.form-input:focus,
textarea:focus{
  outline: 1.5px solid #ec1c24;
}
.form-input,
textarea {
  width: 100%;
  border: 1px solid #bdbdbd;
  border-radius: 5px;
}
form {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 20px;
}
form label {
  display: block;
}
form p {
  margin: 0;
}

.full-width {
  grid-column: 1 / 3;
}
button,
.submit-btn,
.form-input,
textarea {
  padding: 1em;
}

</style>
    {{-- Begin Second section --}}
    <div id="tiepost-131-section-549" class="section-wrapper container normal-width without-background">
        <div class="section-item sidebar-left has-sidebar">
            <div class="container-normal">
                <div class="tie-row main-content-row">
                    <div class="main-content tie-col-md-8 tie-col-xs-12" role="main">
                        {{--title of the article--}}
                        <header class="entry-header-outer">
                            <div class="entry-header">
                                <h1 class="post-title entry-title">إتصل بنا</h1>
                            </div>
                        </header>
                        {{--Imgage of the article--}}
                        <div class="featured-area">
                            <div class="featured-area-inner">
                                <figure class="single-featured-image">
                                    <img
                                        width="780"
                                        height="470"
                                        src="{{asset('assets/images/pages/contact-us/contact-us.webp')}}"
                                        class="attachment-jannah-image-post size-jannah-image-post lazy-img wp-post-image"
                                        title="contact-us"
                                        decoding="async"
                                        data-main-img="1"
                                        alt="contact-us"
                                        loading="lazy"
                                    />
                                </figure>
                            </div>
                        </div>
                        {{--Content of the article--}}
                        <div class="entry-content entry clearfix">
                            <p>دعنا نرى كيف يمكننا المساعدة. تواصل معنا اليوم وتحدث إلى فريقنا الودود عبر البريد الإلكتروني ، مهما كان استفسارك.</p>
                            <p>نظرًا لأننا نتلقى الكثير من الرسائل عبر البريد الإلكتروني ووسائل التواصل الاجتماعي ، فإليك بعض الإرشادات للتأكد من أننا نرى رسالتك وقدرتنا على الرد في الوقت المناسب.</p>
                        </div>
                        <br>
                        <h2 class="entry-sub-title">أرسل لنا رسالة</h2>
                        <br>
                        <div class="form">
                            <form id="submit-form" action="">
                              <p>
                                <input id="name" class="form-input" type="text" placeholder="الإسم*">
                                <small class="name-error"></small>
                              </p>
                              <p>
                                <input id="email" class="form-input" type="email" placeholder="البريد الإلكتروني*">
                                <small class="name-error"></small>
                              </p>
                              <p class="full-width">
                                <input id="company-name" class="form-input" type="text" placeholder="رقم الواتساب *" required>
                                <small></small>
                              </p>
                              <p class="full-width">
                                <textarea  minlength="20" id="message" cols="30" rows="7" placeholder="رسالتك *" required></textarea>
                                <small></small>
                              </p>
                              <p class="full-width">
                                <input type="   " class="contact-submit-btn button" value="إرسال" onclick="checkValidations()">
                                <button class="button" onclick="reset()">تفريغ الحقول</button>
                              </p>
                            </form>
                        </div>
                    </div>
                    {{-- Main side menu  --}}
                    @include('front.includes.first-main-sidebar')

                    @include('front.includes.second-main-sidebar')

                </div>
            </div>
        </div>
    </div>
    {{-- End Second section --}}
@endsection
