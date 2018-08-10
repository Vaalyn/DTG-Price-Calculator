<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

interface PreTreatmentTankConfigInterface {
	/**
	 * Returns the tank price in the smallest denominator of your currency
	 *
	 * @return int
	 */
	public function getTankPrice(): int;

	/**
	 * Sets the tank price in the smalles denominator of your currency
	 *
	 * @param int $tankPrice
	 *
	 * @return PreTreatmentTankConfigInterface
	 */
	public function setTankPrice(int $tankPrice): PreTreatmentTankConfigInterface;

	/**
	 * Returns the tank capacity in milliliter
	 *
	 * @return int
	 */
	public function getTankCapacity(): int;

	/**
	 * Sets the tank capacity in milliliter
	 *
	 * @param int $tankCapacity
	 *
	 * @return PreTreatmentTankConfigInterface
	 */
	public function setTankCapacity(int $tankCapacity): PreTreatmentTankConfigInterface;
}
