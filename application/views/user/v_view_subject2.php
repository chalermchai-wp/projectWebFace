<?php 	echo $msgSystem;?>

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
					<div class="btn-group">                        
                        <ul class="dropdown-menu" role="menu">
							<li><a data-toggle="modal" href="#myModalManual" ><i class="ti ti-pencil"></i> เพิ่มเอง</a></li>
							<li class="divider"></li>                        
							<li><a data-toggle="modal" href="#myModalFile" ><i class="ti ti-file"></i> อ่านจากไฟล์</a></li>                        
							<li class="divider"></li>                        
                            <li><a data-toggle="modal" href="#myModalTest" ><i class="ti ti-file"></i> ทดสอบ</a></li>                        
                        </ul>
                    </div>
				
					<table class="table m-n">
						<thead>
							<tr>
								<th width="10%">รหัสวิชา</th>
								<th width="45%">ชื่อวิชา</th>
								<th width="10%">หน่วยกิต</th>
								<th width="10%">เทอม</th>
								<th width="10%">กลุ่มที่</th>	
								<th width="10%">จำนวนนักศึกษา</th>																					
								<th width="15%">จัดการ</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach ( $rs_t_sec->result() as $index2=>$row2 ){	
								foreach ( $rs_all_subj->result() as $index=>$row ){	
																		
										if($row2->tch_sec_id == $row->sec_id){
											echo ">>>>>>>>>>".$row->sec_id;
						?>
							
							<tr>
								<td><?php echo $row->s_code;?></td>
								<td>
									<?php echo $row->s_name_en.' '.$row->s_name_th;?>
								</td>
								<td><?php echo $row->s_credit;?></td>	
								<td><?php echo $row->te_term;?></td>
								<td><?php echo $row->sec_number;?></td>		
								<td><?php 
										if(isset($row->num_std)){
											echo $row->num_std;
										}else{											
											echo "0";
										}
									?>
								</td>									
								<td>
									<button class="btn btn-default ti ti-plus"></button>									
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

<script type="text/javascript" src="<?php echo base_url();?>assets/demo/demo-formwizard.js"></script>
