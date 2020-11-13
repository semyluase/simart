<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Catat Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/suratmasuk">Surat Masuk</a></li>
	<li><a href="#">Edit Surat Masuk</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Edit Surat Masuk</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<?php echo $this->session->flashdata("add_error"); ?>
	<form action="<?php echo base_url();?>admin/suratmasuk/edit_new_successfully" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div class="col-lg-12">
			<?php if($surat_masuk->num_rows() != 0) {?>
			<?php foreach($surat_masuk->result() as $row){?>
			<table width="100%" class="table-form">
				<tr>
					<td width="20%"><b>No. Agenda</b></td>
					<td><b><input type="hidden" name="no_agenda" style="width: 300px;" class="form-control" autofocus value="<?php echo $row->no_agenda;?>"><input type="hidden" name="id" style="width: 300px;" class="form-control" autofocus value="<?php echo $row->id;?>"> <?php echo $row->no_agenda;?></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>No. Surat</b></td>
					<td><b><input type="text" name="nosurat" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->no_surat;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Tanggal Surat</b></td>
					<td><b><input type="date" name="tgl_surat" placeholder="Tanggal-Bulan-Tahun" required style="width: 200px;" class="form-control" autofocus value="<?php echo $row->tgl_surat;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Asal Surat</b></td>
					<td><b><input type="text" name="asalsurat" required style="width: 300px;" class="form-control" autofocus value="<?php echo $row->asal_surat;?>"></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Perihal Surat</b></td>
					<td><b><textarea type="text" name="perihalsurat" required style="width: 300px;" class="form-control" autofocus><?php echo $row->perihal;?></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Tujuan Surat</b></td>
					<td><b><select name="tjn_surat" required style="width: 350px;" class="form-control" autofocus>
						<option>--Pilih Tujuan Surat--</option>
						<?php
							$tjn_surat = array('BUPATI ALOR', 'WAKIL BUPATI ALOR', 'Sekretaris Daerah', 'Asisten Pemerintah dan Kesra', 'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN', 'ASISTEN ADMINISTRASI UMUM');
							for ($i=0; $i < sizeof($tjn_surat); $i++) { 
								if ($tjn_surat[$i] == $row->tujuan) {
									echo "<option selected value='".$tjn_surat[$i]."'>".$tjn_surat[$i]."</option>";
								} else {
									echo "<option value='".$tjn_surat[$i]."'>".$tjn_surat[$i]."</option>";
								}
								
							}
						?>
					</select></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="20%"><b>Isi Surat</b></td>
					<td><b><textarea type="text" name="isisurat" required style="height: 100px;" class="form-control" autofocus><?php echo $row->isi_ringkas;?></textarea></b></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="2"><div class="sep"></div></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Simpan</button>
						<a href="<?php echo base_url();?>admin/suratmasuk" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batal</a>
					</td>
				</tr>
			</table>
			<?php }}?>
		</div>
	</form>
</div>
<?php include('inc/footer.php');?>