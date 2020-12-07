	<body class="">
		<div class="bg-primary py-3">
			<div class="container bg-sucess w-50 text-center">
				<a href=<?php echo base_url(); ?>>
					<div class=" bg-light rounded p-3 d-flex mb-3 align-items-center">
						<div class="col-2">
							<img src="<?php echo base_url('assets/img/UNPAR.png') ;?>" alt="Logo Informatika" class="img-fluid">
						</div>
						<div class="col-2">
							<img src="<?php echo base_url('assets/img/informatika.png') ;?>" alt="Logo Informatika" class="img-fluid">
						</div>
						<div class="col">
							<img src="<?php echo base_url('assets/img/tulisan.png') ;?>" alt="Logo Informatika" class="img-fluid" style="filter: invert();">
						</div>
					</div>
				</a>
				<h3 class="text-light font-weight-light mb-0">Laporan Kinerja Program Studi 2020</h3>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="menu">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a href="<?php echo site_url('tatapamong');?>" class="nav-link">1. Tata Pamong</a>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" href="#" id="navbarMahasiswa" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							2. Mahasiswa
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarMahasiswa">
							<a href="<?php echo site_url('inputMahasiswa');?>" class="dropdown-item">a. Kualitas Input Mahasiswa</a>							
							<a href="<?php echo site_url('asing');?>" class="dropdown-item">b. Mahasiswa Asing</a>							
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" href="#" id="navbarSDM" role="button" data-toggle="dropdown" aria-haspopup="true" arie-expanded="false">3. SDM</a>
						<div id="navbarSDM" class="dropdown-menu">
							<a href="<?php echo site_url('profil');?>" class="dropdown-item">a. Profil Dosen</a>
							<a href="<?php echo site_url('kinerja');?>" class="dropdown-item">b. Kinerja Dosen</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('keuangan');?>" class="nav-link">4. Keuangan & Sarana</a> 
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" href="#" id="navbarPendidikan" role="button" data-toggle="dropdown" aria-haspopup="true" arie-expanded="false">5. Pendidikan</a>

						<div class="dropdown-menu" id="navbarPendidikan">
							<a href="<?php echo site_url('kurikulum');?>" class="dropdown-item">a. Kurikulum</a>
							<a href="<?php echo site_url('Integrasi');?>" class="dropdown-item">b. Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran</a>
							<a href="<?php echo site_url('kepuasan');?>" class="dropdown-item">c. Kepuasan Mahasiswa</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('melibatkanMahasiswa');?>" class="nav-link">6. Penelitian Melibatkan Mahasiswa</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('PKM');?>" class="nav-link">7. Pengabdian Masyarakat</a>
					</li>
					<li class="nav-item dropdown">
						<a href="" class="nav-link dropdown-toggle" href="#" id="navbarLuaran" role="button" data-toggle="dropdown" aria-haspopup="true" arie-expanded="false">8. Luaran dan Capaian Tridharma</a>

						<div class="dropdown-menu" id="navbarLuaran">
							<a href="<?php echo site_url('capaian');?>" class="dropdown-item">a. Capaian Pembelajaran</a>
							<a href="<?php echo site_url('prestasi');?>" class="dropdown-item">b. Prestasi Mahasiswa</a>
							<a href="<?php echo site_url('efektivitas');?>" class="dropdown-item">c. Efektifitas dan Produktifitas Pendidikan</a>
							<a href="<?php echo site_url('dayasaing');?>" class="dropdown-item">d. Daya Saing Lulusan</a>
							<a href="<?php echo site_url('kinerja');?>" class="dropdown-item">e. Kinerja Lulusan</a>
							<a href="<?php echo site_url('publikasi');?>" class="dropdown-item">f. Penelitian dan PkM</a>
						</div>
					</li>
				</ul>				
			</div>
		</nav>
		