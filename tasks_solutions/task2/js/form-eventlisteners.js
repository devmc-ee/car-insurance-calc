;(function () {

    const minCarValue = 100;
    const maxCarValue = 100000;
    const carValueHelp = document.querySelector('#carValueHelp');
    const carValueInput = document.getElementById('carValue');
    const submitBtn = document.querySelector('#calculator-btn-submit');

    const alerts = {
        'minCarValue': 'Value must be at least 100€.',
        'maxCarValue': 'Maximum value is 100 000€',
    };

    carValueInput.addEventListener('change',
        function (e) {
            const carValue = e.target.value;

            if (carValue < minCarValue || carValue > maxCarValue) {

                //mark invalid input with red border
                if (!this.classList.value.includes('is-invalid')) {
                    this.classList.add('is-invalid');
                }
                submitBtn.disabled = true;

                //show helper text
                carValueHelp.classList.remove('d-none');

                //add alert text to helper containers
                carValueHelp.textContent = carValue > maxCarValue
                    ? alerts.maxCarValue
                    : alerts.minCarValue;

            } else {
                carValueHelp.classList.add('d-none');

                this.classList.remove('is-invalid');

                submitBtn.disabled = false;
            }

        });

// show selected value from slider on every slider move
    document.getElementById('taxPercentage').addEventListener('input',
        function (e) {
            document.getElementsByClassName('taxPercentage__selected-value')[0].innerText = e.target.value + '%';
        });
})();
