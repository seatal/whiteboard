<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name ="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo e(asset('css/font-face.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/font-awesome-4.7/css/font-awesome.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/font-awesome-5/css/fontawesome-all.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/mdi-font/css/material-design-iconic-font.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo e(asset('vendor/bootstrap-4.1/bootstrap.min.css')); ?>" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo e(asset('vendor/animsition/animsition.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/wow/animate.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/css-hamburgers/hamburgers.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/slick/slick.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/select2/select2.min.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.css')); ?>" rel="stylesheet" media="all">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/magicsuggest/magicsuggest-min.css')); ?>">
    <link rel="stylesheet"k src="<?php echo e(asset('vendor/datetimepicker/css/bootstrap-datetimepicker.css')); ?>">
    <!-- Main CSS-->
    <link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet" media="all">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" media="all">
    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="White Board" />
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
                    <li>
                        <a class="js-arrow" href="<?php echo e(url('admin/dashboard')); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="chart.html">
                            <i class="fas fa-chart-bar"></i>Charts</a>
                    </li>
                    <li>
                        <a href="table.html">
                            <i class="fas fa-table"></i>Tables</a>
                    </li>
                    <li>
                        <a href="form.html">
                            <i class="far fa-check-square"></i>Forms</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                    </li>
                    <li>
                        <a href="map.html">
                            <i class="fas fa-map-marker-alt"></i>Maps</a>
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
                <img src="images/icon/logo.png" alt="WhiteBoard Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="<?php echo e($pageTitle=='Dashboard'?'active':''); ?>">
                        <a  href="<?php echo e(url('student')); ?>"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>

                    <li>
                        <a href="#whiteboard-process-modal" data-toggle="modal">
                            <i class="fas fa-book"></i>Whiteboard</a>
                    </li>
                    <li>
                        <a href="<?php echo e(url('student/practice-board')); ?>" target="_blank">
                            <i class="fas fa-book"></i>Practice Board</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                            <label for=""><?php echo e($pageTitle); ?></label>
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
                                        <img src="<?php echo e(url('storage/students-profiles-'.$user->profile_pic)); ?>" alt="<?php echo e($user->name); ?>" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><?php echo e($user->name); ?></a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="<?php echo e(url('storage/students-profiles-'.$user->profile_pic)); ?>" alt="<?php echo e($user->name); ?>" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#"><?php echo e($user->name); ?></a>
                                                </h5>
                                                <span class="email"><?php echo e($user->email); ?></span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-account"></i>Account</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-money-box"></i>Billing</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="<?php echo e(url('student/logout')); ?>">
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
        <div class="main-content">
            <div class="section__content ">
            <div class="container-fluid">
                <h3 style="margin-bottom:30px;"><span class="schedule"><?php echo e(\Carbon\Carbon::now()->format('F')); ?></span> Scheduling</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                            <span style="font-size:24px;font-weight: bold" class="text-danger" id="month-holder" data-month="<?php echo e((int) \Carbon\Carbon::now()->format('m')); ?>">
                                <?php echo e(\Carbon\Carbon::now()->format('F')); ?>

                            </span>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="btn-group">
                                    <button class="btn btn-primary js-prev-next-month" id="prev-month" data-factor="-1" data-url="<?php echo e(url('student/dashboard/get-calender')); ?>">Prev Month</button>
                                    &nbsp;
                                    <button class="btn btn-primary js-prev-next-month" id="next-month" data-factor="1" data-url="<?php echo e(url('student/dashboard/get-calender')); ?>">Next Month</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="calender-holder">
                        <?php
                            $month = date('m');
                            $endOfTheMonth = \Carbon\Carbon::now()->endOfMonth()->format('d');
                            $url = url('student/dashboard/get-schedule');
                        ?>
                        <?php echo $__env->make('student.calender',compact('endOfTheMonth','url','month','allSchedules'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
    <div class="modal" id="whiteboard-process-modal">
        <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
                <?php echo e(Form::open(['url'=>url('student/process-whiteboard-request'),'method'=>'get','class'=>'card','style'=>'margin-bottom:0'])); ?>

                <div class="card-header text-center">
                    Please Select Subject
                </div>

                <div class="card-body">
                    <?php echo e(Form::select('subject_id',[''=>'Select Subject']+$subjects,null,['class'=>'form-control','required'=>'true'])); ?>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning btn-block">Submit</button>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal" id="schedule-modal">
    <div class="modal-dialog" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">All Schedule of <span class="js-schedule-date"></span></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Jquery JS-->
<script src="<?php echo e(asset('vendor/jquery-3.2.1.min.js')); ?>"></script>

<!-- Bootstrap JS-->
<script src="<?php echo e(asset('vendor/bootstrap-4.1/popper.min.js')); ?>"></script>
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="<?php echo e(asset('vendor/bootstrap-4.1/bootstrap.min.js')); ?>"></script>
<!-- Vendor JS       -->
<script src="<?php echo e(asset('vendor/slick/slick.min.js')); ?>">
</script>
<script src="<?php echo e(asset('vendor/wow/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/animsition/animsition.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>">
</script>
<script src="<?php echo e(asset('vendor/counter-up/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/counter-up/jquery.counterup.min.js')); ?>">
</script>
<script src="<?php echo e(asset('vendor/circle-progress/circle-progress.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/chartjs/Chart.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/select2/select2.min.js')); ?>">
</script>
<script src="<?php echo e(asset('vendor/magicsuggest/magicsuggest.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<!-- Main JS-->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>
<!-- end document-->
