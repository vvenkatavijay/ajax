<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Post');
		//$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view("post.php");
	}

	public function index_html()
	{

		$view_data['posts'] = $this->Post->get_posts();

		$this->load->view('partials.php', $view_data);
	}

	public function create()
	{
		$post = $this->input->post('post');

		if($this->Post->add_quote($post)) {

			$view_data['posts'] = $this->Post->get_posts();
			$this->load->view('partials.php', $view_data);
		}
	}
}

//end of main controller