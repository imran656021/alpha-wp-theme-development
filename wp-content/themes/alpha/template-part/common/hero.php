<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                     if(current_theme_supports('custom-logo')): 

                    ?>
                        <div class="custom-logo mt-3">
                        <?php the_custom_logo() ?>
                    </div>
                    <?php endif ?>
                    
                    
                    <h3 class="tagline text-center"><?php bloginfo("description") ?></h3>
                    <h1 class="align-self-center display-1 text-center heading font-weight-bold"><a class="head-title text-danger" href=" <?php echo get_bloginfo("home")?> "><?php bloginfo("name") ?></a></h1>
                    <br>
                    <p class="text-center"><?php alpha_todays_date(); ?></p>
                    <br>
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
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php 
                    if(is_search()){
                        ?>
                            <h3>You Searched For : <?php the_search_query() ?></h3>
                        <?php
                    }
                ?>
                <?php 
                    echo get_search_form();
                ?>
            </div>
        </div>
    </div>