## Simple calculator of car insurance 

Built with php using OOP techniques and Vanilla js. 

Calculator uses the following rules:

    * Base price of policy is 11% from entered car value,
        * - except every Friday 15-20 o’clock (user time) when it is 13%
        * • Commission is added to base price (17%)
        * • Tax is added to base price (user entered)
        *
        * • Calculate different payments separately (if number of payments are larger than 1)
        * • Installment sums must match total policy sum- pay attention to cases where sum does not divide equally
        * • Output is rounded to two decimal places
        
### Install

clone repository:

````
git clone https://github.com/devmc-ee/insly-test.git
````

Install composer dependencies (autoloader)

````bash
$ composer install
$ composer dump-autoload
````

If composer is not install globally, then use: 
````
$ php composer.phar [command]

````

Define home root directory in package.json:

````

{...
"home_uri": "/home",
...}
````