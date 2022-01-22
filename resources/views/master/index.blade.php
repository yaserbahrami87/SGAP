<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap-rtl.min.css')}}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lalezar" />
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />

    @yield('headerScript')
    <title>Hello, world!</title>
</head>
<body>
<main class="container-fluid">
    <div class="row" dir="rtl">
        @yield('content')
    </div>

</main>


<script src="{{asset('/js/jquery.slim.min.js')}}" ></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}" ></script>
@yield('footerScript')
</body>
</html>
