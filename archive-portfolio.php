<?php
/**
 * The template for displaying the portfolio overview page.
 * Template Name: Portfolio
 *
 * @author iA <ia@ia.net>
 */
get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="portfolio-tiles center">
            <?php if (have_posts()) : ?>
                <section class="portfolio-section">
					<h1 class="portfolio-default-title">
						<?php echo get_theme_mod('ia4_portfolio_headline', __('Portfolio', 'ia4')); ?>
					</h1>
                    <ul class="work-examples tiles">
                    <?php 
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', 'portfolio-teaser');
                        }
                        ia4_paging_nav(); 
                    ?>
                    </ul>
                </section>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </section>
    </main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
