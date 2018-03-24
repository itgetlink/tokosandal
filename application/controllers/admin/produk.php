<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Produk extends CI_Controller {

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
		
		$this->load->model('produk_model');
		
	 }
	function index(){
		$data['content'] = 'admin/produk/view_produk';
		$data['username'] = $this->username;
		$this->load->view($this->template,$data);
	}
	
	function formProduk(){
		$data['content'] = 'admin/produk/view_produk_save';
		$data['username'] = $this->username;
		$data['type'] = $this->produk_model->loadType();
		
		$this->load->view($this->template,$data);
	}
	
	function tambahProduk(){
		// print_r($this->input->post());
		// print_r($_FILES);
		// die();
		$file1 = $this->uploadfile($_FILES['gambar1'],'gambar1');
		// print_r($file1);
		$file2 = $this->uploadfile($_FILES['gambar2'],'gambar2');
		// print_r($file2);
		$file3 = $this->uploadfile($_FILES['gambar3'],'gambar3');
		// print_r($file3);
		
		// die();
		
		if($file1['code'] == 0){
			$file1['GAMBAR'] = '1';
			echo json_encode($file1);//return gagal upload
		}
		else if($file2['code'] == 0){
			$file1['GAMBAR'] = '2';
			echo json_encode($file2);//return gagal upload
		}
		else if($file3['code'] == 0){
			$file1['GAMBAR'] = '3';
			echo json_encode($file3);//return gagal upload
		}
		else{
			// $new_name = "gambar1_".date('Y_m_d_H_i_s')."_".$_FILES['gambar1']['name']; // set new name
			// $gambar1 = $new_name;
			
			// $new_name = "gambar2_".date('Y_m_d_H_i_s')."_".$_FILES['gambar2']['name']; // set new name
			// $gambar2 = $new_name;
			
			// $new_name = "gambar3_".date('Y_m_d_H_i_s')."_".$_FILES['gambar3']['name']; // set new name
			// $gambar3 = $new_name;
			
			$data['TYPE_PRODUK']	= $this->input->post('typeProduk');
			$data['NAMA_PRODUK']	= $this->input->post('namaProduk');
			$data['KETERANGAN']		= $this->input->post('keterangan');
			$data['GAMBAR1']		= $file1['new_name'];//$gambar1;
			$data['GAMBAR2']		= $file2['new_name'];//$gambar2;
			$data['GAMBAR3']		= $file3['new_name'];//$gambar3;
			$data['HARGA']			= $this->input->post('hargaProduk');
			$save = $this->produk_model->save($data);			
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
	
	function uploadfile($data,$type){
			$new_name = $type."_".date('Y_m_d_H_i_s')."_".$data['name']; // set new name
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
				$row['new_name'] = $new_name;
			}
		return $row;
	}
	
	public function ajax_list()
	{
		$list = $this->produk_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $produk) {
			$no++;
			$row = array();
			
			$row[] = '<span id="ptype'.$produk->ID.'">'.$produk->TYPE_PRODUK.'</span>'; 
			$row[] = '<span id="pname'.$produk->ID.'">'.$produk->NAMA_PRODUK.'</span>'; 
			$row[] = '<span id="pdesc'.$produk->ID.'">'.$produk->KETERANGAN.'</span>';  
			$row[] = '<span id="pdesc'.$produk->ID.'">'.$produk->HARGA.'</span>';  
			$row[] = '<img src="'.base_url().'aset/upload/'.$produk->GAMBAR1.'" style="width:100%;height:10%;"/>';  
			$row[] = '<img src="'.base_url().'aset/upload/'.$produk->GAMBAR2.'" style="width:100%;height:10%;"/>';  
			$row[] = '<img src="'.base_url().'aset/upload/'.$produk->GAMBAR3.'" style="width:100%;height:10%;"/>';  
			$row[] = '<span id="pedit'.$produk->ID.'"><a title="edit produk" href="javascript:void(0);" onclick="show_edit(\''.$produk->ID.'\')">Edit Produk</a></span>'; 
			$row[] = '<span id="pedit'.$produk->ID.'"><a title="Detail produk" href="javascript:void(0);" onclick="show_detail(\''.$produk->ID.'\')">Stok Produk</a></span>'; 
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->produk_model->count_all(),
						"recordsFiltered" => $this->produk_model->count_filtered(),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	public function ajax_list_detail()
	{
		
		$list = $this->produk_model->get_detail();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $produk) {
			$no++;
			$row = array();
			
			$row[] = '<span id="ptype'.$produk->PRODUK_DETAIL_ID.'">'.$produk->NAMA_PRODUK.'</span>'; 
			$row[] = '<img src="'.base_url().'aset/upload/'.$produk->GAMBAR1.'" style="width:50%;height:10%;"/>';
			$row[] = '<span id="ptype'.$produk->PRODUK_DETAIL_ID.'">'.$produk->UKURAN.'</span>'; 
			$row[] = '<span id="pname'.$produk->PRODUK_DETAIL_ID.'">'.$produk->STOK.'</span>'; 
			$row[] = '<span id="pedit'.$produk->PRODUK_DETAIL_ID.'"><a title="update produk" href="javascript:void(0);" onclick="show_update(\''.$produk->PRODUK_DETAIL_ID.'\')">Update Produk</a></span>'; 
			
			
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->produk_model->count_detail(),
						"recordsFiltered" => $this->produk_model->count_filtered_detail(),
						"data" => $data,
				);
		
		echo json_encode($output);
	}
	
	function formEdit($id){
		$data['content'] = 'admin/produk/view_produk_edit';
		$data['username'] = $this->username;
		$data['type'] = $this->produk_model->loadType();
		$data['data'] = $this->produk_model->load($id,$type=1);// type 1 untuk load produk by id
		$this->load->view($this->template,$data);
	}
	
	function update(){
		
		$gambar1 			= NULL;
		$gambar2 			= NULL;
		$gambar3 			= NULL;
		
		if($_FILES['gambar1']['name']){
			$file1 = $this->uploadfile($_FILES['gambar1'],'gambar1');
			$new_name = "gambar1_".date('Y_m_d_H_i_s')."_".$_FILES['gambar1']['name']; // set new name
			$gambar1 = $new_name;
			$data['GAMBAR1']=$gambar1;
			$x1=1;
		}else{
			$file1['code'] = 1;
			//$file1['massage'] ='Gambar1 Tidak dapat mengunggah dokumen, ukuran atau extensi file tidak tepat.';
			$x1=0;
		}
		if($_FILES['gambar2']['name']){
			$file2 = $this->uploadfile($_FILES['gambar2'],'gambar2');
			$new_name = "gambar2_".date('Y_m_d_H_i_s')."_".$_FILES['gambar2']['name']; // set new name
			$gambar2 = $new_name;
			$data['GAMBAR2']=$gambar2;
			$x2=1;
		}else{
			$file2['code'] = 1;
			//$file2['massage'] ='Gambar2 Tidak dapat mengunggah dokumen, ukuran atau extensi file tidak tepat.';
			$x2=0;
		}
		
		if($_FILES['gambar3']['name']){
			$file3 = $this->uploadfile($_FILES['gambar3'],'gambar3');
			$new_name = "gambar3_".date('Y_m_d_H_i_s')."_".$_FILES['gambar3']['name']; // set new name
			$gambar3 = $new_name;
			$x3=1;
			$data['GAMBAR3']=$gambar3;
		}else{
			$file3['code'] = 1;
			//$file3['massage'] ='Gambar3 Tidak dapat mengunggah dokumen, ukuran atau extensi file tidak tepat.';
			$x3=0;
		}
		
		if($file1['code'] != 1){
			echo json_encode($file1);//return gagal upload
		}else if($file2['code'] != 1){
			echo json_encode($file2);//return gagal upload
		}else if($file3['code'] != 1){
			echo json_encode($file3);//return gagal upload
		}
		else{
			
			$data['TYPE_PRODUK']	= $this->input->post('typeProduk');
			$data['NAMA_PRODUK']	= $this->input->post('namaProduk');
			$data['KETERANGAN']		= $this->input->post('keterangan');
			$data['HARGA']			= $this->input->post('hargaProduk');
			//$data['STOK']			= $this->input->post('stokProduk');
			// print_r($data);
			// die();
			$save = $this->produk_model->update($data,$this->input->post('idProduk'));
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
	
	function detailProduk($id){
		$data['content'] = 'admin/produk/view_detail_produk';
		$data['username'] = $this->username;
		$data['id'] = $id;
		$this->load->view($this->template,$data);
	}
	
	function loadStok(){
		
		$data = $this->produk_model->loadStok($this->input->post('id'),$type=1);// type 1 untuk load by id
		echo json_encode($data[0]);
	}
	
	function updateDetail(){
		
		$data['ID']		= $this->input->post('id');
		$data['UKURAN']	= $this->input->post('ukuran');
		$data['STOK']	= $this->input->post('stok');
		
		$update = $this->produk_model->updateDetail($data,$this->input->post('id'));
		if($update){
			$result['code'] = 1; 
			$result['massage'] = 'data berhasil di simpan'; 
		}else{
			$result['code'] = 0; 
			$result['massage'] = 'data gagal di simpan'; 
		}
		echo json_encode($result);
	}
	
	function saveDetail(){
	/* print_r($this->input->post());
		die(); */
		$data['PRODUK_ID']		= $this->input->post('idProduk');
		$data['UKURAN']	= $this->input->post('addukuran');
		$data['STOK']	= $this->input->post('addstok');
		
		$save = $this->produk_model->saveDetail($data);
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