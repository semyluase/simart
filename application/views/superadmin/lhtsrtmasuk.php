<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Laporan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/suratmasuk">Surat Masuk</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Surat Masuk</span>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No. Urut</th>
			<th width="9%">No. dan Tanggal Surat</th>
			<th width="9%">Tanggal Terima</th>
			<th width="9%">Tanggal Teruskan</th>
			<th width="9%">Tujuan Surat</th>
			<th width="9%">Asal Surat</th>
			<th width="13%">Perihal Surat, File Surat</th>
			<th width="9%">Tanggal Keluar</th>
			<th width="13%">Isi Disposisi</th>
			<th width="9%">Diteruskan Kepada</th>
			<th width="5%">Aksi</th>
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
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><?php echo $row->no_surat;?><br><?php echo $row->tgl_surat;?></td>
				<td><?php echo tgl_jam_sql($row->tgl_terima);?></td>
				<td><?php echo tgl_jam_sql($row->tgl_teruskan);?></td>
				<td><?php echo $row->tujuan;?></td>
				<td><?php echo $row->asal_surat;?></td>
				<td><?php echo $row->perihal;?><br><a href="<?php echo base_url();?>/suratmasuk/"><?php echo $row->file;?></a></td>
				<td><?php echo tgl_jam_sql($row->tgl_keluar);?></td>
				<td><?php echo $row->isi_disposisi;?></td>
				<td><?php echo $row->isi_diteruskan;?></td>
				<td>
					<div class="btn-group">
						<a href="<?php echo base_url();?>superadmin/suratmasuk" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
					</div>
					<div class="btn-group">
						<a href="<?php echo base_url();?>superadmin/suratmasuk" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Disposisi</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="11" style="text-align: right;">
				<form action="<?php echo base_url();?>superadmin/suratmasuk/print" method="post" accept-charset="utf-8" enctype="multipart/form-data" target="blank">
					<div class="btn-group">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Print Laporan</button>
					</div>
					<div class="btn-group">
						<a href="<?php echo base_url();?>superadmin/suratmasuk" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
					</div>
				</form>
			</td>
		</tr>
	</tfoot>
</table>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<?php include('inc/footer.php');?>