<?php
/**
 * @license GPL-2.0-or-later
 *
 * Modified by kadencewp on 09-January-2024 using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */ declare( strict_types=1 );

namespace KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Resources\Filters;

use Countable;
use FilterIterator;
use KadenceWP\KadenceStarterTemplates\StellarWP\Uplink\Resources\Service;

/**
 * @method Service current()
 */
class Service_FilterIterator extends FilterIterator implements Countable {

	/**
	 * @inheritDoc
	 */
	public function accept(): bool {
		$resource = $this->getInnerIterator()->current();

		return 'service' === $resource->get_type();
	}

	/**
	 * @inheritDoc
	 */
	public function count() : int {
		return iterator_count( $this );
	}

}
