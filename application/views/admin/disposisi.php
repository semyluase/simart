<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Catat Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/disposisi">Surat Keluar</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Surat Keluar</span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->session->flashdata("add_error"); ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5%">No. Urut</th>
			<th width="20%">No. Agenda</th>
			<th width="15%">Tanggal Keluar</th>
			<th width="20%">Dari</th>
			<th width="25%">Kepada</th>
			<th width="15%">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php if($suratkeluar->num_rows() == 0){?>
			<tr>
				<td colspan="11" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($suratkeluar->result() as $row){
		?>
			<tr>
				<form action="<?php echo base_url();?>admin/disposisi/add_disposisi_lain" method="post" >
				<td style="text-align: center;"><?php echo $no;?></td>
				<td><b><input type="hidden" name="no_agenda" value="<?php echo $row->no_agenda;?>"><?php echo $row->no_agenda;?><input type="hidden" name="id" value="<?php echo $row->id;?>"></b></td>
				<td><b><input type="hidden" name="tgl_keluar" value="<?php echo $row->tgl_keluar;?>"><?php echo tgl_jam_sql($row->tgl_keluar);?></b></td>
				<td><b><input type="hidden" name="dari" value="<?php echo $row->dari;?>"><?php echo $row->dari;?></b></td>
				<td><b><input type="hidden" name="teruskan" value="<?php echo $row->teruskan;?>"><?php echo $row->teruskan;?></b></td>
				<td class="ctr">
					<div class="btn-group">
						<button type="submit" class="btn btn-success btn-sm" > <i class="glyphicon glyphicon-pencil"></i> Disposisi Surat</button>
					</div>
				</td>
				</form>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
<div class="sep"></div>
<center><ul class="pagination"><?php echo $pagi; ?></ul></center>
<?php include('inc/footer.php');?>