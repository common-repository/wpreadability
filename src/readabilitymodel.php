<?php
declare( strict_types = 1 );


namespace kdaviesnz\readability;


/**
 * Class ReadabilityModel
 *
 * @package kdaviesnz\readability
 */
class ReadabilityModel implements IReadabilityModel
{
	/**
	 * Code called when a post is saved.
	 *
	 * @return Callable
	 */
	public static function savePost() :Callable {
		return function( int $post_id ) {
			// Put code here to be called when a post is saved.
		};
	}
}
