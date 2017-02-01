<?php

	use ToDo\Model\Task;
	use ToDo\TaskManager;
	use ToDo\Storage\MySqlDatabaseTaskStorage;

	require 'vendor/autoload.php';

	$db_handle = new PDO('mysql:host=127.0.0.1;dbname=firstapp', 'root', 'pritam');

	$storage = new MySqlDatabaseTaskStorage($db_handle);
	$task_manager = new TaskManager($storage);


	// Creating a new task
	$task = new Task();
	$task->setDescription('Close Codecourse membership');
	$task->setDue(new DateTime('+ 10 months'));
	$task->setComplete();

	$new_task = $task_manager->createTask($task);
	var_dump($new_task);

	// Updaing an existing task
	$task = $task_manager->getTask(8);
	$task->setDescription('Updating the last one');
	$task->setDue(new DateTime('+ 10 years'));
	$task->setComplete();

	$updated_task = $task_manager->updateTask($task);
	var_dump($updated_task);

	// Deleting a task
	$task_manager->deleteTask(10);

	// Fetching a single task
	$task = $task_manager->getTask(1);
	var_dump($task);

	// Fetching all tasks
	$tasks = $task_manager->getTasks();
	var_dump($tasks);

?>