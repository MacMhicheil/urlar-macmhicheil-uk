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
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="text-muted"><?php the_time('j F Y'); ?> le <?php the_author_posts_link(); ?></p>
                    <p><?php the_content(); ?></p>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="navigation"><p style="text-align: center"><strong><?php posts_nav_link(' | '); ?></strong></p></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>