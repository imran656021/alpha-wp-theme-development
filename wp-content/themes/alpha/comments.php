<div class="comments">
    <h2>
        <?php
        $alpha_cn = get_comments_number();
        if($alpha_cn == 1){
            _e('1 comments', 'alpha');
        }else{

             echo $alpha_cn.' '._e('Comments', 'alpha');
        }
          ?>
    </h2>
<?php
/** 
//Get only the approved comments
$args = array(
    'status' => 'approve',
    'post_id' => get_the_ID(),
);

// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query($args);

?>
<div class="comment">
<?php
// Comment Loop
if ($comments) {
    foreach ($comments as $comment) {
?>
        <div class="media">
            <img class="mr-3" src="..." alt="Generic placeholder image">
            <div class="media-body">
                <?php echo get_avatar($comment, 64, null, null, array(
                    'class' => 'mr-4'
                )) ?>
                <h5 class="mt-0">
                    <?php comment_author($comment) ?>
                    <?php edit_comment_link() ?>
                </h5>
                <?php comment_text($comment) ?>
            </div>
        </div>
<?php
    }
} else {
    echo 'No comments found.';
}
?>
<div class="comment-form">
    <?php comment_form() ?>
</div>
</div>
*/
?>
<div class="comments-list">
<?php
wp_list_comments();
?>
</div>
<?php

if(!comments_open()){
    _e('Comments are closed', 'alpha');
}else{
    ?>
    <div class="comment-pagination">
        <?php 
        the_comments_pagination(array(
            'screen_reader_text' => __('Pagination', 'alpha'),
            'prev_text' => '<'.__("Previous Comment", "alpha"),
            'next_text' => '>'.__("Next Comment", "alpha"),
        ));
        ?>
    </div>
    <div class="comments-form">
    <?php
    comment_form();
    ?>
    
    </div>
    <?php
}

?>
</div>
