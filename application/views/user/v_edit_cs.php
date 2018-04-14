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
					
					<table class="table table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="text-align:center" width="5%">สัปดาห์ที่</th>
								
								<th style="text-align:center" width="10%">วันที่</th>
								<!-- <th style="text-align:center" width="10%"> ลา </th>	 -->
							</tr>
						</thead>
						<form action="<?php echo base_url('index.php/User/update_edit_cs');?>" method="post" id="wizard" class="form-horizontal">
							<input type="hidden" name="sec_id" value="<?php echo $sec_id;?>">
							<tbody>
							<?php						
								//print_r($date->result());	
								foreach ( $date->result() as $index=>$row ){																
							?>							
								<tr>
									<td style="text-align:center" ><?php echo $index+1;?></td>
									<td style="text-align:center" >
										<input type="date" class="form-control" id="date[]" name="date[]" placeholder="วันแรกที่เรียน" value="<?php echo (isset($row->cs_date))? "$row->cs_date" : "";?>">
									</td>
								</tr>
							<?php

									if($index+1 == $date->num_rows()){
							?>
								<tr>
									<td style="text-align:center" >&nbsp;</td>
									<td style="text-align:center" >
										<input type="submit" class="btn btn-success form-control " value="บันทึก">
									</td>
								</tr>
							<?php
									}
								}
							?>
							</tbody>
						</form>
					</table>

					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
