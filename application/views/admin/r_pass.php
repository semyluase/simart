<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>user/dashboard">Beranda</a></li>
	<li><a href="#">Surat</a></li>
	<li><a href="<?php echo base_url();?>user/rubahpassword">Rubah Password</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Rubah Password > <?php echo $logged_in['name'];?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata('change_error'); ?>
	<form action="<?php echo base_url();?>admin/rubahpassword/change_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Password Lama</b></td>
					<td><b><input type="password" name="pwlama" required style="width: 300px;" class="form-control" autofocus><input type="hidden" name="id" value="<?php echo $logged_in['id'];?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Password Baru</b></td>
					<td><b><input type="password" name="pwbaru" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Konfirm Password</b></td>
					<td><b><input type="password" name="konfirmpw" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>