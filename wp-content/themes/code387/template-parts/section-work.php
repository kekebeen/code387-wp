<section class="mw8 center ph3-ns pt0 pv3 mt0 mb5" id="work-section">
    <div class="separator-title mb4 mb6-ns pa2 pa0-ns tc">
        <h1 class="ttu blue f2 fw5 mb2">Recent Work</h1>
        <?php get_template_part('template-parts/title-separator'); ?>
    </div><!-- separator title -->

    <div class="cf w-100 pa2-ns">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) : ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>

        <?php
        endif;
        /* Start the Loop */
        while ( have_posts() ) : the_post();

            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', get_post_format() );

        endwhile;

        the_posts_navigation();

        else :

        get_template_part( 'template-parts/content', 'none' );

    endif; ?>
    </div><!-- grid -->
</section><!-- container -->



