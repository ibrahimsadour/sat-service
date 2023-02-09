@extends('admin.layouts.admin')
@section('title','قسم السيارات')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">موديلات سيارة {{$car->name}}</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.cars')}}">جميع السيارات</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.sub-cars.create',$car ->id)}}">أضافة موديل {{$car->name}}  جديد</a>
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
                                    <form class="form" action="{{route('insert-all-tags-to-sub-car-collection')}}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>مزامنة جميع موديلات سيارة {{$car->name}}  مع العلامات الدلالية</h4>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <input  type="number"
                                                               class="form-control"
                                                               value="{{$car->id}}"
                                                               name="car_id">
                                                        <br>
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="la la-check-square-o"></i>مزامنة
                                                        </button>
                                                        {{-- <a href="{{route("delete-all-tags-of-one-sub-car",$car->id)}}" class="btn btn-outline-danger"> حذف الكل </a>  --}}
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
                                                <th>الصورة</th>
                                                <th>الإجرءات</th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($sub_cars)
                                                @foreach($sub_cars as $sub_car)
                                                    <tr>
                                                        <td>{{$sub_car -> id}}</td>
                                                        <td>{{$sub_car -> name}}</td>
                                                        <td>{{$sub_car -> slug}}</td>
                                                        <td>
                                                            @if($sub_car -> getActive() === "active" || $sub_car -> getActive() === "مفعل")
                                                                <b class="success">{{$sub_car -> getActive() }}
                                                                    @else
                                                                        <b class="warning">{{$sub_car -> getActive()}}</b>
                                                            @endif
                                                        </td>
                                                        <td>{{$sub_car ->created_at}}</td>
                                                        <td>
                                                            @if(isset($sub_car ->tags))
                                                                <b class="success">{{$sub_car ->tags->count()}}
                                                                    @if($sub_car ->tags->count() > 0)
                                                                    <a href="{{route('delete-all-tags-of-one-sub-car',$sub_car ->id)}}"
                                                                        class="btn btn-outline-danger">حذف</a>
                                                                    @endif
                                                            @else
                                                                <b class="warning">لم يتم اضافة اي علامات بعد</b>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if(isset($sub_car->photo))
                                                                @if($sub_car->photo != Null)
                                                                <img style="width: 150px; height: 100px;" src="{{$sub_car -> photo}}">
                                                                @else <img style="width: 150px; height: 100px;"  src="{{asset('assets/images/pages/page-is-not-added.webp')}}">
                                                                @endif
                                                            @endif

                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.sub-cars.edit',$sub_car ->id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                                <a href="{{route('admin.sub-cars.delete',$sub_car -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>

                                                                @if($sub_car -> active == 0)
                                                                    <a href="{{route('admin.sub-cars.status',$sub_car -> id)}}"
                                                                       class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">تفعيل</a>
                                                                @else
                                                                    <a href="{{route('admin.sub-cars.status',$sub_car -> id)}}"
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
                                        {{-- <div class="d-flex flex-row justify-content-center">{{$sub_cars->links('pagination::bootstrap-4')}}</div> --}}
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
