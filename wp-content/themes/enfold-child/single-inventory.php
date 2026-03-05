<?php
	global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();

	$title  = get_the_title(); //default blog title
	$t_link = home_url('/');
	$t_sub = "";

	if(avia_get_option('frontpage') && $new = avia_get_option('blogpage'))
	{
		$title 	= get_the_title($new); //if the blog is attached to a page use this title
		$t_link = get_permalink($new);
		$t_sub =  avia_post_meta($new, 'subtitle');
	}

	if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title(array('heading'=>'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub));

?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container template-blog template-single-blog '>

				<main class='content units <?php avia_layout_class( 'content' ); ?> <?php echo avia_blog_class_string(); ?>' <?php avia_markup_helper(array('context' => 'content','post_type'=>'post'));?>>


				<div class="flex_column av_one_half first"><center><?php  the_post_thumbnail('large' ) ; ?></center></div>
				<div class="flex_column av_one_half">
					
					<h4 class="fLeft">Model </h4> <p class="cTxt"><?php the_title(); ?></p>
					<h4 class="fLeft">Short Description </h4> <p class="cTxt"><?php echo get_field('short_description'); ?></p>
					<h4 class="fLeft">Price </h4><p class="cTxt"> <?php echo (get_field('price')) ? "".get_field('price') : "Price Not Available"; ?></p>
					<h4 class="fLeft">Availability </h4> <p class="cTxt"><?php echo get_field('availabity'); ?></p>


				</div>

				<div style="margin-top:30px;" class="flex_column av_one_full first">

				<?php

				echo get_field('about_inventory');

				echo do_shortcode("[av_hr class='short' height='50' shadow='no-shadow' position='center' custom_border='av-border-thin' custom_width='50px' custom_border_color='' custom_margin_top='30px' custom_margin_bottom='30px' icon_select='yes' custom_icon_color='' icon='ue808' font='entypo-fontello']");

				echo "<h2>Contact us for more details</h2>".do_shortcode('[contact-form-7 id="3635" title="Contact form 1"]');
				


				?>

				</div>

                

				<!--end content-->
				</main>

				

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->


<?php get_footer(); ?>