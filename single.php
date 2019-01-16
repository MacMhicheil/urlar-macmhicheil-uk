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
                            <h3><?php the_title(); ?></h3>
                            <div style="float: left" class="text-muted"><?php the_time('j F Y'); ?>  le <?php the_author_posts_link(); ?></div>
                            <p style="text-align: right" class="text-muted">Deasaichte: <?php the_modified_date('j F Y'); ?></p>
                            <p class="text-muted"><i class="fa fa-folder"></i> Roinnean-sèorsa: <?php the_category(', '); ?></p>
                            <p style="text-align: center"><img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"></p>
                            <?php the_content(); ?>
                            <hr>
                            <p><?php the_tags('<h3><i class="fa fa-tag"></i> Tagaichean</h3>', ', '); ?></p>
                            <hr>
                            <h3><i class="fa fa-share"></i> Co-Roinneadh: <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php echo the_permalink(); ?>&hashtags=LCDTE&#44LGBTI&#44Gàidhlig&#44Gaelic&via=GeidhUK"><button type="button" class="btn btn-primary" style="background-color: #007bff  !important; border-style: none;"><i class="fa fa-twitter"></i> Twitter</button></a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>&t=#<?php the_title(); ?>"><button type="button" class="btn btn-primary" style="background-color: #007bff  !important; border-style: none;"><i class="fa fa-facebook"></i> Facebook</button></a></h3>
            				<hr>
            				<div class="navigation"><?php previous_post_link('<strong><i class="fa fa-arrow-left"></i> Nas Sìne<br/>%link</strong>'); ?></p></div>
           					<div class="navigation"><p style="text-align: right"><?php next_post_link('<strong>Nas Ùire <i class="fa fa-arrow-right"></i><br/>%link</strong>'); ?></p></div>
                            <hr>
                            <p>
                                <?php if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif; ?>
                            </p>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
