<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include_once("welcome.php");
include_once("Da_teach.php");

class M_teach extends Da_teach {
	
	/*
	 * aOrderBy = array('fieldname' => 'ASC|DESC', ... )
	*/

	function get_subject_not_teach_test(){
		
		$sql = "SELECT * FROM section 
					LEFT JOIN teach on teach.tch_sec_id = sec_id 
					LEFT JOIN subject on subject.s_id = section.sec_s_id
					LEFT JOIN term ON term.te_s_id = subject.s_id
					LEFT JOIN teacher on teacher.t_id = teach.tch_t_id
					
					WHERE sec_id NOT IN (
					SELECT sec_id FROM section 
					LEFT JOIN teach ON teach.tch_sec_id = section.sec_id 
					WHERE teach.tch_t_id = ?)";

		$query = $this->db->query($sql, array($this->tch_t_id));
				
		return $query;
	}

	function get_subject_not_teach_test_2(){
		
		$sql = "SELECT sec_id,sec_number,subject.s_id,subject.s_code,subject.s_name_th,subject.s_credit,teach.tch_t_id,teacher.t_fName,subject.s_name_en,term.te_term FROM section
					LEFT JOIN subject on subject.s_id = section.sec_s_id
					LEFT JOIN term ON term.te_s_id = subject.s_id
					LEFT JOIN teach on teach.tch_sec_id = section.sec_id
					LEFT JOIN teacher on teacher.t_id = teach.tch_t_id
					WHERE teach.tch_t_id <> ? 
					AND section.sec_id NOT IN 
					(SELECT sec_id FROM section 
					LEFT JOIN teach ON teach.tch_sec_id = section.sec_id 
					WHERE teach.tch_t_id = ? )";

		$query = $this->db->query($sql, array($this->tch_t_id, $this->tch_t_id));
				
		return $query;
	}
	
	
	function get_subject_not_teach(){
		
		$sql = "SELECT sec_id, s_id, s_code, s_name_th, s_name_en, s_credit, te_term, sec_number,
			COUNT(enroll.e_sec_id) as num_std FROM section
				LEFT JOIN subject on subject.s_id = section.sec_s_id
				LEFT JOIN term on term.te_s_id = subject.s_id
				LEFT JOIN enroll on enroll.e_sec_id = section.sec_id
				LEFT JOIN teach on teach.tch_sec_id = section.sec_id 
				WHERE teach.tch_t_id <> ?
				GROUP BY section.sec_id";

		$query = $this->db->query($sql, array($this->tch_t_id));
				
		return $query;
	}

	function get_all_section(){
		
		$sql = "SELECT sec_id, s_id, s_code, s_name_th, s_name_en, s_credit, te_term, sec_number 
				FROM section
				LEFT JOIN subject on subject.s_id = section.sec_s_id
				LEFT JOIN term on term.te_s_id = subject.s_id
				GROUP BY sec_id";

		$query = $this->db->query($sql);
				
		return $query;
	}

	function get_teach_section(){
		
		$sql = "SELECT tch_sec_id FROM teach
				LEFT Join teacher on teacher.t_id = teach.tch_t_id
				WHERE teach.tch_t_id = ?";

		$query = $this->db->query($sql, array($this->tch_t_id));
				
		return $query;
	}

	function get_sec_teach(){
		
		$sql = "SELECT tch_sec_id FROM teach
		LEFT Join teacher on teacher.t_id = teach.tch_t_id
		WHERE teach.tch_t_id = ?";

		$query = $this->db->query($sql, array($this->tch_t_id));
				
		return $query;
	}

} // end class M_vip
?>




