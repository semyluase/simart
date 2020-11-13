<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Referensi</a></li>
	<li><a href="<?php echo base_url();?>superadmin/klasifikasisurat">Klasifikasi Surat</a></li>
	<li><a href="<?php echo base_url();?>superadmin/dashboard"><?php echo $namacari;?></a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Klasifikasi Surat (Peraturan Pemerintah No ?? Tahun ????)</span>
				</div>
				<div class="navbar-collapse collapse navbar-inverse-collapse">
					<ul class="nav navbar-nav navbar-right" style="margin-right: 5px;">
						<form class="navbar-form navbar-left" method="post" action="">
							<input type="text" class="form-control" name="cari" placeholder="Klasifikasi yang dicari..." required>
							<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
						</form>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="10%">Kode</th>
			<th width="20%">Nama</th>
			<th width="60%">Uraian</th>
			<th width="10%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php if($klassurat->num_rows() == 0){?>
			<tr>
				<td colspan="4" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($klassurat->result() as $row){
		?>
			<tr>
				<td><?php echo $row->kode_klas;?></td>
				<td><?php echo $row->nama_klas;?></td>
				<td><?php echo $row->uraian;?></td>
				<td class="ctr">
					<div class="btn-group">
						<a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" style="text-align: right;">
				<div class="btn-group">
					<a href="#" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Klasifikasi Surat</a>
				</div>
			</td>
		</tr>
	</tfoot>
</table>
<div class="sep"></div>
<center><ul class="pagination"><?php echo $pagi;?></ul></center>
<?php include('inc/footer.php');?>