<?php

/**
 * Template Name: Custom Query
 */
?>
<?php get_header() ?>

<body <?php body_class() ?>>
    <?php get_template_part("/template-part/common/hero") ?>
    <div class="posts">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        // $posts_ids = array(210, 125, 44, 35, 24, 132, 1);
        $total = 9;
        $posts_per_page = 2;
        $_p = get_posts(array(
            // 'post__in'    => $posts_ids,
            'author__in'    => array(1),
            // 'order'       => 'asc',
            'orderby'     => 'post__in',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'numberposts'    => $total,
        ));
        ?>
        <?php
        foreach ($_p as $p) {
            // setup_postdata($post);
            // echo 'pre';
            // print_r($p);
            // echo '/pre';
        ?>
            <h2 class="ml-4">
                <a href="<?php esc_url($p->guid) ?>">
                    <?php echo apply_filters('the_title', $p->post_title);  ?>
                </a>
            </h2>
        <?php

        }
        // wp_reset_postdata();

        ?>
    </div>
    <div class="row">
        <div class="col col-md-4"></div>
        <div class="col col-md-8">
            <?php
            echo paginate_links(array(
                'total' => ceil($total / $posts_per_page),
            ))
            ?>
        </div>
    </div>
    <?php get_footer() ?>