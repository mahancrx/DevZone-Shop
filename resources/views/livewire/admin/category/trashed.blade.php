<div>
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-success" href="{{route('category.index')}}">بازگشت به دسته بندی ها</a>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">عنوان</th>
                        <th class="text-center align-middle text-primary">دسته پدر</th>
                        <th class="text-center align-middle text-primary">نام انگلیسی</th>
                        <th class="text-center align-middle text-primary">اسلاگ</th>
                        <th class="text-center align-middle text-primary">بازگردانی</th>
                        <th class="text-center align-middle text-primary">حذف</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $index=>$category)
                        <tr>
                            <td class="text-center align-middle">{{$categories->firstItem()+$index}}</td>
                            <td class="text-center align-middle">
                                <figure class="avatar avatar">
                                    <img src="{{url('image/categories/small/'.$category->image)}}" class="rounded-circle" alt="image">
                                </figure>
                            </td>
                            <td class="text-center align-middle">{{$category->title}}</td>
                            <td class="text-center align-middle">{{$category->parentCategory->title}}</td>
                            <td class="text-center align-middle">{{$category->etitle}}</td>
                            <td class="text-center align-middle">{{$category->slug}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" wire:click="restoreCategory({{$category->id}})">
                                    بازگردانی
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-dark" wire:click="forceDeleteCategory({{$category->id}})">
                                    حذف
                                </a>
                            </td>
                            <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%d %B. Y')}}</td>
                        </tr>
                    @endforeach
                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        window.addEventListener('forceDeleteCategory', event => {
            Swal.fire({
                title: "آیا میخواهید این دسته بندی را پاک کنید",
                text: "با پاک کردن این دسته بندی دیگر دسترسی به آن امکان پذیر نیست",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله پاکش کن!",
                cancelButtonText: "نه پاکش نکن :)"
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('forceDestroy', event.detail.id)
                    Swal.fire({
                        title: "پاک شد !",
                        text: "این دسته بندی پاک شد",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endsection
