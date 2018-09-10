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
	 *
	 * @return DtgPriceInterface
	 */
	public function calculatePricePerPrint(
		GarmentConfigInterface $garmentConfig,
		float $colorInkUsage,
		float $whiteInkUsage,
		float $preTreatmentUsage
	): DtgPriceInterface;
}
