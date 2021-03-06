<?php 

/**
 * bizprime Theme Customizer.
 *
 * @package bizprime
 */

//customizer core option
require get_template_directory() . '/inc/customizer/core/customizer-core.php';

//customizer 
require get_template_directory() . '/inc/customizer/core/default.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bizprime_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/core/control.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/core/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/core/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Load customize option.
	require get_template_directory() . '/inc/customizer/option-panel.php';
	
	/*theme option panel details*/
	require get_template_directory() . '/inc/customizer/theme-option.php';

}
add_action( 'customize_register', 'bizprime_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function bizprime_customize_preview_js() {

	wp_enqueue_script( 'bizprime_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'bizprime_customize_preview_js' );
