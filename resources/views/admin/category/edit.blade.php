@extends('admin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">
        @include('admin.layouts.error')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد دسته بندی</h6>
                    <form method="POST" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عنوان دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" value="{{$category->title}}"
                                       dir="rtl" name="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عنوان انگلیسی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" value="{{$category->slug}}"
                                       name="etitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">دسته بندی پدر</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-select">
                                    <option selected value="0">ندارد</option>
                                    @foreach($categories as $key => $value)
                                        @if($category->parent_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input class="col-sm-10" type="file" class="form-control-file" name="image" id="file">
                        </div>
                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        $('select').select2({
            dir: "rtl",
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent')
        })
        $('.form-select').select2();
    </script>
@endsection
