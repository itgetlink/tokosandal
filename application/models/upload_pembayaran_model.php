<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Upload_pembayaran_model extends CI_Model
{
	function save($data)
	{
		$this->db->insert('upload_pembayaran', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	
	function load($data,$type) 
	{	
		$this -> db -> select('*');
		$this -> db -> from('upload_pembayaran');
		if($type==1){
			$this -> db -> where('ID',$data);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	function loadStok($data,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('produk_detail');
		// $this -> db -> where('FLAG_DEL',0);
		if($type==1){
			$this -> db -> where('ID',$data);
		}
		if($type==2){
			$this -> db -> where('PRODUK_ID',$data);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	var $table = 'email P';
	var $column_order = array(null,'ID', 'NAMA_PENGIRIM','SUBJECT','MASSAGE','EMAIL'); //set column field database for datatable orderable
	var $column_search = array('ID', 'NAMA_PENGIRIM','SUBJECT','MASSAGE','EMAIL'); //set column field database for datatable searchable 
	var $order = array('ID' => 'asc'); // default order 
	
	private function _get_datatables_query()
	{
		
		$this -> db -> select('ID,NAMA_PENGIRIM,SUBJECT,MASSAGE,EMAIL');
		 
		$this -> db -> from($this->table);
		
		$i=0;
		foreach ($this->column_search as $item) // loop column 
		{
			$i++;
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{	
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i){} //last loop
					
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

}
?>