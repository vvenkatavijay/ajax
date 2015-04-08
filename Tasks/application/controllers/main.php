<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Task');
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('welcome.php');
	}

	public function index_json()
	{
		$result = $this->Task->get_tasks();
		echo json_encode($result);
	}

	public function form_process()
	{
		$data = $this->input->post();
		
		if($data['edit_task']) {

			$this->Task->edit_task($data);

		} else {
			
			$this->Task->mark_ready($data['id']);
		}

		$result = $this->Task->get_tasks();
		echo json_encode($result);
	}

	public function create() 
	{
		$task = $this->input->post('task');

		$this->Task->create($task);

		$result = $this->Task->get_tasks();
		echo json_encode($result);
	}
}

//end of main controller