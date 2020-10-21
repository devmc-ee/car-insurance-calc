<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>CarInsuranceCalc</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="task-container">
    <h1 class="text-center">Car Insurance Calc (simple)</h1>
    <hr>

    <div class="container-fluid">
        <p class="text-center"><a href="https://github.com/devmc-ee/car-insurance-calc.git">Github repository</a></p>

        <pre>
        * Base price of policy is 11% from entered car value,
        * - except every Friday 15-20 o’clock (user time) when it is 13%
        * • Commission is added to base price (17%)
        * • Tax is added to base price (user entered)
        *
        * • Calculate different payments separately (if number of payments are larger than 1)
        * • Installment sums must match total policy sum- pay attention to cases where sum does not divide equally
        * • Output is rounded to two decimal places
            </pre>

    </div>
    <div class="task-result">
        <div class="task-form__wrapper">
            <h3 class="task-intro">Calculator</h3>

            <form id="calculator" class="form calculator-form" action="" method="post">
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
                        <span class="taxPercentage__selected-value">0%</span>
                    </label>
                    <input id="taxPercentage" name="taxPercentage" type="range" min="0" max="100" placeholder="0 - 100%"
                           value="0" class="form-control-range">
                </div>
                <div class="form-group">
                    <label for="instalmentsNumber"> Number of instalments (count of payments in which client wants to
                        pay
                        for the policy (1 – 12))</label>
                    <select name="instalmentsNumber" id="instalmentsNumber" class="form-control">

                        <?php
                        for ($i = 1; $i <= 12; $i++) : ?>
                            <option value="<?php
                            echo $i; ?>">
                                <?php
                                echo $i; ?>
                            </option>
                        <?php
                        endfor; ?>
                    </select>
                </div>

                <input hidden id="userDateTime" name="userDateTime" value="">
                <button id="calculator-btn-submit" class="btn btn-submit btn-primary" disabled="disabled"
                        type="submit">CALCULATE
                </button>
            </form>
        </div>
        <hr>
        <div id="results-container" class="results-container container-fluid">

        </div>
    </div>
    <script>
        window.carInsuranceCal = {
            ajaxurl: "//<?php echo $_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']); ?>/app/form-action.php"
        }
    </script>
    <script src="app/js/form-eventlisteners.js">
    </script>

</div>
</body>
</html>