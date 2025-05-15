<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
 @include('web.dashboard.layouts.head')

<body>
    <!-- ======= Header ======= -->
  @include('web.dashboard.layouts.header')
  <!-- ======= Sidebar ======= -->
  @include('web.dashboard.layouts.aside')
  @yield('content')
  <!-- ======= Footer ======= -->
  @include('web.dashboard.layouts.footer')
</body>

</html>
