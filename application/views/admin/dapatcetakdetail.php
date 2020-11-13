<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Cari Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat">Cetak Surat</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Cetak Agenda Surat</span>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table table-bordered table-hover">
<form action="<?php echo  base_url();?>admin/cetak/simpan" method="post" target="_blank">
	<thead>
		<tr>
			<th width="5%">No. Urut</th>
			<th width="15%">No. Surat dan Tanggal Surat</th>
			<th width="15%">Tanggal Terima, Tujuan Surat</th>
			<th width="20%">Disposisi Dari dan Kepada (Tanggal Keluar)</th>
			<th width="20%">Isi Disposisi</th>
			<th width="20%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if($suratmasuk->num_rows() == 0){?>
			<tr>
				<td colspan="11" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($suratmasuk->result() as $row){
		?>
			<tr>
				<td style="text-align: center;">
					<?php echo $no;?>
					<input type="hidden" name="tujuan" value="<?php echo $tujuan?>"/>
					<input type="hidden" name="tgl_awal" value="<?php echo $tgl_awal?>"/>
					<input type="hidden" name="tgl_akhir" value="<?php echo $tgl_akhir?>"/>
				</td>
				<td><?php echo $row->no_surat;?><br><br><b><?php echo tgl_jam_sql($row->tgl_surat);?></b></td>
				<td><?php echo tgl_jam_sql($row->tgl_terima);?><br><br><?php echo $row->tujuan;?></td>
				<td><?php echo $row->dari;?> <i class="glyphicon glyphicon-arrow-right"></i> <?php echo $row->teruskan;?><br><br>(<?php echo tgl_jam_sql($row->tgl_keluar);?>)</td>
				<td>Sifat : <?php echo $row->sifat;?><br>Perhatian : <?php echo $row->perhatian;?><br><br>Isi Disposisi :<br><br><?php echo $row->isi_disposisi;?></td>
				<td><?php echo $row->status_disposisi;?></td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<div class="row well">
<table width="100%" class="table-form">
	<tr>
		<td colspan="2" style="text-align: right;">
			<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Simpan</button>
			<a href="<?php echo base_url();?>admin/cetak" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
		</td>
	</tr>
</table>
</form>
</div>
<?php include('inc/footer.php');?>