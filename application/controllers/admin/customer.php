<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Customer extends CI_Controller {

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
			redirect(base_url().'index.php/admin/login', 'refresh');
		}
		
		$this->load->model('customer_model');
		
	 }
	function index(){
		$data['content'] = 'admin/customer/view_customer';
		$data['username'] = $this->username;
		$this->load->view($this->template,$data);
	}
	
	function formCustomer(){
		$data['content'] = 'admin/customer/view_customer_save';
		$data['username'] = $this->username;
		
		$this->load->view($this->template,$data);
	}
	
	function tambahCustomer(){
			
			$data['NAMA_CUSTOMER']	= $this->input->post('nama');
			$data['ALAMAT']			= $this->input->post('alamat');
			$data['USERNAME']		= $this->input->post('username');
			$data['PASSOWORD']		= md5($this->input->post('password'));
			$data['EMAIL']			= $this->input->post('email');
			
			$save = $this->customer_model->save($data);			
			if($save){
				$result['code'] = 1; 
				$result['massage'] = 'data berhasil di simpan'; 
			}else{
				$result['code'] = 0; 
				$result['massage'] = 'data gagal di simpan'; 
			}
			echo json_encode($result);
	}
	
	function uploadfile($data,$type){
			$new_name = $type."_".date('Y_m_d_H_i_s')."_".$data['name']; // set new name
			$new_name = str_replace(' ','',$new_name); 
			$config['encrypt_name'] = TRUE;
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|PDF';
			// $config['allowed_types'] = 'jpg|jpeg|png';
			$config['upload_path'] = './aset/upload/'; 
			$config['max_size']	= '2000000'; // max 2 MB
			$config['file_name'] = $new_name; //set file name config
			$config['overwrite'] = TRUE;
			
			$this->load->library('upload', $config);
			
			$this->upload->initialize($config);
			if($type == 'gambar1'){
				$upload = $this->upload->do_upload('gambar1');
			}
			if($type == 'gambar2'){
				$upload = $this->upload->do_upload('gambar2');
			}
			if($type == 'gambar3'){
				$upload = $this->upload->do_upload('gambar3');
			}
			
			if (!$upload)
			{ 
				$row['massage'] ='Tidak dapat mengunggah dokumen, ukuran atau extensi file tidak tepat.';
				$row['code'] = 0;
			}else{
				$row['code'] = 1;
			}
		return $row;
	}
	
	public function ajax_list()
	{
		$list = $this->customer_model->get_datatables();
		// print_r($list);
		// die(); 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $produk) {
			$no++;
			$row = array();
			
			$row[] = '<span id="ptype'.$produk->ID.'">'.$produk->NAMA_CUSTOMER.'</span>'; 
			$row[] = '<span id="pname'.$produk->ID.'">'.$produk->USERNAME.'</span>'; 
			$row[] = '<span id="pdesc'.$produk->ID.'">'.$produk->EMAIL.'</span>';  
			$row[] = '<span id="pdesc'.$produk->ID.'">'.$produk->ALAMAT.'</span>';  
			$row[] = '<span id="pedit'.$produk->ID.'"><a title="edit produk" href="javascript:void(0);" onclick="show_edit(\''.$produk->ID.'\')">Edit Produk</a></span>'; 
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->customer_model->count_all(),
						"recordsFiltered" => $this->customer_model->count_filtered(),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	
	function formEdit($id){
		$data['content'] = 'admin/customer/view_customer_edit';
		$data['username'] = $this->username;
		$data['data'] = $this->customer_model->load($id,$type=1);// type 1 untuk load produk by id
		$this->load->view($this->template,$data);
	}
	
	function update(){
		
			$data['NAMA_CUSTOMER']	= $this->input->post('nama');
			$data['ALAMAT']			= $this->input->post('alamat');
			$data['USERNAME']		= $this->input->post('username');
			if($this->input->post('password')){
				$data['PASSOWORD']		= md5($this->input->post('password'));
			}
			$data['EMAIL']			= $this->input->post('email');
			
			$save = $this->customer_model->update($data);			
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