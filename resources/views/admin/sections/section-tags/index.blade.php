@extends('admin.layouts.admin')
@section('title','صفحة'.$section->name)
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">{{$section->name}}</h3>
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
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-content collapse show">
                                            <div class="card-body">
                                                <form class="form" action="{{route('admin.sections.insert-tags-to-section')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!-- the photo of the article -->
                                                    
                                                    <div class="form-body">
                                                        <h4 class="form-section"><i class="ft-home"></i>اضافة  علامات جديد الى هذا القسم </h4>
                                                        <!-- title of the erticle and the slug -->
                                                        <div class="row">
                                                            {{--  عنوان المقالة --}}
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">عنوان القسم </label>
                                                                    <input type="text" value="{{$section->id}}" hidden name="section_id">
                                                                    <input type="text" id="name"
                                                                    class="form-control" disabled
                                                                    value="{{$section->name}}">                                                                
                                                                </div>
                                                            </div>
                                                            <!-- tags -->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> اختر ألعلامات الدلالية
                                                                    </label>
                                                                    <select name="tags[]" class="select2 form-control" multiple value="{{old('tags[]')}}">
                                                                        <optgroup label=" اختر ألعلامات الدلالية ">
                                                                            @if($tags  -> count() > 0)
                                                                                @foreach($tags as $tag) 
                                                                                    <option value="{{$tag ->id}}"
                                                                                        @foreach($sectionTags as $sectionTag) 
                                                                                            @if($tag ->id == $sectionTag->id)selected="selected"@endif
                                                                                        @endforeach>{{$tag ->name}}</option>
                                                                                @endforeach
                                                                            @else
                                                                                <option value="0">لا يوجد اي علامات مضافة</option>
                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                    @error('tags')
                                                                    <span class="text-danger"> {{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

        
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="la la-check-square-o"></i>اضافة
                                                        </button>
                                                    </div>
        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr>
                                                <th>ID</th>
                                                <th>اسم</th>
                                                <th>الإجرءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($sectionTags)
                                                @foreach($sectionTags as $tag)
                                                    <tr>
                                                        <td>{{$tag -> id}}</td>
                                                        <td>{{$tag -> name}}</td>
                                                  
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                <a href="{{route('admin.sections.delete-tag-from-section',$tag -> id)}}"
                                                                   class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="d-flex flex-row justify-content-center">{{$sectionTags->links('pagination::bootstrap-4')}}</div>
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
