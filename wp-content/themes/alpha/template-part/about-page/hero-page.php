
<div class="header page-header" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="tagline text-center"><?php bloginfo("description") ?></h3>
                    <h1 class="align-self-center display-1 text-center heading font-weight-bold"><a class="head-title text-danger" href=" <?php echo get_bloginfo("home")?> "><?php bloginfo("name") ?></a></h1>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="menu">
                        <?php 
                            wp_nav_menu(array(
                                "theme_location" => "alpha-topmenu",
                                "menu_class" => "d-flex justify-content-center list-unstyled "
                            ));
                        
                        ?>
                    </div>
            </div>
        </div>
    </div>