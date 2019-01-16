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
          <!--<div class="jumbotron jumbotron-fluid">
            <h3 style="text-align: center; text-transform: uppercase">Puist Brosnaichte</h3>
            <?php
            	$recent_posts = wp_get_recent_posts( array(
            	'numberposts' => 3,
            	'category_name' => 'gaidhlig',
            	'post_type' => 'post',
            	'post_status' => 'publish'
              ));
            	foreach( $recent_posts as $recent ){
            		echo '<br/><h5 style="text-align: center"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></h5>';
            	}
            	wp_reset_query();
            ?>
          </div>-->
            <div class="page-header">
                <h2 style="text-align: center; text-transform: uppercase">Puist-bloga Gu Lèir</h2>
            </div>
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?><div class="row">
                        <div class="col-md-3">
                            <a href="<?php the_permalink(); ?>"><img style="border:1px solid whitesmoke" class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"></a>
                        </div>
                        <div class="col-md-9">
                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p class="text-muted"><?php the_time('j F Y'); ?> le <?php the_author_posts_link(); ?></p>
                    <p><?php the_excerpt(); ?></p>
                    <p class="text-muted"><i class="fa fa-folder"></i> Roinn-sèorsa: <?php the_category(', '); ?></p>
                    <p><a href="<?php comments_link(); ?>"><button type="button" class="btn btn-primary" style="background-color: #007bff !important; border-style: none;"><i class="fa fa-comment"></i> 
                    	<?php
							$commentscount = get_comments_number();
							
							if($commentscount == 1): $commenttext = 'Bheachd'; endif;
							if($commentscount == 2): $commenttext = 'Bheachd'; endif;
							if($commentscount > 2 || $commentscount == 0): $commenttext = 'Beachdan'; endif;
							echo $commentscount.' '.$commenttext;
						?></button></a>
						 <a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>%20<?php echo the_permalink(); ?>&hashtags=LCDTE&#44LGBTI&#44Gàidhlig&#44Gaelic&via=GeidhUK"><button type="button" class="btn btn-primary" style="background-color: #007bff !important; border-style: none;"><i class="fa fa-twitter"></i> Twitter</button></a>
						 <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo the_permalink(); ?>&t=#<?php the_title(); ?>"><button type="button" class="btn btn-primary" style="background-color: #007bff !important; border-style: none;"><i class="fa fa-facebook"></i> Facebook</button></a>
					</p>
                    
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
