@extends('admin.layouts.admin')
@section('title','لوحة التحكم - تعديل المقالة '.$article -> name)
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.articles')}}"> قسم المقالات </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل - {{$article -> name}}
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
                                    <div class="card-body">
                                        <form class="form"
                                              action="{{route('admin.articles.update',$article -> id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input name="id" value="{{$article -> id}}" type="hidden">
                                            {{--show photo--}}
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="{{$article-> photo}}"
                                                        style="width: 10%; height: 10%;" alt="صورة القسم  ">
                                                </div>
                                            </div>
                                            {{--edit photo--}}
                                            <div class="form-group">
                                                <label> category image </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="photo">
                                                    <span class="file-custom"></span>
                                                </label>
                                                @error('photo')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            {{--edit name--}}
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> تعديل </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم  المقالة</label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{$article -> name}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{--edit slug --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> اسم الرابط </label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   value="{{$article -> slug}}"
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            <div class="row" >
                                                <!-- city_id -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اختر اسم المدينة
                                                        </label>
                                                        <select name="city_id" class="select2 form-control" value="{{old('city_id')}}" >
                                                            <optgroup label="الحالية اسم المدينة">
                                                                @if($cities  -> count() > 0)
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city -> id}}"
                                                                            @foreach($articleCities as $articleCity) 
                                                                                @if($city ->id == $articleCity->id)selected="selected"@endif
                                                                            @endforeach>{{$city -> name }}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="0">لا يوجد اي مدن مضافة</option>
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('car')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- service_id  -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اختر الخدمة المناسبة
                                                        </label>
                                                        <select name="service_id" class="select2 form-control" value="{{old('service_id')}}" >
                                                            <optgroup label=" من فضلك اختر الخدمة المناسبة">
                                                                @if($services  -> count() > 0)
                                                                @foreach($services as $service)
                                                                        <option  value="{{$service -> id}}"
                                                                            @foreach($articleServices as $articleService) 
                                                                            @if($service ->id == $articleService->id)selected="selected"@endif
                                                                        @endforeach>{{$service -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('service_id')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- tags -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> ألعلامات الدلالية
                                                        </label>
                                                        @if(isset($article ->tags))
                                                            <b class="success">{{$article ->tags->count()}}
                                                            @if($article ->tags->count() > 0)
                                                            <a href="{{route('delete-all-tags-of-one-article',$article -> id)}}"
                                                                class="btn btn-outline-danger">حذف الكل</a>
                                                            @endif
                                                        @else
                                                            <b class="warning">لم يتم اضافة اي علامات بعد</b>
                                                        @endif
                                                        <select  name="tags[]" class="select2 form-control" multiple value="{{old('tags[]')}}">
                                                            <optgroup label=" اختر ألعلامات الدلالية ">
                                                                @if($tags -> count() > 0)
                                                                    @foreach($tags as $tag)
                                                                        <option value="{{$tag -> id}}"
                                                                            @foreach($articleTags as $articleTag) 
                                                                                @if($tag ->id == $articleTag->id)selected="selected"@endif
                                                                            @endforeach
                                                                            >{{$tag -> name}}</option>
                                                                    @endforeach
                                                                @else
                                                                    <option value="0">لا يوجد اي مدن مضافة</option>
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('tags')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                {{--  محتوى المقالة --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput1">محتوى المقالة: </label>
                                                        <div class="form-group">
                                                            <textarea id="ckeditor" name="description" value="description">{{$article->description}} </textarea>
                                                            <small id="description_error" class="form-text text-danger"></small>
                                                            <script> CKEDITOR.replace('ckeditor' );</script>
                                                        </div>
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i>تعديل معلومات SEO </h4>
                                                <!-- title of the erticle and the slug -->
                                                <div class="row">
                                                    {{--  عنوان SEO --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">عنوان المقالة </label>
                                                            <input type="text" id="seo_title"
                                                                   class="form-control"
                                                                   placeholder="مثال(بنشر متنقل - كهربائي سيارات)"
                                                                   value="{{$article-> seo_title}}"
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
                                                                   value="{{$article-> seo_description}}"
                                                                   name="seo_description">
                                                            @error("seo_description")
                                                            <span class="text-danger"> {{$message}}</span>
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
                                                                <textarea multiple name="seo_keyword" placeholder="بنشر, تبديل تواير, كهربائي, ميكانيكي" class="form-control" value="{{$article-> seo_keyword}}" >{{$article-> seo_keyword}}</textarea>
                                                            </div>
                                                            @error("seo_keyword")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--edit status --}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                    name="active"
                                                                    id="switcheryColor4"
                                                                    class="switchery" data-color="success"
                                                                    @if($article -> active == 1)checked @endif/>
                                                            <label for="switcheryColor4"
                                                                    class="card-title ml-1">الحالة</label>

                                                            @error("active")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> الرجوع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
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
