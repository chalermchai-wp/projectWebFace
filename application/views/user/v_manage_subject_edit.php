<?php 	echo $msgSystem;?>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>ข้อมูลรายวิชา</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
					
				</div>
				<div class="panel-body">
				<form action="<?php echo base_url('index.php/User/subject_update');?>" method="post" id="wizard" class="form-horizontal">												
							<input type="hidden" name="sec_id" value="<?php echo (isset($rs_subject->sec_id))? "$rs_subject->sec_id" : "";?>">
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">รหัสวิชา</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="code" name="code" placeholder="รหัสวิชา" maxlength="10" onkeypress="return ValidateKeyCode();" value="<?php echo (isset($rs_subject->s_code))? "$rs_subject->s_code" : "";?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">ชื่อวิชาภาษาไทย</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name_th" name="name_th" placeholder="ชื่อวิชาภาษาไทย" onkeypress="return ValidateKeyNameTH();" value="<?php echo (isset($rs_subject->s_name_th))? "$rs_subject->s_name_th" : "";?>">
								</div>
							</div>
						
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">ชื่อวิชาภาษาอังกฤษ</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name_en" name="name_en" placeholder="ชื่อวิชาภาษาอังกฤษ" onkeypress="return ValidateKeyNameEN();" value="<?php echo (isset($rs_subject->s_name_en))? "$rs_subject->s_name_en" : "";?>">
								</div>
							</div>
						
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">หน่วยกิต</label>
								<div class="col-sm-3">
									<select name="credit" id="credit" class="form-control" required>
										<option value="1" <?php echo ($rs_subject->s_credit == 1 )? "selected" : "";?>>1</option>
										<option value="2" <?php echo ($rs_subject->s_credit == 2 )? "selected" : "";?>>2</option>
										<option value="3" <?php echo ($rs_subject->s_credit == 3 )? "selected" : "";?>>3</option>
										<option value="6" <?php echo ($rs_subject->s_credit == 6 )? "selected" : "";?>>6</option>
										<option value="9" <?php echo ($rs_subject->s_credit == 9 )? "selected" : "";?>>9</option>
									</select>
								</div>

								<label for="focusedinput" class="col-sm-3 control-label">เทอม</label>
								<div class="col-sm-3">
									<select name="term" id="term" class="form-control" required>
										<option value="1" <?php echo ($rs_subject->te_term == 1 )? "selected" : "";?>>1</option>
										<option value="2" <?php echo ($rs_subject->te_term == 2 )? "selected" : "";?>>2</option>
										<option value="3" <?php echo ($rs_subject->te_term == 3 )? "selected" : "";?>>ฤดูร้อน</option>							
									</select>
								</div>														
							</div>
						
							<div class="form-group">
															
								<label for="focusedinput" class="col-sm-3 control-label">ปีการศึกษา</label>
								<div class="col-sm-3">
								<input type="text" name="year" id="year" class="form-control" placeholder="ปีการศึกษา" value="<?php echo (isset($rs_subject->s_year))? "$rs_subject->s_year" : "";?>" required>
								</div>

								<label for="focusedinput" class="col-sm-3 control-label">กลุ่มที่</label>
								<div class="col-sm-3">
								<input type="text" name="group_no" id="group_no" class="form-control" placeholder="กลุ่มที่" value="<?php echo (isset($rs_subject->sec_number))? "$rs_subject->sec_number" : "";?>" required>
								</div>

							</div>
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">เวลาเริ่มเรียน</label>
									<div class="col-sm-3">
										<input type="time" class="form-control" id="time_start" name="time_start" placeholder="เวลาเริ่มเรียน" value="<?php echo (isset($rs_subject->sec_time_start))? "$rs_subject->sec_time_start" : "";?>">
									</div>

								<label for="focusedinput" class="col-sm-3 control-label">เวลาหมด</label>
									<div class="col-sm-3">
										<input type="time" class="form-control" id="time_end" name="time_end" placeholder="เวลาหมด" value="<?php echo (isset($rs_subject->sec_time_end))? "$rs_subject->sec_time_end" : "";?>">
									</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">กำหนดเวลาสาย</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" id="time_limit" name="time_limit" placeholder="กำหนดเวลาสาย นาที" value="<?php echo (isset($rs_subject->sec_time_limit))? "$rs_subject->sec_time_limit" : "";?>">
									</div>
								
								<label for="focusedinput" class="col-sm-3 control-label">วันที่เรียน</label>
									<div class="col-sm-3">
										<select name="day" id="day" class="form-control" required>
											<option value="1" <?php echo ($rs_subject->sec_day_of_week == 1 )? "selected" : "";?>>จันทร์</option>
											<option value="2" <?php echo ($rs_subject->sec_day_of_week == 2 )? "selected" : "";?>>อังคาร</option>
											<option value="3" <?php echo ($rs_subject->sec_day_of_week == 3 )? "selected" : "";?>>พุธ</option>
											<option value="4" <?php echo ($rs_subject->sec_day_of_week == 4 )? "selected" : "";?>>พฤหัสบดี</option>
											<option value="5" <?php echo ($rs_subject->sec_day_of_week == 5 )? "selected" : "";?>>ศุกร์</option>
											<option value="6" <?php echo ($rs_subject->sec_day_of_week == 6 )? "selected" : "";?>>เสาร์</option>
											<option value="7" <?php echo ($rs_subject->sec_day_of_week == 7 )? "selected" : "";?>>อาทิตย์</option>
										</select>
									</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">วันแรกที่เรียน</label>
									<div class="col-sm-3">
										<input type="date" class="form-control" id="day_first" name="day_first" placeholder="วันแรกที่เรียน" value="<?php echo (isset($rs_subject->sec_first_day))? "$rs_subject->sec_first_day" : "";?>">
									</div>
																
							</div>

							<br>

							<input type="submit" class="finish btn-success btn" value="Submit" />
					</form>
				</div>				
			</div>
		</div>
	</div>
</div>





<script>
<!-- กำหนดตัวอักษรในช่อง input อยากได้ตัวไรเพิ่มใน var allowed ได้เลย-->
	function ValidateKeyCode() 
	{   
	   var key=window.event.keyCode;
	   var allowed='0123456789';

		return allowed.indexOf(String.fromCharCode(key)) !=-1 ;
	}
	function ValidateKeyNameTH() 
	{   
	   var key=window.event.keyCode;
	   var allowed='กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรลวศษสหฬอฮะัาำิีึืุูเแโใไ็่้๊๋์';

		return allowed.indexOf(String.fromCharCode(key)) !=-1 ;
	}
	function ValidateKeyNameEN() 
	{   
	   var key=window.event.keyCode;
	   var allowed='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return allowed.indexOf(String.fromCharCode(key)) !=-1 ;
	}

	function myFunction() {
	var num = document.getElementById('groupTest').value;
	var div = document.getElementById('sectionTest');

	var parent = document.getElementById("parentId");
	var nodesSameClass = div.getElementsByClassName("groupNo");
		console.log(nodesSameClass.length + "asdsdasd");

	

		console.log(num);
		if(num != 0){
			if(nodesSameClass != num){
				div.innerHTML = "";
			}else{

			}
			for(var i=0;i<num;i++){
			div.innerHTML += 	'<p class="groupNo" >กลุ่มที่ ' + (i+1) +'</p>'+
								'<div class="form-group">'+
									'<label for="focusedinput" class="col-sm-3 control-label">กลุ่มที่</label>'+
									'<div class="col-sm-3">'+
										'<input type="text" class="form-control" id="group_no" name="group_no[]" placeholder="กลุ่มที่" >'+
									'</div>'+

									'<label for="focusedinput" class="col-sm-3 control-label">เวลาเริ่มเรียน</label>'+
									'<div class="col-sm-3">'+
										'<input type="time" class="form-control" id="time_start" name="time_start[]" placeholder="กลุ่มที่" >'+
									'</div>'+
								'</div>'+
							
								'<div class="form-group">'+
									'<label for="focusedinput" class="col-sm-3 control-label">เวลาหมด</label>'+
									'<div class="col-sm-3">'+
										'<input type="time" class="form-control" id="time_end" name="time_end[]" placeholder="กลุ่มที่" >'+
									'</div>'+

									'<label for="focusedinput" class="col-sm-3 control-label">กำหนดเวลาสาย</label>'+
									'<div class="col-sm-3">'+
										'<input type="text" class="form-control" id="time_limit" name="time_limit[]" placeholder="กลุ่มที่" >'+
									'</div>'+
								'</div>'+
								
								'<div class="form-group">'+
									'<label for="focusedinput" class="col-sm-3 control-label">วันที่เรียน</label>'+
									'<div class="col-sm-3">'+
										'<select name="day[]" id="day" class="form-control" required>'+
											'<option value="1">จันทร์</option>'+
											'<option value="2">อังคาร</option>'+
											'<option value="3">พุธ</option>'+
											'<option value="4">พฤหัสบดี</option>'+
											'<option value="5">ศุกร์</option>'+
											'<option value="6">เสาร์</option>'+
											'<option value="7">อาทิตย์</option>'+
										'</select>'+
									'</div>'+

								'</div><hr>';
			}
		}else{
			div.innerHTML = "";
		} 
	}

</script>
    
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-validation/jquery.validate.min.js"></script>  					<!-- Validate Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-stepy/jquery.stepy.js"></script>  								<!-- Stepy Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-jasnyupload/fileinput.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/demo/demo-formwizard.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
  