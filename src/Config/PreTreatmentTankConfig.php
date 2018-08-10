<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

class PreTreatmentTankConfig implements PreTreatmentTankConfigInterface {
	/**
	 * @var int
	 */
	protected $tankPrice;

	/**
	 * @var int
	 */
	protected $tankCapacity;

	/**
	 * @param int $tankPrice
	 * @param int $tankCapacity
	 */
	public function __construct(int $tankPrice, int $tankCapacity) {
		$this->tankPrice    = $tankPrice;
		$this->tankCapacity = $tankCapacity;
	}

	/**
	 * @inheritDoc
	 */
	public function getTankPrice(): int {
		return $this->tankPrice;
	}

	/**
	 * @inheritDoc
	 */
	public function setTankPrice(int $tankPrice): PreTreatmentTankConfigInterface {
		$this->tankPrice = $tankPrice;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getTankCapacity(): int {
		return $this->tankCapacity;
	}

	/**
	 * @inheritDoc
	 */
	public function setTankCapacity(int $tankCapacity): PreTreatmentTankConfigInterface {
		$this->tankCapacity = $tankCapacity;

		return $this;
	}
}
