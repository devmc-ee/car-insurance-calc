<?php

namespace CarInsurance\inc;

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
class Calculator
{
    private $basePriceRate;
    private $commissionRate = 17;
    private $carValue;
    private $taxPercentage;
    private $userWeekDay;
    private $userTime;


    /**
     * Calculator constructor.
     *
     * @param  int  $carValue
     * @param  int  $taxPercentage
     * @param  string  $userDateTime
     */
    public function __construct(
        int $carValue,
        int $taxPercentage,
        string $userDateTime
    ) {
        $this->carValue = $carValue;
        $this->taxPercentage = $taxPercentage;
        $this->userWeekDay = (int)date("N", strtotime($userDateTime));
        $this->userTime = (int)date("H", strtotime($userDateTime));
        $this->countBasePriceRate();
    }

    /**
     * Base price of policy is 11% from entered car value,
     * - except every Friday 15-20 o’clock (user time) when it is 13%
     */
    private function countBasePriceRate(): void
    {
        $excWeekDay = 5;
        $excHourStart = 15;
        $excHourEnd = 20;

        if (
            $this->userWeekDay === $excWeekDay &&
            $this->userTime >= $excHourStart &&
            $this->userTime <= $excHourEnd
        ) {
            $this->basePriceRate = 13;
        } else {
            $this->basePriceRate = 11;
        }
    }

    /**
     * Base % for calculation the base price of policy
     *
     * @return int
     */
    public function getBasePriceRate(): int
    {
        return $this->basePriceRate;
    }

    /**
     * Round value to defined precision
     *
     * @param     $value
     * @param  int  $precision  , default 2
     *
     * @return float
     */
    private function roundValue($value, int $precision = 2): float
    {
        $mode = PHP_ROUND_HALF_EVEN;

        return (round($value, $precision, $mode));
    }

    /**
     * Base price value calculated based on Base %
     *
     * @return float
     */
    public function getBasePriceValue(): float
    {
        $basePriceValue = ($this->carValue * $this->basePriceRate / 100);

        return $this->roundValue($basePriceValue);
    }

    /**
     * Commission rate
     *
     * @return int
     */
    public function getCommissionRate(): int
    {
        return $this->commissionRate;
    }

    /**
     * Commission value to be added to the basePriceValue
     *
     * @return float
     */
    public function getCommissionValue(): float
    {
        $basePriceValue = $this->getBasePriceValue();
        $commissionValue = ((100 + $this->commissionRate) / 100 - 1) * $basePriceValue;

        return $this->roundValue($commissionValue);
    }

    /**
     * @return int
     */
    public function getTaxRate(): int
    {
        return $this->taxPercentage;
    }

    /**
     * Tax is added to base price (user entered)
     *
     * @return float
     */
    public function getTaxValue(): float
    {
        $taxRate = $this->taxPercentage;
        $basePrice = $this->getBasePriceValue();

        return $this->roundValue($basePrice * ((100 + $taxRate) / 100 - 1));
    }

    /**
     * @return float
     */
    public function getTotalValue(): float
    {
        $basePrice = $this->getBasePriceValue();
        $commission = $this->getCommissionValue();
        $taxes = $this->getTaxValue();

        return $this->roundValue($basePrice + $commission + $taxes);
    }

    /**
     * Car value, user selection
     *
     * @return int
     */
    public function getCarValue(): int
    {
        return $this->carValue;
    }

    /**
     * Return all calculated and preset data as an array
     *
     * @return array
     */
    public function getAllData(): array
    {
        return [
            'basePriceValue' => $this->getBasePriceValue(),
            'basePriceRate' => $this->getBasePriceRate(),
            'commissionValue' => $this->getCommissionValue(),
            'taxValue' => $this->getTaxValue(),
            'totalValue' => $this->getTotalValue(),
            'taxRate' => $this->getTaxRate(),
            'commissionRate' => $this->getCommissionRate(),
            'carValue' => $this->getCarValue(),
        ];
    }
}
