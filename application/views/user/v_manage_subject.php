<?php 	echo $msgSystem;?>
<link type="text/css" href="<?php echo base_url();?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">    <!-- DateRangePicker -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">  

<script>
$(document).ready( function () {
    $('#d_table1').DataTable();
} );


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

</script>

<style>
	tr.body:hover {
    	background-color: #DCDCDC;
		font-size : 1.2em;
	}
</style>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>ตารางรายวิชา</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
					<div class="options">

					</div>
					<div style="text-align:right">
						<div class="btn-group" >
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="ti ti-settings"></i>
							&nbsp;เพิ่มรายวิชา <span class="caret"></span> 
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a data-toggle="modal" href="#myModalTest" ><i class="fa fa-edit"></i> เพิ่มเอง</a></li>                        
								<li class="divider"></li>                        
								<li><a data-toggle="modal" href="#myModalFile" ><i class="fa fa-file-excel-o"></i> อ่านจากไฟล์</a></li>                        							                            
							</ul>
						</div>
					</div>
					
				</div>
				<div class="panel-body">
										
					<table id="d_table1" class="table table-bordered" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th style="text-align:center" width="10%">รหัสวิชา</th>
								<th style="text-align:center" width="40%">ชื่อวิชา</th>				
								<th style="text-align:center" width="5%">เทอม</th>
								<th style="text-align:center" width="5%">กลุ่ม</th>	
								<th style="text-align:center" width="10%">จำนวนนักศึกษา</th>																					
								<th style="text-align:center" width="20%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php							
							foreach ( $num_std as $index2=>$row2 ){	 						
								foreach ( $rs_subject as $index=>$row ){									
									if($index2 == $index){									
						?>							
							<tr class="body" <?php if(!isset($row2->num_std)){ echo 'style="background-color:#ffe6e6"';} ?>>
								<td align="center"><?php echo $row->s_code;?></td>
								<td>
									<?php echo $row->s_name_en.' '.$row->s_name_th;?>
								</td>
									
								<td align="center"><?php echo $row->te_term;?></td>
								<td align="center"><?php echo $row->sec_number;?></td>		
								<td align="center">
									<?php 
										if(isset($row2->num_std)){
											echo $row2->num_std;
										}else{											
											echo "<u style='color:red;'> 0 </u>";
										}
									?>
								</td>									
								<td align="center" >
									<a href="<?php echo base_url('index.php/User/manage_subject_edit/'.$row->sec_id);?>"><button class="btn btn-warning ti ti-settings"></button></a>
									<!-- <div class="btn-group">
                                        <a href="#" class="btn btn-primary"><i class="ti ti-plus"></i></a>
                                        <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">เพิ่มเอง</a></li>                                         
                                            <li class="divider"></li>
                                            <li><a href="#">เพิิ่มจากไฟล์</a></li>
                                        </ul>
                                    </div> -->
									<a href="<?php echo base_url('index.php/User/view_add_student/'.$row->sec_id);?>"><button class="btn btn-info ti ti-plus"></button></a>
									<a href="<?php echo base_url('index.php/User/delete_section/'.$row->sec_id);?>"><button class="btn btn-danger ti ti-trash"></button></a>
								</td>
							</tr>
						<?php	
									}						
								}
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModalFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">File</h2>
			</div>
			<div class="modal-body">
				<form method="post" action="<?php echo base_url('index.php/User/upload_excel');?>" enctype="multipart/form-data">
				<div class="fileinput fileinput-new" data-provides="fileinput">
					<div class="input-group">
						<div class="form-control uneditable-input" data-trigger="fileinput">
							<i class="fa fa-file fileinput-exists"></i>&nbsp;<span class="fileinput-filename"></span>
						</div>
						<span class="input-group-btn">
							<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							<span class="btn btn-default btn-file">
								<span class="fileinput-new">Select file</span>
								<span class="fileinput-exists">Change</span>
								<input type="file" name="excel" accept="application/vnd.ms-excel">
							</span>
							
						</span>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="save"> 
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->









<div class="modal fade" id="myModalTest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="height: 100%;"> 	
	<div class="modal-dialog" >
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>เพิ่มรายวิชา</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
				</div>
				<div class="panel-body">
					
				<form action="<?php echo base_url('index.php/User/insert_subject');?>" method="post" id="wizard" class="form-horizontal">
						<fieldset title="Step 1">
							<legend>ข้อมูลรายวิชา</legend>
							
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">รหัสวิชา</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="code" name="code" placeholder="รหัสวิชา" maxlength="10" onkeypress="return ValidateKeyCode();" required >
								</div>
							</div>
							
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">ชื่อวิชาภาษาไทย</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name_th" name="name_th" placeholder="ชื่อวิชาภาษาไทย" onkeypress="return ValidateKeyNameTH();" required>
								</div>
							</div>
						
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">ชื่อวิชาภาษาอังกฤษ</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name_en" name="name_en" placeholder="ชื่อวิชาภาษาอังกฤษ" onkeypress="return ValidateKeyNameEN();">
								</div>
							</div>
						
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">หน่วยกิต</label>
								<div class="col-sm-3">
									<select name="credit" id="credit" class="form-control" required>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="6">6</option>
										<option value="9">9</option>
									</select>
								</div>
							
								<label for="focusedinput" class="col-sm-3 control-label">จำนวนกลุ่ม</label>
								<div class="col-sm-3">
									<input type="number" class="form-control" id="groupTest" name="group" min="0" placeholder="จำนวนกลุ่ม" onkeyup="myFunction()" required>
								</div>
							</div>
						
							<div class="form-group">
								<label for="focusedinput" class="col-sm-3 control-label">เทอม</label>
								<div class="col-sm-3">
									<select name="term" id="term" class="form-control" required>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">ฤดูร้อน</option>							
									</select>
								</div>

								<label for="focusedinput" class="col-sm-3 control-label">ปีการศึกษา</label>
								<div class="col-sm-3">
									<input type="text" name="year" id="year" class="form-control" placeholder="ปีการศึกษา" required>
								</div>
							</div>
							<br>

						</fieldset>
						<fieldset title="Step 2" >
							<legend>ข้อมูลกลุ่ม</legend>

							<div id="sectionTest">
								
							</div>

						</fieldset>
						<!-- <fieldset title="Step 3">
							<legend>Preview</legend>
							<div class="form-group">
								<label for="" class="col-md-3 control-label">Terms and Conditions</label>
								<div class="col-md-9">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, nemo, atque consequuntur officiis asperiores consectetur porro labore commodi esse error quisquam nihil illum sunt facere inventore possimus autem ab voluptates quibusdam non voluptatum suscipit architecto. Illo, facilis, corporis, veritatis dolores minus quasi iure cupiditate quis autem ducimus nisi obcaecati tenetur sed ea excepturi pariatur consequatur enim labore officia mollitia. Rerum, voluptatem numquam molestiae recusandae iusto ipsum inventore unde accusantium labore delectus? Doloremque, fugit, sunt libero laboriosam cupiditate sed sequi nostrum saepe. Mollitia, alias, expedita accusantium porro error autem dolore veniam commodi nesciunt provident vitae neque. Nostrum, sed, molestias itaque provident inventore natus animi quasi laborum laboriosam facere ratione aperiam iusto. Non ducimus facere sunt doloribus? Asperiores, natus distinctio quis iure!</p>
								</div>
							</div>
						</fieldset> -->
						<input type="submit" class="finish btn-success btn" value="Submit" />
					</form>
				</div>
			</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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
										'<input type="text" class="form-control" id="time_limit" name="time_limit[]" placeholder="กำหนดเวลาสาย นาที" >'+
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

									'<label for="focusedinput" class="col-sm-3 control-label">วันเรียนวันแรก</label>'+
									'<div class="col-sm-3">'+
										'<input type="date" class="form-control" id="day_first[]" name="day_first[]" placeholder="วันเรียนวันแรก" >'+
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
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>      			<!-- Datepicker -->
  