<?php

/**
* 
*/
class Post extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_posts() {

		$posts_query = "SELECT post FROM posts";

		return $this->db->query($posts_query)->result_array();
	}

	public function add_quote($quote) {

		$add_query = "INSERT INTO posts VALUES(NULL, ?, NOW())";

		return $this->db->query($add_query, $quote);
	}
}

?>