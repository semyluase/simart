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
<?php if($disposisi->num_rows()>0){?>
<?php foreach($disposisi->result() as $row){?>
<?php if($row->dari=='BUPATI ALOR'|| $row->dari=='WAKIL BUPATI ALOR'){?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><img src="<?php echo base_url();?>/asset/img/logogaruda.png" style="width: 60px; height: 60px;"/></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;">BUPATI ALOR</td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><?php echo $kantor->kab;?></td>
	</tr>
	<?php }}?>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $row->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled />Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled checked />Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Sekretaris Daerah'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled/> SEKRETARIS DAERAH<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php } else if($row->teruskan == 'Asisten Adm. Pemerintah dan Kesra'){?>
			<form style="margin-left: 30px;">
			<input type="checkbox" disabled/> SEKRETARIS DAERAH<br>
				<input type="checkbox" checked disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php } else if($row->teruskan == 'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN'){?>
			<form style="margin-left: 30px;">
			<input type="checkbox" disabled/> SEKRETARIS DAERAH<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" checked disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php } else if($row->teruskan == 'ASISTEN ADMINISTRASI UMUM') {?>
			<form style="margin-left: 30px;">
			<input type="checkbox" disabled/> SEKRETARIS DAERAH<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" checked disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><b><?php echo $row->dari;?></b></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php } else if($row->dari == 'Sekretaris Daerah'){?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: right; border: 0px; margin-bottom: 0px; padding: 0px; width: 275px;" rowspan="5"><img src="<?php echo base_url();?>/asset/img/logo_bw.png" style="width: 55px; height: 60px;"/></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo strtoupper($kantor->nama);?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;">SEKRETARIAT DAERAH</span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->kab;?></span></td>
	</tr>
	<?php }}?>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $row->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" checked disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Asisten Adm. Pemerintah dan Kesra'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php } else if($row->teruskan == 'ASISTEN PEREKONOMIAN DAN PEMBANGUNAN'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" checked disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php } else {?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> ASISTEN ADM. PEMERINTAHAN DAN KESRA<br>
				<input type="checkbox" disabled> ASISTEN ADM. PEREK. DAN PEMBANGUNAN<br>
				<input type="checkbox" checked disabled> ASISTEN ADMINISTRASI UMUM<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><b><?php echo $row->dari;?></b></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php } else if($row->dari=='Asisten Adm. Pemerintah dan Kesra'){?>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $row->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" checked disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Kabag. ADM. Pemerintahan'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled> KABAG. ADM. PEMERINTAHAN<br>
				<input type="checkbox" disabled> KABAG. ADM. KESRA<br>
				<input type="checkbox" disabled> KABAG. ADM. HUMAS<br>
			</form>
			<?php } else if($row->teruskan == 'Kabag. ADM. Kesra'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. ADM. PEMERINTAHAN<br>
				<input type="checkbox" checked disabled> KABAG. ADM. KESRA<br>
				<input type="checkbox" disabled> KABAG. ADM. HUMAS<br>
			</form>
			<?php } else {?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. ADM. PEMERINTAHAN<br>
				<input type="checkbox" disabled> KABAG. ADM. KESRA<br>
				<input type="checkbox" checked disabled> KABAG. ADM. HUMAS<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $row->dari;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php } else if($row->dari=='ASISTEN PEREKONOMIAN DAN PEMBANGUNAN'){?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: right; border: 0px; margin-bottom: 0px; padding: 0px; width: 275px;" rowspan="5"><img src="<?php echo base_url();?>/asset/img/logo_bw.png" style="width: 55px; height: 60px;"/></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo strtoupper($kantor->nama);?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;">SEKRETARIAT DAERAH</span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->kab;?></span></td>
	</tr>
	<?php }}?>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo $row->tgl_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" checked disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Kabag. ADM. Pembangunan'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled> KABAG. ADM. PEMBANGUNAN<br>
				<input type="checkbox" disabled> KABAG. ADM. SUMBER DAYA ALAM<br>
				<input type="checkbox" disabled> KABAG. ADM. PEREKONOMIAN<br>
			</form>
			<?php } else if($row->teruskan == 'Kabag. ADM. Sumber Daya Alam'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. ADM. PEMBANGUNAN<br>
				<input type="checkbox" checked disabled> KABAG. ADM. SUMBER DAYA ALAM<br>
				<input type="checkbox" disabled> KABAG. ADM. PEREKONOMIAN<br>
			</form>
			<?php } else {?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. ADM. PEMBANGUNAN<br>
				<input type="checkbox" disabled> KABAG. ADM. SUMBER DAYA ALAM<br>
				<input type="checkbox" checked disabled> KABAG. ADM. PEREKONOMIAN<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $row->dari;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php } else if($row->dari=='ASISTEN ADMINISTRASI UMUM'){?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: right; border: 0px; margin-bottom: 0px; padding: 0px; width: 275px;" rowspan="5"><img src="<?php echo base_url();?>/asset/img/logo_bw.png" style="width: 55px; height: 60px;"/></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo strtoupper($kantor->nama);?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;">SEKRETARIAT DAERAH</span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->kab;?></span></td>
	</tr>
	<?php }}?>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $row->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" checked disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Kabag. Hukum dan Ham'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled> KABAG. HUKUM DAN HAM<br>
				<input type="checkbox" disabled> KABAG. ORTA<br>
				<input type="checkbox" disabled> KABAG. UMUM<br>
			</form>
			<?php } else if($row->teruskan == 'Kabag. ORTA'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. HUKUM DAN HAM<br>
				<input type="checkbox" checked disabled> KABAG. ORTA<br>
				<input type="checkbox" disabled> KABAG. UMUM<br>
			</form>
			<?php } else {?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KABAG. HUKUM DAN HAM<br>
				<input type="checkbox" disabled> KABAG. ORTA<br>
				<input type="checkbox" checked disabled> KABAG. UMUM<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $row->dari;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php } else {?>
<table width="50%" style="border: 0px; font-size: 10px;">
	<tr style="text-align: center; border: 0px;">
		<td style="text-align: right; border: 0px; margin-bottom: 0px; padding: 0px; width: 275px;" rowspan="5"><img src="<?php echo base_url();?>/asset/img/logo_bw.png" style="width: 55px; height: 60px;"/></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo strtoupper($kantor->nama);?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;">SEKRETARIAT DAERAH</span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></span></td>
	</tr>
	<tr style="text-align: center; border: 0px; font-family: sans-serif;">
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"></td>
		<td style="text-align: center; border: 0px; margin-bottom: 0px; padding: 0px;"><span style="margin-left: -275px;"><?php echo $kantor->kab;?></span></td>
	</tr>
	<?php }}?>
</table>
<table width="50%" style="border: solid 1px; font-size: 10px;">
	<tr style="text-align: center; border: solid 1px;">
		<td colspan="2" style="text-align: center; border: solid 1px; margin-bottom: 0px; padding: 2px; font-family: sans-serif;"><b>LEMBAR DISPOSISI</b></td>
	</tr>
	<?php if($disposisi->num_rows()>0){?>
	<?php foreach($disposisi->result() as $row){?>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Surat Dari : <?php echo $row->asal_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			Tanggal Terima : <?php echo tgl_jam_sql($row->tgl_terima);?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			No. Agenda : <?php echo $row->no_agenda;?>
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			No. Surat : <?php echo $row->no_surat;?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			Sifat :
		</td>
	</tr>
	<tr style="border: 0px;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: 365px;">
			Tgl. Surat : <?php echo tgl_jam_sql($row->tgl_surat);?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; width: '50%';">
			<form style="margin-left: 50px;">
				<?php if($row->sifat == 'Sangat Segera'){?>
				<input type="checkbox" checked disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else if($row->sifat == 'Segera'){?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" checked disabled/>Segera <input type="checkbox" disabled/>Rahasia
				<?php } else {?>
				<input type="checkbox" disabled/>Sangat Segera <input type="checkbox" disabled/>Segera <input type="checkbox" checked disabled/>Rahasia
				<?php }?>
			</form>
		</td>
	</tr>
	<tr style="border: 0; ">
		<td style="border: solid 1px; margin-left: 2px; padding-top: 15px; padding-bottom: 15px; font-family: sans-serif;" colspan="2">
			Perihal : <?php echo $row->perihal;?>
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
			<?php if($row->teruskan == 'Kasubag Kerumahtanggaan'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" checked disabled> KASUBAG KERUMAHTANGGAAN<br>
				<input type="checkbox" disabled> KASUBAG PENDAPATAN, KEUANGAN & ASET<br>
				<input type="checkbox" disabled> KASUBAG TATA USAHA<br>
			</form>
			<?php } else if($row->teruskan == 'Kasubag Pendapatan, Keuangan, & Aset'){?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KASUBAG KERUMAHTANGGAAN<br>
				<input type="checkbox" checked disabled> KASUBAG PENDAPATAN, KEUANGAN & ASET<br>
				<input type="checkbox" disabled> KASUBAG TATA USAHA<br>
			</form>
			<?php } else {?>
			<form style="margin-left: 30px;">
				<input type="checkbox" disabled> KASUBAG KERUMAHTANGGAAN<br>
				<input type="checkbox" disabled> KASUBAG PENDAPATAN, KEUANGAN & ASET<br>
				<input type="checkbox" checked disabled> KASUBAG TATA USAHA<br>
			</form>
			<?php }?>
		</td>
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;">
			<?php if($row->perhatian == 'Tanggapan dan Saran'){?>
			<form>
				<input type="checkbox" checked disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Proses lebih lanjut'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" checked disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else if($row->perhatian == 'Koordinasi/konfirmasikan'){?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" checked disabled> Koordinasi/konfirmasikan <br>
				<label>...........................................</label><br>
				<label>...........................................</label>
			<?php } else {?>
				<input type="checkbox" disabled> Tanggapan dan Saran <br>
				<input type="checkbox" disabled> Proses lebih lanjut <br>
				<input type="checkbox" disabled> Koordinasi/konfirmasikan <br>
				<label><?php echo $row->perhatian;?></label>
			<?php }?>
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
			<span style="margin-left: 50px;"><?php echo $row->isi_disposisi;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif;" colspan="2">
			<br><br><br><br><br><br><br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;">Kalabahi, <?php echo tgl_jam_sql($row->tgl_keluar);?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px;"><?php echo $row->dari;?></span>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<br><br><br><br>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border-left: solid 1px; border-right: solid 1px; margin-left: 2px; padding: 1px; font-family: sans-serif; text-align: center;" colspan="2">
			<span style="margin-left: 450px; font-size: 12px;"><b><u><?php echo $nama->nama;?></u></b></span>
		</td>
	</tr>
	<?php }}?>
</table>
<?php }?>
<?php }}?>
</body>
</html>