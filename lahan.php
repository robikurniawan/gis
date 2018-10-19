<body  onload="peta_awal()">
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- <div class="box-header with-border"> -->
                    <!-- <div class="row">    -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Data Lahan</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Peta Lahan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lahan </th>
                                                <th>Kecamatan</th>
                                                <th>Keterangan</th>
                                                <th>Koordinat</th>
                                            </tr>
                                            <?php 
                                            $no = 1;
                                            $id = $_SESSION['id_user'];
                                            $q = mysqli_query($link,"SELECT a.* , b.*  FROM lokasi_lahan a INNER JOIN kecamatan b ON a.kecamatan = b.id  WHERE a.id_user = '$id'  ");
                                            while($data = mysqli_fetch_array($q)){
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $data['nama_lokasi']?></td>
                                                <td><?= $data['nama_kecamatan']?></td>
                                                <td><?= $data['keterangan']?></td>
                                                <td><?= $data['polygon']?></td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <div id="map-canvas" style="width:100%; height:500px;"></div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
</body>


 