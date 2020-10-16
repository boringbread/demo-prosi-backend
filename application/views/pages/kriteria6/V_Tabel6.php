<script>
	// getData();

	function getData($id){
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('index.php/C_Tabel6/getBukti/') ?>" + $id,
			dataType: 'json',
			success: function(data){
				console.log(data.result.length == 0);
				var judul = (data.result.length == 0) ? '' : data.result[0].judul;
				var baris = '';
				for(var i = 0; i < data.result.length; i++) {
					baris += 	'<tr>' +
									'<td>'+ data.result[i].judul +'</td>' +
									'<td>'+ data.result[i].deskripsi +'</td>' +
									'<td><a href="' + data.result[i].pathFile + '">'+ data.result[i].namaBukti +'</a></td>' +
								'</tr>'
				}
				$('#bukti-isi').html(baris);
				$('#bukti-header').html(judul);
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
					<td><button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData('<?php echo $item['idPenelitian'] ?>')">Lihat Bukti</button></td>
					<td><button class="btn btn-primary">Unggah Bukti</button></td>
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
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
							<th class="align-middle">Nama Bukti</th>
							<th class="align-middle">Bukti</th>
						</tr>
					</thead>
					<tbody id="bukti-isi">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>