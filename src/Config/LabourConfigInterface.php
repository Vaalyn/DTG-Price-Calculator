<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

interface LabourConfigInterface {
	/**
	 * Returns the labour cost for one hour in the smallest denominator of your currency
	 *
	 * @return int
	 */
	public function getHourlyCost(): int;

	/**
	 * Sets the hourly labour cost in the smalles denominator of your currency
	 *
	 * @param int $hourlyCost
	 *
	 * @return LabourConfigInterface
	 */
	public function setHourlyCost(int $hourlyCost): LabourConfigInterface;

	/**
	 * Returns the labour time needed for one print in full minutes
	 *
	 * @return int
	 */
	public function getLabourTimePerPrint(): int;

	/**
	 * Sets the labour time needed for one print in full minutes
	 *
	 * @param int $labourTimePerPrint
	 *
	 * @return LabourConfigInterface
	 */
	public function setLabourTimePerPrint(int $labourTimePerPrint): LabourConfigInterface;
}
