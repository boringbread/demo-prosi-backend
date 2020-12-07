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
        <button class="tablinks" onclick="openCity(event, 'T8e1')" id="defaultopen">T 8.e.1 Tempat Kerja Lulusan</button>
        <button class="tablinks" onclick="openCity(event, 'T8e2')">T 8.e.2 Kepuasan Pengguna</button>
    </div>

    <div id="T8e1" class="tabcontent">
        <div class="container-fluid mb-5" style="overflow-x: auto;">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.e.1</h2>
                <h4 class="text-center">Tempat Kerja Lulusan</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
            <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                    <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                    <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak yang Bekerja berdasarkan Tingkat/Ukuran Tempat Kerja/Berwirausaha</th>
                    <th class="align-middle" rowspan="2" colSpan="2">Bukti</th>
  
                </tr>
                  <tr>
                    <th class="align-middle">Lokal/ Wilayah/ Berwirausaha tidak Berizin</th>
                    <th class="align-middle">Nasional/ Berwirausaha Berizin</th>
                    <th class="align-middle">Multinasiona/ Internasional</th>
                  </tr>
                </thead>
                <tbody>
                    <?php {
                    ?>
                        <tr class="text-center">
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo '' ?>`, `<?php echo '' ?>`, `<?php echo '312' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo '' ?>">
                                    <input type="hidden" name="id" value="<?php echo '' ?>">
                                    <input type="hidden" name="idKriteria" value='312'>
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

    <div id="T8e2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.e.2</h2>
                <h4 class="text-center">Kepuasan Pengguna</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
            <thead>
                  <tr>
                    <th class="align-middle" rowSpan="2">No.</th>
                    <th class="align-middle" rowSpan="2">Jenis Kemampuan</th>
                    <th class="align-middle" colSpan="4">Tingkat Kepuasan Pengguna (%)</th>
                    <th class="align-middle" rowSpan="2">Rencana Tindak Lanjut oleh UPPS/PS</th>
                    <th class="align-middle" rowSpan="2" colspan="2">Bukti</th>
                  </tr>
                  <tr>
                    <th class="align-middle">Sangat Baik</th>
                    <th class="align-middle">Baik</th>
                    <th class="align-middle">Cukup</th>
                    <th class="align-middle">Kurang</th>
                  </tr>
                </thead>
                <tbody>
                    <?php {
                    ?>
                        <tr class="text-center">
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td><?php echo 1 ?> </td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo '' ?>`, `<?php echo '' ?>`, `<?php echo '312' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo '' ?>">
                                    <input type="hidden" name="id" value="<?php echo '' ?>">
                                    <input type="hidden" name="idKriteria" value='312'>
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