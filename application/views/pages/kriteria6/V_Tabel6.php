<script>
	// getData();

	function getData(id, judul){
		var judul = judul.bold();
		$("#bukti-header").html(judul);
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('index.php/C_Tabel6/getBukti/') ?>" + id,
			dataType: 'json',
			success: function(data){
				var baris = '';
				for(var i = 0; i < data.result.length; i++) {
					baris += 	'<tr>' +
									'<td>'+ data.result[i].deskripsi +'</td>' +
									'<td>'+ data.result[i].kategori +'</td>' +
									'<td><a href="' + data.result[i].pathFile + '" target=`_blank`>'+ data.result[i].deskripsi +'</a></td>' +
								'</tr>'
				}
				$('#bukti-isi').html(baris);
			}
		});
	}
</script>
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
					<td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['idPenelitian']?>`, `<?php echo substr($item['judulKegiatan'], 2) ?>`)">
							Lihat Bukti
						</button>
					</td>
					<td>
						<form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
							<input type="hidden" name="keterangan" value="<?php echo $item['judulKegiatan'] ?>">
							<input type="hidden" name="id" value="<?php echo $item['idPenelitian'] ?>">
							<input type="hidden" name="idKriteria" value="6">
							<button class="btn btn-primary" type="submit">
								Unggah Bukti
							</button>			
						</form>
					</td>
				</tr>
				<?php 
				$i = $i+1;
			}
			?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="lihatBukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content w-100">
			<div class="modal-header">
				<div id="bukti-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr class="text-center">
							<th class="align-middle">Deskripsi</th>
							<th class="align-middle">Kategori Bukti</th>
							<th class="align-middle">Bukti</th>
						</tr>
					</thead>
					<tbody id="bukti-isi">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
