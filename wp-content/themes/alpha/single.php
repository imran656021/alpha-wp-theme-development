<?php
get_header();

$alpha_layout_class = "col-md-8";
$alpha_center_class = '';
if (is_active_sidebar('right-sidebar-1')) {
    $alpha_layout_class = "col-md-8";
} else {
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_center_class = "text-center";
}
?>

<body <?php body_class(array('first-class', 'second-class')); ?>>
    <?php get_template_part("/template-part/common/hero") ?>
    <div class="container">
        <div class="row">

            <div class="<?php echo $alpha_layout_class; ?>">
                <div class="posts">
                    <?php
                    while (have_posts()) {
                        the_post();
                    ?>
                        <div <?php post_class() ?> class="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="slider">
                                            <?php
                                            if (class_exists('Attachments')) {
                                                $attachments = new Attachments('slider');
                                                if ($attachments->exist()) {
                                                    while ($attachment = $attachments->get()) {
                                            ?>
                                                        <div>
                                                            <?php echo $attachments->image('large'); ?>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_center_class ?>"> <?php the_title() ?><h2>
                                                <p class="<?php echo $alpha_center_class ?>">
                                                    <strong><?php the_author_posts_link() ?></strong><br />
                                                    <?php echo get_the_date() ?>
                                                </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            <?php
                                            if (!class_exists('Attachments')) {
                                                if (has_post_thumbnail()) {
                                                    $thumbnails_url = get_the_post_thumbnail_url(null, "large");
                                                    //  echo '<a href="'.$thumbnails_url.'" data-featherlight="image">';
                                                    // printf('<a href="%s" data-featherlight="image">',$thumbnails_url);
                                                    echo '<a class="popup" href="#" data-featherlight="image">';
                                                    the_post_thumbnail("large", array('class' => 'img-fluid'));
                                                    echo '</a>';
                                                }
                                            } else {
                                                if (!$attachments->exist()) {
                                                    if (has_post_thumbnail()) {
                                                        $thumbnails_url = get_the_post_thumbnail_url(null, "large");
                                                        //  echo '<a href="'.$thumbnails_url.'" data-featherlight="image">';
                                                        // printf('<a href="%s" data-featherlight="image">',$thumbnails_url);
                                                        echo '<a class="popup" href="#" data-featherlight="image">';
                                                        the_post_thumbnail("large", array('class' => 'img-fluid'));
                                                        echo '</a>';
                                                    }
                                                }
                                            }


                                            ?>
                                        </p>



                                        <p class="text-center">
                                            <?php

                                            the_content();

                                            if (get_post_format() == 'image' && function_exists('the_field')) {
                                                $camera_model = get_post_meta(get_the_ID(), 'camera_name', true);
                                            ?>
                                        <div class="metainfo">
                                            <strong>Camera Model: <?php echo esc_html($camera_model); ?></strong><br>
                                            <strong>
                                                Location:
                                                <?php
                                                $alpha_camera_location =  get_field('location');
                                                echo $alpha_camera_location;
                                                ?>
                                            </strong><br>
                                            <strong>Date : <?php the_field('date') ?></strong><br>

                                            <?php if (get_field('licensed')) : ?>
                                                <?php echo apply_filters('the_content', get_field('licence_information')) ?>
                                            <?php endif; ?>
                                            <p>
                                                <?php
                                                $alpha_random_image = get_field('image');
                                                $image_url = esc_url(wp_get_attachment_image_src($alpha_random_image, 'alpha-square')[0]);
                                                echo "<img src='" . $image_url . "'/>";
                                                ?>
                                            </p>
                                            <br>
                                            <p>
                                                <?php
                                                $file = get_field('attach_file');
                                                if ($file) {
                                                    $file_url = wp_get_attachment_url($file);
                                                    $file_thum = get_field('thumbnail', $file);
                                                    if ($file_thum) {
                                                        $file_thum_details =  wp_get_attachment_image_src($file_thum);
                                                        echo "<a target='_blank' href='{$file_url}'><img src='" . $file_thum_details[0] . "'/></a>";
                                                    } else {
                                                        echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                                    }
                                                }
                                                ?>
                                            </p>

                                            <?php if (function_exists('the_field')) : ?>
                                                <div class="related-post">
                                                    <h1><?php _e('Related Posts', 'alpha'); ?></h1>
                                                    <?php
                                                    $related_posts = get_field('related_posts');
                                                    $alpha_rp = new WP_Query(array(
                                                        'post__in' => $related_posts,
                                                        'orderby' => 'post__in',
                                                    ));

                                                    while ($alpha_rp->have_posts()) {
                                                        $alpha_rp->the_post();
                                                    ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <h3><?php the_title(); ?></h3>
                                                        </a>
                                                    <?php
                                                    }
                                                    wp_reset_query();

                                                    ?>
                                                </div>

                                            <?php endif ?>


                                        </div>
                                    <?php
                                            }


                                            // ====cmb2 codes are goes there
                                            if (get_post_format() == 'image' && class_exists('CMB2')) {
                                                $alpha_camera_model = get_post_meta(get_the_ID(), '_alpha_camera_model', true);
                                                $alpha_location = get_post_meta(get_the_ID(), '_alpha_location', true);
                                                $alpha_date = get_post_meta(get_the_ID(), '_alpha_date', true);
                                                $alpha_licensed = get_post_meta(get_the_ID(), '_alpha_licensed', true);
                                                $alpha_license_information = get_post_meta(get_the_ID(), '_alpha_license_information', true);
                                    ?>
                                        <div class="metainfo">
                                            <strong>Camera Model: <?php echo esc_html($alpha_camera_model); ?></strong><br>
                                            <strong>
                                                Location:
                                                <?php echo esc_html($alpha_location); ?>
                                            </strong><br>
                                            <strong>Date : <?php echo esc_html($alpha_date) ?></strong><br>

                                            <?php if ($alpha_licensed) : ?>
                                                <?php echo apply_filters('the_content', $alpha_license_information) ?>
                                            <?php endif; ?>
                
                                            <br>
                                            <p>
                                                <?php
                                                $alpha_random_image = get_post_meta(get_the_ID(),'_alpha_image_id', true);
                                                $image_url = esc_url(wp_get_attachment_image_src($alpha_random_image, 'alpha-square')[0]);
                                                echo "<img src='" . $image_url . "'/>";
                                                ?>
                                            </p>
                                            <p>
                                                <?php 
                                                    $alpha_pdf_file = get_post_meta(get_the_ID(), "_alpha_upload_resume", true);
                                                    echo esc_url($alpha_pdf_file);
                                                ?>
                                            </p>

                                
                                        </div>
                                    <?php
                                            }


                                            wp_link_pages();
                                            // next_post_link();
                                            // echo "<br/>";
                                            // previous_post_link();
                                    ?>
                                    </p>
                                    </div>
                                </div>
                                <?php if (!post_password_required()) : ?>
                                    <div class="row">
                                        <dov class="col-md-12">
                                            <?php comments_template() ?>
                                        </dov>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="authorImage">
                                            <?php
                                            the_post_thumbnail('small', array('class' => 'author-avater'));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <h4>
                                            <?php
                                            echo get_the_author_meta('display_name');
                                            ?>
                                        </h4>
                                        <p>
                                            <?php echo get_the_author_meta('description'); ?>
                                        </p>
                                        <?php if (function_exists("the_field")) : ?>
                                            <p>
                                                Facebook: <?php the_field('facebook', 'user_' . get_the_author_meta('ID')); ?><br>
                                                Facebook: <?php the_field('twitter', 'user_' . get_the_author_meta('ID')); ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }

                    ?>
                </div>
            </div>
            <?php if (is_active_sidebar('right-sidebar-1')) : ?>
                <div class="col-md-4">
                    <?php
                    if (is_active_sidebar("right-sidebar-1")) {
                        dynamic_sidebar('right-sidebar-1');
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_footer() ?>