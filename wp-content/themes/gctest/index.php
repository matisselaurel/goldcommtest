<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<!-- /start contact form -->
<div class="contact-form">
<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}

            if ( is_home() ) {
//
// First loop to pull in contact form
//
//

            $args2 = array(
		"page_id" => "5",
		"ord" => "asc",
		"nopaging" => true
	);
            $wp_query2 = new WP_Query($args2);
			if ( $wp_query2->have_posts() ) :
				// Start the Loop.
				while ( $wp_query2->have_posts() ) : the_post();

					$wp_query2->the_post();
					//echo '<h1>'.get_the_title().'</h1>';
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					echo '<h1>' . get_the_title() . '</h1>';
					the_content();
					 //get_template_part( 'content', get_post_format() );

				endwhile;
				//wp_reset_post_data();
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
	}
?>

<?php wp_reset_postdata(); ?>
</div>
<!-- /end contact form -->
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">



		</div><!-- #content -->

<!-- #Second loop to pull in featured posts in 'featured' category -->
<?php
		$args4 = array(
			"ord" => "desc",
			"order_by" => "date",
			"cat" => 3,
			"posts_per_page" => -1,
		);
		$wp_query4 = new WP_Query($args4);
			if ( $wp_query4->have_posts() ) :
				// Start the Loop.
				while ( $wp_query4->have_posts() ) : the_post();

					$wp_query4->the_post();
					//echo '<h1>'.get_the_title().'</h1>';
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					 get_template_part( 'content', get_post_format() );


				endwhile;
				//wp_reset_post_data();
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			wp_reset_postdata();
		?>



<div class="container">

	<div class="main">
		<ul id="cbp-bislideshow" class="cbp-bislideshow">
<!-- #Third loop to pull in featured images from gallery category -->
		<?php
		$args3 = array(
			"ord" => "asc",
			"cat" => 2,
			"posts_per_page" => -1,
		);
		$wp_query3 = new WP_Query($args3);
			if ( $wp_query3->have_posts() ) :
				// Start the Loop.

				while ( $wp_query3->have_posts() ) : the_post();

					$wp_query3->the_post();
					//echo '<h1>'.get_the_title().'</h1>';
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					 //get_template_part( 'content', get_post_format() );
					 echo "<li>";
					 the_post_thumbnail();
					 echo "</li>";

				endwhile;

				//wp_reset_post_data();
				// Previous/next post navigation.
				twentyfourteen_paging_nav();

			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif;
			wp_reset_postdata();
		?>
		</ul>
		<div id="cbp-bicontrols" class="cbp-bicontrols">
			<span class="cbp-biprev"></span>
			<span class="cbp-bipause"></span>
			<span class="cbp-binext"></span>
		</div>
	</div>
</div>


	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.imagesloaded.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/cbpBGSlideshow.min.js"></script>
		<script>
			$(function() {
				cbpBGSlideshow.init();
			});
		</script>

		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/matisse.js"></script>
<?php
get_sidebar();
get_footer();
