<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		$this->load->model('users_model');
		$this->load->model('login_model');
	}
	//Insert
	public function show_add_user(){
		$this->load->view('add_user_view');
	}
	public function index()//insert_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
 
 		if($this->form_validation->run() === FALSE)
 		{
	 	     $this->show_add_user();
 		}
 		else
 		{
 			$this->users_model->add_user();
 			echo "<p>".anchor('login/log_in', 'Login')."</p>";
		}
	}
//Login	
	public function log_in($param = NULL){
		$data['param'] = $param;
		$this->load->view('login_view', $data);
	}
	public function procedure(){
		
		$result = $this->login_model->validate();
		
		if(! $result){
			$param = '<font color=red>Invalid username and/or password.</font><br />';
			$this->log_in($param);
		}else{
			
			redirect('home');
		}		
	}
//Read
/*	public function show_all_users()
	{
       $this->benchmark->mark('start');
	   $this->load->model('users_model');
        
		$data['all_users'] = $this->users_model->get_all_users();
		$this->load->view('show_all_users_view', $data);
        
       $this->benchmark->mark('end');
	}*/
	
}