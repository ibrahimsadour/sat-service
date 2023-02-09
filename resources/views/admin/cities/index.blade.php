@extends('admin.layouts.admin')
@section('title','قسم المدن')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم اسماء المدن</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع اسماء المدن
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.cities.create')}}">أضافة اسم مدينة  جديدة</a>
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
                                    <form class="form" action="{{route('insert-all-tags-to-one-city')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>مزامنة المدن مع العلامات الدلالية</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ادخل ID المدينة</label>
                                                        <input type="number"
                                                               class="form-control"
                                                               value="{{old('id')}}"
                                                               name="id">
                                                        @error("id")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        <br>
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="la la-check-square-o"></i>اضافة
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                                                <th>التاريخ</th>
                                                <th>العلامات الدلالية</th>
                                                <th>الإجرءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($cities)
                                                @foreach($cities as $city)
                                                    <tr>
                                                        <td>{{$city -> id}}</td>
                                                        <td>{{$city -> name}}</td>
                                                        <td>{{$city -> slug}}</td>
                                                        <td>
                                                            @if($city -> getActive() === "active" || $city -> getActive() === "مفعل")
                                                                <b class="success">{{$city -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$city -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$city -> created_at}}</td>
                                                        <td>
                                                            @if(isset($city ->tags))
                                                                <b class="success">{{$city ->tags->count()}}
                                                                    @if($city ->tags->count() > 0)
                                                                    <a href="{{route('delete-all-tags-of-one-city',$city -> id)}}"
                                                                        class="btn btn-outline-danger">حذف</a>
                                                                    @endif
                                                            @else
                                                                <b class="warning">لم يتم اضافة اي علامات بعد</b>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.cities.edit',$city -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.cities.delete',$city -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($city -> active == 0)
                                                                    <a href="{{route('admin.cities.status',$city -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.cities.status',$city -> id)}}"
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
                                        <div class="d-flex flex-row justify-content-center">{{$cities->links('pagination::bootstrap-4')}}</div>
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
