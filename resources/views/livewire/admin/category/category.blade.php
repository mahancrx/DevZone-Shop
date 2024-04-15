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
                        <th class="text-center align-middle text-primary">عکس</th>
                        <th class="text-center align-middle text-primary">عنوان</th>
                        <th class="text-center align-middle text-primary">دسته پدر</th>
                        <th class="text-center align-middle text-primary">نام انگلیسی</th>
                        <th class="text-center align-middle text-primary">اسلاگ</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
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
                            <td class="text-center align-middle">{{$category->parent_id}}</td>
                            <td class="text-center align-middle">{{$category->etitle}}</td>
                            <td class="text-center align-middle">{{$category->slug}}</td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-info" href="{{route('category.edit', $category->id)}}">
                                    ویرایش
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a class="btn btn-outline-dark">
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
