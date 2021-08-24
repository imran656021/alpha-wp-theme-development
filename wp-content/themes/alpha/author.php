<?php get_header() ?>

<body <?php body_class() ?>>
    <?php get_template_part("/template-part/common/hero") ?>
    <div class="posts">
        <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="authorImage">
                    <img class="author-avater" src="<?php echo get_template_directory_uri()."/screenshot.jpg"?>" alt="">
                </div>
            </div>
            <div class="col-md-6 offset-md-2">
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
        <?php
        while (have_posts()) {
            the_post();
        ?>
            <h2 class="ml-4"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
        <?php
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