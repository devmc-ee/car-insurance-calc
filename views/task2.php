<h1>Task 2: Calculator</h1>
<div class="task__text">
    Write a simple car insurance calculator which will output price of the policy using vanilla PHP and JavaScript:
</div>
<hr>
<h3 class="task-intro">Calculator</h3>
<div class="task-result">

    <!--1. Create HTML form with fields:
	• Estimated value of the car (100 - 100 000 EUR)
	• Tax percentage (0 - 100%)
	• Number of instalments (count of payments in which client wants to pay for the policy (1 – 12))
	• Calculate button-->

    <form id="calculator" class="calculator-form" action="" method="post">
        <label for="carValue">Estimated value of the car (100 - 100 000 EUR):</label>
        <input id="carValue" name="carValue" type="number" min="100" max="100000" placeholder="100 - 100 000 EUR"
               value="">

        <label for="taxPercentage">Tax percentage (0 - 100%):</label>
        <input id="taxPercentage" name="taxPercentage" type="number" min="0" max="100" placeholder="0 - 100%" value="">

        <label for="instalmentsNumber"> Number of instalments (count of payments in which client wants to pay for the
            policy (1 – 12))</label>
        <select name="instalmentsNumber" id="instalmentsNumber">
            <option value=""></option>
			<?php for ($i = 1; $i <= 12; $i++) : ?>
                <option value="<?php echo $i; ?>">
					<?php echo $i; ?>
                </option>
			<?php endfor; ?>
        </select>

        <button type="submit">CALCULATE</button>
    </form>

</div>
<hr>