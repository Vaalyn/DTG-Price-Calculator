<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

use Money\Money;

class DtgPrice implements DtgPriceInterface {
	/**
	 * @var Money
	 */
	protected $inkCost;

	/**
	 * @var Money
	 */
	protected $preTreatmentCost;

	/**
	 * @var Money
	 */
	protected $labourCost;

	/**
	 * @var Money
	 */
	protected $garmentCost;

	/**
	 * @var Money
	 */
	protected $priceWithoutProfit;

	/**
	 * @var Money
	 */
	protected $profit;

	/**
	 * @var Money
	 */
	protected $totalPrice;

	/**
	 * @param Money $inkCost
	 * @param Money $preTreatmentCost
	 * @param Money $labourCost
	 * @param Money $garmentCost
	 * @param Money $priceWithoutProfit
	 * @param Money $profit
	 * @param Money $totalPrice
	 */
	public function __construct(
		Money $inkCost,
		Money $preTreatmentCost,
		Money $labourCost,
		Money $garmentCost,
		Money $priceWithoutProfit,
		Money $profit,
		Money $totalPrice
	) {
		$this->inkCost            = $inkCost;
		$this->preTreatmentCost   = $preTreatmentCost;
		$this->labourCost         = $labourCost;
		$this->garmentCost        = $garmentCost;
		$this->priceWithoutProfit = $priceWithoutProfit;
		$this->profit             = $profit;
		$this->totalPrice         = $totalPrice;
	}

	/**
	 * @inheritDoc
	 */
	public function getInkCost(): Money {
		return $this->inkCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setInkCost(Money $inkCost): DtgPriceInterface {
		$this->inkCost = $inkCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getPreTreatmentCost(): Money {
		return $this->preTreatmentCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setPreTreatmentCost(Money $preTreatment): DtgPriceInterface {
		$this->preTreatmentCost = $preTreatment;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getLabourCost(): Money {
		return $this->labourCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setLabourCost(Money $labourCost): DtgPriceInterface {
		$this->labourCost = $labourCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getGarmentCost(): Money {
		return $this->garmentCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setGarmentCost(Money $garmentCost): DtgPriceInterface {
		$this->garmentCost = $garmentCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getPriceWithoutProfit(): Money {
		return $this->priceWithoutProfit;
	}

	/**
	 * @inheritDoc
	 */
	public function setPriceWithoutProfit(Money $priceWithoutProfit): DtgPriceInterface {
		$this->priceWithoutProfit = $priceWithoutProfit;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getProfit(): Money {
		return $this->profit;
	}

	/**
	 * @inheritDoc
	 */
	public function setProfit(Money $profit): DtgPriceInterface {
		$this->profit = $profit;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getTotalPrice(): Money {
		return $this->totalPrice;
	}

	/**
	 * @inheritDoc
	 */
	public function setTotalPrice(Money $totalPrice): DtgPriceInterface {
		$this->totalPrice = $totalPrice;

		return $this;
	}
}
