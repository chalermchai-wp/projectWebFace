<?php 	echo $msgSystem;?>

<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/flat/_all.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">  

<script>
	function getval(sel)
	{
		alert(sel.value);
		document.getElementById("week_hid").value = sel.value;
		console.log('getVal =  ' + document.getElementById("week_hid").value);
	}

	$( document ).ready(function() {
		var e = document.getElementById("week").value;
		console.log(e);
	});
</script>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>ตารางรายวิชา</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
					<div class="options">

					</div>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">วันที่เรียน</label>
							<div class="col-sm-6">
								<select id="week" name="week" class="form-control" <?php if($first_day->sec_first_day == "0000-00-00" || $first_day->sec_first_day == null){echo 'style="color: #e51c23;"';}?> onchange="getval(this);">
								<?php if($first_day->sec_first_day == "0000-00-00" || $first_day->sec_first_day == null){echo '<option> โปรดกำหนดวันเรียนก่อน </option>';}?>
									<?php 
										$dateDiff = new DateTime();
										$diff = 0;
										foreach ( $week->result() as $index=>$row ){
											$dateDiff2 = new DateTime($row->cs_date);
											$perR = $dateDiff->diff($dateDiff2)->format("%R");
											if($perR == '+'){$diff++;}
									?>
										<option value="<?php echo $row->cs_date;?>" <?php if($diff == 1){echo "selected";}?>>สัปดาห์ที่ <?php echo $index+1 .' วันที่ '.$row->cs_date;?></option>
									<?php 
										}
									?>
								</select>
							</div>
							<label for="focusedinput" class="col-sm-2 control-label">แก้ไขวันที่</label>
							<div class="col-sm-2">								
								<a href="<?php echo base_url('index.php/User/view_edit_cs/'.$sec_id);?>"><button class="btn btn-warning ti ti-settings"></button></a>
							</div>
					</div>
					<br>

					<table class="table table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="text-align:center" width="5%">ลำดับ</th>
								<th style="text-align:center" width="15%">รหัสนิสิิต</th>
								<th width="40%">ชื่อ นามสกุล</th>	
								
								<th style="text-align:center" width="10%"> มา </t>
								<th style="text-align:center" width="10%"> สาย </th>
								<th style="text-align:center" width="10%"> ขาด </th>
								<!-- <th style="text-align:center" width="10%"> ลา </th>	 -->
							</tr>
						</thead>
						<tbody>
						<form action="<?php echo base_url('index.php/User/check');?>" method="post" id="wizard" class="form-horizontal">
							<input type='hidden' id="week_hid" value="" name="week_hid">
							<?php	
								if($first_day->sec_first_day == "0000-00-00" || $first_day->sec_first_day == null){
								
								}else{
									foreach ( $rs_list_std->result() as $index=>$row ){																
							?>							
									<tr>
										<td style="text-align:center" ><?php echo $index+1;?></td>
										<td style="text-align:center" ><?php echo $row->std_code;?></td>									
										<td>
											<?php echo $row->std_prefix.$row->std_fName.' '.$row->std_lName;?>
										</td>		
																		
										<td align="center"><div class="radio red icheck"><label><input type="radio" name="optionsRadios<?php echo $index+1;?>" value="option1" ></label></div></td>
										<td align="center"><div class="radio red icheck"><label><input type="radio" name="optionsRadios<?php echo $index+1;?>" value="option1" ></label></div></td>
										<td align="center"><div class="radio red icheck"><label><input type="radio" name="optionsRadios<?php echo $index+1;?>" value="option1" ></label></div></td>
										<!-- <td align="center"><div class="radio red icheck"><label><input type="radio" name="optionsRadios<?php echo $index+1;?>" value="option1" ></label></div></td> -->
									</tr>
							<?php		
										if($index+1 == $rs_list_std->num_rows()){
							?>
											<tr>											
												<td colspan='6' align="right">บันทึก &nbsp;&nbsp;<a href="<?php echo base_url('index.php/User/view_edit_cs/'.$sec_id);?>"><button class="btn btn-warning ti ti-settings"></button></a></td>
											</tr>
							<?php
										}					
									}
								}
							?>
						</form>
						</tbody>
					</table>

					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
