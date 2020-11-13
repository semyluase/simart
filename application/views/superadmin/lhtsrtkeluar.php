<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Laporan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/suratkeluar">Surat Keluar</a></li>
	<li><a href="<?php echo base_url();?>superadmin/#">Dari Tanggal <?php echo tgl_jam_sql($tgl_start);?> Sampai Tanggal <?php echo tgl_jam_sql($tgl_end);?></a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Surat Keluar Dari Tanggal <?php echo tgl_jam_sql($tgl_start);?> Sampai Tanggal <?php echo tgl_jam_sql($tgl_end);?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No.</th>
			<th width="7%">Kode Klasifikasi</th>
			<th width="30%">Isi Ringkas</th>
			<th width="20%">Kepada</th>
			<th width="19%">No Surat</th>
			<th width="8%">Tgl Surat</th>
			<th width="11%">Dari</td>
		</tr>
	</thead>
	<tbody>
		<?php if($suratkeluar->num_rows() == 0){?>
			<tr>
				<td colspan="7" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($suratkeluar->result() as $row){
		?>
			<tr>
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><?php echo $row->kode;?></td>
				<td><?php echo $row->isi_ringkas;?></td>
				<td><?php echo $row->dari;?></td>
				<td><?php echo $row->no_surat;?></td>
				<td><?php echo tgl_jam_sql($row->tgl_surat);?></td>
				<td><?php echo $row->kepada;?></td>
			</tr>
		<?php $no++;}}?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="7" style="text-align: right;">
				<form action="<?php echo base_url();?>superadmin/suratkeluar/print" method="post" accept-charset="utf-8" enctype="multipart/form-data" target="blank">
					<div class="col-lg-6">
						<table width="100%" class="table-form">
							<tr>
								<td><b>
									<div class="input-group-date" id="datepicker">
										<input type="hidden" name="tgl_start" class="form-control" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_start?>" style="width : 200px;" />
									</div>
								</b></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td><b>
									<div class="input-group-date" id="datepicker">
										<input type="hidden" name="tgl_end" class="form-control" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_start?>" style="width : 200px;" />
									</div>
								</b></td>
							</tr>
						</table>
					</div>
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