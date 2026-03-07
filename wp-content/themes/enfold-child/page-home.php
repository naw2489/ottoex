<?php

/*  Template Name: Home */
global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 if( get_post_meta(get_the_ID(), 'header', true) != 'no') echo avia_title();
	 ?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container'>

				<main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

                    <?php
                    /* Run the loop to output the posts.
                    * If you want to overload this in a child theme then include a file
                    * called loop-page.php and that will be used instead.
                    */

                    $avia_config['size'] = avia_layout_class( 'main' , false) == 'entry_without_sidebar' ? '' : 'entry_with_sidebar';
                    get_template_part( 'includes/loop', 'page' );
                    ?>

				<!--end content-->
				<ul class="inventory">

						<?php
							
							$args = array( 'post_type' => 'inventory' , 'posts_per_page' => 6,'meta_key' => 'availabity','orderby' => 'date' ,'order' => 'DESC');		
							$loop = new WP_Query( $args );
							
							if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
								$avail = get_field('availabity'); 
								?>
								<li class="vehicle av_one_third">
								
								<div class="thumb">
								<a href="<?php the_permalink(); ?>">
								
								<?php
								if($avail == 'Sold')
									{  
										echo '<div class="m_sold"></div>';
									} 
								elseif($avail == 'Sale Pending')
								 {
								 echo '<div class="m_pending"></div>';
								 }
								elseif($avail == 'Coming Soon')
								 {
								 echo '<div class="m_coming_soon"><span>COMING SOON</span></div>';
								 }
								  echo get_the_post_thumbnail();
								 ?></a>
								 
								 </div>
								 
								 <center><a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?> </h4></a></center>
								 <div class="short-description"><a href="<?php the_permalink(); ?>"><?php echo get_field('short_description'); ?></a></div>
								 <?php if($avail == 'Available')
								 { 
								  echo '<div class="priceG"><a href=';
								  the_permalink();
								  echo '>Available Now: '.get_field('price').'</a></div>';
								 } 
								  elseif($avail == 'Sold') {  echo '<div class="price"><a href=';
								 the_permalink();
								 echo '>Sold</a></div>';
								 }
								 elseif($avail == 'Sale Pending') {  echo '<div class="price pend"><a href=';
								 the_permalink();
								 echo '>Sale Pending: '.get_field('price').'</a></div>';
								 }
								 elseif($avail == 'Coming Soon') {  echo '<div class="priceCS"><a href=';
								 the_permalink();
								 echo '>Coming Soon</a></div>';
								 } ?>
								</li>

								<?php

	
							endwhile; 
							endif;
						?>
	
						</ul>


						<a href="<?php echo bloginfo('url')."/inventory"; ?>" class="inventory-btn">See Full Inventory</a>

				</main>

				<?php

				//get the sidebar
				$avia_config['currently_viewing'] = 'page';
				get_sidebar();

				?>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->



<?php get_footer(); ?>