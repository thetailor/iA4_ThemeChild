<?php
/**
 * The template for displaying a single portfolio entry.
 *
 * @author iA <ia@ia.net>
 */
get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php 
            while (have_posts()) {
                the_post(); 
                get_template_part('template-parts/content', 'portfolio'); 
            }
        ?>
    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
