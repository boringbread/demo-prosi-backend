<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            font-size: 10px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 14px;
            margin-left: 3%;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'T3a1')" id="defaultopen">T 3.a.1 Dosen Tetap Pengampuan Program Studi</button>
        <button class="tablinks" onclick="openCity(event, 'T3a2')">T 3.a.2 Ekuivalen Waktu Mengajar Dosen
        </button>
        <button class="tablinks" onclick="openCity(event, 'T3a3')">T 3.a.3 Dosen Tidak Tetap Pengampuan Program Studi</button>
        <button class="tablinks" onclick="openCity(event, 'T3a4')">T 3.a.4 Dosen Pembimbing Utama Tugas Akhir</button>
    </div>

    <div id="T3a1" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.1</h2>
                <h4 class="text-center">Dosen Tetap Perguruan Tinggi yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang diakreditasi</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Nama Dosen</th>
                        <th class="align-middle" rowSpan="2">NIDN/NIDK</th>
                        <th class="align-middle" colSpan="2">Pendidikan Pasca Sarjana</th>
                        <th class="align-middle" rowSpan="2">Bidang Keahlian</th>
                        <th class="align-middle" rowSpan="2">Kesesuaian dengan Kompetensi Inti PS</th>
                        <th class="align-middle" rowSpan="2">Jabatan Akademik</th>
                        <th class="align-middle" rowSpan="2">Sertifikat Pendidik Profesional</th>
                        <th class="align-middle" rowSpan="2">Sertifikat Kompetensi/ Profesi/ Industri</th>
                        <th class="align-middle" rowSpan="2">Mata Kuliah yang Diampu pada PS yang Diakreditasi</th>
                        <th class="align-middle" rowSpan="2">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</th>
                        <th class="align-middle" rowSpan="2">Mata Kuliah yang Diampu pada PS Lain</th>
                    </tr>
                    <tr class="text-center">
                        <th class="align-middle" colSpan="">Magister/ Magister Terapan/Spesialis</th>
                        <th class="align-middle" colSpan="" rowspan="">Doktor/ Doktor Terapan/Spesialis</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            $i = 1;
                            foreach ($table6 as $item) {
                            ?>
				<tr class="text-center">
					<td> <?php echo 2016 ?> </td>
					<td><?php echo 120 ?></td>
					<td><?php echo 400 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 0 ?></td>
                    <td><?php echo 500 ?></td>
					<td><?php echo 20 ?></td>
                    <td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['idPenelitian'] ?>`, `<?php echo substr($item['judulKegiatan'], 2) ?>`)">
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
                                $i = $i + 1;
                            }
                ?> -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="T3a2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.2</h2>
                <h4 class="text-center">Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th className="align-middle" rowSpan="3">No.</th>
                        <th className="align-middle" rowSpan="3">Nama Dosen</th>
                        <th className="align-middle" rowSpan="3">DTPS</th>
                        <th className="align-middle" colSpan="6">Ekuivalen Waktu Mengajar Penuh (EWMP) pada saat TS dalam satuan kredit semester (sks)</th>
                        <th className="align-middle" rowSpan="3">Jumlah (sks)</th>
                        <th className="align-middle" rowSpan="3">Rata-rata per Semester (sks)</th>
                    </tr>
                    <tr class="text-center">
                        <th className="align-middle" colSpan="3">Pendidikan: <br></br>Pembelajaran dan Pembimbingan</th>
                        <th className="align-middle" rowSpan="2">Penelitian</th>
                        <th className="align-middle" rowSpan="2">PkM</th>
                        <th className="align-middle" rowSpan="2">Tugas Tambahan dan/atau Penunjang</th>
                    </tr>
                    <tr class="text-center">
                        <th className="align-middle">PS yang Diakreditasi</th>
                        <th className="align-middle">PS Lain di dalam PT</th>
                        <th className="align-middle">PS Lain di luar PT</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            $i = 1;
                            foreach ($table6 as $item) {
                            ?>
				<tr class="text-center">
					<td> <?php echo 2016 ?> </td>
					<td><?php echo 120 ?></td>
					<td><?php echo 400 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 0 ?></td>
                    <td><?php echo 500 ?></td>
					<td><?php echo 20 ?></td>
                    <td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['idPenelitian'] ?>`, `<?php echo substr($item['judulKegiatan'], 2) ?>`)">
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
                                $i = $i + 1;
                            }
                ?> -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="T3a3" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.3</h2>
                <h4 class="text-center">Dosen Tidak Tetap yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang Diakreditasi</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th className="align-middle">No.</th>
                        <th className="align-middle">Nama Dosen</th>
                        <th className="align-middle">NIDN/NIDK</th>
                        <th className="align-middle">Pendidikan Pasca Sarjana</th>
                        <th className="align-middle">Bidang Keahlian</th>
                        <th className="align-middle">Jabatan Akademik</th>
                        <th className="align-middle">Sertifikat Pendidik Profesional</th>
                        <th className="align-middle">Sertifikat Profesi/ Kompensasi/ Industri</th>
                        <th className="align-middle">Mata Kuliah yang Diampu pada PS yang Diakreditasi</th>
                        <th className="align-middle">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</th>
                    </tr>

                </thead>
                <tbody>
                    <!-- <?php
                            $i = 1;
                            foreach ($table6 as $item) {
                            ?>
				<tr class="text-center">
					<td> <?php echo 2016 ?> </td>
					<td><?php echo 120 ?></td>
					<td><?php echo 400 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 0 ?></td>
                    <td><?php echo 500 ?></td>
					<td><?php echo 20 ?></td>
                    <td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['idPenelitian'] ?>`, `<?php echo substr($item['judulKegiatan'], 2) ?>`)">
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
                                $i = $i + 1;
                            }
                ?> -->
                </tbody>
            </table>
        </div>
    </div>
    <div id="T3a4" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.4</h2>
                <h4 class="text-center">Dosen Pembimbing Utama Tugas Akhir</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th className="align-middle" rowSpan="3">No.</th>
                        <th className="align-middle" rowSpan="3">Nama Dosen</th>
                        <th className="align-middle" colSpan="8">Jumlah Mahasiswa yang Dibimbing</th>
                        <th className="temp align-middle" rowSpan="3">Rata-rata Jumlah Bimbingan di semua Program/ Semester</th>
                    </tr>
                    <tr class="text-center">
                        <th className="align-middle" colSpan="4">pada PS yang Diakreditasi</th>
                        <th className="align-middle" colSpan="4">pada PS Lain di PT</th>
                    </tr>
                    <tr class="text-center">
                        <th className="align-middle">TS-2</th>
                        <th className="align-middle">TS-1</th>
                        <th className="align-middle">TS</th>
                        <th className="align-middle">Rata-rata</th>
                        <th className="align-middle">TS-2</th>
                        <th className="align-middle">TS-1</th>
                        <th className="align-middle">TS</th>
                        <th className="align-middle">Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php
                            $i = 1;
                            foreach ($table6 as $item) {
                            ?>
				<tr class="text-center">
					<td> <?php echo 2016 ?> </td>
					<td><?php echo 120 ?></td>
					<td><?php echo 400 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 120 ?></td>
					<td><?php echo 0 ?></td>
                    <td><?php echo 500 ?></td>
					<td><?php echo 20 ?></td>
                    <td>
						<button class="btn btn-success"
						data-toggle="modal"
						data-target="#lihatBukti"
						onClick="getData(`<?php echo $item['idPenelitian'] ?>`, `<?php echo substr($item['judulKegiatan'], 2) ?>`)">
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
                                $i = $i + 1;
                            }
                ?> -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // getData();

        function getData(id, judul) {
            var judul = judul.bold();
            $("#bukti-header").html(judul);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('index.php/C_Tabel3Profil/getBukti/') ?>" + id,
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.result.length; i++) {
                        baris += '<tr>' +
                            '<td>' + data.result[i].deskripsi + '</td>' +
                            '<td>' + data.result[i].namaBukti + '</td>' +
                            '<td><a href="' + data.result[i].pathFile + '" target=`_blank`>' + data.result[i].deskripsi + '</a></td>' +
                            '</tr>'
                    }
                    $('#bukti-isi').html(baris);
                }
            });
        }
    </script>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultopen").click();
    </script>

</body>

</html>