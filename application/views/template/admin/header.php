<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Admin - Free Dashboard Theme | HTML Version </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modular-admin/css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo base_url(); ?>assets/modular-admin/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?php echo base_url(); ?>assets/modular-admin/css/app.css">');
            }
        </script>
		
		<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>	
		<script src="<?php echo base_url(); ?>assets/modular-admin/js/vendor.js"></script>
        <script src="<?php echo base_url(); ?>assets/modular-admin/js/app.js"></script>
		<script src="<?php echo base_url();?>assets/jquery/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url();?>assets/jquery/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/jquery/dataTables.bootstrap4.min.js"></script>	
		<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>assets/sweetalert/sweetalert.min.js"></script>		
		<link rel="stylesheet" id="theme-style" href="<?php echo base_url(); ?>assets/modular-admin/css/app.css">
		<link type="text/css" href="<?php echo base_url();?>assets/sweetalert/sweetalert.css" rel="stylesheet">
		
    </head>

    <body>