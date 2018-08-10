<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

interface GarmentConfigInterface {
	/**
	 * Returns the garment price in the smallest denominator of your currency
	 *
	 * @return int
	 */
	public function getPrice(): int;

	/**
	 * Sets the garment price in the smalles denominator of your currency
	 *
	 * @param int $garmentPrice
	 *
	 * @return GarmentConfigInterface
	 */
	public function setPrice(int $garmentPrice): GarmentConfigInterface;
}
