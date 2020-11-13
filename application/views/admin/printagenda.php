<!DOCTYPE html>
<html>
<head>
	<title>::.SIMART.:: (Sistem Manajemen Surat)</title>
	<link rel="icon" type="image/png" href="<?php echo base_url();?>asset/img/logo1.png">
	<style type="text/css" media="print">
		table {border: solid 1px #000; border-collapse: collapse; width: 100%}
		tr { border: solid 1px #000}
		td { padding: 7px 5px}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
	<style type="text/css" media="screen">
		table {border: solid 1px #000; border-collapse: collapse; width: 60%}
		tr { border: solid 1px #000}
		td { padding: 7px 5px}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
</head>
<body>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><img src="<?php echo base_url();?>/asset/img/logo_bw.png" style="width: 60px; height: 60px;"/></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;">SEKRETARIAT DAERAH</td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->kab;?></td>
	</tr>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<thead>
		<tr>
			<th width="5%" style="border:1px solid;">No. Urut</th>
			<th width="15%" style="border:1px solid;">No. Surat dan Tanggal Surat</th>
			<th width="15%" style="border:1px solid;">Tanggal Terima, Tujuan Surat</th>
			<th width="20%" style="border:1px solid;">Disposisi Dari dan Kepada (Tanggal Keluar)</th>
			<th width="20%" style="border:1px solid;">Isi Disposisi</th>
			<th width="20%" style="border:1px solid;">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php if($suratmasuk->num_rows() == 0){?>
			<tr>
				<td colspan="11" style="text-align: center; font-weight: bold;">--Data tidak ditemukan--</td>
			</tr>
		<?php } else {
			$no = 1;
			foreach($suratmasuk->result() as $row){
		?>
			<tr >
				<td style="border:1px solid;">
					<?php echo $no;?>
				</td>
				<td style="border:1px solid;"><?php echo $row->no_surat;?><br><br><b><?php echo tgl_jam_sql($row->tgl_surat);?></b></td>
				<td style="border:1px solid;"><?php echo tgl_jam_sql($row->tgl_terima);?><br><br><?php echo $row->tujuan;?></td>
				<td style="border:1px solid;">Dari : <?php echo $row->dari;?><br>Kepada :<?php echo $row->teruskan;?><br><br>(<?php echo tgl_jam_sql($row->tgl_keluar);?>)</td>
				<td style="border:1px solid;">Sifat : <?php echo $row->sifat;?><br>Perhatian : <?php echo $row->perhatian;?><br><br>Isi Disposisi :<br><br><?php echo $row->isi_disposisi;?></td>
				<td style="border:1px solid;"><?php echo $row->status_disposisi;?></td>
			</tr>
		<?php $no++;}}?>
	</tbody>
</table>
</body>
</html>