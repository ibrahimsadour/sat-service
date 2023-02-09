@extends('admin.layouts.admin')
@section('title',' معلومات الصفحة الرئيسية')
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
                                    @if(isset($home_page))
                                        <div class="card-body">
                                        <!-- the Logo of the site -->
                                            <div class="form-group">
                                                <h4 class="form-section"><i class="ft-home"></i> صور الموقع </h4>
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label id="" class="btn btn-float btn-float-lg btn-outline-pink"> شعار الموقع
                                                               <img  src="{{asset('assets/'.$home_page-> logo)}}"  width="300" height="150"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the background of the site -->
                                                        <div class="form-group">
                                                            <label id="" class="btn btn-float btn-float-lg btn-outline-pink"> خلفية الموقع
                                                              <img src="{{asset('assets/'.$home_page-> background)}}"  width="300" height="150"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the default_seo_image of the site -->
                                                        <div class="form-group">
                                                            <label id="" class="btn btn-float btn-float-lg btn-outline-pink"> Default seo image
                                                                <img src="{{asset('assets/'.$home_page->default_seo_image)}}"  width="300" height="150"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <!-- the ads_sidebar of the site -->
                                                        <div class="form-group">
                                                            <label id="" class="btn btn-float btn-float-lg btn-outline-pink"> Ads sidebar photo 
                                                                <img src="{{asset('assets/'.$home_page->ads_sidebar)}}"  width="300" height="150"/>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> معلومات الصفحة الرئيسية </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  البلد الافتراضي  --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">اسم الدولة</label>
                                                            <input type="text" id="default_country"
                                                                    class="form-control"
                                                                    value="{{$home_page-> default_country}}">
                                                        </div>
                                                    </div>
                                                    {{--  عنوان الموقع --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">H1عنوان الموقع </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{$home_page-> title}}">
                                                        </div>
                                                    </div>
                                                    {{--  h2_title --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان الموقع H2
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="عنوان الموقع H2"
                                                                   value="{{$home_page-> h2title}}"
                                                                   name="h2_title">
                                                        </div>
                                                    </div>
                                                    {{--  Phone number --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> رقم الهاتف للتواصل
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="عنوان الموقع H2"
                                                                   value="{{$home_page-> call_us}}">
                                                        </div>
                                                    </div>
                                                    {{--  محتوى المقالة --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">وصف الموقع: </label>
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="ckeditor" name="description"  >{{$home_page-> description}}</textarea>
                                                            </div>
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
                                                                   value="{{$home_page-> seo_title}}">
                                                        </div>
                                                    </div>
                                                    {{--  SEo الوصف --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الوصف
                                                            </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{$home_page-> seo_description}}"
                                                                   name="seo_description">
                                                        </div>
                                                    </div>
                                                    {{--  Facebook--}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Facebook</label>
                                                            <input type="text" 
                                                                class="form-control"
                                                                value="{{$home_page ->facebook_link}}">
                                                        </div>
                                                    </div>
                                                    {{--  instagram --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Instagram</label>
                                                            <input type="text" id="instagram_link"
                                                                class="form-control"
                                                                value="{{$home_page ->instagram_link}}">
                                                           
                                                        </div>
                                                    </div>
                                                    {{--  Twitter --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Twitter</label>
                                                            <input type="text" id="twitter_link"
                                                                class="form-control"
                                                                value="{{$home_page ->twitter_link}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" >
                                                    {{--   كلمات البحث الرئيسية --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كلمات البحث الرئيسية: </label>
                                                            <div class="form-group">
                                                                <textarea  name="seo_keyword"  class="form-control"  >{{$home_page-> seo_keyword}}</textarea>
                                                            </div>
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
                                                <button type="button" class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> الرجوع
                                                </button>
                                                @if(App\Models\Pages\HomePage::count() != Null)
                                                    <div class="btn-group"  role="group" aria-label="Basic example">
                                                        <a href="{{route('admin.home-page.edit',$home_page -> id)}} "
                                                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل صفحة من نحن</a>

                                                        <a href="{{route('admin.home-page.delete',$home_page -> id)}}"
                                                           class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                        @if($home_page -> active == 0)
                                                            <a href="{{route('admin.home-page.status',$home_page -> id)}}"
                                                               class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                        @else
                                                            <a href="{{route('admin.home-page.status',$home_page -> id)}}"
                                                               class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                إلغاء التفعيل</a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="btn-group"  role="group" aria-label="Basic example">
                                            <a href="{{route('admin.home-page.create')}} "
                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">اضافة معلومات الصفحة الرئيسية</a>


                                        </div>
                                    @endif
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

