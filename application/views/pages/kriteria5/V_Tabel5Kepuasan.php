<script>
    // getData();

    function getData(id, judul) {
        var judul = judul.bold();
        $("#bukti-header").html(judul);
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('index.php/C_Tabel5Kepuasan/getBukti/') ?>" + id,
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
        <h2 class="text-center">Tabel 5.c</h2>
        <h4 class="text-center">Kepuasan Mahasiswa</h4>
    </div>
    <table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th class="align-middle" rowSpan="2">No.</th>
                <th class="align-middle" rowSpan="2">Aspek yang Diukur</th>
                <th class="align-middle" colSpan="4">Tingkat Kepuasan Mahasiswa (%)</th>
                <th class="align-middle" rowSpan="2">Rencana Tidak Lanjut oleh UPPS/PS</th>
                <th class="align-middle" colspan="2" rowSpan="2">Bukti</th>
            </tr>
            <tr>
                <th class="align-middle">Sangat Baik</th>
                <th class="align-middle">Baik</th>
                <th class="align-middle">Cukup</th>
                <th class="align-middle">Kurang</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $i = 1;
            foreach ($table4 as $item) {
            ?>
                <tr class="text-center">
                    <td><?php echo $i++ ?> </td>
                    <td><?php echo $item['aspek'] ?> </td>
                    <td><?php echo "%" . $item['sangatBaik'] ?> </td>
                    <td><?php echo "%" . $item['baik'] ?> </td>
                    <td><?php echo "%" . $item['cukup'] ?> </td>
                    <td><?php echo "%" . $item['kurang'] ?> </td>
                    <td><?php echo $item['rencana'] ?> </td>
                    <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo base64_encode($item['id']) ?>`, `<?php echo $item['aspek'] ?>`)">
                            Lihat Bukti
                        </button>
                    </td>
                    <td>
                        <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                            <input type="hidden" name="keterangan" value="<?php echo $item['aspek'] ?>">
                            <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                            <input type="hidden" name="idKriteria" value="53">
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