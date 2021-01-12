<script>
	// getData();

	function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel2Input/getBukti/') ?>" + '/' + id,
            dataType: 'json',
            success: function(data) {
                var baris = '';
                for (var i = 0; i < data.result.length; i++) {
                    baris += '<tr>' +
                        '<td>' + data.result[i].deskripsi + '</td>' +
                        '<td>' + data.result[i].namaB + '</td>' +
                        '<td><a href="' + data.result[i].pathFile + '" target=`_blank`>' + data.result[i].namaB + '</a></td>' +
                        '</tr>'
                }
                $('#bukti-isi').html(baris);
            }
        });
    }
</script>
<div class="container-fluid mb-5">
	<div class="mt-3 mb-5">
		<h2 class="text-center">Tabel 2.a</h2>
		<h4 class="text-center">Seleksi Mahasiswa</h4>
	</div>
	<table class="table table-striped table-bordered">
		<thead>
			<tr class="text-center">
              <th class="align-middle" rowSpan = "2">Tahun Akademik</th>
              <th class="align-middle" rowSpan = "2">Daya Tampung</th>
              <th class="align-middle" colSpan = "2">Jumlah Calon Mahasiswa</th>
              <th class="align-middle" colSpan = "2">Jumlah Mahasiswa Baru</th>
              <th class="align-middle" colSpan = "2">Jumlah Mahasiswa Aktif</th>
              <th class="align-middle" colSpan = "2" rowspan="2">Aksi</th>
            </tr>
            <tr class="text-center">
              <th>Pendaftar</th>
              <th>Lulus Seleksi</th>
              <th>Reguler</th>
              <th>Transfer</th>
              <th>Reguler</th>
              <th>Transfer</th>
            </tr>
		</thead>
		<tbody>
			<?php 
			$i = 1;
			foreach ($table2a as $item) {
				?>
				<tr class="text-center">
					<td><?php echo $item['tahun'] ?> </td>
					<td><?php echo $item['dayaTampung'] ?> </td>
					<td><?php echo $item['pendaftar'] ?> </td>
					<td><?php echo $item['lulusSeleksi'] ?> </td>
					<td><?php echo $item['mabaReg'] ?> </td>
					<td><?php echo $item['mabaTrans'] ?> </td>
					<td><?php echo $item['aktifReg'] ?> </td>
					<td><?php echo $item['aktifTrans'] ?> </td>
                    <td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['tahun']?>`, `<?php echo $item['tahun'] ?>`)">
							Lihat Bukti
						</button>
					</td>
					<td>
						<form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
							<input type="hidden" name="keterangan" value="<?php echo $item['tahun'] ?>">
							<input type="hidden" name="id" value="<?php echo $item['tahun'] ?>">
							<input type="hidden" name="idKriteria" value="21">
							<button class="btn btn-primary <?php echo $this->session->user_role == 1 ? '"' : 'not-allowed disabled" disabled' ?> type="submit">
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
							<th class="align-middle">Nama Bukti</th>
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
