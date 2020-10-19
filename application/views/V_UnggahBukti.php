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

	<?php echo form_open_multipart(base_url('/index.php/uploadFile')); ?>

		<input type="hidden" name="id" value="<?php echo $id ?> " >
		<input type="hidden" name="idKriteria" value="<?php echo $idKriteria ?> " >

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
						echo "<option value='". $item['idKategori'] ."'>". $item['kategori'] ."</option>";
					}
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="upload">Upload Bukti</label>
			<input type="file" id="upload" name="upload" class="form-control" required="true">
		</div>

		<div class="form-group">
			<input type="submit" value="Upload" class="btn btn-primary w-100">
		</div>
	</form>
</div>