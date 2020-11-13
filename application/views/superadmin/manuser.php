<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>superadmin/dashboard">Beranda</a></li>
	<li><a href="#">Pengaturan</a></li>
	<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna">Manajemen Pengguna</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Manage Pengguna</span>
				</div>
				<div class="navbar-collapse collapse navbar-inverse-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url();?>superadmin/manajemenpengguna/add_new"><i class="glyphicon glyphicon-plus-sign"> </i> Tambah Pengguna</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right" style="margin-right: 5px;">
						<form class="navbar-form navbar-left" method="post" action="">
							<input type="text" class="form-control" name="cari" placeholder="Pengguna yang dicari..." required>
							<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
						</form>
					</ul>
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
			<th width="30%">Username</th>
			<th width="30%">Nama, NIP</th>
			<th width="20%">Level</th>
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
				<td><?php echo $row->username;?></td>
				<td><?php echo $row->nama."<br>".$row->nip;?></td>
				<td><?php echo $row->rank;?></td>
				<td class="ctr">
					<div class="btn-group">
						<a href="<?php echo base_url();?>superadmin/manajemenpengguna/edit/<?php echo $row->id;?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-edit"></i> Ubah Data</a>
					</div>
				</td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<div class="sep"></div>
<center><ul class="pagination"><?php echo $pagi;?></ul></center>
<?php include('inc/footer.php');?>