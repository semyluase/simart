<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna">Instansi Pengguna</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Edit Instansi Pengguna</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("edit_error"); ?>
	<form action="<?php echo base_url();?>superadmin/instansipengguna/edit_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Nama Instansi</b></td>
					<td><b><input type="text" name="nama" required style="width: 300px;" class="form-control" autofocus value="<?php echo $kantor->nama;?>"><input type="hidden" name="id" value="<?php echo $kantor->id;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Alamat Instansi</b></td>
					<td><b><textarea name="alamat" required style="width: 300px; height: 100px;"><?php echo $kantor->alamat?></textarea></b></td>
				</tr>
				<tr>
					<td width="20%"><b>File Logo</b></td>
					<td><b><input type="file" name="logo" style="width: 300px;" class="form-control"></b></td>
				</tr>
			</table>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Nama Pimpinan</b></td>
					<td><b><input type="text" name="pimpinan" required style="width: 300px;" class="form-control" value="<?php echo $kantor->kepala;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>NIP Pimpinan</b></td>
					<td><b><input type="text" name="nip" required style="width: 300px;" class="form-control" value="<?php echo $kantor->nip_kepala;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>No. Telepon Instansi</b></td>
					<td><b><input type="text" name="notlpn" required style="width: 300px;" class="form-control" autofocus value="<?php echo $kantor->notlpn;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Kelurahan - Kabupaten</b></td>
					<td><b><input type="text" name="kelkab" required style="width: 300px;" class="form-control" autofocus value="<?php echo $kantor->kab;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>superadmin/dashboard" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>