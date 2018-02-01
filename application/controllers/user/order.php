<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	 function __construct()
    {
        // Initialization of class
        parent::__construct();

        // load the model
		$this->template = 'user/template';
        $this->load->model('produk_model');
        $this->load->model('order_model');
    }
	public function index()
	{ 
	}
	public function cart()
	{ 
		$data['content'] = 'user/cart'; 
		$this->load->view($this->template,$data);
	}
	public function input_order(){
		$id=$this->input->post('id');  //prod
		$size=$this->input->post('ukuran'); //size
		$ket=$this->input->post('ket'); //size		
		
		if($ket==1){ //add to cart di detail
			$uk=explode('-',$size);
			$size=$uk[0];
			$stok=$uk[1];	
			$data_detail = $this->produk_model->loadStok($size,$type=1);
			$sizeasli='';
			if(!empty($data_detail)){
				$sizeasli=$data_detail[0]['UKURAN'];
			}
		}elseif($ket==2){ //add more
			$size=$size;
			$data_detail = $this->produk_model->loadStok($size,$type=1);
			$sizeasli='';
			if(!empty($data_detail)){
				$sizeasli=$data_detail[0]['UKURAN'];
			}
		}
		$jumlah_produk=$this->input->post('qty'); 
		
		$data_prod = $this->produk_model->load($id,$type = 1);
		$product_name = $data_prod[0]['NAMA_PRODUK']; //nama product
		$img1 = $data_prod[0]['GAMBAR1']; //img product 
		$price = $data_prod[0]['HARGA']; //price product 
						
		$harga_sekarang=$price;
		
		$old_order = $this->cart->contents();
		
		$check=false;
		if(!empty($old_order)){
			foreach ($old_order  as $items){					
				if(($id==$items['id']) && $size == $items['options']['size']){
					$check=true;
					 
					$data = array(
					   'rowid'      => $items['rowid'],
					   'qty'     => $items['qty']+$jumlah_produk,  
					  );
					break;
				}
			}
		}
		
		if($check==false){
			$data = array(
               'id'      => $id,
               'qty'     => $jumlah_produk,
               'price'   => $harga_sekarang,
               'name'    => $product_name,
               'options' => array('custom'=>0,'size' => $size,'sizeasli' => $sizeasli, 'img1' => $img1)
            );

			$this->cart->insert($data); 
		}else{
			$this->cart->update($data); 
		}	
		echo "1";
	}
	
	public function input_order_custom(){
		$id=$this->input->post('id');  //prod
		$size='-'; //size
		$ket=$this->input->post('ket'); //ket	
		$tali_depan=$this->input->post('tali_depan'); //ket	
		$tali_tengah=$this->input->post('tali_tengah'); //ket	
		$tali_belakang=$this->input->post('tali_belakang'); //ket	
		$keterangan=$this->input->post('keterangan'); //ket	
		
		$sizeasli=$this->input->post('ukuran');
		$jumlah_produk=$this->input->post('qty'); 
		
		$data_prod = $this->produk_model->load($id,$type = 1);
		$product_name = $data_prod[0]['NAMA_PRODUK']; //nama product
		$img1 = $data_prod[0]['GAMBAR1']; //img product 
		$price = $data_prod[0]['HARGA']; //price product 
						
		$harga_sekarang=$price;
		
		$old_order = $this->cart->contents();
		
		$check=false;
		if(!empty($old_order)){
			foreach ($old_order  as $items){					
				if(($id==$items['id']) && $sizeasli == $items['options']['sizeasli']){
					$check=true;
					 
					$data = array(
					   'rowid'      => $items['rowid'],
					   'qty'     => $items['qty']+$jumlah_produk,  
					  );
					break;
				}
			}
		}
		
		if($check==false){
			$data = array(
               'id'      => $id,
               'qty'     => $jumlah_produk,
               'price'   => $harga_sekarang,
               'name'    => $product_name,
               'options' => array('custom'=>1,'size' => $size,'sizeasli' => $sizeasli, 'img1' => $img1, 'tali_depan' => $tali_depan, 'tali_tengah' => $tali_tengah, 'tali_belakang' => $tali_belakang,'keterangan'=>$keterangan)
            );

			$this->cart->insert($data); 
		}else{
			$this->cart->update($data); 
		}	
		echo "1";
	}
	function show_custom(){
		$rowid=$this->input->post('rowid');
		$order = $this->cart->contents();
		foreach($order as $val){
			if($val['rowid']==$rowid){
				echo json_encode($val);
				break;
			}
		}
	}
	
	function alphaspace($fullname){ 
		$rexSafety = "/^[a-zA-Z ]+$/"; 
		// if first_item and second_item are equal
		if(preg_match($rexSafety, $fullname)) { return $fullname; }
		else { $this->form_validation->set_message('alphaspace', 'Full Name field may only contain alpha and space.'); return FALSE; }
    } 
	
	function delete_order(){
		 
		$cart = $this->cart->destroy();
		
		$order = $this->cart->contents();
		if(empty($order)){
			echo "1";
		}else{
			echo "Gagal";
		}
		
	}
	
	function remove_order(){ 
		$index=$this->input->post('val');
		$tipe=$this->input->post('type');
		$rowid=$this->input->post('rowid'); 
		$data = array(
				   'rowid'      => $rowid,
				   'qty'     => 0,  
				  );
		$this->cart->update($data); 
		echo 1; 
	}
	
	function pengiriman(){
		$data['content'] = 'user/pengiriman'; 
		$this->load->view($this->template,$data);
	}
	function getProvince(){
		$this->load->library('rajaongkir_lib');
		$provinces = $this->rajaongkir_lib->province();
		
		echo $provinces;
	}
	function getCost(){
		//Mendapatkan data ongkos kirim
		$origin ="23";//kota bandung //$this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = "jne";//$this->input->get('courier');
		
		$this->load->library('rajaongkir_lib');
		$cost = $this->rajaongkir_lib->cost($origin, $destination,$berat, $courier);
		echo $cost;
	}
	

	function getCity($province){
		$this->load->library('rajaongkir_lib');
		$response = $this->rajaongkir_lib->city($province);

		 
	  //echo $response;
		$data = json_decode($response, true);
	  //echo json_encode($k['rajaongkir']['results']);
	  if($data['rajaongkir']['status']['description']=='OK'){ 
		 echo '<option value="" selected="" disabled="">Pilih Kota</option>';
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){		  

			echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['type']." ".$data['rajaongkir']['results'][$j]['city_name']."</option>";
		  
		  }
	  }
		 
	}
	
	function checkout(){
		
		$tgl = $this->order_model->getDate(); 
		$session = $this->session->userdata('user_login');
		$datainput['ID_CUSTOMER'] = $session['id'];
		$datainput['TGL_TRANSAKSI'] = $tgl['datetime'];
		$datainput['NAMA_PENERIMA'] = $this->input->post('nama_penerima');
		$datainput['ALAMAT_PENERIMA'] = $this->input->post('alamat');
		$datainput['PROVINSI_PENERIMA'] = $this->input->post('provinsi_tujuan');
		$datainput['KOTA_PENERIMA'] = $this->input->post('destination');
		$datainput['KODEPOS_PENERIMA'] = $this->input->post('kode_pos');
		$datainput['NOTLP_PENERIMA'] = $this->input->post('no_tlp');
		$datainput['ONGKIR'] = $this->input->post('ongkir');
		$datainput['STATUS_TRANSAKSI'] = "Menunggu pembayaran";
		$datainput['FLAG_DEL'] = 0;
		
		$save = $this->order_model->saveOrder($datainput); 
		$id_transaksi=$this->db->insert_id();
		
		$result['message']="";
		if($save){
			
			$contents=$this->cart->contents(); 
			if(!empty($contents)){
				foreach ($contents as $items){
					$datadetail['ID_TRANSAKSI'] = $id_transaksi;
					$datadetail['ID_PRODUK'] = $items['id'];
					$datadetail['HARGA'] = $items['price'];
					$datadetail['JUMLAH'] = $items['qty'];
					$datadetail['SUBTOTAL'] =$items['subtotal'];
					$datadetail['TYPE_PRODUK'] = $items['options']['custom'];
					if($items['options']['custom']==0){
						$datadetail['DETAIL_CUSTOM'] = "";
					}
					if($items['options']['custom']==1){
						$datadetail['DETAIL_CUSTOM'] = json_decode($items['options']);
					}
					$datadetail['GAMBAR1'] = $items['options']['img1'];
					
					$this->order_model->saveDetailOrder($datadetail);

					$param['sizeasli'] = $items['options']['sizeasli'];
					$param['produk_id'] = $items['id'];
					$cekData = $this->order_model->load($param,2);
					$sisa = intval($cekData['0']['STOK']) - intval($items['qty']);
					$param2['PRODUK_ID'] = $cekData[0]['PRODUK_ID'];
					$param2['STOK'] = $sisa;
					$param2['UKURAN'] = $items['options']['sizeasli'];
					$this->order_model->updateDetailPorudk($param2,$param2['PRODUK_ID']);
				}
				
				$cart = $this->cart->destroy();
				$order = $this->cart->contents();
			}
			$result['message']="1";				
			$result['trx']=$id_transaksi;				
			//$data['content'] = 'user/checkout'; 
			//$this->load->view($this->template,$data);
			//'<div class="alert alert-success">Terima kasih telah melakukan pemesanan, Nomor Transaksi anda: <strong>'+data.trx+'</strong>.<br/> Detail pemesanan dapat dilihat pada menu order anda.</div>'
		}else{
			$result['message']="Gagal melakukan pemesanan.";
			
		}
		echo json_encode($result);
	}
	
	public function listOrder()
	{
		$data['content'] = 'user/transaksi';
		$session = $this->session->userdata('user_login');
		//print_r($session);
		$param['idCutomer'] =$session['id']; 
		$data['data'] = $this->order_model->loadOrder($param,$type = 2);
		$this->load->view($this->template,$data);
		
	}
	
	public function listOrderDetail($id)
	{
		$data['content'] = 'user/transaksi-detail';
		$session = $this->session->userdata('user_login');
		//print_r($session);
		$param['idTransaksi'] = $id; 
		$data['data'] = $this->order_model->loadOrderDetail($param,$type = 2);
		// echo "<pre/>";
		print_r($data['data']);
		$this->load->view($this->template,$data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */