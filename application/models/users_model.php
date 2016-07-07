<?php
class Users_model extends CI_Model{
	/*public function get_all_users()
	{
		$q = $this->db->get('users');
		return $q->result_array();
	}*/
	public function add_user()
	{
		$user = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
			);
		return $this->db->insert('users', $user);
	}
}