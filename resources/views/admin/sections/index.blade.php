@extends('admin.layouts.admin')
@section('title','صفحة الاقسام')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">  اسماء الاقسام</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{route('admin.sections.create')}}">أضافة قسم جديد</a>
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>ID</th>
                                                <th>الأسم</th>
                                                <th>اسم الرابط</th>
                                                <th>الحالة</th>
                                                <th>العلامات</th>
                                                <th>الصورة</th>
                                                <th>الإجرءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($sections)
                                                @foreach($sections as $section)
                                                    <tr>
                                                        <td>{{$section -> id}}</td>
                                                        <td>{{$section -> name}}</td>
                                                        <td>{{$section -> slug}}</td>
                                                        <td>
                                                            @if($section -> getActive() === "active" || $section -> getActive() === "مفعل")
                                                                <b class="success">{{$section -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$section -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        @if($section ->tags != NULL)
                                                        <td class="warning"> <a href="{{route('admin.sections.section-tags',$section -> id)}}"> {{$section ->tags->count()}}</a></td>
                                                        @else
                                                            <td>غير معروف</td>
                                                        @endif
                                                            <td> <img style="width: 150px; height: 100px;" src="{{ $section -> photo}}"></td>


                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.sections.edit',$section -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.sections.delete',$section -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($section -> active == 0)
                                                                    <a href="{{route('admin.sections.status',$section -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.sections.status',$section -> id)}}"
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
                                        <div class="d-flex flex-row justify-content-center">{{$sections->links('pagination::bootstrap-4')}}</div>
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
