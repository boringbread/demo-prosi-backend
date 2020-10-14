<div class="container-fluid mb-5">
	<div class="mt-3 mb-5">
		<h2 class="text-center">Tabel 6</h2>
		<h4 class="text-center">Penelitian DTPS yang melibatkan mahasiswa</h4>
	</div>
	<table class="table table-striped table-bordered">
		<thead>
			<tr class="text-center">
				<th class="align-middle">No</th>
				<th class="align-middle">Nama Dosen</th>
				<th class="align-middle">Tema Penelitian Sesuai Roadmap</th>
				<th class="align-middle">Nama Mahasiswa</th>
				<th class="align-middle">Judul Kegiatan</th>
				<th class="align-middle" style="width: 100px">Tahun</th>
				<th class="align-middle" colspan="2" >Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$i = 1;
				foreach ($table6 as $item) {
			?>
			<tr>
				<td> <?php echo $i ?> </td>
				<td><?php echo $item['namaDosen'] ?></td>
				<td><?php echo $item['temaPenelitian']; ?></td>
				<td><?php echo $item['namaMahasiswa']; ?></td>
				<td><?php echo substr($item['judulKegiatan'], 2); ?></td>
				<td><?php echo $item['tahun']; ?></td>
				<td><button class="btn btn-success">Lihat Bukti</button></td>
				<td><button class="btn btn-primary">Unggah Bukti</button></td>
			</tr>
			<?php 
					$i = $i+1;
				}
			?>
		</tbody>
	</table>
</div>