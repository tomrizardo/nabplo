<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="{{ config('app.name', 'Parañaque SAP') }}" name="description" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parañaque SAP') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo/favicon-32x32.png') }}">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/users/dashboard.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <main class="wrapper">
        <div id="sidenav-blocker"></div>
        <div id="right-sidenav-holder2" class="sidenav-holder shadow-sm border-left">
            <div class="content">
        
                <div class="sidenav-user-bx mt-2 mb-4">
                    <img src="{{ url('img/profile-def.png') }}" class="rounded-circle align-middle d-inline-block img-thumbnail" alt="Profile">
                    <div class="user-bx-btns">
                        <span>Jhong Bato</span><br>
                        <!-- <a href="" class="disabled">Profile</a><i>&#9679</i> -->
                        <a href="" onclick="event.preventDefault();document.getElementById('logout-app').submit();">Sign Out</a>
                    </div>
                </div>
                <hr class="mb-0">
                <ul class="list-unstyled sidenav-menus">
                    <li class="">
                        <a href="#!"><i class="mr-2"></i>HOME</a>
                    </li>
                </ul>
                
                
            </div>
        </div>
        <div class="header-nav">
            <!-- fixed-top -->
            <nav class="navbar navbar-app fixed-top shadow-sm navbar-expand-lg ">
                <div class="container">
                    <a class="navbar-brand text-truncate" href="#">
                        <img src="{{ url('img/logo/web-city-sm.png') }}" class="d-inline-block align-top mr-2" width="30" height="30" alt="">
                        {{ config('app.name') }}
                    </a>
        
                    <button class="navbar-toggler navbar-dark" type="button" id="sidenav-toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="ms-auto">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a href="#!" class="nav-link"><i class="fas fa-home"></i>HOME</a>
                            </li>
                        </ul>

                    </div>
                    <div class="form-inline dropdown d-none d-lg-block">
                        <a href="#" class="ms-3" role="button" id="drop-user-menu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                            <img src="{{ url('img/profile-def.png') }}" class="rounded-circle align-middle" alt="Profile" >
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="drop-user-menu">
                            <span class="dropdown-item-text py-2">John Bato</span>
                            <a class="dropdown-item text-muted border-top" href="#"><i class="far fa-id-card me-3"></i>Profile</a>
                            <a class="dropdown-item text-muted" href="#" onclick="event.preventDefault();document.getElementById('logout-app').submit();"><i class="fas fa-sign-out-alt me-3"></i>Sign Out</a>
                            <form id="logout-app" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
        (function() {
            document.getElementById('sidenav-toggle').addEventListener('click', function(e) {
                document.querySelector('.sidenav-holder').classList.toggle('active');
                document.querySelector('#sidenav-blocker').classList.toggle('active');
            });

            document.getElementById('sidenav-blocker').addEventListener('click', function(e) {
                document.querySelector('.sidenav-holder').classList.toggle('active');
                this.classList.toggle('active');
            });

        })()
    </script>
</body>

</html>