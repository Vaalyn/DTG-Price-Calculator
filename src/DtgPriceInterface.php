<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

use Money\Money;

interface DtgPriceInterface {
	/**
	 * Returns the ink cost as money object
	 *
	 * @return Money
	 */
	public function getInkCost(): Money;

	/**
	 * Sets the ink cost as money object
	 *
	 * @param Money $inkCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setInkCost(Money $inkCost): DtgPriceInterface;

	/**
	 * Returns the pre treatment cost as money object
	 *
	 * @return Money
	 */
	public function getPreTreatmentCost(): Money;

	/**
	 * Sets the pre treatment cost as money object
	 *
	 * @param Money $preTreatment
	 *
	 * @return DtgPriceInterface
	 */
	public function setPreTreatmentCost(Money $preTreatment): DtgPriceInterface;

	/**
	 * Returns the labour cost as money object
	 *
	 * @return Money
	 */
	public function getLabourCost(): Money;

	/**
	 * Sets the labour cost as money object
	 *
	 * @param Money $labourCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setLabourCost(Money $labourCost): DtgPriceInterface;

	/**
	 * Returns the garment cost as money object
	 *
	 * @return Money
	 */
	public function getGarmentCost(): Money;

	/**
	 * Sets the garment cost as money object
	 *
	 * @param Money $garmentCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setGarmentCost(Money $garmentCost): DtgPriceInterface;

	/**
	 * Returns the price without profit as money object
	 *
	 * @return Money
	 */
	public function getPriceWithoutProfit(): Money;

	/**
	 * Sets the price without profit as money object
	 *
	 * @param Money $priceWithoutProfit
	 *
	 * @return DtgPriceInterface
	 */
	public function setPriceWithoutProfit(Money $priceWithoutProfit): DtgPriceInterface;

	/**
	 * Returns the profit as money object
	 *
	 * @return Money
	 */
	public function getProfit(): Money;

	/**
	 * Sets the profit as money object
	 *
	 * @param Money $profit
	 *
	 * @return DtgPriceInterface
	 */
	public function setProfit(Money $profit): DtgPriceInterface;

	/**
	 * Returns the total price as money object
	 *
	 * @return Money
	 */
	public function getTotalPrice(): Money;

	/**
	 * Sets the total price as money object
	 *
	 * @param Money $totalPrice
	 *
	 * @return DtgPriceInterface
	 */
	public function setTotalPrice(Money $totalPrice): DtgPriceInterface;
}
