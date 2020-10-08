<h1>Task 1: Name</h1>
<div class="task__text  bd-callout bd-callout-warning">
    print out your name with one of php loops
</div>
<hr>
<h3 class="task-intro">My name is:</h3>
<div class="task-result">
    <p>
		<?php

		$name = 'Aleksei';

		echo 'text: ';

		/**
		 *
		 * @see tasks_solutions/task1/functions.php
		 */
		printStringChars($name);
		?>
    </p>
    <p>
		<?php

		/**
		 * @see tasks_solutions/task1/functions.php
		 */
		echo 'binary: ' . convertTextToBinary($name);
		?>
    </p>


</div>
<hr>