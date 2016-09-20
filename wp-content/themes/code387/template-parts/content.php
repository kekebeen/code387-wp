<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package code387
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('fl w-100 w-50-m  w-33-ns pa2 relative flipcard mb2'); ?> >
    <div class="article__front z-1">
        <div class="aspect-ratio aspect-ratio--1x1">
            <?php
                $cover_image_id = get_field('cover');
                $thumbnail_size = "work_thumb";
                $link           = get_field('link');
                $body           = get_field('excerpt');
                $cover_image    = wp_get_attachment_image_src( $cover_image_id, $thumbnail_size);
             ?>
            <?php if ( !empty($cover_image) ): ?>
              <img src="<?php echo $cover_image[0] ?>"
              class="db bg-center cover aspect-ratio--object" />
            <?php endif ?>
        </div>
        <?php if (!empty($link) && !empty($body)): ?>
            <div class="ph2 ph0-ns pv2 link db">
              <h3 class="f5 f4-ns mb0 black-90"><?php echo the_title(); ?></h3>
            </div><!-- caption div -->
        <?php endif ?>
    </div><!-- front side of flipcard -->
    <div class="article__back absolute top-0 left-0 h-100 w-100 ba b--light-gray tc ph2 pv4 border-box">
        <h1><?php echo the_title(); ?></h1>
        <hr class="mw3 bb bw1 b--black-10">
        <div class="lh-copy measure center f6 black-70 mb3">
            <?php echo $body ?>
        </div><!-- description -->
        <a class="f6 link dim br2 ba ph3 pv2 mb2 dib mid-gray" href="http://<?php echo $link ?>" target="_blank" rel="noopener">URI</a>
    </div><!-- back side of flipcard -->
</article><!-- #post-## -->
