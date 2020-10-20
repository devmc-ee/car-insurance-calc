;(function () {

    const minCarValue = 100;
    const maxCarValue = 100000;

    const carValueHelp = document.querySelector('#carValueHelp');
    const carValueInput = document.getElementById('carValue');

    const submitBtn = document.querySelector('#calculator-btn-submit');

    const taxPercentageInput = document.querySelector('#taxPercentage');
    const taxPercentageLabelValue = document.getElementsByClassName('taxPercentage__selected-value')[0];

    const calculatorForm = document.querySelector("#calculator");
    const userDateTime = document.querySelector('#userDateTime');

    const resultsContainer = document.querySelector('#results-container');
    const alerts = {
        'minCarValue': 'Value must be at least 100€.',
        'maxCarValue': 'Maximum value is 100 000€',
        'invalidValue': 'Only integer values are allowed'
    };

    carValueInput.addEventListener(
        'input',
        function (e) {
            const carValue = e.target.value;

            submitBtn.disabled = carValue < minCarValue || carValue > maxCarValue;

            if (carValue < minCarValue || carValue > maxCarValue) {
                //mark invalid input with red border
                if (!this.classList.value.includes('is-invalid')) {
                    this.classList.add('is-invalid');
                }
                //show helper text
                carValueHelp.classList.remove('d-none');

                //add alert text to helper containers
                carValueHelp.textContent = carValue > maxCarValue
                    ? alerts.maxCarValue
                    : alerts.minCarValue;
            } else {
                carValueHelp.classList.add('d-none');
                this.classList.remove('is-invalid');
            }

        }
    );

    // show selected value from slider on every slider move
    taxPercentageInput.addEventListener(
        'input',
        function (e) {
            taxPercentageLabelValue.innerText = e.target.value + '%';
        }
    );

    submitBtn.addEventListener('click', function (event) {
        event.preventDefault();
        makeRequest(event);
    });

    function makeRequest(event) {
        xhr = new XMLHttpRequest();
        formData = new FormData(calculatorForm);

        if (!xhr) {
            console.error('Sorry, cannot create the instance of the httpRequest, ' +
                'the comments will be processed with regular http processing');
            return false;
        }
        const currentDateTime = new Date();
        //set user local time
        const userTime = currentDateTime.getHours() + ':' + currentDateTime.getMinutes();
        const userDate = currentDateTime.getFullYear() + '-' + (currentDateTime.getMonth() + 1) + '-' + currentDateTime.getDate();
        userDateTime.value = userDate + ' ' + userTime;

        xhr.onreadystatechange = processResponse;
        xhr.open('POST', '../app/form-action.php', true);
        xhr.send(formData);
    }

    /**
     * Parse response and display resulting table
     * Callback for readyStateChange
     */
    function processResponse() {

        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                resultsContainer.innerHTML = response.html;

            } else {
                console.error('Woops... Something went wrong.');
                console.error(xhr.responseText);
                resultsContainer.innerHTML = xhr.responseText;
            }
        }
    }

})();
