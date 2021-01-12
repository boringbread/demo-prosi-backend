<script>
    // getData();

    function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel8Efektivitas/getBukti/') ?>" + id,
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
        <h2 class="text-center">Tabel 8.c</h2>
        <h4 class="text-center">Efektifitas dan Produktifitas Pendidikan</h4>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th class="align-middle" rowSpan="2">Tahun Masuk</th>
                <th class="align-middle" rowSpan="2">Jumlah Mahasiswa Diterima</th>
                <th class="align-middle" colSpan="7">Jumlah Mahasiswa yang Lulus pada</th>
                <th class="align-middle" rowSpan="2">Jumlah Lulusan s.d. Akhir TS</th>
                <th class="align-middle" rowSpan="2">Rata-rata Masa Studi</th>
                <th class="align-middle" colspan="2" rowSpan="2">Bukti</th>
            </tr>
            <tr>
                <th class="align-middle">Akhir TS-6</th>
                <th class="align-middle">Akhir TS-5</th>
                <th class="align-middle">Akhir TS-4</th>
                <th class="align-middle">Akhir TS-3</th>
                <th class="align-middle">Akhir TS-2</th>
                <th class="align-middle">Akhir TS-1</th>
                <th class="align-middle">Akhir TS</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            foreach ($table as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo $item['tahunMasuk'] ?> </td>
                    <td><?php echo $item['jumlahDiterima'] ?> </td>
                    <td><?php echo $item['ts6'] ?> </td>
                    <td><?php echo $item['ts5'] ?> </td>
                    <td><?php echo $item['ts4'] ?> </td>
                    <td><?php echo $item['ts3'] ?> </td>
                    <td><?php echo $item['ts2'] ?> </td>
                    <td><?php echo $item['ts1'] ?> </td>
                    <td><?php echo $item['ts'] ?> </td>
                    <td><?php echo $item['jumlahLulus'] ?> </td>
                    <td><?php echo $item['rata-rata'] ?> </td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo ($item['tahunMasuk']) ?>`, `<?php echo $item['tahunMasuk'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti2') ?>" method="POST">
                            <input type="hidden" name="TS" value="6">
                            <input type="hidden" name="keterangan" value="<?php echo $item['tahunMasuk'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['tahunMasuk'] ?>">
                            <input type="hidden" name="idKriteria" value="83">
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