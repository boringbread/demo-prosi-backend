<script>
    // getData();

    function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel8Capaian/getBukti/') ?>" + id,
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
        <h2 class="text-center">Tabel 8.a</h2>
        <h4 class="text-center">IPK Lulusan</h4>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                <th class="align-middle" colSpan="3">Indeks Prestasi Kumulatif (IPK)</th>
                <th class="align-middle" colSpan="2" rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th class="align-middle">Min</th>
                <th class="align-middle">Rata-Rata</th>
                <th class="align-middle">Maks</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            foreach ($table4 as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo 1 ?> </td>
                    <td><?php echo 1 ?> </td>
                    <td><?php echo 1 ?> </td>
                    <td><?php echo 1 ?> </td>
                    <td><?php echo 1 ?> </td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['jenisPenggunaan']) ?>`, `<?php echo $item['jenisPenggunaan'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                            <input type="hidden" name="keterangan" value="<?php echo $item['jenisPenggunaan'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['jenisPenggunaan'] ?>">
                            <input type="hidden" name="idKriteria" value="4">
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