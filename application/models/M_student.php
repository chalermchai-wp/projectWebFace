<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_student.php");

class M_student extends Da_student {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/
	
	function get_std_id(){
		
		$sql = "SELECT * FROM student
		WHERE student.std_code  =  ?";
		$query = $this->db->query($sql,array($this->std_code));
				
		return $query;
	}
	


} // end class M_vip
?>




