@extends('admin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">
        @include('admin.layouts.error')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد کاربر</h6>
                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام و نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="نام و نام خانوادگی"
                                       dir="rtl" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ایمیل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="ایمیل" dir="rtl"
                                       name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">موبایل</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="موبایل" dir="rtl"
                                       name="mobile">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">پسورد</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left" placeholder="پسورد" dir="rtl"
                                       name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                            <input class="col-sm-10" type="file" class="form-control-file" name="image" id="file">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="admin">رول ادمین</label>
                            <input class="col-sm-10" type="checkbox" class="form-control-file" id="admin" name="admin">
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
