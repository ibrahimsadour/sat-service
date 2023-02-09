@extends('admin.layouts.admin')
@section('title','قسم السيارات')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم اسماء السيارات</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">جميع ماركات السيارات
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.cars.create')}}">أضافة ماركة سيارة جديدة</a>
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
                                    <form class="form" action="{{route('insert-all-tags-to-one-car')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>مزامنة السيارات مع العلامات الدلالية</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">ادخل ID السياراة</label>
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
                                                <th>الاقسام الفرعية</th>
                                                <th>العلامات الدلالية</th>
                                                <th>الصورة</th>
                                                <th>الإجرءات</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($cars)
                                                @foreach($cars as $car)
                                                    <tr>
                                                        <td>{{$car -> id}}</td>
                                                        <td>{{$car -> name}}</td>
                                                        <td>{{$car -> slug}}</td>
                                                        
                                                        <td>
                                                            @if($car -> getActive() === "active" || $car -> getActive() === "مفعل")
                                                                <b class="success">{{$car -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$car -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(isset($car ->sub_cars))
                                                                @if($car ->sub_cars->count() > 0)
                                                                <a href="{{route('admin.sub-cars',$car ->id)}}"
                                                                    class="btn btn-outline-primary ">عرض [ {{$car ->sub_cars->count()}} ] </a>
                                                                @else <a href="{{route('admin.sub-cars.create',$car ->id)}}" class="btn btn-outline-warning">اضافة</a>
                                                                @endif
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if(isset($car ->tags))
                                                                    @if($car ->tags->count() > 0)
                                                                <a href="{{route('delete-all-tags-of-one-car',$car -> id)}}"
                                                                    class="btn btn-outline-danger"> حذف [ {{$car ->tags->count()}} ] </a>
                                                                    @else <a class="btn btn-outline-warning">لايوجد</a>
                                                                    @endif
                                                            @endif

                                                        </td>
                                                        <td> <img style="width: 150px; height: 100px;" src="{{$car -> photo}}"></td>


                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.cars.edit',$car -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.cars.delete',$car -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($car -> active == 0)
                                                                    <a href="{{route('admin.cars.status',$car -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.cars.status',$car -> id)}}"
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
                                        <div class="d-flex flex-row justify-content-center">{{$cars->links('pagination::bootstrap-4')}}</div>
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
