@extends('admin.layouts.admin')
@section('title',$article -> name)
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.articles')}}"> قسم المقالات </a>
                                </li>
                                <li class="breadcrumb-item active">اضافة مقالة جديدة
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
                                        <form class="form" action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <!-- the photo of the article -->
                                            <div class="form-group">
                                                    <img style="width: 250px; height: 250px;" src="{{$article ->photo}}">
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> معلومات المقالة </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  عنوان المقالة --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان المقالة </label>
                                                            <input type="text" disabled
                                                                   class="form-control"
                                                                   value="{{$article -> name}}">
                                                        </div>
                                                    </div>
                                                    {{--  رابط المقالة --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الرابط
                                                            </label>
                                                            <input type="text" disabled
                                                                    class="form-control"
                                                                   value="{{$article -> slug}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <!-- car_id -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر ماركة السيارة
                                                            </label>
                                                            <select  disabled name="car_id" class="select2 form-control" value="{{$article -> name}}" >
                                                                <option selected value="{{$article -> name}}">{{$article -> name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- city_id -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر اسم المدينة
                                                            </label>
                                                            <select  class="select2 form-control" value="{{$article -> name}}" >
                                                                <option selected value="{{$article -> name}}">{{$article -> name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- service_id  -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اختر الخدمة المناسبة
                                                            </label>
                                                            <select disabled name="service_id" class="select2 form-control" value="{{$article -> service_id}}" >
                                                                <option value="{{$article -> service_id}}">{{$article -> name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- tags -->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> ألعلامات الدلالية
                                                            </label>
                                                                <select  disabled class="form-control" multiple>
                                                                        @foreach($article->tags as $tag)
                                                                    <option  value="{{$tag -> id}}" >{{$tag -> name}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                    </div>
                                                    {{--محتوى المقالة--}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان المقالة: </label>
                                                            <div class="form-group">
                                                                <textarea disabled id="ckeditor" >{{$article ->description}}</textarea>
                                                                <script> CKEDITOR.replace('ckeditor' );</script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-body">
                                                    <h4 class="form-section"><i class="ft-home"></i> معلومات SEO </h4>
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
                                                                <span class="text-danger"> هذا الحقل مطلوب</span>
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
                                                                <span class="text-danger"> هذا الحقل مطلوب</span>
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
                                                                    <textarea multiple name="seo_keyword" placeholder="بنشر, تبديل تواير, كهربائي, ميكانيكي" class="form-control" value="{{old('seo_keyword')}}" ></textarea>
                                                                </div>
                                                                @error("seo_keyword")
                                                                <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- the status of the article -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input disabled type="checkbox" value="1"
                                                                   name="active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">الحالة</label>


                                                        </div>
                                                    </div>
                                                </div>
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
