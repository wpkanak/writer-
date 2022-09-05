 <div class="comment-area">
        <div id="comment-response">

<div class="comments-pagination">
<?php
    wp_list_comments();
?>
    <?php
    the_comments_pagination( array(
        'screen_reader_text' => __( 'Pagination', 'writer-pro' ),
        'prev_text'          => '<' . __( 'Previous Comments', 'writer-pro' ),
        'next_text'          => '>' . __( 'Next Comments', 'writer-pro' ),
    ) );
    ?>
</div>
            <h3 class="reply-title">
               <?php _e( 'Leave a Reply','writer-pro' ); ?>
               <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
            </h3>
            <?php
            comment_form();
            ?>

        </div>
</div>