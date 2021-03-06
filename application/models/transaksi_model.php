<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Transaksi_model extends CI_Model
{
	function save($data)
	{
		$this->db->insert('transaksi', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}
	
	function saveDetail($data)
	{
		$this->db->insert('transaksi_detail', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}
	
	function loadType() //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('transaksi_type');
		$query = $this -> db -> get()->result_array();
		return $query;
	} 
	
	function load($data,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('transaksi');
		$this -> db -> where('FLAG_DEL',0);
		if($type==1){
			$this -> db -> where('ID',$data);
		}
		if($type==2){
			$this -> db -> where('TYPE_TRANSAKSI',$data);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	function loadTransaksi($data,$type)  
	{	
		$this -> db -> select('*');
		$this -> db -> from('transaksi_detail');
		// $this -> db -> where('FLAG_DEL',0);
		if($type==1){
			$this -> db -> where('ID',$data);
		}
		if($type==2){
			$this -> db -> where('Transaksi_ID',$data);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	var $table = 'transaksi T';
	var $column_order = array(null,'ID', 'ID_CUSTOMER','TGL_TRANSAKSI','NAMA_PENERIMA','ALAMAT_PENERIMA','PROVINSI_PENERIMA','KOTA_PENERIMA','KODEPOS_PENERIMA','NOTLP_PENERIMA','ONGKIR','STATUS_TRANSAKSI','FLAG_DEL'); //set column field database for datatable orderable
	var $column_search = array('ID', 'ID_CUSTOMER','TGL_TRANSAKSI','NAMA_PENERIMA','ALAMAT_PENERIMA','PROVINSI_PENERIMA','KOTA_PENERIMA','KODEPOS_PENERIMA','NOTLP_PENERIMA','ONGKIR','STATUS_TRANSAKSI','FLAG_DEL'); //set column field database for datatable searchable 
	var $order = array('ID' => 'asc'); // default order 
	
	private function _get_datatables_query()
	{
		
		$this -> db -> select('ID,ID_CUSTOMER,TGL_TRANSAKSI,NAMA_PENERIMA,ALAMAT_PENERIMA,PROVINSI_PENERIMA,KOTA_PENERIMA,KODEPOS_PENERIMA,NOTLP_PENERIMA,NOTLP_PENERIMA,ONGKIR,STATUS_TRANSAKSI,FLAG_DEL');
		 
		$this -> db -> from($this->table);
		$this -> db -> where('FLAG_DEL',0);
		
		$i=0;
		foreach ($this->column_search as $item) // loop column 
		{
			$i++;
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{	//$this->db->where("(", NULL, FALSE);
					//$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i){} //last loop
					//$this->db->group_end(); //close bracket
					//$this->db->where(")", NULL, FALSE);
			}
			
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		
		$query = $this->db->get();
		
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	function update($data,$id)
	{
		$this->db->where('ID',$id); 
	 	$this->db->update('transaksi', $data);
		if ($this->db->affected_rows() == 1) { 
            return TRUE;
        } else { 
            return FALSE;
        }
	}
	
	var $tableDetail = 'transaksi_detail';
	var $column_order_detail = array(null,'PRODUK_DETAIL_ID', 'PRODUK_ID','UKURAN','STOK','NAMA_PRODUK','GAMBAR1'); //set column field database for datatable orderable
	var $column_search_detail = array('PRODUK_DETAIL_ID', 'PRODUK_ID','UKURAN','STOK','NAMA_PRODUK','GAMBAR1'); //set column field database for datatable searchable 
	var $order_detail = array('PRODUK_DETAIL_ID' => 'asc'); // default order 
	
	private function _get_detail_query()
	{
		
		$this -> db -> select('PRODUK_DETAIL_ID,PRODUK_ID,UKURAN,STOK,NAMA_PRODUK,GAMBAR1');
		 
		$this -> db -> from($this->tableDetail);
		$this -> db -> where('PRODUK_ID',$_POST['ID']);
		
		$i=0;
		foreach ($this->column_search_detail as $item) // loop column 
		{
			$i++;
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{	$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_detail) - 1 == $i){} //last loop
					
			}
			
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_detail[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order_detail))
		{
			$order = $this->order_detail;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_detail()
	{
		$this->_get_detail_query();
		
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		
		$query = $this->db->get();
		
		return $query->result();
	}

	function count_filtered_detail()
	{
		$this->_get_detail_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_detail()
	{
		$this->db->from($this->tableDetail);
		return $this->db->count_all_results();
	}
	
	function updateDetail($data,$id)
	{
		$this->db->where('ID',$id); 
	 	$this->db->update('transaksi_detail', $data);
		if ($this->db->affected_rows() == 1) { 
            return TRUE;
        } else { 
            return FALSE;
        }
	}
	
}
?>