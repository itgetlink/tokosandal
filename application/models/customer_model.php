<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Customer_model extends CI_Model
{
	function login($username, $password)
	{
		$query = $this->db->query("SELECT * FROM `customer` where USERNAME='".$username."' and PASSOWORD='".MD5($password)."'");
	
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function save($data)
	{
		$this->db->insert('customer', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}
	
	function load($id,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('customer');
		if($type==1){
			$this -> db -> where('ID',$id);
		}else if($type==2){
			$this -> db -> where('EMAIL',$id);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	var $table = 'customer C';
	var $column_order = array(null,'ID', 'NAMA_CUSTOMER','USERNAME','PASSOWORD','EMAIL','ALAMAT'); //set column field database for datatable orderable
	var $column_search = array('ID', 'NAMA_CUSTOMER','USERNAME','PASSOWORD','EMAIL','ALAMAT'); //set column field database for datatable searchable 
	var $order = array('ID' => 'asc'); // default order 
	
	private function _get_datatables_query()
	{
		
		$this -> db -> select('ID,NAMA_CUSTOMER,USERNAME,PASSOWORD,EMAIL,ALAMAT');
		 
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
	 	$this->db->update('customer', $data);
		if ($this->db->affected_rows() == 1) { 
            return TRUE;
        } else { 
            return FALSE;
        }
	}
	
}
?>