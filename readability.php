<?php
/**
Plugin Name: WPReadability
Description: Displays readability level.
Version: 1.0.0
Author: Kevin Davies
License: GPLv2 or later
 *
 * @package kdaviesnz/readability
 */

declare( strict_types = 1 );

set_time_limit( 0 );

require_once( 'vendor/davechild/textstatistics/src/DaveChild/TextStatistics/Pluralise.php' );
require_once( 'vendor/davechild/textstatistics/src/DaveChild/TextStatistics/Syllables.php' );
require_once( 'vendor/davechild/textstatistics/src/DaveChild/TextStatistics/Maths.php' );
require_once( 'vendor/davechild/textstatistics/src/DaveChild/TextStatistics/Text.php' );
require_once( 'vendor/davechild/textstatistics/src/DaveChild/TextStatistics/TextStatistics.php' );

require_once( 'vendor/kdaviesnz/readability/src/IFleschKincaid.php' );
require_once( 'vendor/kdaviesnz/readability/src/FleschKincaid.php' );


require_once( 'src/ireadability.php' );
require_once( 'src/readability.php' );
require_once( 'src/ireadabilityview.php' );
require_once( 'src/readabilityview.php' );
require_once( 'src/ireadabilitymodel.php' );
require_once( 'src/readabilitymodel.php' );

$readability = new \kdaviesnz\readability\Readability();

/*
 Note: plugins_loaded hook is fired after the Wordpress files including the user's activated plugins are loaded
but before pluggable functions and Wordpress starts executing anything. It's the earliest plugin we can use
and hence our starting point.
 */
add_action( 'plugins_loaded', $readability->onPluginsLoaded() );

register_activation_hook( __FILE__, $readability->onActivation() );

register_deactivation_hook( __FILE__, $readability->onDeactivation() );

