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
        <button class="tablinks" onclick="openCity(event, 'T8d1')" id="defaultopen">T 8.d.1 Waktu Tunggu Lulusan</button>
        <button class="tablinks" onclick="openCity(event, 'T8d2')">T 8.d.2 Kesesuaian Bidang Kerja Lulusan </button>
    </div>

    <div id="T8d1" class="tabcontent">
        <div class="container-fluid mb-5" style="overflow-x: auto;">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.d.1</h2>
                <h4 class="text-center">Waktu Tunggu Lulusan</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                        <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                        <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                        <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak dengan Waktu Tunggu Mendapatkan Pekerjaan</th>
                        <th class="align-middle" rowspan="2" colSpan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">WT &lt; 6 bulan</th>
                        <th class="align-middle">6 ≤ WT ≤ 18 bulan</th>
                        <th class="align-middle">WT > 18 bulan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ts4 = array();
                    $totalts4 = 0;
                    $ts3 = array();
                    $totalts3 = 0;
                    $ts2 = array();
                    $totalts2 = 0;
                    foreach($table8d1 as $item){
                        if($item['ts'] == -4){
                            if($ts4 == NULL) {
                                array_push($ts4, $item['ts'], $item['jumlah'], $item['lacak'], $item['waktu_berkerja']);
                                $totalts4 += intval($item['lacak']);
                            } else {
                                array_push($ts4, $item['lacak'], $item['waktu_berkerja']);
                                $totalts4 += intval($item['lacak']);
                            }
                        } else if ($item['ts'] == -3){
                            if($ts3 == NULL) {
                                array_push($ts3, $item['ts'], $item['jumlah'], $item['lacak'], $item['waktu_berkerja']);
                                $totalts3 += intval($item['lacak']);
                            } else {
                                array_push($ts3, $item['lacak'], $item['waktu_berkerja']);
                                $totalts3 += intval($item['lacak']);
                            }
                        } else if ($item['ts'] == -2){
                            if($ts2 == NULL) {
                                array_push($ts2, $item['ts'], $item['jumlah'], $item['lacak'], $item['waktu_berkerja']);
                                $totalts2 += intval($item['lacak']);
                            } else {
                                array_push($ts2, $item['lacak'], $item['waktu_berkerja']);
                                $totalts2 += intval($item['lacak']);
                            }
                        }
                    }

                    $array_tot = array();
                    array_push($array_tot, $ts4, $ts3, $ts2);

                    for ($i=4; $i > 1 ; $i--) { 
                        echo "<tr>";
                        echo "<td>" . ${'ts'.$i}[0] . "</td>";
                        echo "<td>" . ${'ts'.$i}[1] . "</td>";
                        echo "<td>" . ${'totalts'.$i} . "</td>";
                        
                        if(in_array("Kurang dari 6 bulan", ${'ts' . $i})){
                            $value = array_search('Kurang dari 6 bulan', ${'ts' . $i});
                            echo "<td>" . ${'ts' . $i}[($value-1)] . "</td>";
                        } else {
                            echo "<td></td>";
                        }
                        
                        if (in_array("6 sampai dengan 18 bulan", ${'ts' . $i})) {
                            $value = array_search('6 sampai dengan 18 bulan', ${'ts' . $i});
                            echo "<td>" . ${'ts' . $i}[($value-1)] . "</td>";
                        } else {
                            echo "<td></td>";
                        }
                        
                        if (in_array("Lebih dari 18 bulan", ${'ts' . $i})){
                            $value = array_search('Lebih dari 18 bulan', ${'ts' . $i});
                            echo "<td>" . ${'ts' . $i}[($value-1)] . "</td>";
                        } else {
                            echo "<td></td>";
                        }

                        echo "<td>" ?>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo ${'ts'.$i}[0] ?>`, `<?php echo ${'ts'.$i}[0] ?>`, `<?php echo '841' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo "TS" . ${'ts'.$i}[0] ?>">
                                    <input type="hidden" name="id" value="<?php echo ${'ts'.$i}[0] ?>">
                                    <input type="hidden" name="idKriteria" value='841'>
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

    <div id="T8d2" class="tabcontent">
        <div class="container-fluid mb-5">
            <div class="mt-3 mb-5">
                <h2 class="text-center">Tabel 8.d.2</h2>
                <h4 class="text-center">Kesesuaian Bidang Kerja Lulusan</h4>
            </div>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="align-middle" rowSpan="2">Tahun Lulus</th>
                        <th class="align-middle" rowSpan="2">Jumlah Lulusan</th>
                        <th class="align-middle" rowSpan="2">Jumlah Lulusan yang Terlacak</th>
                        <th class="align-middle" colSpan="3">Jumlah Lulusan Terlacak dengan Waktu Tunggu Mendapatkan Pekerjaan</th>
                        <th class="align-middle" rowspan="2" colSpan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Rendah</th>
                        <th class="align-middle">Sedang</th>
                        <th class="align-middle">Tinggi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $ts4b = array();
                    $totalts4b = 0;
                    $ts3b = array();
                    $totalts3b = 0;
                    $ts2b = array();
                    $totalts2b = 0;

                    foreach($table8d2 as $item){
                        if($item['ts'] == -4){
                            if($ts4b == NULL) {
                                array_push($ts4b, $item['ts'], $item['jumlah'], $item['lacak'], $item['sesuai']);
                                $totalts4b += intval($item['lacak']);
                            } else {
                                array_push($ts4b, $item['lacak'], $item['sesuai']);
                                $totalts4b += intval($item['lacak']);
                            }
                        } else if ($item['ts'] == -3){
                            if($ts3b == NULL) {
                                array_push($ts3b, $item['ts'], $item['jumlah'], $item['lacak'], $item['sesuai']);
                                $totalts3b += intval($item['lacak']);
                            } else {
                                array_push($ts3b, $item['lacak'], $item['sesuai']);
                                $totalts3b += intval($item['lacak']);
                            }
                        } else if ($item['ts'] == -2){
                            if($ts2b == NULL) {
                                array_push($ts2b, $item['ts'], $item['jumlah'], $item['lacak'], $item['sesuai']);
                                $totalts2b += intval($item['lacak']);
                            } else {
                                array_push($ts2b, $item['lacak'], $item['sesuai']);
                                $totalts2b += intval($item['lacak']);
                            }
                        }
                    }

                    $array_totb = array($ts4b, $ts3b, $ts2b);

                    for ($i=4; $i > 1 ; $i--) { 
                        echo "<tr>";
                        echo "<td>" . ${'ts'.$i . 'b'}[0] . "</td>";
                        echo "<td>" . ${'ts'.$i . 'b'}[1] . "</td>";
                        echo "<td>" . ${'totalts'.$i . 'b'} . "</td>";
                        
                        if(in_array("Ya", ${'ts' . $i . 'b'})){
                            $value = array_search('Ya', ${'ts' . $i . 'b'});
                            echo "<td>" . ${'ts' . $i . 'b'}[($value-1)] . "</td>";
                        } else {
                            echo "<td></td>";
                        }

                        echo "<td></td>";

                        if(in_array("Tidak", ${'ts' . $i . 'b'})){
                            $value = array_search('Tidak', ${'ts' . $i . 'b'});
                            echo "<td>" . ${'ts' . $i . 'b'}[($value-1)] . "</td>";
                        } else {
                            echo "<td></td>";
                        }

                        echo "<td>" ?>
                                <button class="btn btn-success" data-toggle="modal" data-target="#lihatBukti" onClick="getData(`<?php echo ${'ts'.$i}[0] ?>`, `<?php echo ${'ts'.$i}[0] ?>`, `<?php echo '842' ?>`)">
                                    Lihat Bukti
                                </button>
                            </td>
                            <td>
                                <form action="<?php echo base_url('/index.php/unggahBukti') ?>" method="POST">
                                    <input type="hidden" name="keterangan" value="<?php echo "TS" . ${'ts'.$i}[0] ?>">
                                    <input type="hidden" name="id" value="<?php echo ${'ts'.$i}[0] ?>">
                                    <input type="hidden" name="idKriteria" value='842'>
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
                url: "<?php echo base_url('index.php/C_Tabel8dayasaing/getBukti/') ?>" + subsection + '/' + id,
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