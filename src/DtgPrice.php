<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

class DtgPrice implements DtgPriceInterface {
	/**
	 * @var string
	 */
	protected $inkCost;

	/**
	 * @var string
	 */
	protected $preTreatmentCost;

	/**
	 * @var string
	 */
	protected $labourCost;

	/**
	 * @var string
	 */
	protected $garmentCost;

	/**
	 * @var string
	 */
	protected $priceWithoutProfit;

	/**
	 * @var string
	 */
	protected $profit;

	/**
	 * @var string
	 */
	protected $totalPrice;

	/**
	 * @param string $inkCost
	 * @param string $preTreatmentCost
	 * @param string $labourCost
	 * @param string $garmentCost
	 * @param string $priceWithoutProfit
	 * @param string $profit
	 * @param string $totalPrice
	 */
	public function __construct(
		string $inkCost,
		string $preTreatmentCost,
		string $labourCost,
		string $garmentCost,
		string $priceWithoutProfit,
		string $profit,
		string $totalPrice
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
	public function getInkCost(): string {
		return $this->inkCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setInkCost(string $inkCost): DtgPriceInterface {
		$this->inkCost = $inkCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getPreTreatmentCost(): string {
		return $this->preTreatmentCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setPreTreatmentCost(string $preTreatment): DtgPriceInterface {
		$this->preTreatmentCost = $preTreatment;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getLabourCost(): string {
		return $this->labourCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setLabourCost(string $labourCost): DtgPriceInterface {
		$this->labourCost = $labourCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getGarmentCost(): string {
		return $this->garmentCost;
	}

	/**
	 * @inheritDoc
	 */
	public function setGarmentCost(string $garmentCost): DtgPriceInterface {
		$this->garmentCost = $garmentCost;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getPriceWithoutProfit(): string {
		return $this->priceWithoutProfit;
	}

	/**
	 * @inheritDoc
	 */
	public function setPriceWithoutProfit(string $priceWithoutProfit): DtgPriceInterface {
		$this->priceWithoutProfit = $priceWithoutProfit;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getProfit(): string {
		return $this->profit;
	}

	/**
	 * @inheritDoc
	 */
	public function setProfit(string $profit): DtgPriceInterface {
		$this->profit = $profit;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getTotalPrice(): string {
		return $this->totalPrice;
	}

	/**
	 * @inheritDoc
	 */
	public function setTotalPrice(string $totalPrice): DtgPriceInterface {
		$this->totalPrice = $totalPrice;

		return $this;
	}
}
