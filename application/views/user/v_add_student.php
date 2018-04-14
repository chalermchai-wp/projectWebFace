<?php 	echo $msgSystem;?>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>เพิ่่มข้อมูลนิสิต</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
					<div class="options">

					</div>
				</div>
				<div class="panel-body">
				<form action="<?php echo base_url('index.php/User/add_student');?>" method="post" id="wizard" class="form-horizontal">
						<input type="hidden" name="sec_id" value="<?php echo $sec_id; ?>" >							
																								
							<div class="form-group">
								<div class="col-sm-2">
									<input type="text" class="form-control" id="code" name="code" placeholder="รหัสนิสิต" maxlength="10" >
								</div>								
								<div class="col-sm-2">
									<input type="text" class="form-control" id="prefix" name="prefix" placeholder="คำนำหน้า" >
								</div>
								<div class="col-sm-3">
									<input type="text" class="form-control" id="fName" name="fName" placeholder="ชื่อ">
								</div>

								<div class="col-sm-3">
									<input type="text" class="form-control" id="lName" name="lName" placeholder="นามสกุล" >
								</div>
							</div>																						

							<input type="submit" class="finish btn-success btn" value="Submit" />
					</form>
				</div>
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
  