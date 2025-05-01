<!-- Header -->
@include('admin.layouts.header')
<!-- Navigasi -->
@include('admin.layouts.nav')
<!-- Sidebar -->
@include('admin.layouts.sidebar')
<!-- Content -->
<div class="page-wrapper">
    @yield('content')
    <!-- Footer -->
</div>
@include('admin.layouts.footer')
