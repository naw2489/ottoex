<?php
/* Template Name: Inventory Page */
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

					 <?php /*
							$args = array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'parent'                   => '',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'exclude'                  => '',
								'include'                  => '',
								'number'                   => '',
								'taxonomy'                 => 'brands',
								'pad_counts'               => false );
							$categories = get_categories($args);

							echo '<ul>';

							foreach ($categories as $category) {
							    $url = get_term_link($category);?>
							    <li><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></li>
							<?php
							}

							echo '</ul>';
						 */	
	?>
	



					<ul class="inventory">

						<?php
							

							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'inventory' , 'posts_per_page' => 21 , 'paged' => $paged);
							
							$loop = new WP_Query( $args );
							
							if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
								$avail = get_field('availabity'); 
								?>
								<li class="vehicle av_one_third">
								<a href="<?php the_permalink(); ?>">
								<div class="thumb">
								
								<?php
								if($avail == 'Sold')
									{  
										echo '<div class="sold"></div>';
									} 

								  echo get_the_post_thumbnail();
								 ?>
								 </div>
								 </a>
								 <center><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?> </h3></a></center>
								 <div class="short-description"><?php echo get_field('short_description'); ?></div>
								 <div class="price"><?php if($avail == 'Available'){ echo 'Available Now: '.get_field('price'); } else { echo 'Sold'; } ?></div>
								</li>

								<?php

	
							endwhile; 
							 wp_pagenavi( array( 'query' => $loop ) );
							endif;
						?>
	
						</ul>

					
					
						</div>
                  	
					</div>

			</main>

			</div><!--end container-->

		</div><!-- close default .container_wrap element -->



<?php get_footer(); ?>