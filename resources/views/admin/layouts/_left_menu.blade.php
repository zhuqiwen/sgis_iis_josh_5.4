<ul id="menu" class="page-sidebar-menu">
    @include('admin.layouts.partials.left_menu_items.dashboard')
    @include('admin.layouts.partials.left_menu_items.internship')
    @include('admin.layouts.partials.left_menu_items.alumni')
    @include('admin.layouts.partials.left_menu_items.scholarship')
{{--    @include('admin.layouts.partials.left_menu_items.funding')--}}
{{--    @include('admin.layouts.partials.left_menu_items.alumni')--}}
    <!-- Original menus shipped with Josh -->
    @if(env('APP_ENV') == 'local')
        @include('admin.layouts.partials.left_menu_items.orginal_menus')
    @endif
    <!-- Menus generated by CRUD generator -->
    @include('admin/layouts/menu')
</ul>
