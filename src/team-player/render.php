<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

	$args = array(
        'post_type' => 'fritz-player', // Your custom post type
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
			<div class="fritz_team grid">
				<?php

				 while ($query->have_posts()) {
				 	$query->the_post();
				 	$post_id = get_the_ID();
					$name = get_the_title($post_id);
					$position = get_post_meta($post_id, 'position', true);
					$nr = get_post_meta($post_id, 'nr', true);
					$nationalitaet = get_post_meta($post_id, 'nationalitaet', true);
					$geburtsdatum = get_post_meta($post_id, 'geburtsdatum', true);
					$groesse = get_post_meta($post_id, 'groesse', true);
					$gewicht = get_post_meta($post_id, 'gewicht', true);
					$geburtsort = get_post_meta($post_id, 'geburtsort', true);
					$bisher = get_post_meta($post_id, 'bisher', true);
					$lieblingsverein = get_post_meta($post_id, 'lieblingsverein', true);
					$traum = get_post_meta($post_id, 'traum', true);
					$sponsoren = get_post_meta($post_id, 'sponsoren', true);
					$isStaff = get_post_meta($post_id, 'is-staff', true);
					if(!$isStaff) {
						?>
						<div class="fritz_player_item">
							here
						</div>
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
