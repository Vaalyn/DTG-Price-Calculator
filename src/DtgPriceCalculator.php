<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

use Money\Money;
use Money\Currency;
use Vaalyn\DtgPriceCalculator\Config\LabourConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\ProfitConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\GarmentConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\InkCartridgeConfigInterface;
use Vaalyn\DtgPriceCalculator\Config\PreTreatmentTankConfigInterface;

class DtgPriceCalculator implements DtgPriceCalculatorInterface {
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
	 * @var Currency
	 */
	protected $currency;

	/**
	 * @param InkCartridgeConfigInterface $colorCartridgeConfig
	 * @param InkCartridgeConfigInterface $whiteCartridgeConfig
	 * @param PreTreatmentTankConfigInterface $preTreatmentTankConfig
	 * @param LabourConfigInterface $labourConfig
	 * @param ProfitConfigInterface $profitConfig
	 * @param string $currencyCode
	 */
	public function __construct(
		InkCartridgeConfigInterface $colorCartridgeConfig,
		InkCartridgeConfigInterface $whiteCartridgeConfig,
		PreTreatmentTankConfigInterface $preTreatmentTankConfig,
		LabourConfigInterface $labourConfig,
		ProfitConfigInterface $profitConfig,
		string $currencyCode
	) {
		$this->colorCartridgeConfig   = $colorCartridgeConfig;
		$this->whiteCartridgeConfig   = $whiteCartridgeConfig;
		$this->preTreatmentTankConfig = $preTreatmentTankConfig;
		$this->labourConfig           = $labourConfig;
		$this->profitConfig           = $profitConfig;
		$this->currency               = new Currency($currencyCode);
	}

	/**
	 * @inheritDoc
	 */
	public function calculatePricePerPrint(
		GarmentConfigInterface $garmentConfig,
		float $colorInkUsage,
		float $whiteInkUsage,
		float $preTreatmentUsage
	): DtgPriceInterface {
		$inkCost          = $this->calculateInkCostPerPrint($colorInkUsage, $whiteInkUsage);
		$preTreatmentCost = $this->calculatePreTreatmentCostPerPrint($preTreatmentUsage);
		$labourCost       = $this->calculateLabourCostPerPrint();
		$garmentCost      = new Money($garmentConfig->getPrice(), $this->currency);

		$priceWithoutProfit = $inkCost->add($preTreatmentCost)
			->add($labourCost)
			->add($garmentCost);

		$profit = $this->calculateProfitPerPrint($priceWithoutProfit);

		$totalPrice = $priceWithoutProfit->add($profit);

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
	 * @param float $colorInkUsage
	 * @param float $whiteInkUsage
	 *
	 * @return Money
	 */
	protected function calculateInkCostPerPrint(float $colorInkUsage, float $whiteInkUsage): Money {
		$colorPricePerMilliliter = $this->calculateColorPricePerMilliliter();
		$whitePricePerMilliliter = $this->calculateWhitePricePerMilliliter();

		$colorPrice = $colorPricePerMilliliter->multiply($colorInkUsage);
		$whitePrice = $whitePricePerMilliliter->multiply($whiteInkUsage);

		return $colorPrice->add($whitePrice);
	}

	/**
	 * @param float $preTreatmentUsage
	 *
	 * @return Money
	 */
	protected function calculatePreTreatmentCostPerPrint(float $preTreatmentUsage): Money {
		$preTreatmentPricePerMilliliter = $this->calculatePreTreatmentPricePerMilliliter();

		return $preTreatmentPricePerMilliliter->multiply($preTreatmentUsage);
	}

	/**
	 * @return Money
	 */
	protected function calculateColorPricePerMilliliter(): Money {
		return $this->calculatePricePerMilliliter(
			$this->colorCartridgeConfig->getCartridgePrice(),
			$this->colorCartridgeConfig->getCartridgeCapacity()
		);
	}

	/**
	 * @return Money
	 */
	protected function calculateWhitePricePerMilliliter(): Money {
		return $this->calculatePricePerMilliliter(
			$this->whiteCartridgeConfig->getCartridgePrice(),
			$this->whiteCartridgeConfig->getCartridgeCapacity()
		);
	}

	/**
	 * @return Money
	 */
	protected function calculatePreTreatmentPricePerMilliliter(): Money {
		return $this->calculatePricePerMilliliter(
			$this->preTreatmentTankConfig->getTankPrice(),
			$this->preTreatmentTankConfig->getTankCapacity()
		);
	}

	/**
	 * @return Money
	 */
	protected function calculateLabourCostPerPrint(): Money {
		$labourCostPerMinute = $this->calculateLabourCostPerMinute();

		return $labourCostPerMinute->multiply(
			$this->labourConfig->getLabourTimePerPrint()
		);
	}

	/**
	 * @param int $totalPrice
	 * @param int $capacity
	 *
	 * @return Money
	 */
	protected function calculatePricePerMilliliter(int $totalPrice, int $capacity): Money {
		$money = new Money($totalPrice,  $this->currency);

		return $money->divide($capacity);
	}

	/**
	 * @return Money
	 */
	protected function calculateLabourCostPerMinute(): Money {
		$minutesPerHour = '60';

		$labourHourlyCost = new Money(
			$this->labourConfig->getHourlyCost(),
			$this->currency
		);

		return $labourHourlyCost->divide($minutesPerHour);
	}

	/**
	 * @param Money $priceWithoutProfit
	 *
	 * @return Money
	 */
	protected function calculateProfitPerPrint(Money $priceWithoutProfit): Money {
		if (!$this->profitConfig->isPercentageValue()) {
			return new Money(
				$this->profitConfig->getValue(),
				$this->currency
			);
		}

		return $priceWithoutProfit->divide(100)
			->multiply(
				$this->profitConfig->getValue()
			);
	}
}
