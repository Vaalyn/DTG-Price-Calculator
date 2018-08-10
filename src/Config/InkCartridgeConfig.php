<?php

declare(strict_types = 1);

namespace Vaalyn\DtgPriceCalculator\Config;

class InkCartridgeConfig implements InkCartridgeConfigInterface
{
	/**
	 * @var int
	 */
	protected $cartridgePrice;

	/**
	 * @var int
	 */
	protected $cartridgeCapacity;

	/**
	 * @param int $cartridgePrice
	 * @param int $cartridgeCapacity
	 */
	public function __construct(int $cartridgePrice, int $cartridgeCapacity) {
		$this->cartridgePrice    = $cartridgePrice;
		$this->cartridgeCapacity = $cartridgeCapacity;
	}

	/**
	 * @inheritDoc
	 */
	public function getCartridgePrice(): int {
		return $this->cartridgePrice;
	}

	/**
	 * @inheritDoc
	 */
	public function setCartridgePrice(int $cartridgePrice): InkCartridgeConfigInterface {
		$this->cartridgePrice = $cartridgePrice;

		return $this;
	}

	/**
	 * @inheritDoc
	 */
	public function getCartridgeCapacity(): int {
		return $this->cartridgeCapacity;
	}

	/**
	 * @inheritDoc
	 */
	public function setCartridgeCapacity(int $cartridgeCapacity): InkCartridgeConfigInterface {
		$this->cartridgeCapacity = $cartridgeCapacity;

		return $this;
	}
}
