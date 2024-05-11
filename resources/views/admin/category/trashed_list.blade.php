@extends('admin.layouts.master')
@section('content')
    <!-- begin::main content -->
    <main class="main-content">
        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-primary">
                <div>{{session('message')}}</div>
            </div>
        @endif
    <livewire:admin.category.trashed />
    </main>
@endsection
