<!DOCTYPE html>
<html>
<head>
	<title>::.SIMART.::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>asset/img/logo1.png">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/mystyle.css">
	<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/js/angular.min.js"></script>
</head>
<body style="">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand"><strong style="margin-left: 410px; text-align: center">.::Simart (Sistem Manajemen Surat)::.</strong></span>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        
      </div>
    </div>

	<?php 
	$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
	?>
    <div class="container">
	
	<br><br>

	<div class="container-fluid" style="margin-top: 30px">
	
      <div class="row-fluid">
		<div style="width: 400px; margin: 0 auto">
			<div class="well well-sm">
				<img src="<?php echo base_url(); ?>asset/img/<?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 80px; height: 80px">
				<h3 style="margin: 5px 0 0.4em 0; font-size: 21px; color: #000; font-weight: bold"><?php echo $q_instansi->nama; ?></h3>
				<hr>
				<div style="color: #000; font-size: 13px" class="clearfix"><?php echo $q_instansi->alamat; ?></div>
			 </div>
		</div>
		
		<div class="well" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
		<form action="<?php echo base_URL(); ?>login/do_login" method="post">
		<legend>Login</legend>	
		<?php echo $this->session->flashdata("login_error"); ?>
		<table align="center" style="margin-bottom: 0" class="table-form" width="90%">
			<tr><td width="40%">Username</td><td><input type="text" autofocus name="username" required style="width: 200px" autofocus class="form-control"></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>Password</td><td><input type="password" name="password" required style="width: 200px" class="form-control"></td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td></td><td><input type="submit" class="btn btn-success" value="Login"></td></tr>
		</table>
		</form>
		</div><!--/span-->
      </div><!--/row-->

    </div><!--/.fluid-container-->
	<center style="margin-top: -15px;">Versi 1.0 (Oktober 2017) &copy; <a href="http://facebook.com/semyvaldes">Semy Luase</a> | 
	<a href="<?php echo base_url();?>#">Pemda Kab. Alor</a><br>
	</center>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$(" #alert" ).fadeOut(6000);
	});
	</script>
	  
    </div>
  
</body>
</html>