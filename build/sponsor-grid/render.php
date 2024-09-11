<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

	$args = array(
        'post_type' => 'fritz-sponsor', // Your custom post type
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // Taxonomy for the category
                'field'    => 'slug', // We are using the category slug
                'terms'    => $attributes['category'], // The category slug
            ),
        ),
    );
	$query = new WP_Query($args);

	if ($query->have_posts()) {
		?>
		<div <?php echo get_block_wrapper_attributes(); ?>>
			<div class="fritz_sponsoren grid">
				<?php

				 while ($query->have_posts()) {
				 	$query->the_post();
				 	$post_id = get_the_ID();
					$url = get_post_meta($post_id, 'url', true);
					if($url != "") {
						?>
						<a target="_blank" href="<?php echo $url; ?>" class="fritz_sponsoren_item">
							<?php echo get_the_post_thumbnail($post_id, 'large'); ?>
						</a>
					<?php
					}
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
		<?php
	}
?>
