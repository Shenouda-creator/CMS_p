<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
 @include('web.website.layouts.head')
<body>

  @include('web.website.layouts.header')
  <!-- ======= Sidebar ======= -->
  @include('web.website.layouts.aside')
  @yield('content')
  <!-- ======= Footer ======= -->
  @include('web.website.layouts.footer')
</body>

</html>

