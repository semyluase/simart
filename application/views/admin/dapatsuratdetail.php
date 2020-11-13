<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Cari Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat">Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat/#">No. Agenda</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat/#/#"><?php echo $no;?></a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">No. Agenda Surat > <?php echo $no;?></span>
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
			<th width="15%">Tanggal Terima, Tujuan Surat</th>
			<th width="20%">Disposisi Dari dan Kepada (Tanggal Keluar)</th>
			<th width="20%">Isi Disposisi</th>
			<th width="20%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if($surat->num_rows() == 0){?>
			<tr>
				<td colspan="11" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($surat->result() as $row){
		?>
			<tr>
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><?php echo $row->no_surat;?><br><br><b><?php echo $row->tgl_surat;?></b></td>
				<td><?php echo tgl_jam_sql($row->tgl_terima);?><br><br><?php echo $row->tujuan;?></td>
				<td><?php echo $row->dari;?> <i class="glyphicon glyphicon-arrow-right"></i> <?php echo $row->teruskan;?><br><br>(<?php echo tgl_jam_sql($row->tgl_keluar);?>)</td>
				<td>Sifat : <?php echo $row->sifat;?><br>Perhatian : <?php echo $row->perhatian;?><br><br>Isi Disposisi :<br><br><?php echo $row->isi_disposisi;?></td>
				<td><?php echo $row->status_disposisi;?></td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<?php include('inc/footer.php');?>