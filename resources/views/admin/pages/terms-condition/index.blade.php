@extends('admin.layouts.admin')
@section('title','اتفاقية الاستخدام')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">صفحة  اتفاقية الاستخدام  </h3>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @if(App\Models\Pages\TermsCondition::count() != NULL) 

                                        <div class="col-xl-6 col-md-12">
                                            <div class="btn-group" style="display: none;" role="group" aria-label="Basic example">
                                                <a href="{{route('admin.terms-condition.edit',$terms_condition -> id)}} "
                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل صفحة اتفاقية الاستخدام </a>
                                                    
                                                <a href="{{route('admin.terms-condition.delete',$terms_condition -> id)}}"
                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
    
                                                @if($terms_condition -> active == 0)
                                                    <a href="{{route('admin.terms-condition.status',$terms_condition -> id)}}"
                                                        class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                @else
                                                    <a href="{{route('admin.terms-condition.status',$terms_condition -> id)}}"
                                                        class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                        إلغاء التفعيل</a>
                                                @endif
    
                                            </div>
                                            <img src="{{$terms_condition ->photo}}" class="img-fluid rounded" alt="timeline image">
                                            <div class="form-body">
                                                <h4 class="form-section"> &nbsp; </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم  الصفحة</label>
                                                            <p>{{$terms_condition -> name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الرابط </label>
                                                            <p>{{$terms_condition -> slug}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border: double;">
                                            <div class="row" >
                                                {{--  محتوى المقالة --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">محتوى الصفحة: </label>
                                                        <div class="form-group">
                                                            <p>{!!$terms_condition->description !!}</p>
                                                        </div>
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="border: double;">

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> معلومات SEO </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  عنوان SEO --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان الصفحة </label>
                                                            <input disabled class="form-control"value="{{$terms_condition-> seo_title}}">
                                                        </div>
                                                    </div>
                                                    {{--  SEo الوصف --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الوصف
                                                            </label>
                                                            <input disabled class="form-control"value="{{$terms_condition-> seo_description}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    {{--   كلمات البحث الرئيسية --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">كلمات البحث الرئيسية: </label>
                                                            <div class="form-group">
                                                                <textarea disabled class="form-control" value="{{$terms_condition-> seo_keyword}}" >{{$terms_condition->seo_keyword}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1" disabled
                                                               class="switchery" data-color="success"
                                                               @if($terms_condition -> active == 1)checked @endif/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">الحالة</label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{route('admin.terms-condition.edit',$terms_condition -> id)}} "
                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل صفحة  اتفاقية الاستخدام </a>
                                                
                                            <a href="{{route('admin.terms-condition.delete',$terms_condition -> id)}}"
                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                            @if($terms_condition -> active == 0)
                                                <a href="{{route('admin.terms-condition.status',$terms_condition -> id)}}"
                                                    class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                            @else
                                                <a href="{{route('admin.terms-condition.status',$terms_condition -> id)}}"
                                                    class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                    إلغاء التفعيل</a>
                                            @endif

                                        </div>
                                        @else
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body text-center">
                                                        <h2 class="text-uppercase">لايوجد صفحة (اتفاقية الاستخدام) مضافة  </h2>
                                                        <br>
                                                        <a href="{{route('admin.terms-condition.create')}}" class="btn btn-outline-primary btn-block btn-glow text-uppercase p-2">اضافة صفحة ( اتفاقية الاستخدام  )</a>                                                </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif  
                                            <div class="justify-content-center d-flex">

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
