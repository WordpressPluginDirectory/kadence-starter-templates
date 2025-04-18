<?php
/**
 * @license GPL-2.0-or-later
 *
 * Modified using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare( strict_types=1 );

namespace KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Auth\Token;

use KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Auth\Token\Exceptions\InvalidTokenException;
use KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Resources\Resource;

final class Connector {

	/**
	 * @var Token_Factory
	 */
	private $token_manager_factory;

	/**
	 * @param  Token_Factory  $token_manager_factory  The Token Manager Factory.
	 */
	public function __construct( Token_Factory $token_manager_factory ) {
		$this->token_manager_factory = $token_manager_factory;
	}

	/**
	 * Store a token if the user is allowed to.
	 *
	 * @throws InvalidTokenException
	 */
	public function connect( string $token, Resource $resource ): bool {
		$token_manager = $this->token_manager_factory->make( $resource );

		if ( ! $token_manager->validate( $token ) ) {
			throw new InvalidTokenException( 'Invalid token format' );
		}

		return $token_manager->store( $token );
	}

}
