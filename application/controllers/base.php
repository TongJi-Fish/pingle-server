<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class base extends CI_Controller {

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
		header('Content-type: text/html; charset=UTF8'); // UTF8不行改成GBK试试，与你保存的格式匹配
	}

	/**
	 *  format message to json and send(echo)
	 */
	public function render ($code, $message, $result = '')
	{
/*		// filter by datamap
		if (is_array($result)) {
			foreach ((array) $result as $name => $data) {
				// Object list
				if (strpos($name, '.list')) {
					$model = trim(str_replace('.list', '', $name));
					foreach ((array) $data as $k => $v) {
						$result[$name][$k] = M($model, $v);
					}
				// Object
				} else {
					$model = trim($name);
					$result[$name] = M($model, $data);
				}
			}
		}*/
		// print json code
		echo json_encode(array(
			'code'		=> $code,
			'message'	=> $message,
			'result'	=> $result
		));
		exit;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	// protected method
	
	/**
	 * @ingore
	 */
	public function doAuth ()
	{
		if (!isset($_SESSION['customer'])) {
			$this->render('10001', 'Please login firstly.');
		} else {
			$this->customer = $_SESSION['customer'];
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */