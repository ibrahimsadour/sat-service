@extends('admin.layouts.admin')
@section('title','قسم الاكواد')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم الاكواد</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع الاكواد
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.google.create')}}">أضافة كود  جديدة</a>
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
                                                <th>العنوان</th>
                                                <th> الوصف</th>
                                                <th> مكان الكود</th>
                                                <th>الحالة</th>
                                                <th>التاريخ</th>
                                                <th>الإجرءات</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($codes)
                                                @foreach($codes as $code)
                                                    <tr>
                                                        <td>{{$code ->id}}</td>
                                                        <td>{{$code ->title}}</td>
                                                        <td>{{ Str::limit($code ->code, 45) }}</td>
                                                        <td>{{$code ->place}}</td>

                                                        <td>
                                                            @if($code -> getActive() === "active" || $code -> getActive() === "مفعل")
                                                                <b class="success">{{$code -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$code -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$code ->created_at}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.google.edit',$code -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.google.delete',$code -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($code -> active == 0)
                                                                    <a href="{{route('admin.google.status',$code -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.google.status',$code -> id)}}"
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
