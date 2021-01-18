<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/basic.min.css') ?>">

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dropzone.min.js') ?>"></script>

<div class="container mt-5">
	<h2 class="text-center">Unggah Bukti</h2>


	<table class="w-50 mx-auto mt-5 table">
		<tr>
			<th>Kriteria </th>
			<th>: </th>
			<td><?php echo $kriteria ?> </td>
		</tr>
		<tr>
			<th>Keterangan </th>
			<th>: </th>
			<td><?php echo $keterangan; ?> </td>
		</tr>
	</table>


	<input type="hidden" id="idKode" name="id" value="<?php echo $id ?> ">
	<input type="hidden" id="idKriteria" name="idKriteria" value="<?php echo $idKriteria ?> ">

	<div class="form-group">
		<label for="deskripsi">Deskripsi Bukti</label>
		<input type="text" id="deskripsi" name="deskripsi" class="form-control" required="">
	</div>

	<div class="form-group">
		<label for="jenis">Jenis Bukti</label>
		<select id="jenis" name="idKategori" class="form-control" required="">
			<option value="" selected disabled="">Pilih...</option>
			<?php
			foreach ($kategori as $item) {
				echo "<option value='" . $item['idKategori'] . "'>" . $item['kategori'] . "</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label for="stat">Status</label>
		<select id="stat" name="stat" class="form-control" required="">
			<option value="" selected disabled="">Pilih...</option>
			<?php
			if ($stat[0] == null) {
			} else {
				foreach ($stat as $i) :
					echo "<option value='$i'>  $i  </option>";

				endforeach;
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="TS">TS</label>
		<select id="TS" name="TS" class="form-control" required="">
			<option value="" selected disabled="">Pilih...</option>
			<?php
			if ($TS == 0) {
			} else {
				for ($i = 0; $i <= $TS; $i++) {
					echo "<option value='TS-" . $i . "'> TS - " . $i . "</option>";
				}
			}
			?>
		</select>
	</div>

	<div class="form-group">
		<div class="dropzone">

			<div class="dz-message">
				<h3> Klik atau Drop file disini</h3>
			</div>

		</div>
	</div>

	<div class="form-group">
		<input type="button" id="upload" value="Upload" class="btn btn-primary w-100">
	</div>
	<div class="form-group">
		<input type="button" id="done" onclick="goBack()" value="Selesai" class="btn btn-primary w-100" style="display:none">
	</div>

</div>

<script type="text/javascript">
	Dropzone.autoDiscover = false;

	var foto_upload = new Dropzone(".dropzone", {
		autoProcessQueue: false,
		acceptedFiles: 'image/jpeg,image/png,image/gif,image/jpg,application/pdf,file/docx,file/doc,file/xlx,file/xls,file/ppt,.pptx ',
		url: "<?php echo base_url('index.php/C_Upload/proses_upload3') ?>",
		maxFilesize: 10,
		parallelUploads: 1,
		method: "post",
		paramName: "userfile",
		dictInvalidFileType: "Type file ini tidak dizinkan",
		addRemoveLinks: true,
	});

	$('#upload').click(function() {
		foto_upload.options.autoProcessQueue = true;
		foto_upload.processQueue();
	});

	//Event ketika Memulai mengupload
	foto_upload.on("sending", function(a, b, c) {
		a.token = Math.random();
		c.append("token_foto", a.token);
		a.kategori = document.getElementById('jenis').value;
		c.append("kategori", a.kategori);
		a.idKode = document.getElementById('idKode').value;
		c.append("id", a.idKode);
		a.idKriteria = document.getElementById('idKriteria').value;
		c.append("kriteria", a.idKriteria);
		a.deskripsi = document.getElementById('deskripsi').value;
		c.append("deskripsi", a.deskripsi);
		a.tahun = document.getElementById('TS').value;
		c.append("TS", a.tahun);
		a.stat = document.getElementById('stat').value;
		c.append("stat", a.stat);
		console.log(a);
		//Menmpersiapkan token untuk masing masing foto
	});
	foto_upload.on("queuecomplete", function() {
		//Redirect URL
		document.getElementById('done').style.display = 'block';
		foto_upload.options.autoProcessQueue = false;
	});

	function goBack() {
		window.history.back();
	}
</script>