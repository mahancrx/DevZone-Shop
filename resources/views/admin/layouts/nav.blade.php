<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="صفحه فروشگاه">
                <a href="#store" title=" صفحه فروشگاه">
                    <i class="icon ti-shopping-cart-full"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="login.html" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('user.create')}}">ایجاد کاربر</a></li>
                    <li><a href="{{route('user.index')}}">لیست کاربران</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('role.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('role.index')}}">لیست نقش ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="store">
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    <li><a href="{{route('category.create')}}">ایجاد دسته بندی</a></li>
                    <li><a href="{{route('category.index')}}">لیست دسته بندی ها</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- end::navigation -->
