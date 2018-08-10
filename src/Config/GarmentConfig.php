<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

class GarmentConfig implements GarmentConfigInterface {
	/**
	 * @var int
	 */
	protected $garmentPrice;

	public function __construct(int $garmentPrice) {
		$this->garmentPrice = $garmentPrice;
	}

	/**
	 * Returns the garment price in the smallest denominator of your currency
	 *
	 * @return int
	 */
	public function getPrice(): int {
		return $this->garmentPrice;
	}

	/**
	 * Sets the garment price in the smalles denominator of your currency
	 *
	 * @param int $garmentPrice
	 *
	 * @return GarmentConfigInterface
	 */
	public function setPrice(int $garmentPrice): GarmentConfigInterface {
		$this->garmentPrice = $garmentPrice;

		return $this;
	}
}
