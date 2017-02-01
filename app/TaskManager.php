<?php

	namespace ToDo;

	use ToDo\Storage\Contract\TaskStorageInterface;
	use ToDo\Model\Task;

	class TaskManager {

		protected $storage;

		public function __construct(TaskStorageInterface $storage) {
			$this->storage = $storage;
		}

		public function createTask(Task $task) {
			return $this->storage->store($task);
		}

		public function updateTask(Task $task) {
			return $this->storage->update($task);
		}

		public function getTask(int $id) {
			return $this->storage->getById($id);
		}

		public function getTasks() {
			return $this->storage->getAll();
		}

		public function deleteTask(int $id) {
			return $this->storage->remove($id);
		}
	}
?>