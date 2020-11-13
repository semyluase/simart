<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>tatausaha/dashboard">Beranda</a></li>
	<li><a href="#">Surat</a></li>
	<li><a href="<?php echo base_url();?>tatausaha/suratmasuk">Surat Masuk</a></li>
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
			<th width="25%">No. Agenda dan Tanggal Keluar</th>
			<th width="20%">Dari</th>
			<th width="25%">Diteruskan Kepada</th>
			<th width="25%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php if($suratmasukuser->num_rows() == 0){?>
			<tr>
				<td colspan="11" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($suratmasukuser->result() as $row){
		?>
			<tr>
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><?php echo $row->no_agenda;?><br><br><b><?php echo tgl_jam_sql($row->tgl_keluar);?></b></td>
				<td><?php echo $row->dari;?></td>
				<td><?php echo $row->teruskan;?></td>
				<td class="ctr">
					<div class="btn-group">
						<a href="<?php echo base_url();?>tatausaha/disposisimasuk/detailkeluar/<?php echo $row->no_agenda;?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Lihat Detail</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<div class="sep"></div>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<?php include('inc/footer.php');?>