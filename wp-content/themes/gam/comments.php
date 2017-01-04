<?php
/**
 *  The Template part for displaying comments.
 *  @package Game and Movie
 *  @since 1.0
 *  Template Part: Comments
 */

if (post_password_required()) {
  return;
}

if (have_comments()) :
  ?>
<div class='comments'>
  <h2>
    <?php
    printf(
      _nx('One comment', '%1$s comments', get_comments_number(), 'comments title', 'gam'),
      number_format_i18n(get_comments_number())
    );
    ?>
  </h2>
  <?php
  wp_list_comments( array(
    'style' => 'ol'
  ));
  ?>
</div>
<?php
comment_form();
elseif (!have_comments() && comments_open()) :
  ?>
<div class='comments'>
  <?php
  $aria_req = 'required';
  $fields = array(
    'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',
    'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>'
  );
  $args = array(
    'fields' => apply_filters('comment_form_custom_fields', $fields),
    'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.' ) . __( 'All Fields Are Required' ) .
    '</p>',
    'title_reply' => 'Reply',
    'title_reply_to' => 'Reply'
  );
  comment_form($args); ?>
</div>
  <?php
else :
  ?>
  <h2>Comments are Closed :(</h2>
  <?php
endif;
?>
