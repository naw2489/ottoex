<?php
/* Template Name: Inventory Page */
global $avia_config;

	/*
	 * get_header is a basic wordpress function, used to retrieve the header.php file in your theme directory.
	 */
	 get_header();


 	 
	 ?>

		<div class='container_wrap container_wrap_first main_color <?php avia_layout_class( 'main' ); ?>'>

			<div class='container'>

				<main class='template-page content  <?php avia_layout_class( 'content' ); ?> units' <?php avia_markup_helper(array('context' => 'content','post_type'=>'page'));?>>

					 <?php 
							/* $args = array(
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
							$categories = get_categories($args); */

							/* echo '<ul>';

							foreach ($categories as $category) {
							    $url = get_term_link($category);?>
							    <li><a href="<?php echo $url;?>"><?php echo $category->name; ?></a></li>
							<?php
							}

							echo '</ul>';*/
						 	
	?>
	

					<ul class="inventory">

						<?php
							

						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$inventory_args = array( 'post_type' => 'inventory' , 'posts_per_page' => 21 ,'meta_key' => 'availabity','orderby' => 'date' ,'order' => 'DESC','paged' => $paged);
							
							$loop = new WP_Query( $inventory_args );
							
							if( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
								$avail = get_field('availabity');
								?>
								<li class="vehicle av_one_third">
								
								<div class="thumb"><a href="<?php the_permalink(); ?>">
								
								<?php
								if($avail == 'Sold')
									{  
										echo '<div class="m_sold"></div>';
									} 
								elseif($avail == 'Sale Pending')
								 { 
								 echo '<div class="m_pending"></div>';
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
								  ?>
								</li>

								<?php

	
							endwhile;
							wp_reset_query(); 
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