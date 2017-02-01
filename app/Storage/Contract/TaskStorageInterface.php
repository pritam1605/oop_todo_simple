<?php

	namespace ToDo\Storage\Contract;
	use ToDo\Model\Task;

	interface TaskStorageInterface {
		public function store(Task $task);
		public function update(Task $task);
		public function remove(int $id);
		public function getById(int $id);
		public function getAll();
	}

?>