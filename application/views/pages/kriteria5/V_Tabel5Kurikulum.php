<!DOCTYPE html>
<html>
<head>
    <script>
        // getData();

        function getData(id, judul) {
            var judul = judul.bold();
            $("#bukti-header").html(judul);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('index.php/C_Tabel5Kurikulum/getBukti/') ?>" + id,
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
    <style>
        .table-font {
            font-size: 12px !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid mb-5">
        <div class="mt-3 mb-5">
            <h2 class="text-center">Tabel 5.a</h2>
            <h4 class="text-center">Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran</h4>
        </div>
        <table class="table table-striped table-bordered text-center table-font">
            <thead>
                <tr>
                    <th className="align-middle" rowSpan="2">No.</th>
                    <th className="align-middle" rowSpan="2">Semester</th>
                    <th className="align-middle" rowSpan="2">Kode Mata Kuliah</th>
                    <th className="align-middle" rowSpan="2">Nama Mata Kuliah</th>
                    <th className="align-middle" rowSpan="2">Mata Kuliah Kompetensi</th>
                    <th className="align-middle" colSpan="3">Bobot Kredit (sks)</th>
                    <th className="align-middle" rowSpan="2">Konversi Kredit ke Jam</th>
                    <th className="align-middle" colSpan="4">Capaian Pembelajaran</th>
                    <th className="align-middle" rowSpan="2">Dokumen Rencana Pembelajaran</th>
                    <th className="align-middle" rowSpan="2">Unit Penyelengara</th>
                    <th className="align-middle" rowSpan="2" colspan="2">Aksi</th>
                </tr>
                <tr>
                    <th className="align-middle">Kuliah/Responsi/Tutorial</th>
                    <th className="align-middle">Seminar</th>
                    <th className="align-middle">Praktikum/Praktik/Praktik Lapangan</th>
                    <th className="align-middle">Sikap</th>
                    <th className="align-middle">Pengetahuan</th>
                    <th className="align-middle">Keterampilan Umum</th>
                    <th className="align-middle">Keterampilan Khusus</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $i = 1;
                foreach ($table4 as $item) {
                ?>
                    <tr class="text-center">
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $item['semester'] ?> </td>
                        <td><?php echo $item['kodeMatakuliah'] ?> </td>
                        <td><?php echo $item['namaMatakuliah'] ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo ceil(round(($item['bobotPemrograman'] * $item['sks'] * 45 * 3 + $item['sks'] * 45 * 3) / 6)) / 10  ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo '-' ?> </td>
                        <td><?php echo 'RPS-' . $item['kodeMatakuliah'] ?> </td>
                        <td><?php if (substr($item['kodeMatakuliah'], 0, 3) == 'AIF') {
                                echo 'UPPS';
                            } else {
                                echo 'PT';
                            }
                            ?> </td>

                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['idMatakuliah']) ?>`, `<?php echo $item['idMatakuliah'] ?>`)">
                                Lihat Bukti
                            </button>
                        </td>
                        <td>
                            <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                <input type="hidden" name="keterangan" value="<?php echo $item['kodeMatakuliah'] ?>">
                                <input type="hidden" name="id" value="<?php echo $item['idMatakuliah'] ?>">
                                <input type="hidden" name="idKriteria" value="51">
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
</body>
</html>

