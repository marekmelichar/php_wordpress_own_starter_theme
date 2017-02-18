<?php

define( 'THEME_DIRECTORY', get_template_directory() );

/**
 * Theme Support and Site Settings
 */
require_once THEME_DIRECTORY . '/inc/site-settings.php';

/**
 * Register Sidebars
 */
require_once THEME_DIRECTORY . '/inc/sidebars-widgets.php';

/**
 * Shortcodes
 */
require_once THEME_DIRECTORY . '/inc/shortcodes.php';

/**
 * Scripts and Styles
 */
require_once THEME_DIRECTORY . '/inc/enqueue-scripts.php';

/**
 * Cleanup WordPress and Reorder menus
 */
require_once THEME_DIRECTORY . '/inc/cleanup-reorder.php';

/**
 * Customizer
 */
require_once THEME_DIRECTORY . '/inc/customizer.php';

/**
 * Theme Options Page
 */
require_once THEME_DIRECTORY . '/inc/theme-options-page.php';



if ( ! function_exists( 'log_me' ) ) :
	/**
	 * Simple error logging
	 *
	 * @param $message
	 * @return bool
	 */
	function log_me( $message )
	{
		if ( true !== WP_DEBUG ) return false;

		if ( is_array($message) || is_object($message) ) {
			return error_log( json_encode($message) );
		}

		return error_log( $message );
	}

endif;


if ( ! function_exists( 'extend_array' ) ) :

	/**
	 * jQuery style array extend
	 *
	 * @return array
	 */
	function extend_array()
	{
		$args     = func_get_args();
		$extended = array();

		if ( is_array( $args ) && count( $args ) )
		{
			foreach ( $args as $array )
			{
				if ( ! is_array( $array ) )	continue;
				$extended = array_merge( $extended, $array );
			}
		}

		return $extended;
	}

endif;
