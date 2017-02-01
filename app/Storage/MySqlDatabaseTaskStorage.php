<?php

	namespace ToDo\Storage;

	use ToDo\Storage\Contract\TaskStorageInterface;
	use ToDo\Model\Task;

	class MySqlDatabaseTaskStorage implements TaskStorageInterface {

		protected $db;

		public function __construct(\PDO $db) {
			$this->db = $db;
		}

		public function store(Task $task) {

			$record = $this->db->prepare("
				INSERT INTO task (description, due, complete)
				VALUES(:description, :due, :complete)"
			);

			$record->execute($this->buildColumn($task));

			return $this->getById($this->db->lastInsertId());

		}

		public function update(Task $task) {
			$record = $this->db->prepare("
				Update task
				Set
					description = :description,
					due = :due,
					complete = :complete
				WHERE id = :id"
			);

			$record->execute($this->buildColumn($task, [
				'id' => $task->getId(),
			]));

			return $this->getById($task->getId());


		}

		public function getById(int $id) {
			$task = $this->db->prepare("
				SELECT id, description, due, complete
				FROM task
				WHERE id = :id"
			);

			$task->setFetchMode(\PDO::FETCH_CLASS, Task::class);
			$task->execute([
				'id' => $id,
			]);

			return $task->fetch();

		}

		public function getAll() {
			$tasks = $this->db->prepare("
				SELECT id, description, due, complete
				FROM task"
			);

			$tasks->setFetchMode(\PDO::FETCH_CLASS, Task::class);
			$tasks->execute();

			return $tasks->fetchAll();
		}

		public function remove(int $id) {
			$task = $this->db->prepare("DELETE FROM task
				WHERE id = :id");

			return $task->execute([
				'id' => $id,
			]);
		}

		protected function buildColumn(Task $task, array $additional_columns = []) {
			return array_merge([
				'description' => $task->getDescription(),
				'due' => $task->getDue()->format('Y-m-d H:i:s'),
				'complete' => $task->getComplete(),
				],
				$additional_columns
			);
		}

	}

?>