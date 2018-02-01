<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Admin_model extends CI_Model
{
	function login($username, $password)
	{
		$this -> db -> select('ID, USER_NAME');
		$this -> db -> from('admin');
		$this -> db -> where('USER_NAME', $username);
		$this -> db -> where('PASSWORD', MD5($password));
		$this -> db -> limit(1);
	 
		$query = $this -> db -> get();
 
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>