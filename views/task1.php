<?php ?>
<h1>Task 1: Name</h1>
<div class="task__text">
    print out your name with one of php loops
</div>
<hr>
<p class="task-intro">My name is:</p>
<div class="task-result">
    <span>
    <?php
    $name = 'Aleksei';

    echo 'text: ';
	printStringChars($name);
    echo '<br/>';
	/**
	 *
	 */
	echo 'binary: '. convertTextToBinary($name);
	?>
    </span>

</div>
<hr>