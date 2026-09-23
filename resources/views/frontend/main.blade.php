<!DOCTYPE html>
<html lang="en">

@include ('frontend.head')

<body>
<!---header--->
@include ('frontend.header')
<!---header--->
<!---content--->
@yield('content')
<!---content--->
<!---footer--->
@include('frontend.footer')
<!---footer--->
<!---footer script--->
@include('frontend.footer_script')
<!---footer script--->
</body>

</html>