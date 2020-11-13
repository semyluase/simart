<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Laporan Surat Keluar</title>
</head>

<body onload="window.print()">
	<table style="border: 0px #fff;">
		<tr style="border: 0px #fff; padding: 0 0;">
			<td rowspan="3" style="width: 5%;"><img src="<?php echo base_url();?>asset/img/<?php echo $kantor->logo;?>" style="width: 65px; height: 75px;"></td>
			<td style="text-align: center; padding: 0px 0px; width: 95%;"><h1><?php echo $kantor->nama;?></h1></td>
		</tr>
		<tr style="border: 0px #fff; padding: 0 0;">
			<td style="text-align: center; padding: 0px 0px;"><h1><?php echo $kantor->alamat;?></h1></td>
		</tr>
		<tr style="border: 0px #fff; padding: 0 0;">
			<td style="text-align: center; padding: 0px 0px;"><h4><?php echo $kantor->notlpn;?></h4></td>
		</tr>
		<tr style="border: 2px #000;">
			<td colspan="2"><hr></td>
		</tr>
	</table>
	<center>
	<b style="font-size: 20px">LAPORAN SURAT KELUAR</b><br>
	Dari tanggal <b><?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>"; ?>
	</center><br>
	
	<table>
		<thead>
			<tr>
				<th width="3%">No</td>
				<th width="5%">Kode Klas</td>
				<th width="28%">Isi Ringkas</td>
				<th width="18%">Kepada</td>
				<th width="17%">Nomor Surat</td>
				<th width="7%">Tgl. Surat</td>
				<th width="10%">Dari</td>
				<th width="5%">Ket</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($suratkeluar->num_rows() > 0) {
				$no = 0;
				foreach ($suratkeluar->result() as $d) {
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->kode; ?></td>
				<td><?php echo $d->isi_ringkas; ?></td>
				<td><?php echo $d->dari; ?></td>
				<td><?php echo $d->no_surat; ?></td>
				<td><?php echo tgl_jam_sql($d->tgl_surat); ?></td>
				<td><?php echo $d->kepada; ?></td>
				<td><?php echo $d->keterangan; ?></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center;' colspan='9'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>