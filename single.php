<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Unicode
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div id="single-post">

		<?php
while (have_posts()):
    the_post();
    
    get_template_part('template-parts/content', get_post_format());
endwhile; // End of the loop.
?>
    
<div class="share">
<a href="https://www.facebook.com/sharer/sharer.php?u=<?php
the_permalink();
?>" target="_blank"><div class="facebook">Share on Facebook</div></a>
    <a href="https://twitter.com/home?status=<?php
the_title();
?>%20<?php
the_permalink();
?>" target="_blank"><div class="twitter">Share on Twitter</div></a>
</div>
            
<div class="related">
<div class="title">Next up to read</div>   
           
                <?php
$tags = wp_get_post_tags($post->ID);
if ($tags) {
    $first_tag = $tags[0]->term_id;
    $args      = array(
        'tag__in' => array(
            $first_tag
        ),
        'post__not_in' => array(
            $post->ID
        ),
        'posts_per_page' => 2
    );
    $my_query  = new WP_Query($args);
    if ($my_query->have_posts()) {
        while ($my_query->have_posts()):
            $my_query->the_post();
?>
    
<div class="related-post">
<a href="<?php
            the_permalink();
?>" rel="bookmark" title="Permanent Link to <?php
            the_title_attribute();
?>"><?php
            the_title();
?></a>
<div class="des"><?php
            echo substr(get_the_excerpt(), 0, 200);
?>...</div>
</div>

<?php
        endwhile;
    }
    wp_reset_query();
} else {
?>
      
<?php
    $featured_args = array(
        'posts_per_page' => '2'
    );
    $the_query     = new WP_Query($featured_args);
?>
            <?php
    while ($the_query->have_posts()):
        $the_query->the_post();
?>
                <div class="related-post">
                <a href="<?php
        the_permalink();
?>" rel="bookmark" title="Permanent Link to <?php
        the_title_attribute();
?>"><?php
        the_title();
?></a>
                <div class="des"><?php
        echo substr(get_the_excerpt(), 0, 200);
?>...</div>
                </div>
            <?php
    endwhile;
?>
    
<?php
}
?>
</div>
                


<?php
if (get_theme_mod('email_subscribe_embed', true)) {
?>
<!--SUBSCRIBE-->
<div class="email-subscribe">
    
<?php
    if (get_theme_mod('email_subscribe_title', true)) {
?>
<div class="title">
<?php
        echo get_theme_mod('email_subscribe_title', '');
?>
</div>
<?php
    }
?>
    
<?php
    echo get_theme_mod('email_subscribe_embed', '');
?>
</div>
<?php
}
?>
        
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
