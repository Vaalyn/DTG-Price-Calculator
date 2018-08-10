<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

use Vaalyn\DtgPriceCalculator\Config\LabourConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\ProfitConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\GarmentConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\InkCartridgeConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\PreTreatmentTankConfigInterface;

class DtgPriceCalculator implements DtgPriceCalculatorInterface {
	protected const PRICE_PRECISION = 3;

	/**
	 * @var InkCartridgeConfigInterface
	 */
	protected $colorCartridgeConfig;

	/**
	 * @var InkCartridgeConfigInterface
	 */
	protected $whiteCartridgeConfig;

	/**
	 * @var PreTreatmentTankConfigInterface
	 */
	protected $preTreatmentTankConfig;

	/**
	 * @var LabourConfigInterface
	 */
	protected $labourConfig;

	/**
	 * @var ProfitConfigInterface
	 */
	protected $profitConfig;

	/**
	 * @param InkCartridgeConfigInterface $colorCartridgeConfig
	 * @param InkCartridgeConfigInterface $whiteCartridgeConfig
	 * @param PreTreatmentTankConfigInterface $preTreatmentTankConfig
	 * @param LabourConfigInterface $labourConfig
	 * @param ProfitConfigInterface $profitConfig
	 */
	public function __construct(
		InkCartridgeConfigInterface $colorCartridgeConfig,
		InkCartridgeConfigInterface $whiteCartridgeConfig,
		PreTreatmentTankConfigInterface $preTreatmentTankConfig,
		LabourConfigInterface $labourConfig,
		ProfitConfigInterface $profitConfig
	) {
		$this->colorCartridgeConfig   = $colorCartridgeConfig;
		$this->whiteCartridgeConfig   = $whiteCartridgeConfig;
		$this->preTreatmentTankConfig = $preTreatmentTankConfig;
		$this->labourConfig           = $labourConfig;
		$this->profitConfig           = $profitConfig;
	}

	/**
	 * @inheritDoc
	 */
	public function calculatePricePerPrint(
		GarmentConfigInterface $garmentConfig,
		float $colorInkUsage,
		float $whiteInkUsage,
		float $preTreatmentUsage,
		int $precision = self::PRICE_PRECISION
	): DtgPriceInterface {
		$inkCost          = $this->calculateInkCostPerPrint($colorInkUsage, $whiteInkUsage, $precision);
		$preTreatmentCost = $this->calculatePreTreatmentCostPerPrint($preTreatmentUsage, $precision);
		$labourCost       = $this->calculateLabourCostPerPrint($precision);
		$garmentCost      = (string) $garmentConfig->getPrice();

		$priceWithoutProfit = $this->sumCosts(
			$precision,
			$garmentCost,
			$inkCost,
			$preTreatmentCost,
			$labourCost
		);

		$profit = $this->calculateProfitPerPrint($priceWithoutProfit, $precision);

		$totalPrice = $this->sumCosts(
			$precision,
			$priceWithoutProfit,
			$profit
		);

		return new DtgPrice(
			$inkCost,
			$preTreatmentCost,
			$labourCost,
			$garmentCost,
			$priceWithoutProfit,
			$profit,
			$totalPrice
		);
	}

	/**
	 * @inheritDoc
	 */
	public function sumCosts(int $precision, string ...$costs): string {
		$totalCosts = '0';

		foreach ($costs as $cost) {
			$totalCosts = bcadd($totalCosts, $cost, $precision);
		}

		return $totalCosts;
	}

	/**
	 * @param float $colorInkUsage
	 * @param float $whiteInkUsage
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateInkCostPerPrint(
		float $colorInkUsage,
		float $whiteInkUsage,
		int $precision
	): string {
		$colorPricePerMilliliter = $this->calculateColorPricePerMilliliter($precision);
		$whitePricePerMilliliter = $this->calculateWhitePricePerMilliliter($precision);

		$colorPrice = bcmul($colorPricePerMilliliter, (string) $colorInkUsage, $precision);
		$whitePrice = bcmul($whitePricePerMilliliter, (string) $whiteInkUsage, $precision);

		return bcadd($colorPrice, $whitePrice, $precision);
	}

	/**
	 * @param float $preTreatmentUsage
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculatePreTreatmentCostPerPrint(float $preTreatmentUsage,  int $precision): string {
		$preTreatmentPricePerMilliliter = $this->calculatePreTreatmentPricePerMilliliter($precision);

		return bcmul($preTreatmentPricePerMilliliter, (string) $preTreatmentUsage, $precision);
	}

	/**
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateColorPricePerMilliliter(int $precision): string {
		return $this->calculatePricePerMilliliter(
			$this->colorCartridgeConfig->getCartridgePrice(),
			$this->colorCartridgeConfig->getCartridgeCapacity(),
			$precision
		);
	}

	/**
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateWhitePricePerMilliliter(int $precision): string {
		return $this->calculatePricePerMilliliter(
			$this->whiteCartridgeConfig->getCartridgePrice(),
			$this->whiteCartridgeConfig->getCartridgeCapacity(),
			$precision
		);
	}

	/**
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculatePreTreatmentPricePerMilliliter(int $precision): string {
		return $this->calculatePricePerMilliliter(
			$this->preTreatmentTankConfig->getTankPrice(),
			$this->preTreatmentTankConfig->getTankCapacity(),
			$precision
		);
	}

	/**
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateLabourCostPerPrint(int $precision): string {
		return bcmul(
			$this->calculateLabourCostPerMinute($precision),
			(string) $this->labourConfig->getLabourTimePerPrint(),
			$precision
		);
	}

	/**
	 * @param int $totalPrice
	 * @param int $capacity
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculatePricePerMilliliter(int $totalPrice, int $capacity, int $precision): string {
		return bcdiv(
			(string) $totalPrice,
			(string) $capacity,
			$precision
		);
	}

	/**
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateLabourCostPerMinute(int $precision): string {
		$minutesPerHour = '60';

		return bcdiv(
			(string) $this->labourConfig->getHourlyCost(),
			$minutesPerHour,
			$precision
		);
	}

	/**
	 * @param string $priceWithoutProfit
	 * @param int $precision
	 *
	 * @return string
	 */
	protected function calculateProfitPerPrint(string $priceWithoutProfit, int $precision): string {
		if (!$this->profitConfig->isPercentageValue()) {
			return (string) $this->profitConfig->getValue();
		}

		return bcmul(
			bcdiv($priceWithoutProfit, '100'),
			(string) $this->profitConfig->getValue()
		);
	}
}
