@extends('admin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">
        @include('admin.layouts.error')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ویرایش نقش</h6>
                    <form method="POST" action="{{route('role.update', $role->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نام نقش</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"
                                       dir="rtl" name="name" value="{{$role->name}}">
                            </div>
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
