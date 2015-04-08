<?php

/**
* 
*/
class User extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_notes()
	{
		$notes_query = "SELECT * FROM notes";
		return $this->db->query($notes_query)->result_array();
	}

	public function update_description($id, $description)
	{
		$update_query = "UPDATE notes SET `description` = ? WHERE id = ?";

		return $this->db->query($update_query, array($description['description'], $id));
	}

	public function delete_note($id)
	{
		$delete_query = "DELETE FROM notes WHERE id = ?";

		return $this->db->query($delete_query, $id);
	}

	public function create_note($data) 
	{
		$create_query = "INSERT INTO notes VALUES(NULL, ?, '', NOW(), NOW())";

		return $this->db->query($create_query, $data);
	}
}

?>