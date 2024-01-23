<?php
/**
 * @license GPL-2.0-or-later
 *
 * Modified by kadencewp on 17-January-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare( strict_types=1 );

namespace KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Notice;

use KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Components\Controller;

/**
 * Renders a notice.
 */
final class Notice_Controller extends Controller {

	/**
	 * The view file, without ext, relative to the root views directory.
	 */
	public const VIEW = 'admin/notice';

	/**
	 * Render a notice.
	 *
	 * @see Notice::toArray()
	 * @see src/views/admin/notice.php
	 *
	 * @param  array{type?: string, message?: string, dismissible?: bool, alt?: bool, large?: bool}  $args The notice.
	 *
	 * @return void
	 */
	public function render( array $args = [] ): void {
		$classes = [
			'notice',
			sprintf( 'notice-%s', $args['type'] ),
			$args['dismissible'] ? 'is-dismissible' : '',
			$args['alt'] ? 'notice-alt' : '',
			$args['large'] ? 'notice-large' : '',
		];

		echo $this->view->render( self::VIEW, [
			'message' => $args['message'],
			'classes' => $this->classes( $classes )
		] );
	}

}
