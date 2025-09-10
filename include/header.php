<?php
	$page = 0;
    // if (isset($_SESSION['msg'])) {
    //     echo $_SESSION['msg'];
    //     unset($_SESSION['msg']);
    // }
    echo'
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>'.TITLE_HEADER.'</title>
        <link href="'.SITE_URL.'assets/images/favicon.png" rel="icon">

        <!-- meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="irstheme">
        <!-- links tags -->

        <link href="'.SITE_URL.'assets/css/themify-icons.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/flaticon.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/animate.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/owl.carousel.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/owl.theme.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/slick.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/slick-theme.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/swiper.min.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/owl.transitions.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/jquery.fancybox.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/style.css" rel="stylesheet">
        <link href="'.SITE_URL.'assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- PNOTIFY NOTIFICATIONS CSS -->
        <link rel="stylesheet" href="assets/vendor/pnotify/pnotify.custom.css" />
        
        <!-- JQUERY LIBS -->
        <script src="assets/vendor/jquery/jquery.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <style>
            .line-clamp {
                display: -webkit-box;
                -webkit-line-clamp: 5;
                -webkit-box-orient: vertical;  
                overflow: hidden;
            }
            .theme-btn-s7 {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 12px 28px;
                background: linear-gradient(135deg, #ff5f6d, #ffc371);
                color: #fff;
                font-weight: 600;
                font-size: 16px;
                text-decoration: none;
                border-radius: 50px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.15);
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            /* Shine effect */
            .theme-btn-s7::before {
                content: "";
                position: absolute;
                top: 0;
                left: -75px;
                width: 50px;
                height: 100%;
                background: rgba(255, 255, 255, 0.5);
                transform: skewX(-25deg);
                transition: 0.5s;
            }

            /* Hover animation */
            .theme-btn-s7:hover {
                transform: scale(1.05);
                box-shadow: 0 6px 20px rgba(0,0,0,0.25);
            }

            /* Shine moves across */
            .theme-btn-s7:hover::before {
                left: 120%;
            }

            /* Icon animation */
            .theme-btn-s7 i {
                transition: transform 0.3s ease;
            }

            .theme-btn-s7:hover i {
                transform: translateX(5px);
            }

        </style>
    </head>';
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {	
            <?php 
            if(isset($_SESSION['msg'])) { 
                    echo 'new PNotify({
                            title	: "'.$_SESSION['msg']['title'].'"	,
                            text	: "'.$_SESSION['msg']['text'].'"	,
                            type	: "'.$_SESSION['msg']['type'].'"	,
                            hide	: true	,
                            buttons: {
                                closer	: true	,
                                sticker	: false
                            }
                        });';
                unset($_SESSION['msg']);
            }
            ?>
        });
    </script>
    <?php
    echo'
    <body data-sidebar="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    <div id="layout-wrapper">';
    include_once ("top_navi.php");
    echo'
    <div class="page-wrapper">';
    //include("include/loading_ani.php");
?>