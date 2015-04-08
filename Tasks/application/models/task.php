<?php 

/**
* 
*/
class Task extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_tasks()
	{
		$task_query = "SELECT * FROM tasks";

		return $this->db->query($task_query)->result_array();
	}

	public function mark_ready($id)
	{
		$update_query = "UPDATE tasks SET state = 'Done' WHERE id = ?";

		return $this->db->query($update_query, $id);
	}

	public function create($task) 
	{
		$create_query = "INSERT INTO tasks VALUES(NULL, ?, 'Pending', NOW(), NOW())";

		return $this->db->query($create_query, $task);
	}

	public function edit_task($data)
	{
		$update_query = "UPDATE tasks SET task = ? WHERE id = ?";

		return $this->db->query($update_query, $data);
	}
}

?>