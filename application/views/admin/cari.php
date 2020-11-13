<?php include('inc/header.php');?>
</div>
<ol class="breadcrumb">
	<li><a href="<?php echo base_url();?>admin/dashboard">Beranda</a></li>
	<li><a href="#">Catat Surat</a></li>
	<li><a href="<?php echo base_url();?>admin/carisurat">Cari</a></li>
</ol>
<div class="row">
	<div class="col-lg-12">
		<div class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand">Pencarian Surat</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row well">
	<div class="col-lg-12">
		<form action="<?php echo base_url();?>admin/carisurat/search" method="post">
			<table width="100%" class="table-form">
				<tr>
					<td width="25%"><b>Pilih Mode Pencarian</b></td>
					<td><select name="mode" class="form-control" style="width: 300px;" required>
						<option>--Pilih Mode Pencarian--</option>
						<option value="Asal Surat">Asal Surat</option>
						<option value="Tujuan Surat">Tujuan Surat</option>
					</select></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="25%"><b>Kata Kunci Pencarian</b></td>
					<td><input type="text" name="katakunci" required style="width: 300px;" class="form-control" autofocus></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td colspan="2"><div class="sep"></div></td></tr>
				<tr>
					<td colspan="2" style="text-align: right;">
						<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Cari</button>
						<a href="<?php echo base_url();?>admin/dashboard" class="btn btn-danger"><i class="glyphicon glyphicon-home"></i> Beranda</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php include('inc/footer.php');?>