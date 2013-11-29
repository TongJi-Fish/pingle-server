<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_users()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function doAuth($name='', $pwd='')
	{
		$query = $this->db->query("select * from user where name='".$name."' and password='".$pwd."'");
		if($query->num_rows() > 0)
		{
			
   			foreach ($query->result() as $row)
   			{
   				$user = Array(
					"name"=>$row->name,
					"id"=>$row->id_number,
					"driver_id"=>$row->driver_id
				);
   			}
			
				// if(!$row->driver_id)
				// $user['driver_id']='';
			return $user;	
		}else{
			return null;
		}
	}
}
