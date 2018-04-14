<?php 	echo $msgSystem;?>

<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/minimal/_all.css" rel="stylesheet">                   <!-- Custom Checkboxes / iCheck -->
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/flat/_all.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/square/_all.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url();?>assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">  

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
								<select name="week" class="form-control" <?php if($first_day->sec_first_day == "0000-00-00" || $first_day->sec_first_day == null){echo 'style="color: #e51c23;"';}?>>
									<?php 
									if($first_day->sec_first_day == "0000-00-00" || $first_day->sec_first_day == null){
										
										echo "<option> <span>ยังไม่ได้เลือกวันที่เรียนวันแรก</span> </option>";
									
									}else{
										
										$dateDiff = new DateTime();
										$diff = 0;
										
										for($i=0;$i<16;$i++){
											echo '<option value="';
											echo $i+1;
											echo '"';											
											if(isset($first_day->sec_first_day)){
												$dateDiff2 = new DateTime($first_day->sec_first_day);
	
												date_add($dateDiff2, date_interval_create_from_date_string($i*7 .' days'));
												$perR = $dateDiff->diff($dateDiff2)->format("%R");
												
												if($perR == '+'){
													$diff++;													
												}else{
													echo "disabled";
												}
												if($diff == 1){
													echo "selected";
												}
											}

											echo '>';
											if(isset($first_day->sec_first_day)){
												$date = new DateTime($first_day->sec_first_day);
	
												date_add($date, date_interval_create_from_date_string($i*7 .' days'));

												// echo $dateDiff->diff($date)->format("%R%y years %m month %d days, %h hours and %i minuts").'<br>';

												//echo date_format($date, 'Y-m-d');
												echo "สัปดาห์ที่ " ;
												echo $i+1;
												echo " วันที่ ".date_format($date, 'Y-m-d');
											}
											echo "</option>";
										}
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
						<?php													
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
							}
						?>
						</tbody>
					</table>

					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
