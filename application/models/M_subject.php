<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_subject.php");

class M_subject extends Da_subject {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/
	
	
	function get_all_subject_by_t_id(){
		
		$sql = "SELECT sec_id, s_id, s_code, s_name_th, s_name_en, s_credit, te_term, sec_number 
				FROM section
			   LEFT JOIN subject on subject.s_id = section.sec_s_id
			   LEFT JOIN term on term.te_s_id = subject.s_id
			   LEFT JOIN enroll on enroll.e_sec_id = section.sec_id
			   LEFT JOIN teach on teach.tch_sec_id = section.sec_id 
			   WHERE teach.tch_t_id = ?
			   GROUP BY  section.sec_id
			   ORDER BY subject.s_code,section.sec_number";

		$query = $this->db->query($sql, array($this->t_id));
				
		return $query;
	}

	function get_num_std(){
		$sql = "SELECT COUNT(enroll.e_sec_id) as num_std 
					FROM enroll 
					WHERE enroll.e_sec_id = ?
					GROUP BY enroll.e_sec_id";

		$query = $this->db->query($sql, array($this->sec_id));
				
		return $query;
	}

	function get_num_std_not_teach(){
		$sql = "SELECT COUNT(enroll.e_sec_id) as num_std 
					FROM enroll 
					WHERE enroll.e_sec_id = ?
					GROUP BY enroll.e_sec_id";

		$query = $this->db->query($sql, array($this->sec_id));
				
		return $query;
	}

	function get_info_subject_by_sec_id(){
		$sql = "SELECT * FROM subject
					LEFT JOIN section ON section.sec_s_id = subject.s_id
					LEFT JOIN term ON term.te_s_id = subject.s_id
					WHERE section.sec_id = ?";

		$query = $this->db->query($sql, array($this->sec_id));
				
		return $query;
	}

} // end class M_vip
?>




