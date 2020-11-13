<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Cetak Agenda</a></li>
	<li><a href="<?php echo base_url();?>admin/cetak">Cetak</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Cetak Agenda</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-lg-12">
		<form action="<?php echo base_url();?>admin/cetak/cari" method="post">
			<table width="100%" class="table-form">
				<tr>
					<td width="25%"><b>Tujuan Surat</b></td>
					<td><select name="tujuan" class="form-control" style="width: 300px;" required>
						<option>--Pilih Tujuan Surat--</option>
						<option value="BUPATI ALOR">BUPATI ALOR</option>
						<option value="WAKIL BUPATI ALOR">WAKIL BUPATI ALOR</option>
						<option value="Sekretaris Daerah">Sekretaris Daerah</option>
						<option value="Asisten Pemerintah dan Kesra">Asisten Pemerintah dan Kesra</option>
						<option value="ASISTEN PEREKONOMIAN DAN PEMBANGUNAN">ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
						<option value="ASISTEN ADMINISTRASI UMUM">ASISTEN ADMINISTRASI UMUM</option>
					</select></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%"><b>Tanggal</b></td>
					<td><input type="date" name="tgl_awal" required style="width: 300px;" class="form-control" autofocus></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="2"><div class="sep"></div></td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
						<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-danger"><i class="glyphicon glyphicon-home"></i> Beranda</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include('inc/footer.php');?>