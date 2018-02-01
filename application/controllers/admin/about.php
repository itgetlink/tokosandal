<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class About extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();

	    $template="";
		$username="";
		$session_data = $this->session->userdata('logged_in');
		
		$this->load->model('about_model');
		
		if(!empty($session_data))
		{
			$this->username = $session_data['username'];
			$this->template = 'admin/template';
			  
		}
		else
		{
			//If no session, redirect to login page
			redirect(base_url().'admin/login', 'refresh');
		}

	 }

	function index(){

		$data['content'] = 'admin/about/view_about';

		$data['username'] = $this->username;

		$this->load->view($this->template,$data);

	}

	public function ajax_list()
	{
		$list = $this->about_model->get_datatables();
		// print_r($list);
		// die(); 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $about) {
			$no++;
			$row = array();
			
			$row[] = '<span id="ptype'.$about->ID.'">'.$about->ID.'</span>'; 
			$row[] = '<span id="pname'.$about->ID.'">'.$about->DESKRIPSI.'</span>';  
			$row[] = '<span id="pedit'.$about->ID.'"><a title="edit about" href="javascript:void(0);" onclick="show_edit(\''.$about->ID.'\')">Edit About</a></span>'; 
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->about_model->count_all(),
						"recordsFiltered" => $this->about_model->count_filtered(),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	
	function formEdit($id){
		$data['content'] = 'admin/about/view_edit';
		$data['data'] = $this->about_model->load($id,$type=1);// type 1 untuk load produk by id
		$data['username'] = $this->username;
		$this->load->view($this->template,$data);
		
	}
	
	function update(){
			
			$data['ID']			= $this->input->post('id');
			$data['DESKRIPSI']	= $this->input->post('deskripsi');
			
			$save = $this->about_model->update($data,$data['ID']);			
			if($save){
				$result['code'] = 1; 
				$result['massage'] = 'data berhasil di simpan'; 
			}else{
				$result['code'] = 0; 
				$result['massage'] = 'data gagal di simpan'; 
			}
			echo json_encode($result);
		}
}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */