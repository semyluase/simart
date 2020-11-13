<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna">Manajemen Pengguna</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna/add_new">Tambah Pengguna</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Tambah Pengguna</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("add_error"); ?>
	<form action="<?php echo base_url();?>superadmin/manajemenpengguna/add_new_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Username</b></td>
					<td><b><input type="text" name="username" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Password</b></td>
					<td><b><input type="password" name="password" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Level</b></td>
					<td><b>
						<select name="level" class="form-control" style="width: 200px;" required>
							<option>--Pilih Level User--</option>
							<option value="Super Admin">Super Admin</option>
							<option value="Asisten Super Admin">Asisten Super Admin</option>
							<option value="Admin">Admin</option>
							<option value="Admin Bupati">Tata Usaha Bupati</option>
							<option value="Admin Wabup">Tata Usaha Wabup</option>
							<option value="Admin Sekda">Tata Usaha Sekda</option>
							<option value="Admin Ass 1">Tata Usaha Asisten 1</option>
							<option value="Admin Ass 2">Tata Usaha Asisten 2</option>
							<option value="Admin Ass 3">Tata Usaha Asisten 3</option>
							<option value="Admin Kabag Umum">Tata Usaha Kabag. Umum</option>
						</select>
					</b></td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Nama</b></td>
					<td><b><input type="text" name="nama" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>NIP</b></td>
					<td><b><input type="text" name="nip" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>superadmin/manajemenpengguna" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>