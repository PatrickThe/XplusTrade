<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="bootstrap default admin template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | xplus-trade</title>


    <!-- Start global css -->
    <link rel="stylesheet" href="../assets/global/plugins/Waves/dist/waves.min.css"/>
    <link rel="stylesheet" href="../assets/global/plugins/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/icons_fonts/font-awesome/css/font-awesome.min.css"/>
    <!-- End global css -->

    <!-- Start page plugin css -->
    <link rel="stylesheet" href="../assets/global/plugins/jqvmap/dist/jqvmap.css"/>
    <!-- End page plugin css -->

    <!-- Start template global css -->
    <link href="../assets/global/css/components.min.css" type="text/css" rel="stylesheet"/>
    <!-- End template global css -->

    <!-- Start layout css -->
    <link rel="stylesheet" href="../assets/layouts/layouts_left_menu/left_menu_layout.min.css"/>
    <!-- End layout css -->

    <!-- Start favicon ico -->
    <link rel="icon" href="../assets/favicon/prince.ico" type="image/x-icon"/>
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/prince-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/prince-180x180.png">
    <!-- End favicon ico -->

</head>
<body class="nav-medium">
<div class="container body">
    <div class="main_container">
            <!-- Start Loader -->
<div class="page-loader">
    <div class="preloader loading">
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
        <span class="slice"></span>
    </div>
</div>
<!-- End Loader -->

<!-- Start Scroll Top -->
<a href="javascript:" id="scroll" style="display: none;"><span></span></a>
<!-- End Scroll Top -->

<!-- start Left Menu-->
<div class="col-md-3 left_color">
    <div class="left_color scroll-view">
        <div class="navbar nav_title">
            <a href="index.html" class="medium-logo">
                <img src="../assets/global/images/prince_logo.png" alt="medium-logo">
            </a>
            <a href="index.html" class="small-logo">
                <img src="../assets/global/images/prince_logo2.png" alt="small-logo">
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General User</h3>
                <ul class="nav side-menu">
                    <li><a class="waves-effect waves-light" href="index.html"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a class="waves-effect waves-light"><i class="fa fa-desktop"></i>My Shares <span
                                    class="fa fa-chevron-right"></span></a>
                        <ul class="nav child_menu">
                            <li> <a class="waves-effect waves-light" href="accordions.html">Buy shares</a></li>
                            <li> <a class="waves-effect waves-light" href="buttons.html">Pay for Shares</a></li>
                            <li> <a class="waves-effect waves-light" href="dropdowns.html">Sell Shares</a></li>
                            
                        </ul>
                    </li>
                    <li><a class="waves-effect waves-light"><i class="fa fa-cube"></i>My account <span
                                    class="fa fa-chevron-right"></span></a>
                        <ul class="nav child_menu">
                            <li> <a class="waves-effect waves-light" href="#">My Referrals</a></li>
                            <li> <a class="waves-effect waves-light" href="#">My Shares </a></li>
                            <li> <a class="waves-effect waves-light" href="#">My Money </a></li>
                            
                        </ul>
                    </li>
                   
                   
                    <li><a class="waves-effect waves-light"><i class="fa fa-inbox-inbox"></i> Chat <span
                                    class="fa fa-chevron-right"></span></a>
                        <ul class="nav child_menu">
                            <li><a class="waves-effect waves-light" href="#">Admin Chat</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a class="toggle-fullscreen" data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-lock" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="#">
                <span class="fa fa-power-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- End Left Menu -->

<!-- start top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                <div class="responsive-logo">
                    <a href="index.html">
                        <img src="../assets/global/images/prince_logo.png" alt="main-logo">
                    </a>
                </div>
            </div>

            <div class="topbar-right">
                <div class="nav navbar-nav navbar-right">

                    <div class="header-search right-icon">
                        <form role="search" class="search-box">
                            <input placeholder="Search..." class="form-control" type="text">
                            <a href="javascript:">
                                <i class="fa fa-search"></i>
                            </a>
                        </form>
                    </div>

                    <div class="dropdown header-notification right-icon">
                        <a href="javascript:" class="dropdown-toggle waves-effect waves-light notification-icon"
                           data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                            <span class="label label-danger">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="text-center">
                                <p class="notification-title">Notification<span
                                            class="label label-primary">4</span></p>
                            </li>
                            <li class="list-group default-scroll">
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../assets/global/images/user1.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Domance Den</span> posted a photo on
                                                your wall.</h5>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../../assets/global/images/user2.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Wikko Menta</span> commented on your
                                                last video.</h5>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../../assets/global/images/user3.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Jonny Sem</span> posted 4 comments
                                                on your photo.</h5>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../../assets/global/images/user4.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Doli Senga</span> posted a photo on
                                                your wall.</h5>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../../assets/global/images/user5.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Bhura Kenta</span> commented on your
                                                last video.</h5>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:;" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img src="../../assets/global/images/user6.jpg" alt="user">
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><span>Jolly Baby</span> posted 2 comments
                                                on your photo.</h5>
                                        </div>
                                    </div>
                                </a>

                            </li>
                            <li class="all-notification">
                                <a href="javascript:;" class="list-group-item text-right">
                                    <small>See all notifications</small>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="header-fullscreen right-icon">
                        <a href="javascript:" class="waves-effect waves-light toggle-fullscreen">
                            <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                        </a>
                    </div>

                    <!--<div class="header-chat right-icon">
                        <a href="javascript:" class="waves-effect waves-light">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                        </a>
                    </div>-->

                    <div class="dropdown user-profile right-icon">
                        <a href="javascript:" class="dropdown-toggle waves-effect waves-light"
                           data-toggle="dropdown"
                           aria-expanded="false">
                            <img src="../../assets/global/images/user10.jpg" alt="user">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:" class="waves-effect waves-light">
                                    <i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                            </li>
                            <li><a href="javascript:" class="waves-effect waves-light">
                                    <i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                            </li>
                            <li><a href="javascript:" class="waves-effect waves-light">
                                    <i class="fa fa-lock" aria-hidden="true"></i>Lock screen</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:" class="waves-effect waves-light">
                                    <i class="fa fa-power-off text-danger" aria-hidden="true"></i> Logout</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </nav>
    </div>
</div>
<div class="clearfix"></div>
<!-- End top navigation -->
   