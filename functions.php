<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

function  arch( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {

	$query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'arch' );

function mytheme_comment($comment, $args, $depth) {
	 $GLOBALS['comment'] = $comment;
	 extract($args, EXTR_SKIP);

	 if ( 'div' == $args['style'] ) {
	    $tag = 'div';
	    	 $add_below = 'comment';
		 } else {
		   $tag = 'li';
		   	$add_below = 'div-comment';
			}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
	      <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	      	  <br />
		  <?php endif; ?>

		  <div class="comment-meta commentmetadata"><time>
		       <?php
				/* translators: 1: date, 2: time */
				   		printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></time><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
							?>
							</div>

							<?php comment_text(); ?>

							<div class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</div>
							<?php if ( 'div' != $args['style'] ) : ?>
							</div>
							<?php endif; ?>
<?php
}