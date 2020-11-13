<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Catat Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/disposisi">Surat Disposisi</a></li>
	<?php if ($disposisi->num_rows()>0) {
		foreach($disposisi->result() as $row){?>
	<li><a href="#">No. Agenda : <?php echo $row->no_agenda?></a></li>
	<?php }}?>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Surat Disposisi</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-lg-6">
		<form action="<?php echo base_url();?>admin/disposisi/printdisposisi" method="post">
		<?php if ($disposisi->num_rows()>0) {
		foreach($disposisi->result() as $row){?>
		<table width="100%" class="table-form">
			<tr>
				<td width="15%">No. Agenda</td>
				<td><b><input type="hidden" name="no_agenda" value="<?php echo $row->no_agenda;?>"><?php echo $row->no_agenda;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">No. Surat</td>
				<td><b><?php echo $row->no_surat;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Tanggal Masuk</td>
				<td><b><?php echo tgl_jam_sql($row->tgl_terima);?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Perihal Surat</td>
				<td><b><?php echo $row->perihal;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		<?php }}?>
	</div>
	<div class="col-lg-6">
		<?php if ($disposisi->num_rows()>0) {
		foreach($disposisi->result() as $row){?>
		<table width="100%" class="table-form">
			<tr>
				<td width="15%">Tanggal Surat</td>
				<td><b><?php echo $row->tgl_surat;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Asal Surat</td>
				<td><b><?php echo $row->asal_surat;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Isi Ringkas Surat</td>
				<td><b><?php echo $row->isi_ringkas;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Disposisi Dari</td>
				<td><b><input type="hidden" name="dari" value="<?php echo $row->dari;?>"><input type="hidden" name="tgl_keluar" value="<?php echo $row->tgl_keluar;?>"><?php echo $row->dari;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Kepada</td>
				<td><b><input type="hidden" name="teruskan" value="<?php echo $row->teruskan;?>"><?php echo $row->teruskan;?></b></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="2" style="text-align: right;">
					<button type="submit" class="btn btn-success btn-sm" target="_blank"> <i class="glyphicon glyphicon-print"></i> Print Disposisi</button>
					<a href="<?php echo base_url();?>admin/disposisi" class="btn btn-danger"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
				</td>
			</tr>
		</table>
		<?php }}?>
		</form>
	</div>
</div>
<?php include('inc/footer.php');?>