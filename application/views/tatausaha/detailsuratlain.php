<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>user/dashboard">Beranda</a></li>
	<li><a href="#">Surat</a></li>
	<li><a href="<?php echo base_url();?>user/suratmasuk">Surat Masuk</a></li>
	<?php if ($surat->num_rows()>0) {
		foreach($surat->result() as $row){?>
	<li><a href="#">No. Agenda : <?php echo $row->no_agenda?></a></li>
	<?php }}?>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Surat Masuk </span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-lg-6">
		<?php if ($surat->num_rows()>0) {
		foreach($surat->result() as $row){?>
		<table width="100%" class="table-form">
			<tr>
				<td width="15%">No. Agenda</td>
				<td><b><?php echo $row->no_agenda;?></b></td>
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
		<?php if ($surat->num_rows()>0) {
		foreach($surat->result() as $row){?>
		<table width="100%" class="table-form">
			<tr>
				<td width="15%">Tanggal Surat</td>
				<td><b><?php echo tgl_jam_sql($row->tgl_surat);?></b></td>
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
				<td width="15%">FILE</td>
				<td>
					<?php if ($gambar->num_rows()>0) {
				foreach ($gambar->result() as $rows) {?>
					<a href="<?php echo base_url().'suratmasuk/'.$rows->file;?>" target="_blank"><?php echo $rows->file;?></a><br>
				<?php }}?>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td width="15%">Disposisi</td>
				<td>
					<a href="<?php echo base_url();?>tatausaha/disposisi/lihatdisposisi/<?php echo $row->no_agenda;?>" target="_blank">Baca Disposisi</a>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="2" style="text-align: right;">
					<a href="<?php echo base_url();?>tatausaha/disposisi/suratlain/<?php echo $row->no_agenda;?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Disposisi</a>
					<a href="<?php echo base_url();?>tatausaha/suratmasuk" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
				</td>
			</tr>
		</table>
		<?php }}?>
	</div>
</div>
<?php include('inc/footer.php');?>