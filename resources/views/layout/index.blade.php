<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('asset/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('asset/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    {{-- <link href="{{asset('asset/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all"> --}}
    <link href="{{asset('asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/wow/animate.cs')}}s" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('asset/css/theme.css')}}" rel="stylesheet" media="all">

    <!-- Data Table -->
    <link href="{{asset('DataTable/css/jquery.dataTables.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('DataTable/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" media="all">

    {{-- My CSS --}}

    <link href="{{asset('asset/css/mystyle.css')}}" rel="stylesheet" media="all">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css"> -->
    
</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h2>ASKES</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
                        </li>
                        <li>
                            <a href="{{url('/dataSiswa')}}">
                                <i class="fas fa-chart-bar"></i>Data Siswa</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Data Guru</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Data Sekolah</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Data Master</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Mata Pelajaran</a>
                                </li>
                                <li>
                                    <a href="register.html">Ruangan Kelas</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Jurusan</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Jadwal Pelajaran</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Pengguna Sistem</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Wali Kelas </a>
                        </li>

                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Peserta Didik </a>
                        </li>

                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>SMS Gateway </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <h1>{{auth()->user()->role}}</h1>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                           
                        </li>
                         @if(auth()->user()->role == 'siswa')
                            <li>
                                <a href="{{url('/profile')}}">
                                    <i class="fas fa-user"></i>Profile</a>
                            </li>
                             <li>
                                <a href="{{url('/siswa/nilai')}}">
                                    <i class="fas fa-newspaper"></i>Nilai</a>
                            </li>
                         @endif

                        @if(auth()->user()->role == 'admin')
                            <li>
                                <a href="{{url('/dataSiswa')}}">
                                    <i class="fas fa-chart-bar"></i>Data Siswa</a>
                            </li>
                            <li>
                                <a href="{{url('/dataGuru')}}">
                                    <i class="fas fa-table"></i>Data Guru</a>
                            </li>
                            <li>
                                <a href="{{url('/pelajaran')}}">
                                    <i class="fas fa-book"></i>Pelajaran</a>
                            </li>
                            <li>
                                <a href="{{url('/kelas')}}">
                                    <i class="fas fa-book"></i>Daftar Kelas</a>
                            </li>
                            <li>
                                <a href="{{url('/nilai')}}">
                                    <i class="fas fa-newspaper"></i>Nilai</a>
                            </li>
                        @endif



                        
                        {{-- 
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Data Sekolah</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Data Master</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Mata Pelajaran</a>
                                </li>
                                <li>
                                    <a href="register.html">Ruangan Kelas</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Jurusan</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Jadwal Pelajaran</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Pengguna Sistem</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Wali Kelas </a>
                        </li>

                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Peserta Didik </a>
                        </li>

                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>SMS Gateway </a>
                        </li> --}}
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{auth()->user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    @if($siswa->profile == null)
                                                        <img src="{{asset('photo/user.png')}}" alt="John Doe" />
                                                    @else
                                                        <img src="{{asset('photo/user.png')}}" alt="John Doe" />
                                                    @endif
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{auth()->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{auth()->user()->email}}</span>
                                                </div>
                                            </div>
                                            
                                            @if(Auth::user()->role == 'siswa')
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="{{url('/siswa/updatePhoto')}}">
                                                            <i class="zmdi zmdi-account"></i>Update Photo Profile</a>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('/changePassword')}}">
                                                        <i class="zmdi zmdi-key"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    @yield('content1')
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
        
    </div>

   <!-- Jquery JS-->
    <script src="{{asset('asset/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('asset/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('asset/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('asset/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('asset/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('asset/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('asset/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('asset/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('asset/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('asset/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('asset/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('asset/js/main.js')}}"></script>

    <!-- Data Table -->
    <script src="{{asset('DataTable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('DataTable/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script> --}}

    <script type="text/javascript">
        $('#print').click(function() {
            var printme = document.getElementById('table');
            var wme = window.open("","","width=900,height=700");
            wme.document.write(printme.outerHTML);
            wme.document.close();
            wme.focus();
            wme.print();
            wme.close();
        });
    </script>

</body>

</html>
<!-- end document-->
