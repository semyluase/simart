<!DOCTYPE html>
<html>
<head>
	<title>::.SIMART.:: (Sistem Manajemen Surat)</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>asset/img/logo1.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/mystyle.css">
	<script src="<?php echo base_url(); ?>asset/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".dropdown").attr('open');
		});
	</script>
</head>
<body>
<?php $logged_in = $this->session->userdata('logged_in');?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand"><strong>::.SIMART.::</strong></span>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	        </button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
        	<ul class="nav navbar-nav">
        		<li><a href="<?php echo base_url(); ?>superadmin/dashboard"><i class="glyphicon glyphicon-home"> </i> Beranda</a></li>
				<li class="dropdown">
              		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="glyphicon glyphicon-cog"> </i> Pengaturan <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="themes">
                		<li><a tabindex="-1" href="<?php echo base_url(); ?>superadmin/instansipengguna">Instansi Pengguna</a></li>
                		<li><a tabindex="-1" href="<?php echo base_url(); ?>superadmin/manajemenstruktur">Manajemen Struktur</a></li>
                		<li><a tabindex="-1" href="<?php echo base_url(); ?>superadmin/manajemenpengguna">Manajemen Pengguna</a></li>
              		</ul>
            	</li>
        	</ul>
        	<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
            		<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="glyphicon glyphicon-user"></i> <?php echo $logged_in['name'];?> <strong>[<?php echo $logged_in['rank'];?>]</strong> <span class="caret"></span></a>
              		<ul class="dropdown-menu" aria-labelledby="themes">
                		<li><a href="<?php echo base_url(); ?>superadmin/rubahpassword">Rubah Password</a></li>
                		<li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                		<li><a href="#" target="_blank">Help</a></li>
              		</ul>
            	</li>
          	</ul>
        </div>
	</div>
</div>
<div class="container">
	<div class="page-header">
		<div class="row">
			<div>&nbsp;</div>
			<div>&nbsp;</div>
			<div>&nbsp;</div>
		</div>
		<div class="row">
			<div class="well well-sm">
				<img src="<?php echo base_url();?>asset/img/<?php echo $kantor->logo;?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 30px; margin-left: 30px; margin-bottom: 5px; width: 100px; height: 110px;"/>
				<h1 style="margin: 15px 0 10px 0; color: #000;"><?php echo $kantor->nama;?></h1>
				<div style="font-size: 20px; color: #000;" class="clearfix"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?> <br><?php echo $kantor->kab;?></div>
			</div>
		</div>
		<div class="row">
			<div>&nbsp;</div>
			<div>&nbsp;</div>
		</div>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/bootstrap.js"></script>