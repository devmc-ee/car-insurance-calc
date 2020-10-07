<?php

/**
 * Class Calculator
 *
 * Base price of policy is 11% from entered car value,
 * - except every Friday 15-20 o’clock (user time) when it is 13%
 * • Commission is added to base price (17%)
 * • Tax is added to base price (user entered)
 *
 * • Calculate different payments separately (if number of payments are larger than 1)
 * • Installment sums must match total policy sum- pay attention to cases where sum does not divide equally
 * • Output is rounded to two decimal places
 */
class Calculator {
	private $basePriceRate;
	private $carValue;
	private $taxPercentage;
	private $instalmentsNumber;
	private $userDateTime;


	/**
	 * Calculator constructor.
	 *
	 * @param int    $carValue
	 * @param int    $taxPercentage
	 * @param int    $instalmentsNumber
	 * @param string $userDateTime
	 */
	public function __construct(
		int $carValue,
		int $taxPercentage,
		int $instalmentsNumber,
		string $userDateTime
	) {
		$this->carValue = $carValue;
		$this->taxPercentage = $taxPercentage;
		$this->instalmentsNumber = $instalmentsNumber;
		$this->userDateTime = date("Y-m-d H:i", strtotime($userDateTime));
	}

	/**
	 * Base price of policy 11% from entered car value
	 * except every Friday 15-20 o’clock (user time) when it is 13%
	 *
	 * @param int $basePriceRate
	 */
	public function setBasePriceRate(int $basePriceRate) {
		$this->basePriceRate = $basePriceRate;
	}

	public function getBasePriceRate() {
		return $this->basePriceRate;
	}

}