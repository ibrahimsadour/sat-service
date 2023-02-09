@extends('admin.layouts.admin')
@section('title','قسم العلامات')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم العلامات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع العلامات
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.tags.create')}}">أضافة علامة  جديدة</a>
                                </li>
                            </ol>
                        </div>
                    </div>
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
                                <form class="form" action="{{route('admin.tags.import')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>اضافة  ملف Excel  </label>
                                        <label id="projectinput7" class="dropzone dropzone-area dz-clickable">
                                            <input type="file" name="select_file" />
                                        </label>
                                        @error('select_file')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input type="submit" name="upload" class="btn btn-primary" value="اضافة">
                                    </div>
                                </form>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>ID</th>
                                                <th>الأسم</th>
                                                <th>اسم الرابط</th>
                                                <th> الوصف</th>
                                                <th>الحالة</th>
                                                <th>التاريخ</th>
                                                <th>الإجرءات -- <a href="{{route("admin.tags.destroyAll")}}" class="btn btn-outline-danger">حذف الكل {{App\Models\Tag::count()}}</a></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($tags)
                                                @foreach($tags as $tag)
                                                    <tr>
                                                        <td>{{$tag -> id}}</td>
                                                        <td>{{$tag -> name}}</td>
                                                        <td>{{$tag -> slug}}</td>
                                                        <td>{{ Str::limit($tag -> description, 45) }}</td>
                                                        <td>
                                                            @if($tag -> getActive() === "active" || $tag -> getActive() === "مفعل")
                                                                <b class="success">{{$tag -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$tag -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$tag -> created_at}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.tags.edit',$tag -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.tags.delete',$tag -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($tag -> active == 0)
                                                                    <a href="{{route('admin.tags.status',$tag -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.tags.status',$tag -> id)}}"
                                                                       class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                                        إلغاء التفعيل</a>
                                                                @endif

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="d-flex flex-row justify-content-center">{{$tags->links('pagination::bootstrap-4')}}</div>
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
