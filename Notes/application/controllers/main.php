<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$view_data = array();
		$this->load->view('welcome.php', $view_data);
	}

	public function submit() 
	{
		echo "This is submit";
		var_dump($this->input->post(NULL));
	}

	public function index_json()
	{
		$result = $this->User->get_notes();
		echo json_encode($result);
	}

	public function edit_description($id)
	{
		$description = $this->input->post(NULL);

		$this->User->update_description($id, $description);

		$result = $this->User->get_notes();
		echo json_encode($result);
	}

	public function delete($id)
	{
		$this->User->delete_note($id);

		$result = $this->User->get_notes();
		echo json_encode($result);
	}

	public function create()
	{
		$data = $this->input->post('heading');

		$this->User->create_note($data);
		
		$result = $this->User->get_notes();
		echo json_encode($result);
	}

}

//end of main controller