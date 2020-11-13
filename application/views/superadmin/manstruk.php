<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenstruktur">Manajemen Struktur</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Manage Struktur</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<?php echo $this->session->flashdata("edit_error"); ?>
	</div>
</div>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No.</th>
			<th width="30%">Nama</th>
			<th width="30%">NIP</th>
			<th width="20%">Jabatan</th>
			<th width="15%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php if($user->num_rows() == 0){?>
			<tr>
				<td colspan="5" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($user->result() as $row){
		?>
			<tr>
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><?php echo $row->nama;?></td>
				<td><?php echo $row->nip;?></td>
				<td><?php echo $row->jabatan;?></td>
				<td class="ctr">
					<div class="btn-group">
						<a href="<?php echo base_url();?>superadmin/manajemenstruktur/edit/<?php echo $row->id;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Ubah Data</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<div class="sep"></div>
<?php include('inc/footer.php');?>