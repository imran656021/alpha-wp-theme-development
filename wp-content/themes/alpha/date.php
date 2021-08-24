<?php get_header() ?>
<body <?php body_class() ?> >
<?php get_template_part("/template-part/common/hero") ?>
    <div class="posts">
        <h1 class="text-center text-danger mb-4">
            The post in
            <?php
             if(is_month()) {
                 $month = get_query_var("monthnum");
                 $dateobject = DateTime::createFromFormat('!m', $month);
                 echo $dateobject->format('F');
             }else if(is_year()){
                 echo get_query_var('year');
             }else if(is_day()){
                //  echo get_query_var('day')."/". get_query_var('monthnum')."/". get_query_var('year');
                $day =esc_html(get_query_var('day'));
                $monthname =esc_html(get_query_var('monthnum'));
                $year =esc_html(get_query_var('year'));
                printf('%s/%s/%s',$day, $monthname, $year );
             }
             ?>
        </h1>
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <h2 class="ml-4"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h2>
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