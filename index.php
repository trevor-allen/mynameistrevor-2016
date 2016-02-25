<?php get_header(); ?>
    
	<div id="primary">
		<main id="main" role="main">

		<section id="section">
            
            <?php 
                $featured_args = array(
                        'posts_per_page' => '6' );
                $the_query = new WP_Query( $featured_args ); ?>
                <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                    <div class="post-homepage">
                    <div class="time"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></div>
                    <div class="featured">
                    <a href="<?php the_permalink() ?>">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="des"><?php echo substr(get_the_excerpt(), 0,250);?>...</div>
                    </a></div>
                    </div>
            <?php endwhile;?>
                
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php


get_footer();
