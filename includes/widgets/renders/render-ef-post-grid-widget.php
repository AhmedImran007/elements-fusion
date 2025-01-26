<?php

namespace ElementsFusion\Widgets\Renders;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function render_ef_post_grid_widget( $settings ) {
    $query_args = [
        'post_type'      => $settings['post_type'],
        'posts_per_page' => $settings['posts_per_page'],
        'order'          => $settings['order'],
        'orderby'        => $settings['orderby'],
    ];

    if ( !empty( $settings['category'] ) ) {
        $query_args['cat'] = implode( ',', $settings['category'] );
    }

    $query = new \WP_Query( $query_args );

    if ( $query->have_posts() ) {
        $hover_effect = $settings['hover_effect'];
        ?>

<div class="ef-post-grid">
  <?php
while ( $query->have_posts() ):
            $query->the_post();
            ?>
  <div class="ef-post-grid-item <?php echo esc_attr( $hover_effect ); ?>">
    <div class="ef-post-thumbnail">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'medium' ); ?>
      </a>
    </div>
    <div class="ef-post-title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
  </div>
  <?php
endwhile;
        wp_reset_postdata();
        ?>
</div>

<?php
} else {
        echo '<p>' . __( 'No posts found.', 'elements-fusion' ) . '</p>';
    }
}