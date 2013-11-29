<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'base.php';

class usercontrol extends base {

	/**
	 * Index Page for this controller.
	 *
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
		$this->load->model('user_model');
		//header('Content-type: text/html; charset=UTF8'); // UTF8不行改成GBK试试，与你保存的格式匹配
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function myfunction()
	{
		echo "hello";
	}

	public function login()
	{
		// 这里的get方法需要改写为post方法
		// return login customer
		$name = $this->input->post("name");
		$pwd = $this->input->post("pwd");
		session_start();
		if ($name && $pwd) {
			$user = $this->user_model->doAuth($name,$pwd);
			if ($user) {
				$user['sid'] = session_id();
				$_SESSION['user'] = $user;
				$this->render('10000', 'Login ok', array(
					'User' => $user
				));
			}
		}
		// return sid only for client
		$user = array('sid' => session_id());
		$this->render('14001', 'Login failed', array(
			'User' => $user
		));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */