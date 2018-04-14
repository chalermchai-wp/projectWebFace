<?php 	echo $msgSystem;?>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info" data-widget='{"draggable": "false"}'>
				<div class="panel-heading">
					<h2>อัปโหลดรูปภาพ</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
					<div class="options">

					</div>
				</div>
				<div class="panel-body">
					<form method="post" action="<?php echo base_url('index.php/User/upload_img');?>" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">เลือกรูปภาพ</label>
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
								<div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
								<div>
									<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span>
									<span class="fileinput-exists">Change</span>
									<input type="file" name="img" id="img"></span>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="alert alert-info">Image preview only works in IE10+, FF3.6+, Safari6.0+, Chrome6.0+ and Opera11.1+. In older browsers the filename is shown instead.</div>
						</div>
					</div>					
				</div>
				<div class="panel-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" value="save"> 
				</div>
				</form>	
			</div>
		</div>
	</div>

	
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/form-jasnyupload/fileinput.min.js"></script>    <!-- File Input -->

  