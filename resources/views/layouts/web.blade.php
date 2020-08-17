<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','RoPi Düğün Salonu V.1')</title>
    
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('//css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    @yield('css')
</head>

<body>

<!--SOSYAL MEDYA MOBİLE-->
@include('include.web.sosyalmedya')

<!--LOGO MOBİL-->
@include('include.web.logo-navbar')

@yield('content')

<!--FOOTER-->
@include('include.web.footer')
<script src="{{asset('/js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('/assets/js/dashmix.app.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('/js/custom.js')}}"></script>
@yield('js')
</body>

</html>
