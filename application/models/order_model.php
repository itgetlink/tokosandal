<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class order_model extends CI_Model
{
	function getDate(){
		$this->db->select('NOW() as datetime,CURDATE() as curdate');
		$result = $this->db->get()->row_array(); 
		return $result;
		
	}
	function saveOrder($data){
		$this->db->insert('transaksi', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}
	function saveDetailOrder($data){
		$this->db->insert('detail_transaksi', $data);
		if($this->db->affected_rows() == 1){
			$result = true;
		}else{
			$result = false;
		}
		return $result;
	}
	
	function updateDetailPorudk($data,$id)
	{
		$this->db->where('PRODUK_ID',$id); 
		$this->db->where('UKURAN',$data['UKURAN']); 
	 	$this->db->update('produk_detail', $data);
		if ($this->db->affected_rows() == 1) { 
            return TRUE;
        } else { 
            return FALSE;
        }
	}
	
	function load($data,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('produk_detail');
		if($type==1){
			$this -> db -> where('PRODUK_ID',$data);
		}
		if($type==2){
			$this -> db -> where('PRODUK_ID',$data['produk_id']);
			$this -> db -> where('UKURAN',$data['sizeasli']);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	function loadOrder($data,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('transaksi');
		if($type==1){
			$this -> db -> where('ID',$data);
		}
		if($type==2){
			$this -> db -> where('ID_CUSTOMER',$data['idCutomer']);
		//	$this -> db -> where('UKURAN',$data['sizeasli']);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
	
	function loadOrderDetail($data,$type) //dipakai untuk jabatan admin
	{	
		$this -> db -> select('*');
		$this -> db -> from('detail_transaksi');
		if($type==1){
			$this -> db -> where('ID',$data['id']);
		}
		if($type==2){
			$this -> db -> where('ID_TRANSAKSI',$data['idTransaksi']);
		}
		$query = $this -> db -> get()->result_array();
		return $query;	
	} 
}
?>