<?php
/**
 * The template used for displaying portfolio content in single-jetpack-portfolio.php.
 *
 * @author iA <ia@ia.net>
 */
?>

<?php if (ia4_get_featured_image_type() == 'full' && has_post_thumbnail() && ia4_display_featured_image_single()): ?>
    <figure class="mood mood--big">
        <img src="<?php echo ia4_get_the_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
    </figure>
<?php endif; ?>

<div class="center">
     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if (ia4_get_featured_image_type() != 'full' && has_post_thumbnail() && ia4_display_featured_image_single()): ?>
                 <figure class="mood">
                        <img src="<?php echo ia4_get_the_thumbnail_url(); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>">
                 </figure>
            <?php endif; ?>
            
            <div class="col">
                <h1 class="entry-title <?php if (has_post_thumbnail()) echo 'blog-title-mfix'; ?>">
                    <?php the_title(); ?>
                </h1>
            </div>

            <div class="col">
                <div class="entry-content page-entry-content" id="post-content">
                    <?php the_content(); ?>
                </div>
                <div class="col">
                    <?php $images = rwmb_meta( 'sg_mb_image_advanced', '', get_the_ID() ); ?>

                    <pre style="display:none">
                    <?php print_r($images); ?>
                    </pre>
                    
                    <ul class="work-examples tiles">
                        <?php foreach ($images as $i): ?>
                        <li class="tile tile-small">
                            <div class="tile-pan" style="background-image: url(<?php echo $i['full_url']; ?>);" aria-labelledby="meta project_tagline" role="img"><img src="<?php echo $i['full_url']; ?>" alt="<?php echo $i['alt']; ?>" /></div>
                        <p class="meta" id="meta"><?php echo $i['caption']; ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
     </article><!-- #post-## -->
</div> <!-- Center -->
