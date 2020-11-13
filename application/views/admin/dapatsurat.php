<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Cari Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat">Surat</a></li>
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
			<th width="15%">No. Surat dan Tanggal Surat</th>
			<th width="15%">Tanggal Terima</th>
			<th width="20%">Tujuan Surat</th>
			<th width="20%">Asal Surat dan Perihal</th>
			<th width="25%">Aksi</th>
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
				<td><?php echo $row->no_surat;?><br><br><b><?php echo $row->tgl_surat;?></b></td>
				<td><?php echo tgl_jam_sql($row->tgl_terima);?></td>
				<td><?php echo $row->tujuan;?></td>
				<td><?php echo $row->asal_surat;?>,<br><br><b><?php echo $row->perihal;?></b></td>
				<td class="ctr">
					<div class="btn-group">
						<a href="<?php echo base_url();?>admin/carisurat/detail/<?php echo $row->no_agenda;?>" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-eye-open"></i> Lihat Status</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<?php include('inc/footer.php');?>