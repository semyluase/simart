<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemensruktur/add_new">Manajemen Struktur</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Tambah Struktur</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("add_error"); ?>
	<form action="<?php echo base_url();?>superadmin/manajemenstruktur/add_new_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>NIP</b></td>
					<td><b><input type="text" name="nip" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Level</b></td>
					<td><b>
						<select name="jabatan" class="form-control" style="width: 200px;" required>
							<option>--Pilih Jabatan--</option>
							<option value="BUPATI ALOR">BUPATI ALOR</option>
							<option value="WAKIL BUPATI ALOR">WAKIL BUPATI ALOR</option>
							<option value="Sekretaris Daerah">Sekretaris Daerah</option>
							<option value="Asisten Adm. Pemerintah dan Kesra">Asisten Adm. Pemerintah dan Kesra</option>
							<option value="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN">ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
							<option value="ASISTEN ADMINISTRASI UMUM">ASISTEN ADMINISTRASI UMUM</option>
							<option value="KABAG. UMUM">KABAG. UMUM</option>
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
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>superadmin/manajemenstruktur" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>