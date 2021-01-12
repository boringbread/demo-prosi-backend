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

        .table-font {
            font-size: 9px !important;
        }
    </style>
</head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'T3a1')" id="defaultopen">T 3.a.1 Dosen Tetap Pengampuan Program Studi</button>
        <button class="tablinks" onclick="openCity(event, 'T3a2')">T 3.a.2 Dosen Pembimbing Utama Tugas Akhir</button>
        <button class="tablinks" onclick="openCity(event, 'T3a3')">T 3.a.3 EWMP Dosen Tetap Perguruan Tinggi</button>
        <button class="tablinks" onclick="openCity(event, 'T3a4')">T 3.a.4 Dosen Tidak Tetap UPPS</button>
    </div>

    <div id="T3a1" class="tabcontent">
        <div class="container-fluid mb-5" style="overflow-x: auto;">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.1</h2>
                <h4 class="text-center">Dosen Tetap Perguruan Tinggi yang ditugaskan sebagai pengampu mata kuliah di Program Studi yang diakreditasi</h4>
            </div>
            <table class="table table-striped table-bordered text-center table-font">
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
                        <th class="align-middle" colspan="2" rowspan="2">Aksi</th>
                    </tr>
                    <tr class="text-center">
                        <th class="align-middle" colSpan="">Magister/ Magister Terapan/Spesialis</th>
                        <th class="align-middle" colSpan="" rowspan="">Doktor/ Doktor Terapan/Spesialis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3a1 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?> </td>
                            <td><?php echo $item['NamaDosen'] ?> </td>
                            <td><?php echo $item['NIDN'] ?></td>
                            <td><?php echo $item['Pendidikan'] ?></td>
                            <td><?php $item['Pendidikan_doctor'] == NULL ? print_r("-") : print_r($item['Pendidikan_doctor']) ?></td>
                            <td><?php echo $item['BidangKeahlian'] ?></td>
                            <td class="font-weight-bold"><?php $item['KesesuaianKompetensi'] == NULL ? print_r("-") : print_r('&#10003') ?></td>
                            <td><?php echo $item['JabatanAkademik'] ?></td>
                            <td><?php echo $item['SertifikatPendidik'] ?></td>
                            <td><?php $item['SertifikatKompetensi'] == NULL ? print_r("-") : print_r($item['SertifikatKompetensi']) ?></td>
                            <td><?php echo $item['MataKuliahPSYangDiampu'] ?></td>
                            <td class="font-weight-bold"><?php $item['KesesuaianBidangKeahlian'] == NULL ? print_r("-") : print_r('&#10003') ?></td>
                            <td><?php echo $item['MataKuliahLuarPSYangDiampu'] ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo $item['NIDN'] ?>`, `<?php echo $item['NamaDosen'] ?>`, `<?php echo '311' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['NamaDosen'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['NIDN'] ?>">
                                    <input type="hidden" name="idKriteria" value="311">
                                    <button class="btn btn-primary <?php echo $this->session->user_role == 1 ? '"' : 'not-allowed disabled" disabled' ?> type="submit">
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

    <div id="T3a2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.2</h2>
                <h4 class="text-center">Dosen Pembimbing Utama Tugas Akhir</h4>
            </div>
            <table class="table table-striped table-bordered text-center">

                <thead>
                    <tr class="text-center">
                        <th className="align-middle" rowSpan="3">No.</th>
                        <th className="align-middle" rowSpan="3">Nama Dosen</th>
                        <th className="align-middle" colSpan="8">Jumlah Mahasiswa yang Dibimbing</th>
                        <th className="temp align-middle" rowSpan="3">Rata-rata Jumlah Bimbingan di semua Program/ Semester</th>
                        <th className="align-middle" colspan="2" rowspan="3">Aksi</th>
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
                    <?php
                    foreach ($table3a2 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $item['Nomor'] ?> </td>
                            <td><?php echo $item['NamaDosen'] ?></td>
                            <td><?php echo $item['TS-2'] ?></td>
                            <td><?php echo $item['TS-1'] ?></td>
                            <td><?php echo $item['TS'] ?></td>
                            <td><?php echo $item['Rata2'] ?></td>
                            <td><?php echo $item['TS-2b'] ?></td>
                            <td><?php echo $item['TS-1b'] ?></td>
                            <td><?php echo $item['TSb'] ?></td>
                            <td><?php echo $item['Rata2b'] ?></td>
                            <td><?php echo $item['Rata2_semua'] ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo ($item['Nomor']) ?>`, `<?php echo $item['NamaDosen'] ?>`, `<?php echo '312' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti3') ?>" method="POST">
                                    <input type="hidden" name="TS" value="2">
                                    <input type="hidden" name="stat[]" value="PS">
                                    <input type="hidden" name="stat[]" value="PSL">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['NamaDosen'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['Nomor'] ?>">
                                    <input type="hidden" name="idKriteria" value='312'>
                                    <button class="btn btn-primary <?php echo $this->session->user_role == 1 ? '"' : 'not-allowed disabled" disabled' ?> type="submit">
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

    <div id="T3a3" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.3</h2>
                <h4 class="text-center">EWMP Dosen Tetap Perguruan Tinggi</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th className="align-middle">No.</th>
                        <th className="align-middle">NIK</th>
                        <th className="align-middle">Nama</th>
                        <th className="align-middle">Dosen Tetap Program Studi</th>
                        <th className="align-middle">Pembelajaran Program Studi</th>
                        <th className="align-middle">Pembelajaran Program Studi Lain</th>
                        <th className="align-middle">Pembelajaran Program Studi Luar</th>
                        <th className="align-middle">Penelitian </th>
                        <th className="align-middle">Pengabdian kepada Masyarakat</th>
                        <th className="align-middle">Tambahan</th>
                        <th className="align-middle">Jumlah</th>
                        <th className="align-middle">Rata2</th>
                        <th className="align-middle" colspan="2" rowspan="3">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($table3a3 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i ?></td>
                            <td><?php echo $item['NIK'] ?> </td>
                            <td><?php echo $item['Nama'] ?></td>
                            <td><?php echo ($item['isDTPS'] ? "&#10003;" : "-") ?></td>
                            <td><?php echo $item['PembelajaranPS'] ?></td>
                            <td><?php echo $item['PembelajaranPSLain'] ?></td>
                            <td><?php echo $item['PembelajaranPSLuar'] ?></td>
                            <td><?php echo $item['Penelitian'] ?></td>
                            <td><?php echo $item['Pkm'] ?></td>
                            <td><?php echo $item['Tambahan'] ?></td>
                            <td><?php echo $item['Jumlah'] ?></td>
                            <td><?php echo $item['Rata2'] ?></td>
                            <td>
                                <!-- getData(id, judul, subsection) -->
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo $item['NIK'] ?>`, `<?php echo $item['Nama'] ?>`, `<?php echo '313' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['Nama'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['NIK'] ?>">
                                    <input type="hidden" name="idKriteria" value="313">
                                    <button class="btn btn-primary <?php echo $this->session->user_role == 1 ? '"' : 'not-allowed disabled" disabled' ?> type="submit">
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
    <div id="T3a4" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 3.a.4</h2>
                <h4 class="text-center">Dosen Tidak Tetap UPPS</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <th>Nomor</th>
                    <th>Nama Dosen</th>
                    <th>NIDN</th>
                    <th>Pendidikan</th>
                    <th>Bidang Keahlian</th>
                    <th>Jabatan Akademik</th>
                    <th>Sertifikat Pendidik</th>
                    <th>Sertifikat Kompetensi</th>
                    <th>Mata Kuliah PS yang Diampu</th>
                    <th>Kesesuaian Bid. Keahlian</th>
                    <th colspan="2" rowspan="3">Aksi</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($table3a4 as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $item['Nomor'] ?> </td>
                            <td><?php echo $item['NamaDosen'] ?></td>
                            <td><?php echo $item['NIDN'] ?></td>
                            <td><?php echo $item['Pendidikan'] ?></td>
                            <td><?php echo $item['BidangKeahlian'] ?></td>
                            <td><?php echo $item['JabatanAkademik'] ?></td>
                            <td><?php echo $item['SertifikatPendidik'] ?></td>
                            <td><?php echo $item['SertifikatKompetensi'] ?></td>
                            <td><?php echo $item['MataKuliahPSYangDiampu'] ?></td>
                            <td><?php echo ($item['KesesuaianBidangKeahlian'] ? "&#10003" : "-") ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo ($item['Nomor']) ?>`, `<?php echo $item['NamaDosen'] ?>`, `<?php echo '314' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['NamaDosen'] ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['Nomor'] ?>">
                                    <input type="hidden" name="idKriteria" value="314">
                                    <button class="btn btn-primary <?php echo $this->session->user_role == 1 ? '"' : 'not-allowed disabled" disabled' ?> type="submit">
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

    <!-- MODAL -->
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
                url: "<?php echo base_url('index.php/C_Tabel3Profil/getBukti/') ?>" + subsection + '/' + id,
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.result.length; i++) {
                        baris += '<tr>' +
                            '<td>' + data.result[i].deskripsi + '</td>' +
                            '<td>' + data.result[i].namaB + '</td>' +
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