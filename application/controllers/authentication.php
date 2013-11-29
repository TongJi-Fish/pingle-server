<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * welcome = Authentication
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		header('Content-type: text/html; charset=UTF8'); // UTF8不行改成GBK试试，与你保存的格式匹配
	}

	public function index()
	{
		session_start();
		$count = isset($_SESSION['count']) ? $_SESSION['count'] : 0;
		$_SESSION['count'] = ++$count;
		echo "您是第：".$count."个用户";
		echo "session: ".session_id();

		$data['users'] = $this->users_model->get_users();
		$this->show($data['users']);
	}

	public function view()
	{
		$data['users'] = $this->users_model->get_users();
		$this->show($data['users']);
		echo "您是第：个用户";
	}

	public function show($users)
	{
		foreach($users as $user)
		{
			echo $user['name'];
			echo $user['password'];
			echo '<br/>';
		}
	}

	public function test(){
		echo "hello";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */