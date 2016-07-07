<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	public function validate(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$data = array(
					'gamer_id' => $row->gamer_id,
					'username' => $row->username,
					'password' => $row->password,
					'validated' => TRUE
					);
			$this->session->set_userdata($data);
			return TRUE;
		}
		
		return FALSE;
	}
}
?>