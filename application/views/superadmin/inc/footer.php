</div>
<div class="navbar-bottom">
	<div class="footer1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 center">
					<h4>Tentang Kami</h4>
					<ul class="list-unstyled clear-margins">
						<li><?php echo $kantor->nama;?></li>
						<li><?php echo $kantor->alamat;?> Fax. <?php echo $kantor->notlpn;?></li>
						<li><?php echo $kantor->kab;?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="copyright">
					<div class="left">
						&copy; 2017 | <a href="<?php echo base_url();?>">::.SIMART.:: (Ver. 1.0)</a> | Design by <a href="https://www.facebook.com/semyvaldes">Semy Luase</a>
					</div>
					<div class="right">
						Waktu Eksekusi : {elapsed_time}, Penggunaan Memori : {memory_usage}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>