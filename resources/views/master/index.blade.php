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
    <style>
        body,html {
            background-image: url({{asset('/images/background.jpg')}});
            height: 100%;
        }

        #profile-img {
            height:180px;
        }
        .h-80 {
            height: 80% !important;
        }
    </style>

    @yield('headerScript')
    <title>Hello, world!</title>
</head>
<body>
<main class="container-fluid">
    <div class="row" dir="rtl">
        <div class="container h-80 pt-5">
            <div class="row align-items-center h-100">
                <div class="col-8 mx-auto">
                    <div class="text-center">
                        <img id="profile-img" class="rounded-circle profile-img-card" src="{{asset('/images/login.png')}}" />
                        <p id="profile-name" class="profile-name-card"></p>
                            @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<script src="{{asset('/js/jquery.slim.min.js')}}" ></script>
<script src="{{asset('/js/bootstrap.bundle.min.js')}}" ></script>
@yield('footerScript')
</body>
</html>
