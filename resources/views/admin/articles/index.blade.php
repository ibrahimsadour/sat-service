@extends('admin.layouts.admin')
@section('title','قسم المقالات')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم المقالات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع المقالات
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.articles.create')}}">أضافة مقالة جديدة</a>
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
                                                <th>التصنيفات</th>
                                                <th>الحالة</th>
                                                <th>التاريخ</th>
                                                <th>الكلمة الرئيسية</th>
                                                <th>الصورة</th>
                                                <th>المقالة</th>
                                                <th>الإجرءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($articles)
                                                @foreach($articles as $article)
                                                    <tr>
                                                        <td>{{$article -> id}}</td>
                                                        <td>{{$article -> name}}</td>
                                                        <td>التصنيفات</td>
                                                        <td>
                                                            @if($article -> getActive() === "active" || $article -> getActive() === "مفعل")
                                                                <b class="success">{{$article -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$article -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$article -> created_at}}</td>
                                                        <td>{{$article -> seo_keyword}}</td>
                                                        <td> <img style="width: 150px; height: 100px;" src="{{$article ->photo}}"></td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.articles.tags',$article->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">  عرض المقالة <i class="la la-eye"></i></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-info dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(73px, 32px, 0px);">
                                                                    <a href="{{route('admin.articles.edit',$article -> id)}}" class="dropdown-item"><i class="la la-pencil"></i>تعديل</a>
                                                                    @if($article -> active == 0)
                                                                        <a href="{{route('admin.articles.status',$article -> id)}}" class="dropdown-item"><i class="la la-check"></i>تفعيل</a>
                                                                    @else
                                                                        <a href="{{route('admin.articles.status',$article -> id)}}" class="dropdown-item"><i class="la la-close"></i>إلغاء التفعيل</a>
                                                                    @endif
                                                                    <a href="{{route('admin.articles.delete',$article -> id)}}" class="dropdown-item"><i class="la la-trash"></i>حذف</a>
                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="d-flex flex-row justify-content-center">{{$articles->links('pagination::bootstrap-4')}}</div>
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
