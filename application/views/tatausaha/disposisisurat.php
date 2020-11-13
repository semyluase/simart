<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>user/dashboard">Beranda</a></li>
	<li><a href="#">Surat</a></li>
	<li><a href="<?php echo base_url();?>user/suratmasuk">Surat Masuk</a></li>
	<?php if ($surat_masuk->num_rows()>0) {
		foreach($surat_masuk->result() as $row){?>
	<li><a href="<?php echo base_url();?>#">No. Agenda : <?php echo $row->no_agenda?></a></li>
	<?php }}?>
	<li><a href="<?php echo base_url();?>#">Disposisi</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Disposisi Surat</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<form action="<?php echo base_url();?>tatausaha/disposisi/add_new_disposisi" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<?php if($surat_masuk->num_rows()>0){?>
		<?php foreach($surat_masuk->result() as $row){?>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Asal Surat :</b></td>
					<td><b><input type="hidden" name="asalsurat" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->asal_surat;?>"><?php echo $row->asal_surat;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>No. Surat :</b></td>
					<td><b><input type="hidden" name="nosurat" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->no_surat;?>"><?php echo $row->no_surat;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Tanggal Surat :</b></td>
					<td><b><input type="hidden" name="tanggalsurat" required style="width: 300px;" class="form-control" autofocus value="<?php echo tgl_jam_sql($row->tgl_surat);?>"><?php echo tgl_jam_sql($row->tgl_surat);?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>Diterima Tgl :</b></td>
					<td><b><input type="hidden" name="tglterima" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->tgl_terima;?>"><?php echo tgl_jam_sql($row->tgl_terima);?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>No. Agenda :</b></td>
					<td><b><input type="hidden" name="no_agenda" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->no_agenda;?>"><?php echo $row->no_agenda;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Sifat :</b></td>
					<td>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b></b></td>
					<td>
						<input type="radio" name="sifat" class="radio-inline" value="Sangat Segera">Sangat Segera
						<input type="radio" name="sifat" class="radio-inline" value="Segera">Segera
						<input type="radio" name="sifat" class="radio-inline" value="Rahasia">Rahasia
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</div>
		<div class="col-lg-12">
			<div class="sep"></div>
			<table width="100%" class="table-form">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="7%"><b>Perihal :</b></td>
					<td><b><input type="hidden" name="perihal" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->perihal;?>"><?php echo $row->perihal;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
			<div class="sep"></div>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%" colspan="2"><b>Diteruskan Kepada Sdr :</b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<input type="radio" name="teruskan" class="radio-inline" value="Sekretaris Daerah"> SEKRETARIS DAERAH<br>
					<input type="radio" name="teruskan" class="radio-inline" value="Asisten Adm. Pemerintah dan Kesra"> ASISTEN ADMINISTRASI PEMERINTAH DAN KESRA<br>
					<input type="radio" name="teruskan" class="radio-inline" value="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN"> ASISTEN ADMINISTRASI PEREK. DAN PEMBANGUNAN<br>
					<input type="radio" name="teruskan" class="radio-inline" value="ASISTEN ADMINISTRASI UMUM"> ASISTEN ADMINISTRASI UMUM<br>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</div>
		<div class="col-lg-6">
			<table width="100%" class="table-form">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><b>Dengan hormat harap :</b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><b><select name="perhatian_pil" required style="width: 350px;" class="form-control" autofocus>
						<option value="--">--Pilih--</option>
						<option value="Tanggapan dan Saran">Tanggapan dan Saran</option>
						<option value="Proses lebih lanjut">Proses lebih lanjut</option>
						<option value="Koordinasi/konfirmasi">Koordinasi/konfirmasi</option>
					</select></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><b><textarea type="text" name="perhatian_isi" style="width: 300px;" class="form-control"></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</div>
		<div class="col-lg-12">
			<div class="sep"></div>
			<table width="100%" class="table-form">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="7%"><b>Catatan :</b></td>
					<td><b><textarea type="text" name="catatan" required style="height: 100px;" class="form-control" autofocus></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
			<div class="sep"></div>
			<table width="100%" class="table-form">
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>tatausaha/disposisi/cetak/<?php echo $row->no_agenda;?>" class="btn btn-warning" target="_blank"><i class="glyphicon glyphicon-print"></i> Cetak</a>
						<a href="<?php echo base_url();?>tatausaha/suratmasuk" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
		</div>
		<?php }}?>
	</form>
</div>
<?php include('inc/footer.php');?>