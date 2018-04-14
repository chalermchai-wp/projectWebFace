<?php 	echo $msgSystem;?>

<script>
$(document).ready( function () {
    $('#d_table1').DataTable();
} );
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
				</div>
				<div class="panel-body">		
					<table id="d_table1" class="table table-bordered" cellspacing="0" width="100%">

						<thead>
							<tr>
								<th style="text-align:center" width="10%">รหัสวิชา</th>
								<th style="text-align:center" width="40%">ชื่อวิชา</th>
								<th style="text-align:center" width="10%">หน่วยกิต</th>
								<th style="text-align:center" width="10%">เทอม</th>
								<th style="text-align:center" width="10%">กลุ่มที่</th>	
								<th style="text-align:center" width="10%">จำนวนนักศึกษา</th>																													
							</tr>
						</thead>
						<tbody>
						<?php							
							foreach ( $num_std as $index2=>$row2 ){	 						
								foreach ( $rs_subject as $index=>$row ){									
									if($index2 == $index){									
						?>							
							<tr class="body"  <?php if(!isset($row2->num_std)){ echo 'style="background-color:#ffe6e6"';} ?> onclick="window.location='<?php echo base_url('index.php/User/view_attendance_list/'.$row->sec_id);?>';">
								<td align="center"><?php echo $row->s_code;?></td>
								<td>
									<?php echo $row->s_name_en.' '.$row->s_name_th;?>
								</td>
								<td align="center"><?php echo $row->s_credit;?></td>	
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



<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-validation/jquery.validate.min.js"></script>  					<!-- Validate Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-stepy/jquery.stepy.js"></script>  								<!-- Stepy Plugin -->
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-jasnyupload/fileinput.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>assets/demo/demo-formwizard.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
	