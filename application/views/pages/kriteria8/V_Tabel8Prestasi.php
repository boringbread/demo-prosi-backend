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
            margin-left: 23%;
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
        <button class="tablinks" onclick="openCity(event, 'T8b1')" id="defaultopen">T 8.b.1 Prestasi Akademik</button>
        <button class="tablinks" onclick="openCity(event, 'T8b2')">T 8.b.2 Prestasi Non Akademik Mahasiswa</button>
    </div>

    <div id="T8b1" class="tabcontent">
        <div class="container-fluid mb-5" style="overflow-x: auto;">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.b.1</h2>
                <h4 class="text-center">Prestasi Akademik</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Nama Kegiatan</th>
                        <th class="align-middle" rowSpan="2">Tahun Perolehan</th>
                        <th class="align-middle" colSpan="3">Tingkat</th>
                        <th class="align-middle" rowSpan="2">Prestasi yang Dicapai</th>
                        <th class="align-middle" colspan="2" rowSpan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Lokal/Wilayah</th>
                        <th class="align-middle">Nasional</th>
                        <th class="align-middle">Internasional</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($akademik as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i++ ?> </td>
                            <td><?php echo $item['Kegiatan'] ?> </td>
                            <td><?php echo $item['Tahun'] ?> </td>
                            <td><?php if ($item['Tingkat'] == "Lokal") {
                                    echo "V";
                                } ?> </td>
                            <td><?php if ($item['Tingkat'] == "Nasional") {
                                    echo "V";
                                } ?> </td>
                            <td><?php if ($item['Tingkat'] == "Internasional") {
                                    echo "V";
                                } ?> </td>
                            <td><?php echo $item["Prestasi"] ?> </td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['id']) ?>`, `<?php echo $item['Kegiatan']  ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['Kegiatan']  ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['id']  ?>">
                                    <input type="hidden" name="idKriteria" value="82">
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

    <div id="T8b2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.b.2</h2>
                <h4 class="text-center">Prestasi Non Akademik Mahasiswa</h4>
            </div>
            <table class="table table-striped table-bordered text-center">

                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">No.</th>
                        <th class="align-middle" rowSpan="2">Nama Kegiatan</th>
                        <th class="align-middle" rowSpan="2">Tahun Perolehan</th>
                        <th class="align-middle" colSpan="3">Tingkat</th>
                        <th class="align-middle" rowSpan="2">Prestasi yang Dicapai</th>
                        <th class="align-middle" colspan="2" rowSpan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Lokal/Wilayah</th>
                        <th class="align-middle">Nasional</th>
                        <th class="align-middle">Internasional</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($nonakademik as $item) {
                    ?>
                        <tr class="text-center">
                            <td><?php echo $i++ ?> </td>
                            <td><?php echo $item['Kegiatan'] ?> </td>
                            <td><?php echo $item['Tahun'] ?> </td>
                            <td><?php if ($item['Tingkat'] == "Lokal") {
                                    echo "V";
                                } ?> </td>
                            <td><?php if ($item['Tingkat'] == "Nasional") {
                                    echo "V";
                                } ?> </td>
                            <td><?php if ($item['Tingkat'] == "Internasional") {
                                    echo "V";
                                } ?> </td>
                            <td><?php echo $item["Prestasi"] ?> </td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['id']) ?>`, `<?php echo $item['Kegiatan']  ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo $item['Kegiatan']  ?>">
                                    <input type="hidden" name="id" value="<?php echo $item['id']  ?>">
                                    <input type="hidden" name="idKriteria" value="82">
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
                url: "<?php echo base_url('index.php/C_Tabel8Prestasi/getBukti/') ?>" + id,
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