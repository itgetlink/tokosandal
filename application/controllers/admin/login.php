<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct()
    {
        // Initialization of class
        parent::__construct();

        // load the model
		
        $this->load->model('admin_model');
		$this->load->library('form_validation');
    }
	public function index()
	{
		$login = $this->session->userdata('logged_in');
		if(empty($login))
		{
			$this->load->view('index.php/admin/login/view_login');
		}else{
			redirect('index.php/admin/home');
		}
	}
	function checkValidation()
	{
	   //Field validation succeeded.  Validate against database
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	 
	   	if($this->form_validation->run() == FALSE)
	   	{
		 	//Field validation failed.  User redirected to login page
			$this->load->view('index.php/admin/login/view_login');
	   	}
	  	else
	   	{			
		   $username = $this->input->post('username');
		   $password = $this->input->post('password');
		 
		   //query the database
		   $result = $this->admin_model->login($username, $password);
		
		   if($result)
		   {
			 
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->ID,
					'username' => $row->USER_NAME,
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			$this->form_validation->set_message('success', 'Login sukses');
			redirect(base_url().'index.php/admin/home/', 'refresh'); 
			 //echo 'berhasil login';
		    }
		    else
		    {		
				$data['check']='username atau password tidak ada';
				$this->load->view('index.php/admin/login/view_login',$data);
		    } //end else
		} //end validation
	} //end fundtion
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */