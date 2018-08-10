<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

class ProfitConfig implements ProfitConfigInterface {
	/**
	 * @var int
	 */
	protected $profitValue;

	/**
	 * @var bool
	 */
	protected $isPercentageValue;

	/**
	 * @param int $profitValue
	 * @param bool $isPercentageValue
	 */
	public function __construct(int $profitValue, bool $isPercentageValue) {
		$this->profitValue       = $profitValue;
		$this->isPercentageValue = $isPercentageValue;
	}

	/**
	 * @inheritDoc
	 */
	public function getValue(): int {
		return $this->profitValue;
	}

	/**
	 * @inheritDoc
	 */
	public function setValue(int $profitValue): GarmentConfigInterface {
		$this->profitValue = $profitValue;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function isPercentageValue(): bool {
		return $this->isPercentageValue;
	}
}
