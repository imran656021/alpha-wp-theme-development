<?php get_header() ?>
<body <?php body_class() ?> >
<?php get_template_part("/template-part/common/hero") ?>
    <div class="posts">
        <?php 
            if(!have_posts()){
                ?>
                    <h4 class="text-center text-danger mt-4 mb-4"><?php _e('No result found', 'alpha') ?></h4>
                <?php
            }
        ?>
        <?php
        while (have_posts()) {
            the_post();
            get_template_part("post-formats/content", get_post_format());
        }

        ?>

        <div class="row">
            <div class="col col-md-4"></div>
            <div class="col col-md-8">
                <?php the_posts_pagination(array(
                    'screen_reader_text' => " ",
                    'prev_text' => 'New Posts',
                    'next_text' => 'Old Posts'
                )); ?>
            </div>
        </div>



    </div>
    <?php get_footer() ?>