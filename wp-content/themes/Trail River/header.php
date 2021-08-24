<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="./image/favicon.png" type="image/x-icon" /> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans&family=Teko:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Trail &amp; River Old</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/owl.theme.default.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/bootstrap.css">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/style.css">
    <?php wp_head(); ?>
</head>

<body>
    <section class="top-bar">
        <p>End of Season Garage Sale 40% off now - August 3rd | Select Styles <a href="#">Shop Now &raquo;</a> </p>
    </section>
    <header>
        <div class="top-header">
            <div class="main-logo">
                <a href="<?php bloginfo("home")?>">
                <img src="<?php echo get_template_directory_uri()?>/image/logo.png" alt="Trail & River" title="Trail & River">
                </a>
            </div>
            <div class="links">
                <ul>
                    <li><a href=""><i class="fa fa-search"></i>What are you looking for?</a></li>
                    <li><a href=""><i class="fa fa-gift"></i>Gift Certificates</a></li>
                    <li><a href="tel:19703722395"><i class="fa fa-phone"></i>1-970-372-2395 </a></li>
                    <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>My Account</a></li>
                    <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>


        </div>
        <div class="menu">
        <?php 
            wp_nav_menu(array(

                "theme_location" => "mainmenu"
                
        )); 
        ?>
        </div>
        
        
        <!-- <div class="menu">
            <ul>
                <li><a href="">New Product</a></li>
                <li><a href="">Activities</a></li>
                <li><a href="">Women</a></li>
                <li><a href="">Men</a></li>
                <li><a href="">Accessories</a></li>
                <li><a href="">Brand</a></li>
                <li><a href="">Sale</a></li>
            </ul>
        </div> -->

    </header>