@extends('admin.layouts.admin')
@section('title','أضافة معلومات الرئيسية')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home-page')}}"> قسم الصفحة الرئيسية </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.home_page.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <!-- the Logo of the site -->
                                            <div class="form-group">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة صور الموقع </h4>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                                <i class="la la-camera"><img id="logo"  width="100" height="100"/></i>اضافة شعار الموقع (W250xH100px)
                                                                <input type="file" id="file" name="logo" style="display: none"   onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                            @error('logo')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the background of the site -->
                                                        <div class="form-group">
                                                            <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                                <i class="la la-camera"><img id="background"  width="300" height="150"/></i>(W2000xH475px)اضافة خلفية الموقع
                                                                <input type="file" id="file" name="background" style="display: none;" onchange="document.getElementById('background').src = window.URL.createObjectURL(this.files[0])">
                                                                <span class="file-custom"></span>
                                                            </label>

                                                            @error('background')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the default_seo_image of the site -->
                                                        <div class="form-group">
                                                            <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                                <i class="la la-camera"><img id="default_seo_image"  width="300" height="150"/></i>(W780xH470px)اضافة default_seo_image الموقع
                                                                <input type="file" id="file" name="default_seo_image" style="display: none;" onchange="document.getElementById('default_seo_image').src = window.URL.createObjectURL(this.files[0])">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                            @error('default_seo_image')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the ads_sidebar of the site -->
                                                        <div class="form-group">
                                                            <label id="projectinput7" class="btn btn-float btn-float-lg btn-outline-pink">
                                                                <i class="la la-camera"><img id="ads_sidebar"  width="300" height="150"/></i>(W336xH280px)اضافة ads_sidebar الموقع
                                                                <input type="file" id="file" name="ads_sidebar" style="display: none;" onchange="document.getElementById('ads_sidebar').src = window.URL.createObjectURL(this.files[0])">
                                                                <span class="file-custom"></span>
                                                            </label>
                                                            @error('ads_sidebar')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات الصفحة الرئيسية </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  البلد الافتراضي  --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم الدولة</label>
                                                            <input type="text" id="default_country"
                                                                    class="form-control"
                                                                    value="{{old('default_country')}}"
                                                                    name="default_country">
                                                            @error("default_country")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  عنوان الموقع --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">H1عنوان الموقع </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{old('title')}}"
                                                                   name="title">
                                                            @error("title")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  h2_title --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان الموقع H2
                                                            </label>
                                                            <input type="text" id="name"
                                                                    class="form-control"
                                                                    placeholder="عنوان الموقع H2"
                                                                    value="{{old('h2title')}}"
                                                                    name="h2title">
                                                            @error("h2title")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Phone number --}}
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف للتواصل
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="عنوان الموقع H2"
                                                                   value="{{old('call_us')}}"
                                                                   name="call_us">
                                                            @error("call_us")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  محتوى المقالة --}}
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label for="projectinput1">وصف الموقع: </label>
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="ckeditor" name="description" value="{{old('description')}}" >{{old('description')}}</textarea>
                                                                <small id="description_error" class="form-text text-danger"></small>
                                                            </div>
                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Facebook--}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Facebook</label>
                                                            <input type="text" id="facebook_link"
                                                                class="form-control"
                                                                value="{{old('facebook_link')}}"
                                                                name="facebook_link">
                                                            @error("facebook_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  instagram --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Instagram</label>
                                                            <input type="text" id="instagram_link"
                                                                class="form-control"
                                                                value="{{old('instagram_link')}}"
                                                                name="instagram_link">
                                                            @error("instagram_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  Twitter --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Twitter</label>
                                                            <input type="text" id="twitter_link"
                                                                class="form-control"
                                                                value="{{old('twitter_link')}}"
                                                                name="twitter_link">
                                                            @error("twitter_link")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>اضافة معلومات SEO </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  عنوان SEO --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان المقالة </label>
                                                            <input type="text" id="seo_title"
                                                                   class="form-control"
                                                                   placeholder="مثال(بنشر متنقل - كهربائي سيارات)"
                                                                   value="{{old('seo_title')}}"
                                                                   name="seo_title">
                                                            @error("seo_title")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--  SEo الوصف --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الوصف
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="يجب الا يتجاوز االوصف 160 حرفا"
                                                                   value="{{old('seo_description')}}"
                                                                   name="seo_description">
                                                            @error("seo_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    {{--   كلمات البحث الرئيسية --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كلمات البحث الرئيسية: </label>
                                                            <div class="form-group">
                                                                <textarea multiple name="seo_keyword" placeholder="بنشر, تبديل تواير, كهربائي, ميكانيكي" class="form-control" value="{{old('seo_keyword')}}" >{{old('seo_keyword')}}</textarea>
                                                            </div>
                                                            @error("seo_keyword")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- the status of the article -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة</label>

                                                        @error("active")
                                                        <span class="text-danger"> </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> الرجوع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>اضافة
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection
<!-- Text editor (ckeditor)  -->
<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}"></script>

