<?php

/**
 * Template Name: Custom Query WP Query
 */
?>
<?php get_header() ?>

<body <?php body_class() ?>>
    <?php get_template_part("/template-part/common/hero") ?>
    <div class="posts">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $posts_ids = array(210, 125, 44, 35, 24, 132, 1);
        $posts_per_page = 2;
        $_p = new WP_Query(array(
            // 'category_name' => 'clean world',
            // 'tag'           => 'special',
            // 'orderby'     => 'post__in',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            // 'tax_query' => array(
            //     'relation' => 'OR',
            //     array(
            //         'taxonomy' => 'category',
            //         'field'    => 'slug',
            //         'terms'    => array( 'clean world' ),
            //     ),
            //     array(
            //         'taxonomy' => 'post_tag',
            //         'field'    => 'slug',
            //         'terms'    => array( 'special' ),
                    
            //     ),
            // ),

            // =======all of these are category and tag query
            // =============date query start here 
            // 'monthnum' => 8,
            // 'year' => 2021,
            // 'post_status' => 'publish'

            // ==========post format audio query 
            // 'tax_query' => array(
            //         'relation' => 'OR',
            //         array(
            //             'taxonomy' => 'post_format',
            //             'field'    => 'slug',
            //             'terms'    => array( 
            //                 'post-format-audio',
            //                 'post-format-video',
            //              ),
            //              'operator' =>'NOT IN',
            //         ),
            // )

            // ;=========custom field featured post query

                // 'meta_key' => 'featured',
                // 'meta_value' => 1

            // ;=========custom field featured post query   with relation  

            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'=> 'featured',
                    'value'=> 1,
                    'compare'=> '='
                ),
                array(
                    'key'=> 'home',
                    'value'=> 1,
                    'compare'=> '='
                ),
            ),
            
        ));
        ?>
        <?php
        while ($_p->have_posts()) {
            $_p->the_post();
            
        ?>
            <h2 class="ml-4">
                <a href="<?php the_permalink() ?>">
                    <?php the_title()  ?>
                </a>
            </h2>
        <?php

        }
        wp_reset_query();

        ?>
    </div>
    <div class="row">
        
        <div class="col col-md-4"></div>
        <div class="col col-md-8">
            <?php
            echo paginate_links(array(
                'total' => $_p->max_num_pages,
                'current' => $paged,
                'prev_next' => true
            ))
            ?>
        </div>
    </div>
    <?php get_footer() ?>