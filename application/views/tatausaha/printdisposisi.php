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
<?php $logged_in = $this->session->userdata('logged_in');?>
<?php if ($logged_in['rank']=="Admin Bupati" || $logged_in['rank']=="Admin Wabup"){?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><img src="<?php echo base_url();?>/asset/img/logogaruda.png" style="width: 60px; height: 60px;"/></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;">BUPATI ALOR</td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->kab;?></td>
	</tr>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $surat_masuk->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($surat_masuk->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $surat_masuk->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $surat_masuk->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($surat_masuk->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<input type="checkbox" disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $surat_masuk->perihal;?>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Diteruskan Kepada Sdr :
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Dengan hormat harap :
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled/><span>SEKRETARIS DAERAH</span><br>
				<input type="checkbox" disabled/>ASISTEN ADM. PEMERINTAH DAN KESRA<br>
				<input type="checkbox" disabled/>ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled/>ASISTEN ADMINISTRASI UMUM<br>
			</form>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<form>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			</form>
		</td>
	</tr>
	<tr style="border: 0; border-top: solid 1px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			Catatan :
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; font-size: 24px;" colspan="2">
			<span style="margin-left: 50px;"></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, ...........................</span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $nama->jabatan;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
</table>
<?php } else if($logged_in['rank']=="Admin Sekda") {?>
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
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $surat_masuk->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($surat_masuk->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $surat_masuk->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $surat_masuk->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo $surat_masuk->tgl_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<input type="checkbox" disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $surat_masuk->perihal;?>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Diteruskan Kepada Sdr :
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Dengan hormat harap :
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled/>ASISTEN PEMERINTAH DAN KESRA<br>
				<input type="checkbox" disabled/>ASISTEN PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled/>ASISTEN ADMINISTRASI UMUM<br>
			</form>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<form>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			</form>
		</td>
	</tr>
	<tr style="border: 0; border-top: solid 1px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			Catatan :
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; font-size: 24px;" colspan="2">
			<span style="margin-left: 50px;"></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, ...........................</span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $nama->jabatan;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
</table>
<?php } else if($logged_in['rank']=="Admin Ass 1") {?>
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
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $surat_masuk->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($surat_masuk->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $surat_masuk->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $surat_masuk->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo $surat_masuk->tgl_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<input type="checkbox" disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $surat_masuk->perihal;?>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Diteruskan Kepada Sdr :
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Dengan hormat harap :
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled/>KABAG ADMINISTRASI PEMERINTAHAN<br>
				<input type="checkbox" disabled/>KABAG ADMINISTRASI KEMASYARAKATAN<br>
				<input type="checkbox" disabled/>KABAG HUBUNGAN MASYARAKAT<br>
			</form>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<form>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			</form>
		</td>
	</tr>
	<tr style="border: 0; border-top: solid 1px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			Catatan :
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; font-size: 24px;" colspan="2">
			<span style="margin-left: 50px;"></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, ...........................</span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $nama->jabatan;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
</table>
<?php } else if($logged_in['rank']=="Admin Ass 2") {?>
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
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $surat_masuk->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($surat_masuk->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $surat_masuk->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $surat_masuk->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo $surat_masuk->tgl_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<input type="checkbox" disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $surat_masuk->perihal;?>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Diteruskan Kepada Sdr :
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Dengan hormat harap :
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled/>KABAG. ADMINISTRASI PEMBANGUNAN<br>
				<input type="checkbox" disabled/>KABAG. ADMINISTRASI SUMBER DAYA ALAM<br>
				<input type="checkbox" disabled/>KABAG. ADMINISTRASI PEREKONOMIAN<br>
			</form>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<form>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			</form>
		</td>
	</tr>
	<tr style="border: 0; border-top: solid 1px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			Catatan :
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; font-size: 24px;" colspan="2">
			<span style="margin-left: 50px;"></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, ...........................</span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $nama->jabatan;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
</table>
<?php } else {?>
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
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $surat_masuk->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($surat_masuk->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $surat_masuk->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $surat_masuk->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo $surat_masuk->tgl_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<input type="checkbox" disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $surat_masuk->perihal;?>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Diteruskan Kepada Sdr :
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Dengan hormat harap :
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled/>KABAG. HUKUM DAN HAM<br>
				<input type="checkbox" disabled/>KABAG. ORTA<br>
				<input type="checkbox" disabled/>KABAG. UMUM<br>
			</form>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<form>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			</form>
		</td>
	</tr>
	<tr style="border: 0; border-top: solid 1px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			Catatan :
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; font-size: 24px;" colspan="2">
			<span style="margin-left: 50px;"></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, ...........................</span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $nama->jabatan;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
</table>
<?php }?>
</body>
</html>