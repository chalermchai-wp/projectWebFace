<div id="wrapper">
<div id="layout-static">
	<div class="static-sidebar-wrapper sidebar-default">
		<div class="static-sidebar">
			<div class="sidebar">
<div class="widget">
<div class="widget-body">
<div class="userinfo">
	<div class="avatar">
		<img src="<?php echo base_url();?>assets/img/user.png" class="img-responsive img-circle"> 
	</div>
	<div class="info">
		<span class="username"><?echo $this->session->userdata('u_name');?></span>
		<!-- <span class="useremail">jon@avenxo.com</span> -->
	</div>
</div>
</div>
</div>
<div class="widget stay-on-collapse" id="widget-sidebar">
<nav role="navigation" class="widget-body">
<ul class="acc-menu">
	<li class="nav-separator"><span>Explore</span></li>
	<li>
		<a href="<?php echo base_url('index.php/User/');?>">
		<i class="ti ti-home"></i><span>หน้าแรก</span><!--span class="badge badge-teal">2</span--></a>
	</li>
	<li>
		<a href="<?php echo base_url('index.php/User/view_attendance');?>">
		<i class="ti ti-check-box"></i><span>เช็คชื่อ</span></a>
	</li>
	<li>
		<a href="<?php echo base_url('index.php/User/manage_subject');?>">
		<i class="ti ti-pencil"></i><span>จัดการรายวิชา</span></a>
	</li>
	<li>
		<a href="<?php echo base_url('index.php/User/view_subject');?>">
		<i class="ti ti-view-list-alt"></i><span>ดูรายวิชา</span></a>
		<!-- <ul class="acc-menu">
			<li><a href="<?php echo base_url('index.php/User/suject_attends');?>">888419</a></li>
			<li><a href="form-components.html">Form Components</a></li>
			<li><a href="form-pickers.html">Pickers</a></li>
		</ul> -->
	</li>
	<li>
		<a href="<?php echo base_url('index.php/User/view_upload_img');?>"><i class="ti ti-settings"></i><span>อัปโหลดรูปภาพ</span></a>
	</li>
	
	<li>
		<a href="javascript:;"><i class="ti ti-file"></i><span>ข้อผิดพลาด</span></a>
		<ul class="acc-menu">
			<li><a href="extras-profile.html">Profile</a></li>
			<li><a href="javascript:;">Email Templates</a>
				<ul class="acc-menu">
					<li><a href="responsive-email/basic.html">Basic</a></li>
					<li><a href="responsive-email/hero.html">Hero</a></li>
					<li><a href="responsive-email/sidebar.html">Sidebar</a></li>
					<li><a href="responsive-email/sidebar-hero.html">Sidebar Hero</a></li>
				</ul>
			</li>

		</ul>
	</li>
	<li>
		<a href="<?php echo base_url('index.php/User/view_upload_img');?>"><i class="ti ti-settings"></i><span>รายงาน</span></a>
	</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
				
				<div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <!-- <ol class="breadcrumb">
                                
								<li><a href="index.html">หน้าแรก</a></li>
								<li><a href="#">จัดการรายวิชา</a></li>
								<li class="active"><a href="ui-tables.html">ตารางรายวิชา</a></li>

							</ol> -->
							<br>
                            <div class="container-fluid">
