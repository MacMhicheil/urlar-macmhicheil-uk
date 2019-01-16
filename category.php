<?php
    /**
     * The main template file
     *
     * @package MacMhìcheil.uk
     * @since MacMhìcheil.uk 1.0
     */
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h2 style="text-align: center; text-transform: uppercase">Roinn-seòrsa: <?php single_cat_title(); ?></h2>
            </div>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="row">
                        <div class="col-md-2">
                            <a href="<?php the_permalink(); ?>"><img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"></a>
                        </div>
                        <div class="col-md-10">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p class="text-muted"><?php the_time('j F Y'); ?> le <?php the_author_posts_link(); ?></p>
                    <p><?php the_excerpt(); ?></p>
                    </div>
                    </div>
					<hr>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="navigation"><p style="text-align: center"><strong><?php posts_nav_link(' | '); ?></strong></p></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>