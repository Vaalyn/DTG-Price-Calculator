<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

use Vaalyn\DtgPriceCalculator\Config\GarmentConfigInterface;

interface DtgPriceCalculatorInterface {
	/**
	 * @param GarmentConfigInterface $garmentConfig
	 * @param float $colorInkUsage
	 * @param float $whiteInkUsage
	 * @param float $preTreatmentUsage
	 * @param int $precision
	 *
	 * @return DtgPriceInterface
	 */
	public function calculatePricePerPrint(
		GarmentConfigInterface $garmentConfig,
		float $colorInkUsage,
		float $whiteInkUsage,
		float $preTreatmentUsage,
		int $precision = self::PRICE_PRECISION
	): DtgPriceInterface;

	/**
	 * @param int $precision
	 * @param string[] ...$costs
	 *
	 * @return string
	 */
	public function sumCosts(int $precision, string ...$costs): string;
}
