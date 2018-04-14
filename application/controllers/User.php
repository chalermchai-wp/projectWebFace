<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(dirname(__FILE__)."/Login.php");

class User extends Template{
    public function __construct()
	{ 
		parent::__construct();		
	}	
	

    function index(){

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_index',$data);  
	}
	
	function view_attendance(){
		$this->load->model('M_subject','m_s');
		$this->load->model('M_user','m_u');

		$this->m_s->t_id = $this->session->t_id;
		$rs = $this->m_s->get_all_subject_by_t_id()->result();
		//$data['rows'] =  $this->m_s->get_all_subject_by_t_id()->num_rows();

		$num_std = array();
		foreach ( $rs as $index=>$row ){	
			$this->m_s->sec_id = $row->sec_id;
			$row = $this->m_s->get_num_std()->row();	
			array_push($num_std, $row);
		}
		//print_r($rs);die;
		$data['rs_subject'] = $rs;
		$data['num_std'] = $num_std;

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_attendance',$data); 
	}

	function view_edit_cs($sec_id){

		$this->load->model('M_class_schedule','m_cs');

		$this->m_cs->cs_sec_id = $sec_id;
		$data['date'] = $this->m_cs->get_num_rows_by_sec_id();
		$data['sec_id'] = $sec_id; 

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_edit_cs',$data); 
	}

	function update_edit_cs(){
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('sec_id', 'sec_id', 'trim|required');		
		$this->form_validation->set_rules('date[]', 'date[]', 'trim|required');	

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
        }
		else 
		{
			$this->load->model('M_class_schedule','m_cs');

			$this->m_cs->cs_sec_id = trim($this->input->post('sec_id', TRUE));

			$date = $this->input->post('date[]', TRUE);

			foreach ( $date as $index=>$row ){	
				$this->m_cs->db->trans_begin();

				//echo $this->input->post('date['.$index.']', TRUE).'<br>';
				$this->m_cs->cs_week = $index+1;
				$this->m_cs->cs_date = $this->input->post('date['.$index.']', TRUE);

				$this->m_cs->update();

				if ( $this->m_cs->db->trans_status() === FALSE ) {
					$this->m_cs->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_cs->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}

			}

		}

		redirect('user/view_attendance_list/'.trim($this->input->post('sec_id', TRUE)), 'refresh');

	}

	function view_attendance_list($sec_id){

		$this->load->model('M_section','m_sec');
		$this->load->model('M_enroll','m_en');
		$this->load->model('M_class_schedule','m_cs');

		$this->m_cs->cs_sec_id = $sec_id;
		$this->m_en->e_sec_id = $sec_id;
		$this->m_sec->sec_id = $sec_id;

		$data['week'] = $this->m_cs->get_num_rows_by_sec_id();


		$data['first_day'] = $this->m_sec->get_first_day()->row();
		$data['rs_list_std'] = $this->m_en->get_list_std_from_sec_id();
		$data['sec_id'] = $sec_id;

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_attendance_list',$data); 
	}
	
	function manage_subject(){
	   
		$this->load->model('M_subject','m_s');
		$this->load->model('M_user','m_u');

		$this->m_s->t_id = $this->session->t_id;
		$rs = $this->m_s->get_all_subject_by_t_id()->result();
		//$data['rows'] =  $this->m_s->get_all_subject_by_t_id()->num_rows();

		$num_std = array();
		foreach ( $rs as $index=>$row ){	
			$this->m_s->sec_id = $row->sec_id;
			$row = $this->m_s->get_num_std()->row();	
			array_push($num_std, $row);
		}
		//print_r($rs);die;
		$data['rs_subject'] = $rs;
		$data['num_std'] = $num_std;

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_manage_subject',$data);  
	}

	function manage_subject_edit($sec_id){  ////////////////
	   
		$this->load->model('M_subject','m_s');
		
		$this->m_s->sec_id = $sec_id;
		$data['rs_subject'] = $this->m_s->get_info_subject_by_sec_id()->row();		

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_manage_subject_edit',$data);  
	}

	function subject_update(){
	   
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_rules('sec_id', 'sec_id', 'trim|required');			
        $this->form_validation->set_rules('code', 'code', 'trim|required');			
        $this->form_validation->set_rules('name_th', 'name_th', 'required|xss_clean');			
		$this->form_validation->set_rules('name_en', 'name_en', 'xss_clean');			
		$this->form_validation->set_rules('credit', 'credit', 'trim|required');				
		$this->form_validation->set_rules('term', 'term', 'trim|required');	
		$this->form_validation->set_rules('year', 'year', 'trim|required');		
		$this->form_validation->set_rules('group_no', 'group_no', 'trim|required');		
		$this->form_validation->set_rules('time_start', 'time_start', 'trim|required');	
		$this->form_validation->set_rules('time_end', 'time_end', 'trim|required');	
		$this->form_validation->set_rules('time_limit', 'time_limit', 'trim');	
		$this->form_validation->set_rules('day', 'day', 'trim|required');
		$this->form_validation->set_rules('day_first', 'day_first', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
        }
		else 
		{
			$this->load->model('M_section','m_sec');
			$this->load->model('M_subject','m_s');
			$this->load->model('M_term','m_te');
			$this->load->model('M_class_schedule','m_cs');

			//m_s
			$this->m_s->sec_id = trim($this->input->post('sec_id', TRUE));			
			$subject_id = $this->m_s->get_info_subject_by_sec_id()->row();
			
			$this->m_s->db->trans_begin();
			$this->m_s->s_id = $subject_id->s_id;
            $this->m_s->s_code = trim($this->input->post('code', TRUE));
			$this->m_s->s_name_th = trim($this->input->post('name_th', TRUE));			
			$this->m_s->s_name_en = trim($this->input->post('name_en', TRUE));									
			$this->m_s->s_credit = trim($this->input->post('credit', TRUE));														
			$this->m_s->s_year = trim($this->input->post('year', TRUE));	
				
			$this->m_s->update(); 
	            
			if ( $this->m_s->db->trans_status() === FALSE ) {
				$this->m_s->db->trans_rollback();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
			}
			else {
				$this->m_s->db->trans_commit();		
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
			}

			//m_sec
			$this->m_sec->db->trans_begin();
			$this->m_sec->sec_id = trim($this->input->post('sec_id', TRUE));
			$this->m_sec->sec_number = trim($this->input->post('group_no', TRUE));			
			$this->m_sec->sec_time_start = trim($this->input->post('time_start', TRUE));									
			$this->m_sec->sec_time_end = trim($this->input->post('time_end', TRUE));
			$this->m_sec->sec_time_limit = trim($this->input->post('time_limit', TRUE));
			$this->m_sec->sec_day_of_week = trim($this->input->post('day', TRUE));
			$this->m_sec->sec_first_day = trim($this->input->post('day_first', TRUE));

			$this->m_sec->update_2(); 
			if ( $this->m_sec->db->trans_status() === FALSE ) {
				$this->m_sec->db->trans_rollback();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
			}
			else {
				$this->m_sec->db->trans_commit();		
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
			}

			//m_te
			$this->m_te->db->trans_begin();
			$this->m_te->te_s_id = $subject_id->s_id;
			$this->m_te->te_term = trim($this->input->post('term', TRUE));

			$this->m_te->update(); 
			if ( $this->m_te->db->trans_status() === FALSE ) {
				$this->m_te->db->trans_rollback();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
			}
			else {
				$this->m_te->db->trans_commit();		
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
			}

			//m_cs
			$this->m_cs->db->trans_begin();
			$this->m_cs->cs_sec_id = trim($this->input->post('sec_id', TRUE));
			

			$check_cs = $this->m_cs->get_num_rows_by_sec_id()->num_rows();
			
			if($check_cs < 16){
				for($i=1;$i<=16;$i++){
					$date_cs = new DateTime($this->input->post('day_first', TRUE));
					$this->m_cs->cs_week = $i;
					if($i==1){
						// echo " วันที่ ".date_format($date_cs, 'Y-m-d')."<br>";
						$this->m_cs->cs_date = date_format($date_cs, 'Y-m-d');
					}else{
						date_add($date_cs, date_interval_create_from_date_string(($i-1)*7 .' days'));
						// echo " วันที่ ".date_format($date_cs, 'Y-m-d')."<br>";
						$this->m_cs->cs_date = date_format($date_cs, 'Y-m-d');
					}
					//die;
					$this->m_cs->insert();

					if ( $this->m_cs->db->trans_status() === FALSE ) {
						$this->m_cs->db->trans_rollback();
						$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
					}
					else {
						$this->m_cs->db->trans_commit();		
						$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
					}
				}
			}else{
				for($i=1;$i<=$check_cs;$i++){
					$date_cs = new DateTime($this->input->post('day_first', TRUE));
					$this->m_cs->cs_week = $i;
					if($i==1){
						// echo " วันที่ ".date_format($date_cs, 'Y-m-d')."<br>";
						$this->m_cs->cs_date = date_format($date_cs, 'Y-m-d');
					}else{
						date_add($date_cs, date_interval_create_from_date_string(($i-1)*7 .' days'));
						// echo " วันที่ ".date_format($date_cs, 'Y-m-d')."<br>";
						$this->m_cs->cs_date = date_format($date_cs, 'Y-m-d');
					}
					//die;
					$this->m_cs->update();

					if ( $this->m_cs->db->trans_status() === FALSE ) {
						$this->m_cs->db->trans_rollback();
						$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
					}
					else {
						$this->m_cs->db->trans_commit();		
						$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
					}
				}
			}

			//echo $check_cs;die;
			
		}

		redirect('user/manage_subject', 'refresh');
	}

	function view_subject(){
	   
		$this->load->model('M_teach','m_t');
		$this->load->model('M_user','m_u');
		$this->load->model('M_subject','m_s');

		$this->m_t->tch_t_id = $this->session->t_id;
		$data['rs_subject'] = $this->m_t->get_subject_not_teach_test();
		
		$rs = $this->m_t->get_subject_not_teach_test()->result();

		$num_std = array();
		foreach ( $rs as $index=>$row ){	
			$this->m_s->sec_id = $row->sec_id;
			$row = $this->m_s->get_num_std()->row();	
			array_push($num_std, $row);
		}

		$data['num_std'] = $num_std;

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_view_subject',$data);  
	}

	function add_subject($sec_id){
		$this->load->model('M_teach','m_tch');

		$this->m_tch->tch_sec_id = $sec_id;
		$this->m_tch->tch_t_id = $this->session->t_id;
		$this->m_tch->insert();

		if ( $this->m_tch->db->trans_status() === FALSE ) {
			$this->m_tch->db->trans_rollback();
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
		}
		else {
			$this->m_tch->db->trans_commit();		
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
		}

		redirect('user/view_subject', 'refresh');

	}

	function delete_section($sec_id){	
		
		$this->load->model('M_teach','m_tch');
		$this->load->model('M_Subject','m_s');
		$this->m_tch->tch_sec_id = $sec_id;
		$this->m_tch->tch_t_id = $this->session->t_id;

			
		if($this->m_s->get_num_std()->num_rows()>0){
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ล้มเหลว!", "ไม่สามารถลบข้อมูลได้", "error");   </script>');
		}else{
				
			$this->m_tch->delete();
			
			if ( $this->m_tch->db->trans_status() === FALSE ) {
					$this->m_tch->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ล้มเหลว!", "ไม่สามารถลบข้อมูลได้", "error");   </script>');
			}
			else {
				$this->m_tch->db->trans_commit();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("สำเร็จ!", "ข้อมูลถูกลบแล้ว", "success");   </script>');						
			}
		}
															
		redirect('user/manage_subject', 'refresh');
			
	}

	function suject_attends(){
	   
		$this->output('user/v_subject_attends');  
	}

	function insert_subject(){
		//print_r($_POST);

		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('code', 'code', 'trim|required');			
        $this->form_validation->set_rules('name_th', 'name_th', 'required|xss_clean');			
		$this->form_validation->set_rules('name_en', 'name_en', 'required|xss_clean');			
		$this->form_validation->set_rules('credit', 'credit', 'trim|required');		
		$this->form_validation->set_rules('group', 'group', 'trim|required');	
		$this->form_validation->set_rules('term', 'term', 'trim|required');	
		$this->form_validation->set_rules('year', 'year', 'trim|required');		
		$this->form_validation->set_rules('group_no[]', 'group_no[]', 'trim|required');		
		$this->form_validation->set_rules('time_start[]', 'time_start[]', 'trim|required');		
		$this->form_validation->set_rules('time_end[]', 'time_end[]', 'trim|required');	
		$this->form_validation->set_rules('time_limit[]', 'time_limit[]', 'trim|required');			
		$this->form_validation->set_rules('day[]', 'day[]', 'trim|required');
		$this->form_validation->set_rules('day_first[]', 'day_first[]', 'trim|required');
		
        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
        }
		else 
		{
			//// Assign Value Subject And Insert
			//print_r($_POST);
			$this->load->model('M_subject','m_s');
			
			$this->m_s->db->trans_begin();			
            $this->m_s->s_code = trim($this->input->post('code', TRUE));
			$this->m_s->s_name_th = trim($this->input->post('name_th', TRUE));			
			$this->m_s->s_name_en = trim($this->input->post('name_en', TRUE));									
			$this->m_s->s_credit = trim($this->input->post('credit', TRUE));														
			$this->m_s->s_groups = trim($this->input->post('group', TRUE));					
			$this->m_s->s_year = trim($this->input->post('year', TRUE));																	
				
			$this->m_s->insert(); 
	            
			if ( $this->m_s->db->trans_status() === FALSE ) {
				$this->m_s->db->trans_rollback();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
			}
			else {
				$this->m_s->db->trans_commit();		
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
			}
			
			/// Assign Value Term And Insert
			$this->load->model('M_term','m_te');

			$this->m_te->db->trans_begin();	
			$this->m_te->te_term = trim($this->input->post('term', TRUE));
			$this->m_te->te_s_id = $this->m_s->last_insert_id;
			$this->m_te->insert(); 
	            
			if ( $this->m_te->db->trans_status() === FALSE ) {
				$this->m_te->db->trans_rollback();
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
			}
			else {
				$this->m_te->db->trans_commit();		
				$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
			}

			/// Assign Value Section And Insert
			$this->load->model('M_section','m_sec');
		
			for( $i=0; $i<$this->m_s->s_groups; $i++){
				$this->m_sec->sec_number =  trim($this->input->post('group_no['.$i.']', TRUE));	
				$this->m_sec->sec_s_id = $this->m_s->last_insert_id;
				$this->m_sec->sec_time_start =  trim($this->input->post('time_start['.$i.']', TRUE));	
				$this->m_sec->sec_time_end =  trim($this->input->post('time_end['.$i.']', TRUE));	
				$this->m_sec->sec_time_limit =  trim($this->input->post('time_limit['.$i.']', TRUE));	
				$this->m_sec->sec_day_of_week =  trim($this->input->post('day['.$i.']', TRUE));	
				$this->m_sec->sec_first_day =  trim($this->input->post('day_first['.$i.']', TRUE));	

				$this->m_sec->insert(); 
	            
				if ( $this->m_sec->db->trans_status() === FALSE ) {
					$this->m_sec->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_sec->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}

				/// Assign Value Teach And Insert
				$this->load->model('M_teach','m_tch');
				$this->load->model('M_user','m_u');

				$this->m_tch->tch_t_id = $this->m_u->u_id = $this->session->u_id;
				$this->m_tch->tch_sec_id = $this->m_sec->last_insert_id;
				$this->m_tch->insert(); 
	            
				if ( $this->m_tch->db->trans_status() === FALSE ) {
					$this->m_tch->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_tch->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}
			}
			
		}

		redirect('user/manage_subject', 'refresh');
	}

	function view_add_student($sec_id){

		$data['sec_id'] = $sec_id;

		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_add_student',$data);  
	}

	function add_student(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('sec_id', 'sec_id', 'trim|required');			
        $this->form_validation->set_rules('code', 'code', 'trim|required');			
        $this->form_validation->set_rules('prefix', 'prefix', 'required|xss_clean');			
		$this->form_validation->set_rules('fName', 'fName', 'required|xss_clean');			
		$this->form_validation->set_rules('lName', 'lName', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
        }
		else 
		{
			$this->load->model('M_student','m_std');
			$this->load->model('M_subject','m_s');
			$this->load->model('M_section','m_sec');
			$this->load->model('M_enroll','m_en');	
			$this->load->model('M_User','m_u');	

			$this->m_s->sec_id = trim($this->input->post('sec_id', TRUE));
			$subject_id = $this->m_s->get_info_subject_by_sec_id()->row();

			$this->m_u->u_username = trim($this->input->post('code', TRUE));
			$num_rows = $this->m_u->check_user();

			if ($num_rows->num_rows() != 0){
				$this->m_std->std_code = trim($this->input->post('code', TRUE));
				$std_info = $this->m_std->get_std_id()->row();

				$this->m_en->e_std_id = $std_info->std_id;
				$this->m_en->e_sec_id = trim($this->input->post('sec_id', TRUE));

				$this->m_en->insert();
				if ( $this->m_en->db->trans_status() === FALSE ) {
					$this->m_en->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}else {
					$this->m_en->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}

			}else{
				
				$this->m_u->u_password = hash( 'sha512', hash( 'sha256',sha1(md5($this->m_u->u_username))));
				$this->m_u->u_type = 2;
				$this->m_u->u_status = "active";

				$this->m_u->insert();
	
				if ( $this->m_u->db->trans_status() === FALSE ) {
					$this->m_u->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_u->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}
					
				$this->m_std->std_prefix = trim($this->input->post('prefix', TRUE));;
				$this->m_std->std_fName = trim($this->input->post('fName', TRUE));;
				$this->m_std->std_lName = trim($this->input->post('lName', TRUE));;
				$this->m_std->std_code = trim($this->input->post('code', TRUE));;
				$this->m_std->std_status = 'active';
				$this->m_std->std_u_id = $this->m_u->last_insert_id;

				$this->m_std->insert();
				if ( $this->m_std->db->trans_status() === FALSE ) {
					$this->m_std->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_std->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}
				
				$this->m_en->e_std_id = $this->m_std->last_insert_id;
				$this->m_en->e_sec_id = trim($this->input->post('sec_id', TRUE));

				$this->m_en->insert();
				if ( $this->m_en->db->trans_status() === FALSE ) {
					$this->m_en->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_en->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}	
			}
		}		
		
		redirect('user/manage_subject', 'refresh');
	}
	
	function view_upload_img(){
		if($this->session->flashdata('msg')!=null){
			$data['msgSystem'] = $this->session->flashdata('msg');
		}else{
			 $data['msgSystem'] = "";
		}

		$this->output('user/v_upload_img',$data);  
	}
	
	public function upload_img()
	{		
		
			if ($_FILES['img']['name'] == NULL)
			{
				//$this->load->model('M_friend','m_f');		
				//echo $_FILES['img']['name']." image name if";
				$ipaddress = $_SERVER['REMOTE_ADDR'];
				//$lineid = trim($this->input->post('lineid'));
				
				//$check = $this->m_f->check_post($ipaddress,$lineid);	
				
				///image nulllll																
			}   
			else // have image
			{

				//echo $_FILES['img']['name']." image name else";
				///$this->load->model('M_friend','m_f');
					
				// $ipaddress = $_SERVER['REMOTE_ADDR'];
				// $lineid = trim($this->input->post('lineid', TRUE));
				
				// $check = $this->m_f->check_post($ipaddress,$lineid);	
			
				// if ($check->result_array() != NULL)
				// {
				// 	$time_compare = strtotime($check->result_array()[0]['pf_time']) - strtotime(date('Y-m-d H:i:s', time() - $this->config->item('post_limit')*60 ));
				// 	$output_time = gmdate('i นาที s วินาที', $time_compare);						
				// 	$this->session->set_flashdata('msg',"<script  type='text/javascript'>swal('ขออภัย!', 'กรุณารออีก $output_time ', 'error');   </script>");
											
				// }else{
					//$config['upload_path']          = './../../assets/images';
				 	$config['upload_path']          = 'assets/images/';
				 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 0;
					$config['max_width']            = 0;
					$config['max_height']           = 0;
				 	$config['remove_spaces']        = TRUE;
				 	$config['file_name']			= date("YmdHis").'_';
				 	$this->load->library('upload', $config);

				 	if (!$this->upload->do_upload('img'))
					{
						$data = $this->upload->data();		
						print_r($data);


						echo "Fail +++++";

					}else{
						$data = array('upload_data' => $this->upload->data());

						print_r($data);

						echo "Upload ++++";
					}
				
				 	$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
											
			}
      

		redirect(site_url('/user/view_upload_img'), 'refresh');			
	}	

	function upload_excel(){
		$config['upload_path']          = 'assets/upload/';
        $config['allowed_types']        = 'xls|xlsx';
        $config['max_size']             = 1000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('excel'))
        {
            $error = array('error' => $this->upload->display_errors());			
			print_r($error);
        }
        else
        {
        	$data = array('upload_data' => $this->upload->data());
			$this->readExcel($data['upload_data']['file_name']);
		}
		
		redirect('user/manage_subject', 'refresh');
	}

	public function readExcel($path){
		$this->load->library('excel');
		// $objReader = PHPExcel_IOFactory::load('assets/upload/classs.xls');
		// $sheetData = $objReader->getActiveSheet()->toArray(true,true,true,true);
		
		$excelReader = PHPExcel_IOFactory::createReaderForFile('assets/upload/'.$path);
		$excelObj = $excelReader->load('assets/upload/'.$path);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		
		$s_code = '';
		$s_name = '';
		$sec = 0;
		$credit = 0;
		$t_name = '';
		$time = '';
		$term = 0;
		$year = 0;
		$count_sec = 0;
		$this->load->model('M_subject','m_s');
		$this->load->model('M_section','m_sec');
		$this->load->model('M_teach','m_tch');
		$this->load->model('M_term','m_te');	
		$this->load->model('M_student','m_std');
		$this->load->model('M_enroll','m_en');	
		$this->load->model('M_User','m_u');	
		
		//echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {			
			
			if($row == 2){
				$term_temp = explode("/",substr($worksheet->getCell('E'.$row)->getValue(),strpos($worksheet->getCell('E'.$row)->getValue(), '/')-1));
				$term = $term_temp[0];
				$year = $term_temp[1];
				//echo 'เทอม = ' .$term .'  ปี '. $year. '<br>';				
			}			

			if($row == 4){
				$s_code = substr($worksheet->getCell('B'.$row)->getValue(),26,6);
				$s_name = str_replace("หน่วยกิต","",substr(substr($worksheet->getCell('B'.$row)->getValue(),strpos($worksheet->getCell('B'.$row)->getValue(),$s_code),strpos($worksheet->getCell('B'.$row)->getValue(), 'หน่วยกิต')),8));
				$credit = substr(substr($worksheet->getCell('B'.$row)->getValue(),strpos($worksheet->getCell('B'.$row)->getValue(), 'หน่วยกิต'),27),24,4);

				// echo 'วิชา = '.$s_name."<br>";
				// echo 'รหัส = '.$s_code."<br>";
				// echo 'หน่วยกิต = '.$credit."<br>";				
			
				$this->m_s->db->trans_begin();			
				$this->m_s->s_code = $s_code;
				$this->m_s->s_name_th = $s_name;
				$this->m_s->s_name_en = "";
				$this->m_s->s_credit = $credit;				
				$this->m_s->s_year = $year;
					
				$this->m_s->insert_file();

				if ( $this->m_s->db->trans_status() === FALSE ) {
					$this->m_s->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_s->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}

				$this->m_te->db->trans_begin();	
				$this->m_te->te_term = $term;
				$this->m_te->te_s_id = $this->m_s->last_insert_id;
				$this->m_te->insert(); 
					
				if ( $this->m_te->db->trans_status() === FALSE ) {
					$this->m_te->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_te->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}
			}

			if(strpos($worksheet->getCell('B'.$row)->getValue(), 'วันเวลาเรียน') !== false){
				// echo $worksheet->getCell('B'.$row)->getValue().'<br>';
				$day = trim(str_replace("วันเวลาเรียน","",substr($worksheet->getCell('B'.$row)->getValue(),0,strrpos($worksheet->getCell('B'.$row)->getValue(),'.'))));
				$time = str_replace("วันเวลาเรียน","",$worksheet->getCell('B'.$row)->getValue());
				$d_len = strlen($day);
				$time_temp = explode(" ",trim(str_replace(".","",substr($time,$d_len+1))));
				$time2 = explode("-",$time_temp[0]);
				// print_r($time_temp);echo "<br>";
				// print_r($time2);
				
				$day_num = 0;

				switch ($day) {
					case 'จ':
						$day_num = 1;
						break;
					case 'อ':
						$day_num = 2;
						break;
					case 'พ':
						$day_num = 3;
						break;
					case 'พฤ':
						$day_num = 4;
						break;
					case 'ศ':
						$day_num = 5;
						break;
					case 'ส':
						$day_num = 6;
						break;
					case 'อา':
						$day_num = 7;
						break;					
					default:
					
				}											

				// echo 'เรียนวัน '.$day." DayLen = $d_len  DayNum = $day_num เวลา $time <br>";
				
				$this->m_sec->sec_number =  $sec;
				$this->m_sec->sec_s_id = $this->m_s->last_insert_id;
				$this->m_sec->sec_time_start =  $time2[0];
				$this->m_sec->sec_time_end =  $time2[1];
				$this->m_sec->sec_time_limit =  0;
				$this->m_sec->sec_day_of_week =  $day_num;

				$this->m_sec->insert(); 

				if ( $this->m_sec->db->trans_status() === FALSE ) {
					$this->m_sec->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_sec->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}

				
				$this->m_tch->tch_sec_id = $this->m_sec->last_insert_id;
				$this->m_tch->tch_t_id = $this->session->t_id;
				$this->m_tch->insert();
		
				if ( $this->m_tch->db->trans_status() === FALSE ) {
					$this->m_tch->db->trans_rollback();
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
				}
				else {
					$this->m_tch->db->trans_commit();		
					$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
				}
			}

			if(strpos($worksheet->getCell('B'.$row)->getValue(), 'Sec') !== false){
				$sec = substr($worksheet->getCell('B'.$row)->getValue(),strlen($worksheet->getCell('B'.$row)->getValue())-1,1);										
				$t_name =  str_replace("ผู้สอน ","",$worksheet->getCell('H'.$row)->getValue());
				
				// if($t_name != $t_name){
					// echo "สอน = ".$t_name ."<br>";
				// }
				//echo 'Sec = '.$sec.'  ';					
			}else{					
				if(strpos($worksheet->getCell('D'.$row)->getValue(), 'นาย') !== false || strpos($worksheet->getCell('D'.$row)->getValue(), 'นางสาว') !== false){										
					// echo 'Sec = '.$sec.'  ';
					$std = explode(" ",$worksheet->getCell('D'.$row)->getValue());
					$std_prefix = '';
					$std_fName = '';
					if(strpos($std[0],'นาย') !== false ){
						$std_prefix = 'นาย';
						$std_fName = substr($std[0],9);
					}else{
						$std_prefix = 'นางสาว';			
						$std_fName = substr($std[0],18);		
					}
					
					$std_lName = $std[2];
					$std_code = $worksheet->getCell('C'.$row)->getValue();
					//echo $std_code.' '.$std_prefix.' '.$std_fName.' '.$std_lName.'<br>';
														
					$this->m_u->u_username = $std_code;
					$num_rows = $this->m_u->check_user();

					if ($num_rows->num_rows() != 0){

						$this->m_std->std_code = $std_code;
						$std_info = $this->m_std->get_std_id()->row();

						$this->m_en->e_std_id = $std_info->std_id;
						$this->m_en->e_sec_id = $this->m_sec->last_insert_id;

						$this->m_en->insert();
						if ( $this->m_en->db->trans_status() === FALSE ) {
							$this->m_en->db->trans_rollback();
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
						}
						else {
							$this->m_en->db->trans_commit();		
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
						}

					}else{
						$this->m_u->u_password = hash( 'sha512', hash( 'sha256',sha1(md5($std_code))));
						$this->m_u->u_type = 2;
						$this->m_u->u_status = "active";

						$this->m_u->insert();
			
						if ( $this->m_u->db->trans_status() === FALSE ) {
							$this->m_u->db->trans_rollback();
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
						}
						else {
							$this->m_u->db->trans_commit();		
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
						}
							
						$this->m_std->std_prefix = $std_prefix;
						$this->m_std->std_fName = $std_fName;
						$this->m_std->std_lName = $std_lName;
						$this->m_std->std_code = $std_code;
						$this->m_std->std_status = 'active';
						$this->m_std->std_u_id = $this->m_u->last_insert_id;

						$this->m_std->insert();
						if ( $this->m_std->db->trans_status() === FALSE ) {
							$this->m_std->db->trans_rollback();
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
						}
						else {
							$this->m_std->db->trans_commit();		
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
						}
						
						$this->m_en->e_std_id = $this->m_std->last_insert_id;
						$this->m_en->e_sec_id = $this->m_sec->last_insert_id;

						$this->m_en->insert();
						if ( $this->m_en->db->trans_status() === FALSE ) {
							$this->m_en->db->trans_rollback();
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("ขออภัย!", "คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกให้ถูกต้องด้วยค่ะ", "error");   </script>');
						}
						else {
							$this->m_en->db->trans_commit();		
							$this->session->set_flashdata('msg','<script  type="text/javascript">swal("บันทึกสำเร็จ!", "ข้อมูลที่คุณกรอกได้บันทึกเข้าสู่ระบบแล้ว", "success");   </script>');			
						}
						
					}
					

					//echo $std_prefix.'<br>';
				}
			}

			// if(strpos($worksheet->getCell('D'.$row)->getValue(), 'นาย') !== false || strpos($worksheet->getCell('D'.$row)->getValue(), 'นางสาว') !== false){										
			// 	//echo 'Sec = '.$sec.'  ';
			// 	echo $worksheet->getCell('C'.$row)->getValue().' '.$worksheet->getCell('D'.$row)->getValue().'<br>';	
			// }else{					
			// 	//echo 'Sec = '.$sec.'  ';
			// 	//echo $worksheet->getCell('C'.$row)->getValue();
			// }
			
			// echo "<tr><td>";
			// echo $worksheet->getCell('B'.$row)->getValue();
			// echo "</td><td>";
			// echo $worksheet->getCell('C'.$row)->getValue();			
			// echo "</td><td>";
			// echo $worksheet->getCell('D'.$row)->getValue();			
			// echo "</td><td>";
			// echo $worksheet->getCell('E'.$row)->getValue();			
			// echo "</td><td>";
			// echo $worksheet->getCell('F'.$row)->getValue();			
			// echo "</td><td>";
			// echo $worksheet->getCell('H'.$row)->getValue();			
			// echo "</td><tr>";
			
		}
		//echo "</table>";	
				
	}

	function TT(){
		$url = 'http://reg.buu.ac.th/registrar/teach_time.asp';
		$myvars = 'f_officername = พีระศักดิ์';

		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, "f_officername=peerasak&f_maxrows=25");
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec( $ch );

		 
		print_r(utf8_decode ($response));
	}
}
?>
