@extends('admin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">
        @include('admin.layouts.error')
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h6 class="card-title">ایجاد نقش</h6>
                    <form method="POST" action="{{route('store.user.role', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 offset-3">
                                <div class="list-group-item list-group-item-action">
                                    <h1>نقش های کاربر {{$user->name}}</h1>
                                    @foreach($roles as $role)
                                        <div class="form-check d-flex align-items-center">
                                            <input type="checkbox" @if($user->hasRole($role->name)) checked @endif class="form-check-input" name="roles[]" value="{{$role->name}}">
                                            <label class="list-group-item list-group-item-action">
                                                {{$role->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
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
