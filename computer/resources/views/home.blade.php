<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
    body {
        background-color: #fbfbfb;
    }

    .container {
        width: 100%;
        max-width: 100%;
        height: 100%;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
        }
    }

    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        container-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        container-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }
</style>

<body>
    <div class="container">
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky" style="border-right: 1px solid black; height: 95%;">
                    <div class="list-group list-group-flush mx-3 mt-4 p-2">
                        <a href="{{ route('home') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === 'home' ? 'active' : '' }}"
                            aria-current="true">
                            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span></a>
                        <a href="{{ route('product') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === 'product' ? 'active' : '' }} {{ Route::currentRouteName() === 'addProductForm' ? 'active' : '' }}">
                            <i class="fa-solid fa-cart-shopping fa-fw me-3"></i><span>Products</span></a>
                        <a href="{{ route('categories') }}"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === 'categories' ? 'active' : '' }} {{ Route::currentRouteName() === 'subCateg' ? 'active' : '' }}">
                            <i class="fa-solid fa-layer-group fa-fw me-3"></i><span>Categories</span></a>
                        <a href="#"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === '#' ? 'active' : '' }}">
                            <i class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
                        <a href="#"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === '#' ? 'active' : '' }}">
                            <i class="fas fa-chart-bar fa-fw me-3"></i><span>Orders</span></a>
                        <a href="#"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === '#' ? 'active' : '' }}">
                            <i class="fas fa-calendar fa-fw me-3"></i><span>Calendar</span></a>
                        <a href="#"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === '#' ? 'active' : '' }}">
                            <i class="fas fa-users fa-fw me-3"></i><span>Users</span></a>
                        <a href="#"
                            class="list-group-item list-group-item-action py-2 ripple {{ Route::currentRouteName() === '#' ? 'active' : '' }}">
                            <i class="fa-solid fa-cart-arrow-down fa-fw me-3"></i><span>Sales</span></a>
                    </div>
                </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light fixed-top bg-secondary bg-gradient p-1">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Brand -->
                    <a class="navbar-brand position-relative" href="#">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRocwD4uqAF2iv3qdR5VqN45H-cSr5ibEjFqSJbky_6SA&s"
                            height="30" alt="MDB Logo" loading="lazy" />
                    </a>

                    <!-- Right links -->
                    <ul class="navbar-nav ms-auto d-flex flex-row ">
                        <!-- Notification dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow text-white" href="#"
                                id="navbarDropdownMenuLink" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge rounded-pill badge-notification bg-danger ">1</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Option ssssssssssssssssssss1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Some news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another news</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Icon dropdown -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow text-white" href="#"
                                id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                <i class="united kingdom flag m-0"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="#"><i class="united kingdom flag"></i>English
                                        <i class="fa fa-check text-success ms-2"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-poland flag"></i>Polski</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-germany flag"></i>Deutsch</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-france flag"></i>Français</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-spain flag"></i>Español</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-russia flag"></i>Русский</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"><i
                                            class="flag-portugal flag"></i>Português</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Avatar -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center " href="#"
                                id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                                    class="rounded-circle" height="22" alt="Avatar" loading="lazy" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">My profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->
        <!--Main layout-->
        <main style="margin-top: 58px;height: unset;height: calc(100vh - 60px); d-flex justify-content-center"
            class="h-90 bg-white">
            {{-- <div class="container p-2 w-100 h-100 d-flex">
                <div class="container m-1 bg-danger w-30 h-25 d-flex justify-content-center">
                    <h3>Categories</h3>
                </div>
                <div class="container m-1 bg-success w-30 h-25 d-flex justify-content-center">HH</div>
                <div class="container m-1 bg-warning w-30 h-25 d-flex justify-content-center">HH</div>
                <div class="container m-1 bg-success w-30 h-25 d-flex justify-content-center">HH</div>

            </div> --}}
            @yield('content')
        </main>
        <!--Main layout-->
        <div class="content bg-dark w-100">

        </div>
    </div>
</body>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>


</html>
