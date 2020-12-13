<script>
    // getData();

    function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel1/getBukti/') ?>" + judul,
            dataType: 'json',
            success: function(data) {
                var baris = '';
                for (var i = 0; i < data.result.length; i++) {
                    baris += '<tr>' +
                        '<td>' + data.result[i].deskripsi + '</td>' +
                        '<td>' + data.result[i].kategori + '</td>' +
                        '<td><a href="' + data.result[i].pathFile + '" target=`_blank`>' + data.result[i].deskripsi + '</a></td>' +
                        '</tr>'
                }
                $('#bukti-isi').html(baris);
            }
        });
    }
</script>
<div class="container-fluid mb-5">
    <div class="mt-3 mb-5">
        <h2 class="text-center">Tabel 1</h2>
        <h4 class="text-center">Kerjasama Tridharma</h4>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="text-center">
                <th class="align-middle" rowSpan="2">No.</th>
                <th class="align-middle" rowSpan="2">Lembaga Mitra</th>
                <th class="align-middle" colSpan="3">Tingkat</th>
                <th class="align-middle" rowSpan="2">Judul Kegiatan Kerjasama</th>
                <th class="align-middle" rowSpan="2">Manfaat bagi PS yang Diakreditasi</th>
                <th class="align-middle" rowSpan="2">Waktu dan Durasi</th>
                <th class="align-middle" rowSpan="2">Bukti Kerjasama</th>
                <th class="align-middle" colspan="2" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>Internasional</th>
                <th>Nasional</th>
                <th>Lokal/Wilayah</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th colSpan="11">Pendidikan</th>
            </tr>
            <?php
            $i = 1;
            $nas = 0;
            $inter = 0;
            $lokal = 0;
            foreach ($pendidikan as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo $i++ ?> </td>
                    <td><?php echo $item['LembagaMitra'] ?></td>
                    <td><?php if ($item['Tingkat'] == "Internasional") {
                            $inter++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Nasional") {
                            $nas++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Lokal") {
                            $lokal++;
                            echo "V";
                        } ?></td>
                    <td><?php echo $item['JudulKegiatanKerjaSama'] ?></td>
                    <td><?php echo $item['Manfaat'] ?></td>
                    <td><?php echo  date("Y", strtotime($item['WaktuMulai'])) . "-" . date("Y", strtotime($item['WaktuBerakhir'])); ?></td>
                    <td><?php echo  $item['BuktiKerjaSama'] ?></td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo $item['JudulKegiatanKerjaSama'] ?>`, `<?php echo $item['JudulKegiatanKerjaSama'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                            <input type="hidden" name="keterangan" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="idKriteria" value="1">
                            <button class="btn btn-primary" type="submit">
                                Unggah Bukti
                            </button>
                        </form>
                    </td>
                </tr>

            <?php

            }
            ?><tr>
                <th colspan="2">Jumlah</th>
                <th><?= $inter ?></th>
                <th><?= $nas ?></th>
                <th><?= $lokal ?></th>
            </tr>
            <tr>
                <th colSpan="11">Penelitian</th>
            </tr>
            <?php
            $nas = 0;
            $inter = 0;
            $lokal = 0;
            $i = 1;
            foreach ($penelitian as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo $i++ ?> </td>
                    <td><?php echo $item['LembagaMitra'] ?></td>
                    <td><?php if ($item['Tingkat'] == "Internasional") {
                            $inter++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Nasional") {
                            $nas++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Lokal") {
                            $lokal++;
                            echo "V";
                        } ?></td>
                    <td><?php echo $item['JudulKegiatanKerjaSama'] ?></td>
                    <td><?php echo $item['Manfaat'] ?></td>
                    <td><?php echo  date("Y", strtotime($item['WaktuMulai'])) . "-" . date("Y", strtotime($item['WaktuBerakhir'])); ?></td>
                    <td><?php echo $item['BuktiKerjaSama'] ?></td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo $item['JudulKegiatanKerjaSama'] ?>`, `<?php echo $item['JudulKegiatanKerjaSama'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                            <input type="hidden" name="keterangan" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="idKriteria" value="1">
                            <button class="btn btn-primary" type="submit">
                                Unggah Bukti
                            </button>
                        </form>
                    </td>
                </tr>

            <?php

            }
            ?><tr>
                <th colspan="2">Jumlah</th>
                <th><?= $inter ?></th>
                <th><?= $nas ?></th>
                <th><?= $lokal ?></th>
            </tr>
            <tr>
                <th colSpan="11">Pengabdian Masyarakat</th>
            </tr>
            <?php
            $nas = 0;
            $inter = 0;
            $lokal = 0;
            $i = 1;
            foreach ($pkm as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo $i++ ?> </td>
                    <td><?php echo $item['LembagaMitra'] ?></td>
                    <td><?php if ($item['Tingkat'] == "Internasional") {
                            $inter++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Nasional") {
                            $nas++;
                            echo "V";
                        } ?></td>
                    <td><?php if ($item['Tingkat'] == "Lokal") {
                            $lokal++;
                            echo "V";
                        } ?></td>
                    <td><?php echo $item['JudulKegiatanKerjaSama'] ?></td>
                    <td><?php echo $item['Manfaat'] ?></td>
                    <td><?php echo  date("Y", strtotime($item['WaktuMulai'])) . "-" . date("Y", strtotime($item['WaktuBerakhir'])); ?></td>
                    <td><?php echo $item['BuktiKerjaSama'] ?></td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo $item['JudulKegiatanKerjaSama'] ?>`, `<?php echo $item['JudulKegiatanKerjaSama'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                            <input type="hidden" name="keterangan" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['JudulKegiatanKerjaSama'] ?>">
                            <input type="hidden" name="idKriteria" value="1">
                            <button class="btn btn-primary" type="submit">
                                Unggah Bukti
                            </button>
                        </form>
                    </td>
                </tr>

            <?php

            }
            ?><tr>
                <th colspan="2">Jumlah</th>
                <th><?= $inter ?></th>
                <th><?= $nas ?></th>
                <th><?= $lokal ?></th>
            </tr>
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