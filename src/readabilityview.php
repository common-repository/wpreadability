<?php
declare( strict_types = 1 );



namespace kdaviesnz\readability;

/**
 * Class ReadabilityView
 *
 * @package kdaviesnz\readability
 */
class ReadabilityView implements IReadabilityView
{

	/**
	 * Code to filter post content.
	 *
	 * @return Callable
	 */
	public static function filterPost() :Callable {
		return function( $content ) {
			return $content;
		};
	}

	public static function addPostsTableColumnHeader() :Callable {
        return function( array $defaults ) {
            $defaults["Readability column"] = "Reading level";
            return $defaults;
        };
    }

    public static function addPostsTableColumnContent() :Callable {
        return function( string $column_name, int $post_ID ) {
            if ( "Readability column" == $column_name ) {
                $post = get_post( $post_ID );
                $fc = new \kdaviesnz\fleschkincaid\FleschKincaid( $post->post_content );
                $data = json_decode( $fc->data );
                echo $data->school_level;
            }
        };
    }

    /**
     * Render meta boxes.
     *
     * @return bool
     */
    public static function renderMetaboxes() :Callable {
        return function ( $post ) {
            $fc = new \kdaviesnz\fleschkincaid\FleschKincaid( $post->post_content );
            $data = json_decode( $fc->data );
            _e(
                '<p>' . $data->school_level . '.</p><p>' . $data->reading_ease_description . '</p>',
                'template'
            );
        };
    }
}
