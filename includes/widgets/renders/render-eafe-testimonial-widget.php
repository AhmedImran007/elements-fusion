<?php

namespace EazyAddonsForElementor\Widgets\Renders;

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Render function for EAFE_Testimonial_Widget
 *
 * @param array $settings The widget settings passed from the main widget class.
 */
function render_eafe_testimonial_widget( $settings ) {
    // Ensure all required settings are available
    if ( empty( $settings['testimonial_name'] ) || empty( $settings['testimonial_text'] ) ) {
        return; // Exit if key settings are missing
    }

    $image_url = !empty( $settings['testimonial_image']['url'] )
    ? $settings['testimonial_image']['url']
    : \Elementor\Utils::get_placeholder_image_src();

    echo '<div class="eafe-testimonial">';

    // Render Image
    echo '<div class="eafe-testimonial-image">';
    echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $settings['testimonial_name'] ) . '">'; // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
    echo '</div>';

    // Render Testimonial Content
    echo '<div class="eafe-testimonial-content">';
    echo '<h4 class="eafe-testimonial-name">' . esc_html( $settings['testimonial_name'] ) . '</h4>';

    if ( !empty( $settings['testimonial_designation'] ) ) {
        echo '<p class="eafe-testimonial-designation">' . esc_html( $settings['testimonial_designation'] ) . '</p>';
    }

    echo '<p class="eafe-testimonial-text">' . esc_html( $settings['testimonial_text'] ) . '</p>';
    echo '</div>';

    echo '</div>';
}