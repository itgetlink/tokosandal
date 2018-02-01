<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Home extends CI_Controller {

	 function __construct()
	 {
		
	   parent::__construct();
	    $template="";
		$username="";
		$session_data = $this->session->userdata('logged_in');
		
		if(!empty($session_data))
		{
			$this->username = $session_data['username'];
			$this->template = 'admin/template';
			//$this->load->model('pemesanan_model');  
		}
		else
		{
			//If no session, redirect to login page
			redirect(base_url().'admin/login', 'refresh');
		}
	 }
	function index(){
		$data['content'] = 'admin/home/view_home';
		$data['username'] = $this->username;
		$this->load->view($this->template,$data);
	}
	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect(base_url().'admin/login', 'refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */