<h1>Task 3: Store employee data</h1>
<div class="task__text bd-callout bd-callout-warning">
	<pre>
		1. Create a database structure to store employee information.
		2. The information should be presented as an .sql file which can be imported into a
		MySQL database without errors.
		3. Write example query to get 1-person data in all languages
		4. Add test data for one customer into database
	</pre>
</div>
<hr>
<div class="task-result">

    <pre>
        <p>Sql query:</p>
        <?php require_once ROOT_DIR . '/tasks_solutions/task3/sql_request.php';
		print_r($sql);?>

		<p>Fetch result:</p>
		<?php require_once ROOT_DIR . '/tasks_solutions/task3/connection.php' ?>
        </pre>
</div>