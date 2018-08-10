<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

class LabourConfig implements LabourConfigInterface {
	/**
	 * @var int
	 */
	protected $hourlyCost;

	/**
	 * @var int
	 */
	protected $labourTimePerPrint;

	/**
	 * @param int $hourlyCost
	 * @param int $labourTimePerPrint
	 */
	public function __construct(int $hourlyCost, int $labourTimePerPrint) {
		$this->hourlyCost         = $hourlyCost;
		$this->labourTimePerPrint = $labourTimePerPrint;
	}

	/**
	 * @inheritDoc
	 */
	public function getHourlyCost(): int {
		return $this->hourlyCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setHourlyCost(int $hourlyCost): LabourConfigInterface {
		$this->hourlyCost = $hourlyCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getLabourTimePerPrint(): int {
		return $this->labourTimePerPrint;
	}

	/**
	 * @inheritDoc
	 */
	public function setLabourTimePerPrint(int $labourTimePerPrint): LabourConfigInterface {
		$this->labourTimePerPrint = $labourTimePerPrint;
	}
}
