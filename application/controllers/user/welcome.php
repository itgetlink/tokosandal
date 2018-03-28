<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	 {
		
	   parent::__construct();
	    
		$this->template = 'user/template';
		$this->load->model('produk_model');
		$this->load->model('email_model');
		$this->load->model('customer_model');
		$this->load->model('about_model');
		$this->load->model('upload_pembayaran_model');
	 }
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		$data['content'] = 'user/index';
		
		$this->load->view($this->template,$data);
		
	}
	
	public function formResetPassword($id)
	{
		$data['content'] = 'user/formResetPassword';
		$data['data'] = $load = $this->customer_model->load($id,$type = 1);
		$this->load->view($this->template,$data);
		
	}
	
	public function about()
	{
		$data['content'] = 'user/about';
		$data['data'] = $this->about_model->load(null,$type=0);
		$this->load->view($this->template,$data);
		
	}
	
	public function contact()
	{
		$data['content'] = 'user/contact';
		$this->load->view($this->template,$data);
		
	}
	
	public function produk()
	{
		$data['content'] = 'user/produk';
		$data['data'] = $this->produk_model->load($val = 1,$type = 2);
		$this->load->view($this->template,$data);
	}
	
	public function customize()
	{
		$data['content'] = 'user/customize';
		$data['data'] = $this->produk_model->load($val = 2,$type = 2);
		$this->load->view($this->template,$data);
	}

	public function upload()
	{
		$data['content'] = 'user/upload-pembayaran';
		$this->load->view($this->template,$data);
	}
	
	public function detailProdukDefault($id)
	{
		$data['content'] = 'user/detail-produk';
		$data['data'] = $this->produk_model->load($id,$type = 1);
		$data['data_stok'] = $this->produk_model->loadStok($id,$type = 2);
		$this->load->view($this->template,$data);
	}
	public function login()
	{
		//$this->load->view('register',$data);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	 
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			
			//$this->load->view('login');
			echo "0";
		}
		else
		{			
		   $username = $this->input->post('username');
		   $password = $this->input->post('password');
		 
		   //query the database
		   $result = $this->customer_model->login($username, $password);
		 
		   if($result)
		   {
				$sess_array = array();
				foreach($result as $row)
				{
					$sess_array = array(
						'id' => $row->ID,
						'username' => $row->USERNAME,
					);
					$this->session->set_userdata('user_login', $sess_array);
				}
				echo "1";
			}
			else
			{			  
				echo "2";
				
			} //end else
		} //end validation
		
	}
	function logout(){
		$this->session->unset_userdata('user_login');
	   redirect(base_url()."index.php/user/welcome/index", 'refresh');
	}
	function register()
	{  
		$this->form_validation->set_rules('username', 'Username', 'required'); 
		$this->form_validation->set_rules('password', 'Password', 'required');  
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password', 'required|matches[password]'); 
		$this->form_validation->set_rules('nama_customer', 'Nama Lengkap', 'required'); 
		$this->form_validation->set_rules('email', 'Email', 'required|email'); 
		$this->form_validation->set_rules('alamat', 'Alamat', 'required'); 
		
		if ($this->form_validation->run() == FALSE){
			echo validation_errors();		 
		}
		else{ 
			$data = array( 
				'NAMA_CUSTOMER' => $this->input->post('nama_customer'), 
				'ALAMAT' => $this->input->post('alamat'), 
				'EMAIL' => $this->input->post('email'), 
				'USERNAME' => $this->input->post('username'),
				'PASSOWORD' => md5($this->input->post('password')),
			);
			//Transfering data to Model
			$this->customer_model->save($data);
			echo "1";
		}
	    
	 }
	
	public function sendMail()
	{
		
		$from = $this->input->post('email');    
		// $to = "hiba@neuronworks.co.id";    
		$to = "bearpath.sandal@gmail.com";    
		$subject = $this->input->post('subject');    
		$message = $this->input->post('message');   
		$headers = "From:" . $from;    
		mail($to,$subject,$message, $headers);    
		
		$data['EMAIL']			= $this->input->post('email');
		$data['MASSAGE']		= $this->input->post('message');
		$data['SUBJECT']		= $this->input->post('subject');
		$data['NAMA_PENGIRIM']	= $this->input->post('name');
		
		$save = $this->email_model->save($data);			
		if($save){
			$result['code'] = 1; 
			$result['massage'] = 'email berhasil di kirim'; 
		}else{
			$result['code'] = 0; 
			$result['massage'] = 'email gagal di kirim'; 
		}
		echo json_encode($result);
	}

	public function sendUploadPembayaran()
	{   
		$file = $this->uploadfile($_FILES['buktipembayaran']);

		if($file['code'] == 0){
			//$file['GAMBAR'] = '1';
			//echo json_encode($file);//return gagal upload
		}
		else{

			$data['NAMA']				= $this->input->post('nama');
			$data['PESAN']				= $this->input->post('pesan');
			$data['BUKTI_PEMBAYARAN']	= $file['new_name'];
		
			$save = $this->upload_pembayaran_model->save($data);			
			if($save){
				$result['code'] = 1; 
				$result['massage'] = 'bukti pembayaran berhasil dikirim'; 
			}else{
				$result['code'] = 0; 
				$result['massage'] = 'bukti pembayaran gagal dikirim'; 
			}
			echo json_encode($result);
		}
	}

	function uploadfile($data){
		$new_name = date('Y_m_d_H_i_s')."_".$data['name']; // set new name
		$new_name = str_replace(' ','',$new_name); 
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'jpg|jpeg|png|pdf|PDF|JPG';
		// $config['allowed_types'] = 'jpg|jpeg|png';
		$config['upload_path'] = './aset/upload/'; 
		$config['max_size']	= '2000000'; // max 2 MB
		$config['file_name'] = $new_name; //set file name config
		// $config['max_width'] = 397;
		// $config['max_height'] = 467;
		$config['overwrite'] = TRUE;
		
		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		//if($type == 'buktipembayaran'){
			$upload = $this->upload->do_upload('buktipembayaran');
		//}
		
		if (!$upload)
		{ 
			$row['massage'] ='Tidak dapat mengunggah dokumen, ukuran atau extensi file tidak tepat.';
			$row['code'] = 0;
		}else{
			$row['code'] = 1;
			$row['new_name'] = $new_name;
		}
		return $row;
	}
	
	public function aa()
	{
		$email = $this->input->post('data');
		$load = $this->customer_model->load($email,$type = 2);			
		if($load){
			$result['code'] = 1; 
			$result['id'] = $load[0]['ID']; 
		}else{
			$result['code'] = 0; 
			$result['massage'] = 'email tidak ditemukan'; 
		}
		echo json_encode($result);
	}
	
	public function resetPassword()
	{
		$data['ID']	= $this->input->post('id');
		if($this->input->post('password')){
			$data['PASSOWORD']		= md5($this->input->post('password'));
		}
		// print_r($data);die();
		$save = $this->customer_model->update($data,$data['ID']);
		//print_r($save); die();
		if($save){
			$result['code'] = 1; 
			$result['massage'] = 'data berhasil di rubah'; 
		}else{
			$result['code'] = 0; 
			$result['massage'] = 'data gagal di rubah'; 
		}
		echo json_encode($result);
	} 
}
