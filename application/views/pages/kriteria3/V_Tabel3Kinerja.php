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
            margin-left: 5%;
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
        <button class="tablinks" onclick="openCity(event, 'T3b1')" id="defaultopen">T 3.b.1 Pengakuan/Rekognisi</button>
        <button class="tablinks" onclick="openCity(event, 'T3b2')">T 3.b.2 Penelitian</button>
        <button class="tablinks" onclick="openCity(event, 'T3b3')">T 3.b.3 PkM DTPS</button>
        <button class="tablinks" onclick="openCity(event, 'T3b4')">T 3.b.4 Publikasi Ilmiah</button>
        <button class="tablinks" onclick="openCity(event, 'T3b5')">T 3.b.5. Luaran Penelitian/PkM</button>
        <button class="tablinks" onclick="openCity(event, 'T3b6')">T 3.b.6 Karya ilmiah</button>
    </div>

    <div id="T3b1" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.1</h2>
                <h4 class="text-center">Pengakuan/Rekognisi DTPS</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Nama Dosen</th>
                        <th class="align-middle" rowSpan="2">Bidang Keahlian</th>
                        <th class="align-middle" rowSpan="2">Rekognisi dan Bukti Pendukung</th>
                        <th class="align-middle" colSpan="3">Tingkat</th>
                        <th class="align-middle" rowSpan="2">Tahun</th>
                        <th colspan="2" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Wilayah</th>
                        <th class="align-middle">Nasional</th>
                        <th class="align-middle">Internasional</th>
                    </tr>
                </thead>
                </thead>
                <tbody>
                    <?php
                    foreach ($table3b1 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $item["Nomor"]; ?></td>
                            <td><?php echo $item["NamaDosen"]; ?></td>
                            <td><?php echo $item["Bidang Keahlian"]; ?></td>
                            <td><?php echo $item["Rekognisi"]; ?></td>
                            <td><?php echo ($item["Wilayah"] ? "&#10003" : ""); ?></td>
                            <td><?php echo ($item["Nasional"] ? "&#10003" : ""); ?></td>
                            <td><?php echo ($item["Internasional"] ? "&#10003" : ""); ?></td>
                            <td><?php echo $item["Tahun"]; ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['Nomor']) ?>`, `<?php echo $item['NamaDosen'] ?>`, `<?php echo '321' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['NamaDosen'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['Nomor'] ?>">
                                    <input type="hidden" name="idKriteria" value="321">
                                    <button class="btn btn-primary" type="submit">
                                        Unggah Bukti
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="T3b2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.2</h2>
                <h4 class="text-center">Penelitian DTPS</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Sumber Pembiayaan</th>
                        <th class="align-middle" colSpan="3">Jumlah Judul</th>
                        <th class="align-middle" rowSpan="2">Jumlah</th>
                        <th class="align-middle" rowSpan="2" colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">TS-2</th>
                        <th class="align-middle">TS-1</th>
                        <th class="align-middle">TS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3b2 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?> </td>
                            <td><?php echo $item['sumberPembiayaan'] ?> </td>
                            <td><?php echo $item['ts2'] ?></td>
                            <td><?php echo $item['ts1'] ?></td>
                            <td><?php echo $item['ts'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php 
                                if ($item['sumberPembiayaan'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="T3b3" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.3</h2>
                <h4 class="text-center">Pengabdian Kepada Masyarakat (PkM) DTPS</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Sumber Pembiayaan</th>
                        <th class="align-middle" colSpan="3">Jumlah Judul</th>
                        <th class="align-middle" rowSpan="2">Jumlah</th>
                        <th class="align-middle" rowSpan="2" colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">TS-2</th>
                        <th class="align-middle">TS-1</th>
                        <th class="align-middle">TS</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3b3 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i; ?> </td>
                            <td><?php echo $item['sumberPembiayaan'] ?> </td>
                            <td><?php echo $item['ts2'] ?></td>
                            <td><?php echo $item['ts1'] ?></td>
                            <td><?php echo $item['ts'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php 
                                if ($item['sumberPembiayaan'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="T3b4" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.4</h2>
                <h4 class="text-center">Publikasi Ilmiah DTPS</h4>
            </div>
            <!-- Jurnal -->
            <h4 class="mt-5 text-center">Tabel Jurnal</h4>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Media Publikasi</th>
                        <th class="align-middle" colSpan="3">Jumlah Judul</th>
                        <th class="align-middle" rowSpan="2">Jumlah</th>
                        <th class="align-middle" rowSpan="2" colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">TS-2</th>
                        <th class="align-middle">TS-1</th>
                        <th class="align-middle">TS</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($table3b4a as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?> </td>
                            <td><?php echo $item['jenisPublikasi'] ?></td>
                            <td><?php echo $item['ts2'] ?></td>
                            <td><?php echo $item['ts1'] ?></td>
                            <td><?php echo $item['ts'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php 
                                if ($item['jenisPublikasi'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>

            <!-- Seminar -->
            <h4 class="mt-5 text-center">Tabel Seminar</h4>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Media Publikasi</th>
                        <th class="align-middle" colSpan="3">Jumlah Judul</th>
                        <th class="align-middle" rowSpan="2">Jumlah</th>
                        <th class="align-middle" rowSpan="2" colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">TS-2</th>
                        <th class="align-middle">TS-1</th>
                        <th class="align-middle">TS</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($table3b4b as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?> </td>
                            <td><?php echo $item['jenisPublikasi'] ?></td>
                            <td><?php echo $item['ts2'] ?></td>
                            <td><?php echo $item['ts1'] ?></td>
                            <td><?php echo $item['ts'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php 
                                if ($item['jenisPublikasi'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>

            <!-- Tulisan -->
            <h4 class="mt-5 text-center">Tabel Tulisan</h4>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Media Publikasi</th>
                        <th class="align-middle" colSpan="3">Jumlah Judul</th>
                        <th class="align-middle" rowSpan="2">Jumlah</th>
                        <th class="align-middle" rowSpan="2" colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">TS-2</th>
                        <th class="align-middle">TS-1</th>
                        <th class="align-middle">TS</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    foreach ($table3b4c as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?> </td>
                            <td><?php echo $item['jenisPublikasi'] ?></td>
                            <td><?php echo $item['ts2'] ?></td>
                            <td><?php echo $item['ts1'] ?></td>
                            <td><?php echo $item['ts'] ?></td>
                            <td><?php echo $item['jumlah'] ?></td>
                            <?php 
                                if ($item['jenisPublikasi'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="T3b5" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.5</h2>
                <h4 class="text-center">Luaran Penelitian/PkM Lainnya oleh DTPS</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Nama Dosen</th>
                        <th class="align-middle max-width">Judul Artikel yang Disitasi (Jurnal/Buku, Volume, Tahun, Nomor, Halaman)</th>
                        <th class="align-middle">Jumlah Sitasi</th>
                        <th class="align-middle" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3b5 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?></td>
                            <td><?php echo $item['NamaDosen'] ?></td>
                            <td><?php echo $item['JudulArtikel'] ?></td>
                            <td><?php echo $item['JumlahSitasi'] ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['JudulArtikel']) ?>`, `<?php echo $item['JudulArtikel'] ?>`, `<?php echo "325" ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['JudulArtikel'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['JudulArtikel'] ?>">
                                    <input type="hidden" name="idKriteria" value="325">
                                    <button class="btn btn-primary" type="submit">
                                        Unggah Bukti
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="T3b6" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.b.6</h2>
                <h4 class="text-center">Karya ilmiah DTPS yang disitasi dalam 3 tahun terakhir</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Judul Luaran Penelitian/PkM</th>
                        <th class="align-middle">Tahun</th>
                        <th class="align-middle">Keterangan</th>
                        <th class="align-middle" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3b7 as $item) {
                    ?>
                        <tr class="text-center">
                            <td> <?php echo $item['Nomor'] ?> </td>
                            <td> <?php echo $item['JudulLuaran'] ?> </td>
                            <td> <?php echo $item['tahun'] ?> </td>
                            <td> <?php echo $item['keterangan'] ?> </td>
                            <?php 
                                if ($item['JudulLuaran'] !== "Jumlah") {
                                    echo '<td>' .
                                        '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['sumberPembiayaan']) . '`, `' . $item['sumberPembiayaan'] . '`, `' . "322" . '`)">' .
                                            'Lihat Bukti' .
                                        '</button>' .
                                    '</td>;' .
                                    '<td>' .
                                        '<form action="' . base_url('/index.php/unggahBukti2') . '" method="POST">' .
                                            '<input type="hidden" name="TS" value="2">' .
                                            '<input type="hidden" name="keterangan" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="id" value="' . $item['sumberPembiayaan'] . '">' .
                                            '<input type="hidden" name="idKriteria" value="322"> ' .
                                            '<button class="btn btn-primary" type="submit">' .
                                                'Unggah Bukti' .
                                            '</button>' .
                                        '</form>' .
                                    '</td>' ;
                                }
                            ?>
                        </tr>
                    <?php
                        $i = $i + 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
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

    <script>
        // getData();

        function getData(id, judul, subsection) {
            var judul = judul.bold();
            $("#bukti-header").html(judul);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('index.php/C_Tabel3Kinerja/getBukti/') ?>" + subsection + '/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data.result)
                    var baris = '';
                    for (var i = 0; i < data.result.length; i++) {
                        baris += '<tr>' +
                            '<td>' + data.result[i].deskripsi + '</td>' +
                            '<td>' + data.result[i].idRecord + '</td>' +
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