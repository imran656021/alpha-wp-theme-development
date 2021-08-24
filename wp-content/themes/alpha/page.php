<?php get_header() ?>

<body <?php body_class() ?>>
    <?php get_template_part("/template-part/common/hero") ?>
    <div class="container">
        <?php 
        if(is_front_page()){
            ?>
            <div class="row">
                        <div class="col-md-8 offset-md-2">
                            
                            
                            
                                <h2 class="text-center mb-4"><?php _e('Testimonials', 'alpha') ?></h2>
                            
                            <div class="testimonials slider text-center">
                                <?php
                                if (class_exists('Attachments')) {
                                    $attachments = new Attachments('testimonials', 84);
                                    if ($attachments->exist()) {
                                        while ($attachment = $attachments->get()) {
                                ?>
                                            <div>
                                                <?php echo $attachments->image('thumbnails');  ?>
                                                <h4><?php echo $attachments->field('name'); ?></h4>
                                                <p><?php echo $attachments->field('testimonial'); ?></p>
                                                <p>
                                                    <?php echo $attachments->field('position'); ?>
                                                    <strong><?php echo $attachments->field('company'); ?></strong>
                                                </p>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
        }
        ?>
    </div>
   
            <div class="posts">
                <?php
                while (have_posts()) {
                    the_post();
                ?>
                    <div <?php post_class() ?> class="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h2 class="post-title text-center"> <?php the_title() ?><h2>
                                            <p class="text-center">
                                                <strong><?php the_author() ?></strong><br />
                                                <?php echo get_the_date() ?>
                                            </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <p>
                                        <?php
                                         if(has_post_thumbnail()){
                                             $thumbnails_url = get_the_post_thumbnail_url(null, "large");
                                            //  echo '<a href="'.$thumbnails_url.'" data-featherlight="image">';
                                            // printf('<a href="%s" data-featherlight="image">',$thumbnails_url);
                                            echo '<a class="popup" href="#" data-featherlight="image">';
                                            the_post_thumbnail("large", array('class' => 'img-fluid'));
                                            echo '</a>';
                                        }
                                         
                                         ?>
                                    </p>
                                    <p class="container" >
                                        <?php the_content() ?>
                                    </p>    
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }

                ?>
            </div>
       
        
   

    <?php get_footer() ?>

    