<?php

namespace task_solutions\task2\inc;

/**
 * Class CalculatorResultsView
 * Generates preview of the calculator data in a table view
 */
class CalculatorResultsView
{
    private $tableDataRowHeaders = [
        'carValue'        => 'Value',
        'basePriceValue'  => 'Base premium (%d%%)',
        'commissionValue' => 'Commission (%d%%)',
        'taxValue'        => 'Tax (%d%%)',
        'totalValue'      => 'Total cost'
    ];
    private $calculatorData;
    private $instalmentsNumber;

    /**
     * CalculatorResultsView constructor.
     *
     * @param array $calculatorData
     * @param int   $instalmentsNumber
     */
    public function __construct(array $calculatorData, int $instalmentsNumber)
    {
        $this->calculatorData = $calculatorData;
        $this->instalmentsNumber = $instalmentsNumber;

        $this->getTable($this->getTableRows());
    }

    /**
     * Table
     * @param $rows
     */
    private function getTable(string $rows): void
    {
        ?>
        <table class="table table-responsive table-hover">
            <tbody>
            <?php echo $rows; ?>
            </tbody>
        </table>
        <?php
    }

    /**
     * Generate table rows with data
     * @return string
     */
    private function getTableRows(): string
    {
        $tableHeaderRow = $this->getTableHeaderRow();
        $tableDataRows = $this->getTableDataRows();
        return $tableHeaderRow . $tableDataRows;
    }

    /**
     * Generate Headers
     *
     * @return false|string
     */
    private function getTableHeaderRow()
    {
        $instalmentsNumber = $this->instalmentsNumber;
        $result = '';

        ob_start();

        ?>
        <tr>
            <th></th>
            <th>Policy</th>
            <?php if ($instalmentsNumber > 1) : ?>
                <?php for ($i = 1; $i <= $instalmentsNumber; $i++) : ?>
                    <th> <?= $i ?> Instalment</th>
                <?php endfor; ?>
            <?php endif; ?>
        </tr>
        <?php

        $result = ob_get_contents();
        ob_clean();
        return $result;
    }

    /**
     * Generate table data rows
     * @return false|string
     */
    private function getTableDataRows()
    {
        $calculatorData = $this->calculatorData;
        $instalmentsNumber = $this->instalmentsNumber;

        $result = '';

        ob_start();

        ?>
        <?php foreach ($this->tableDataRowHeaders as $key => $header) : ?>
            <?php $class = ''; ?>
            <tr>
                <?php if ('totalValue' === $key) {
                    $class = 'font-weight-bold';
                } ?>
                <td class="<?= $class ?>"><?php echo $this->getRowHeaderValue($key) ?></td>

                <td class="text-right <?= $class ?> "><?php echo number_format($calculatorData[$key], 2, ',', ' ') ?></td>
                <?php if ($instalmentsNumber > 1) : ?>
                    <?php for ($i = 1; $i <= $instalmentsNumber; $i++) : ?>
                        <td class="text-right"><?php echo $this->getInstalmentValue($key, $i === 1); ?>
                        </td>
                    <?php endfor; ?>
                <?php endif; ?>
            </tr>

        <?php endforeach; ?>
        <?php

        $result = ob_get_contents();
        ob_clean();
        return $result;
    }

    /**
     * Returns instalment values with adjustments
     * @param string $key
     * @param bool   $firstIndex
     *
     * @return string|null
     */
    private function getInstalmentValue(string $key, bool $firstIndex)
    {
        if ('carValue' === $key) {
            return null;
        }
        $calculatorData = $this->calculatorData;
        $instalmentsNumber = $this->instalmentsNumber;

        $instalmentValue = round($calculatorData[$key] / $instalmentsNumber, 2);
        $valueAdjustment = $firstIndex
            ? ($instalmentValue * $instalmentsNumber - $calculatorData[$key])
            : 0;

        return number_format($instalmentValue - $valueAdjustment, 2, ',', ' ');
    }


    /**
     * Get headers with substituted values for the calculator rates
     * @param string $key
     *
     * @return mixed|string
     */
    private function getRowHeaderValue(string $key)
    {
        $tableDataRowHeaders = $this->tableDataRowHeaders;
        $calculatorData = $this->calculatorData;
        switch ($key) {
            case 'basePriceValue':
                $header = sprintf($tableDataRowHeaders[$key], $calculatorData['basePriceRate']);
                break;
            case 'commissionValue':
                $header = sprintf($tableDataRowHeaders[$key], $calculatorData['commissionRate']);
                break;
            case 'taxValue':
                $header = sprintf($tableDataRowHeaders[$key], $calculatorData['taxRate']);
                break;
            default:
                $header = $tableDataRowHeaders[$key];
        }
        return $header;
    }
}
