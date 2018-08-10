<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator;

interface DtgPriceInterface {
	/**
	 * Returns the ink cost in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getInkCost(): string;

	/**
	 * Sets the ink cost in the smalles denominator of your currency
	 *
	 * @param string $inkCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setInkCost(string $inkCost): DtgPriceInterface;

	/**
	 * Returns the pre treatment cost in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getPreTreatmentCost(): string;

	/**
	 * Sets the pre treatment cost in the smalles denominator of your currency
	 *
	 * @param string $preTreatment
	 *
	 * @return DtgPriceInterface
	 */
	public function setPreTreatmentCost(string $preTreatment): DtgPriceInterface;

	/**
	 * Returns the labour cost in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getLabourCost(): string;

	/**
	 * Sets the labour cost in the smalles denominator of your currency
	 *
	 * @param string $labourCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setLabourCost(string $labourCost): DtgPriceInterface;

	/**
	 * Returns the garment cost in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getGarmentCost(): string;

	/**
	 * Sets the garment cost in the smalles denominator of your currency
	 *
	 * @param string $garmentCost
	 *
	 * @return DtgPriceInterface
	 */
	public function setGarmentCost(string $garmentCost): DtgPriceInterface;

	/**
	 * Returns the price without profit in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getPriceWithoutProfit(): string;

	/**
	 * Sets the price without profit in the smalles denominator of your currency
	 *
	 * @param string $priceWithoutProfit
	 *
	 * @return DtgPriceInterface
	 */
	public function setPriceWithoutProfit(string $priceWithoutProfit): DtgPriceInterface;

	/**
	 * Returns the profit in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getProfit(): string;

	/**
	 * Sets the profit in the smalles denominator of your currency
	 *
	 * @param string $profit
	 *
	 * @return DtgPriceInterface
	 */
	public function setProfit(string $profit): DtgPriceInterface;

	/**
	 * Returns the total price in the smallest denominator of your currency
	 *
	 * @return string
	 */
	public function getTotalPrice(): string;

	/**
	 * Sets the total price in the smalles denominator of your currency
	 *
	 * @param string $totalPrice
	 *
	 * @return DtgPriceInterface
	 */
	public function setTotalPrice(string $totalPrice): DtgPriceInterface;
}
