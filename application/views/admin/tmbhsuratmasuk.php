<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Catat Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/suratmasuk">Surat Masuk</a></li>
	<li><a href="#">Tambah Surat Masuk</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Tambah Surat Masuk</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("add_error"); ?>
	<form action="<?php echo base_url();?>admin/suratmasuk/add_new_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-12">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>No. Agenda</b></td>
					<td><b><input type="hidden" name="no_agenda" style="width: 300px;" class="form-control" autofocus value="<?php echo $no_agenda->no_agenda+1;?>"> <?php echo $no_agenda->no_agenda+1;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>No. Surat</b></td>
					<td><b><input type="text" name="nosurat" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Tanggal Surat</b></td>
					<td><b><input type="date" name="tgl_surat" required style="width: 200px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Asal Surat</b></td>
					<td><b><input type="text" name="asalsurat" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Perihal Surat</b></td>
					<td><b><textarea type="text" name="perihalsurat" required style="width: 300px;" class="form-control" autofocus></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Tujuan Surat</b></td>
					<td><b><select name="tjn_surat" required style="width: 350px;" class="form-control" autofocus>
						<option>--Pilih Tujuan Surat--</option>
						<option value="BUPATI ALOR">BUPATI ALOR</option>
						<option value="WAKIL BUPATI ALOR">WAKIL BUPATI ALOR</option>
						<option value="Sekretaris Daerah">Sekretaris Daerah</option>
						<option value="Asisten Pemerintah dan Kesra">Asisten Pemerintah dan Kesra</option>
						<option value="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN">ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
						<option value="ASISTEN ADMINISTRASI UMUM">ASISTEN ADMINISTRASI UMUM</option>
					</select></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Isi Surat</b></td>
					<td><b><textarea type="text" name="isisurat" required style="height: 100px;" class="form-control" autofocus></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>File Surat</b></td>
					<td><b><input type="file" name="filesurat[]" multiple="multiple" required style="width: 300px;" class="form-control" autofocus></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="2"><div class="sep"></div></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>admin/suratmasuk" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>