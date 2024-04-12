<div>
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model="search">
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">نام نقش</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">حذف</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index=>$role)
                        <tr>
                            <td class="text-center align-middle">{{$roles->firstItem()+$index}}</td>

                            <td class="text-center align-middle">{{$role->name}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="{{route('role.edit', $role->id)}}">
                                    ویرایش
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-danger" wire:click="deleteRole({{$role->id}})">
                                    حذف
                                </a>
                            </td>
                            <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($role->created_at)->format('%d %B. Y')}}</td>
                        </tr>
                    @endforeach
                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                    {{$roles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        window.addEventListener('deleteRole', event => {
            Swal.fire({
                title: "آیا میخواهید این نقش را پاک کنید",
                text: "با پاک کردن این نقش دیگر دسترسی به آن امکان پذیر نیست",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله پاکش کن!",
                cancelButtonText: "نه پاکش نکن :)"
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('destroyRole', event.detail.id)
                    Swal.fire({
                        title: "پاک شد !",
                        text: "این نقش پاک شد",
                        icon: "success"
                    });
                }
            });
        })
    </script>
@endsection
