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
                                            if (has_post_thumbnail()) {
                                                $thumbnails_url = get_the_post_thumbnail_url(null, "large");
                                                //  echo '<a href="'.$thumbnails_url.'" data-featherlight="image">';
                                                // printf('<a href="%s" data-featherlight="image">',$thumbnails_url);
                                                echo '<a class="popup" href="#" data-featherlight="image">';
                                                the_post_thumbnail("large", array('class' => 'img-fluid'));
                                                echo '</a>';

                                               
                                            }

                                            ?>
                                        </p>



                                        <p class="text-center">
                                            <?php

                                            the_content();
                                            wp_link_pages();
                                            // next_post_link();
                                            // echo "<br/>";
                                            // previous_post_link();
                                            ?>
                                        </p>
                                    </div>
                                </div>
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