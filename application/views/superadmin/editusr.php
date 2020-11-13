<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<?php if($user->num_rows() != 0) {?>
	<?php foreach($user->result() as $row){?>
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna">Manajemen Pengguna</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna/add_new">Edit Pengguna</a></li>
	<li><a href="#"><?php echo $row->nama;?></a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Edit Pengguna > <?php echo $row->nama;?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("edit_error"); ?>
	<form action="<?php echo base_url();?>superadmin/manajemenpengguna/edit_new_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Username</b></td>
					<td><b><input type="text" name="" disabled required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->username;?>"><input type="hidden" name="id" value="<?php echo $row->id;?>"><input type="hidden" name="username" value="<?php echo $row->username;?>"><input type="hidden" name="password" value="<?php echo $row->password;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Level</b></td>
					<td><b>
						<select name="level" class="form-control" style="width: 200px;" required>
							<option>--Pilih Level User--</option>
							<?php
								$level = array('Super Admin', 'Asisten Super Admin', 'Admin', 'Admin Bupati', 'Admin Wabup', 'Admin Sekda', 'Admin Ass 1', 'Admin Ass 2', 'Admin Ass 3');

								for ($i=0; $i < sizeof($level); $i++) { 
									if ($level[$i] == $row->rank) {
										echo "<option selected value='".$level[$i]."'>".$level[$i]."</option>";
									} else {
										echo "<option value='".$level[$i]."'>".$level[$i]."</option>";
									}
									
								}
							?>
						</select>
					</b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Password</b></td>
					<td><b><input type="passowrd" name="password" style="width: 300px;" class="form-control" autofocus ></b></td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Nama</b></td>
					<td><b><input type="text" name="nama" required style="width: 300px;" class="form-control" value="<?php echo $row->nama;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>NIP</b></td>
					<td><b><input type="text" name="nip" required style="width: 300px;" class="form-control" value="<?php echo $row->nip;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>superadmin/manajemenpengguna" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
		<?php }}?>
	</form>
</div>
<?php include('inc/footer.php');?>