# Insly test tasks
This project is a solution of test tasks from insly

Solved by Aleksei Milišenko

There are 3 tasks.

There is a simple routing that allows to navigate and use templates from View folder, to display task solutions

Task solutions are in the task_solution folder.

## Installation
1. extract archive in a working server directory (with php and mysql on run)
2. If the home uri (the location of the entry point, index.php) is not in the domain root place, 
then specify the home uri in the package.json
3. To see the 3 task in action, import dump sql file (tasks_solutions/task3/sql/task3.sql). It will create
default database named 'task3'. In order to escape creation of the db, then comment 'CREATE DATABASE...' row in the
 dump file
4. The add new database name into connection file, if it different from the default one.

## Solutions explained
### task 1.
Prints the name in a text and in a binary

### task 2.
Calculator: add car value that is valid, then select other options. After submitting a result table appear under the
 calc.
 
 ### task 3. 
 SHows built sql query for getting all information about employee in all languages with a single row
 
 If database is connected, then below can see fetch result