<h1>Task 2: Calculator</h1>
<div class="task__text">
    Write a simple car insurance calculator which will output price of the policy using vanilla PHP and JavaScript:
</div>
<hr>

<div class="task-result">
    <div class="task-form__wrapper">
        <h3 class="task-intro">Calculator</h3>

        <form id="calculator" class="form calculator-form" action="tasks_solutions/task2/form-action.php" method="post">
            <div class="form-group">
                <label for="carValue">Estimated value of the car (100 - 100 000 EUR):</label>
                <input id="carValue" name="carValue" type="number" min="100" max="100000"
                       placeholder="100 - 100 000 EUR"
                       value="" class="form-control">
                <small id="carValueHelp" class="d-none invalid-feedback">
                </small>

            </div>
            <div class="form-group">
                <label class="taxPercentage-label" for="taxPercentage">
                    Tax percentage (0 - 100%):
                    <span class="taxPercentage__selected-value"></span>
                </label>
                <input id="taxPercentage" name="taxPercentage" type="range" min="0" max="100" placeholder="0 - 100%"
                       value="0" class="form-control-range">
            </div>
            <div class="form-group">
                <label for="instalmentsNumber"> Number of instalments (count of payments in which client wants to pay
                    for the policy (1 – 12))</label>
                <select name="instalmentsNumber" id="instalmentsNumber" class="form-control">

					<?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?php echo $i; ?>">
							<?php echo $i; ?>
                        </option>
					<?php endfor; ?>
                </select>
            </div>

            <input hidden id="userDateTime" name="userDateTime" value="">
            <button id="calculator-btn-submit" class="btn btn-submit btn-primary" disabled="disabled"
                    type="submit">CALCULATE
            </button>
        </form>
    </div>
    <hr>
    <div class="calculator-results pt-3">
		<?php if (!empty($_SESSION['error'])): ?>
            <div class="alert  alert-danger">
				<?php echo $_SESSION['error']; ?>
            </div>
		<?php elseif (empty($_SESSION['calculator-results'])): ?>

            <div class="alert  alert-warning">No results. Please enter values to calculate and submit it.</div>

		<?php else: ?>
			<?php echo $_SESSION['calculator-results']; ?>
		<?php endif; ?>
    </div>
</div>
<script src="../tasks_solutions/task2/js/form-eventlisteners.js">

</script>