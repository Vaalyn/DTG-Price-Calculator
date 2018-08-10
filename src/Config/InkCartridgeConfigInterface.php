<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

interface InkCartridgeConfigInterface {
	/**
	 * Returns the cartridge price in the smallest denominator of your currency
	 *
	 * @return int
	 */
	public function getCartridgePrice(): int;

	/**
	 * Sets the cartridge price in the smalles denominator of your currency
	 *
	 * @param int $cartridgePrice
	 *
	 * @return InkCartridgeConfigInterface
	 */
	public function setCartridgePrice(int $cartridgePrice): InkCartridgeConfigInterface;

	/**
	 * Returns the cartridge capacity in milliliter
	 *
	 * @return int
	 */
	public function getCartridgeCapacity(): int;

	/**
	 * Sets the cartridge capacity in milliliter
	 *
	 * @param int $cartridgeCapacity
	 *
	 * @return InkCartridgeConfigInterface
	 */
	public function setCartridgeCapacity(int $cartridgeCapacity): InkCartridgeConfigInterface;
}
