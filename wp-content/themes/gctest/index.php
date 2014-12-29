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
					 get_template_part( 'content', get_post_format() );

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

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

<!-- #Second loop to pull in featured images from gallery category -->
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
					 the_post_thumbnail();

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

		</div><!-- #content -->

<!-- #Third loop to pull in featured posts in 'featured' category -->
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


<div id="prevthumb"></div>
	<div id="nextthumb"></div>

	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>

	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>

	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>

	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">

			<a id="play-button"><img id="pauseplay" src="img/pause.png"/></a>

			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>

			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>

			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="img/button-tray-up.png"/></a>

			<!--Navigation-->
			<ul id="slide-list"></ul>

		</div>
	</div>



	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
