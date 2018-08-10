<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

interface ProfitConfigInterface {
	/**
	 * Returns the profit value
	 *
	 * @return int
	 */
	public function getValue(): int;

	/**
	 * Sets the profit value
	 *
	 * @param int $profitValue
	 *
	 * @return GarmentConfigInterface
	 */
	public function setValue(int $profitValue): GarmentConfigInterface;

	/**
	 * @return bool
	 */
	public function isPercentageValue(): bool;
}
