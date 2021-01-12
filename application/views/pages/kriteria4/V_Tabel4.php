<script>
    function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel4/getBukti/') ?>" + id,
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
<div class="container-fluid mb-5">
    <div class="mt-3 mb-5">
        <h2 class="text-center">Tabel 4</h2>
        <h4 class="text-center">Keuangan & Sarana</h4>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th class="align-middle" rowSpan="2">No.</th>
                <th class="align-middle" rowSpan="2">Jenis Penggunaan</th>
                <th class="align-middle" colSpan="4">Unit Pengelola Program Studi (Rp.)</th>
                <th class="align-middle" colSpan="4">Program Studi (Rp.)</th>
                <th class="align-middle" colSpan="2" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th class="align-middle max-width">TS-2</th>
                <th class="align-middle max-width">TS-1</th>
                <th class="align-middle max-width">TS</th>
                <th class="align-middle max-width">Rata-rata</th>
                <th class="align-middle max-width">TS-2</th>
                <th class="align-middle max-width">TS-1</th>
                <th class="align-middle max-width">TS</th>
                <th class="align-middle max-width">Rata-rata</th>
        </thead>
        <tbody class="text-center">
            <?php
            foreach ($table4 as $item) {
            ?>
                <tr class="text-center">
                    <?php
                    if ($item['jenisPenggunaan'] === "Biaya Operasional Pendidikan") {
                        echo '<td>' . $item['Nomor'] . '</td>';
                        echo '<td colSpan="9">' . $item['jenisPenggunaan'] . '</td>';
                    }
                    else {
                        echo '<td>' . $item['Nomor'] . '</td>';
                        echo '<td>' . $item['jenisPenggunaan'] . '</td>';
                        echo '<td>' . $item['TS_2_UPPS'] . '</td>';
                        echo '<td>' . $item['TS_1_UPPS'] . '</td>';
                        echo '<td>' . $item['TS_UPPS'] . '</td>';
                        echo '<td>' . $item['Rata_rata_UPPS'] . '</td>';
                        echo '<td>' . $item['TS_2_PS'] . '</td>';
                        echo '<td>' . $item['TS_1_PS'] . '</td>';
                        echo '<td>' . $item['TS_PS'] . '</td>';
                        echo '<td>' . $item['Rata_rata_PS'] . '</td>';
                    }
                    ?>

                    <?php
                    $status = false;
                    if ($item['jenisPenggunaan'] === "Biaya Operasional Pendidikan") {
                        $status = true;
                    }
                    if ($item['jenisPenggunaan'] === "Jumlah") {
                        $status = true;
                    }
                    if ($item['jenisPenggunaan'] === "Total") {
                        $status = true;
                    }
                    if ($status == false) {
                        echo '<td>' .
                            '<button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`' . base64_encode($item['jenisPenggunaan']) . '`, `' . $item['jenisPenggunaan'] . '`)">
                                Lihat Bukti
                            </button>' .
                            '</td>';
                        echo '<td>' .
                            '<form action="' . base_url('/index.php/unggahBukti3') . '" method="POST">' .
                            '<input type="hidden" name="TS" value="2">' .
                            '<input type="hidden" name="stat[]" value="UPPS">' .
                            '<input type="hidden" name="stat[]" value="PS">' .
                            '<input type="hidden" name="keterangan" value="' . $item['jenisPenggunaan'] . '">' .
                            '<input type="hidden" name="id" value="' . $item['jenisPenggunaan'] . '">' .
                            '<input type="hidden" name="idKriteria" value="4">' .
                            '<button class="btn btn-primary'. (($this->session->user_role == 1) ? '' : ' not-allowed disabled" disabled' ) .' type="submit">' .
                            'Unggah Bukti </button>' .

                            '</form>' .
                            '</td>';
                    }
                    $status = false;
                    ?>


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