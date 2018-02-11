<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Contact extends CI_Controller {

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
			$this->load->model('email_model');  
		}
		else
		{
			//If no session, redirect to login page
			redirect(base_url().'index.php/admin/login', 'refresh');
		}
		
		$this->load->model('produk_model');
		
	 }
	function index(){
		$data['content'] = 'admin/contact/view_contact';
		$data['username'] = $this->username;
		$this->load->view($this->template,$data);
	}
	
	public function ajax_list()
	{
		$list = $this->email_model->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $Email) {
			$no++;
			$row = array();
			
			$row[] = '<span id="ptype'.$Email->ID.'">'.$Email->NAMA_PENGIRIM.'</span>'; 
			$row[] = '<span id="pname'.$Email->ID.'">'.$Email->EMAIL.'</span>';
			$row[] = '<span id="pname'.$Email->ID.'">'.$Email->SUBJECT.'</span>';
			$row[] = '<span id="pdesc'.$Email->ID.'">'.$Email->MASSAGE.'</span>';  
			$row[] = '<span id="pedit'.$Email->ID.'"><a title="edit produk" href="javascript:void(0);" onclick="balasEmails(\''.$Email->ID.'\')">Balas</a></span>'; 
			
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->email_model->count_all(),
						"recordsFiltered" => $this->email_model->count_filtered(),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	
	function createEmail(){
		$data['content'] = 'admin/contact/view_create_email';
		$data['username'] = $this->username;
		$data['email'] = null;
		$this->load->view($this->template,$data);
	}
	
	function createEmail2($id){
		$data['content'] = 'admin/contact/view_create_email';
		$data['username'] = $this->username;
		$result = $this->email_model->load($id,1);
		$data['email'] = $result[0]['EMAIL'];
		$this->load->view($this->template,$data);
	}
	
	public function sendMail()
	{
		// print_r($this->input->post());
		// die();
		$email = explode(',',$this->input->post('email'));
		
		foreach($email as $val){
			$to = $val;    
			$from = "hibapunya@gmail.com";    
			$subject = $this->input->post('subject');    
			$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
			$headers .= "From:" . $from;
			$message = "<html><body>".$this->input->post('message')."</body></html>";   
			mail($to,$subject,$message, $headers);    
		}
		
		$save = 1;
		if($save){
			$result['code'] = 1; 
			$result['massage'] = 'email berhasil di kirim'; 
		}else{
			$result['code'] = 0; 
			$result['massage'] = 'email gagal di kirim'; 
		}
		echo json_encode($result);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */