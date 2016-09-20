<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package code387
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fl w-100 w-50-m  w-33-ns pa2-ns'); ?> >
	<div class="aspect-ratio aspect-ratio--1x1">
	<?php
		$cover_image = get_field('cover');
		$link 		 = get_field('link');
		$body  		 = get_field('excerpt');
	 ?>
	<?php if ( !empty($cover_image) ): ?>
      <img src="<?php echo $cover_image['url']; ?>"
      class="db bg-center cover aspect-ratio--object" />
  	<?php endif ?>
    </div>
    <?php if (!empty($link) && !empty($body)): ?>
    <a href="<?php echo esc_url($link); ?>" class="ph2 ph0-ns pb3 link db">
      <h3 class="f5 f4-ns mb0 black-90"><?php echo the_title(); ?></h3>
    </a>
	<?php endif ?>
</article><!-- #post-## -->
