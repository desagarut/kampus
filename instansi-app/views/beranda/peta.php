<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
    var map
    var kantorDesa

    function initMap() {
        <?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
            var center = {
                lat: <?= $desa['lat'] ?>,
                lng: <?= $desa['lng'] ?>
            }
        <?php else : ?>
            var center = {
                lat: -7.34298008144879,
                lng: 107.217667252986,
            }
        <?php endif; ?>

        var zoom = 13
        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
        map = new google.maps.Map(document.getElementById("peta-desa"), {
            center,
            zoom: 11,
            mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
        });

        kantorDesa = new google.maps.Marker({
            position: center,
            map: map,
            title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>',
            animation: google.maps.Animation.BOUNCE
        });

        <?php if (!empty($desa['path'])) : ?>
            let polygon_desa = <?= $desa['path']; ?>;

            polygon_desa[0].map((arr, i) => {
                polygon_desa[i] = {
                    lat: arr[0],
                    lng: arr[1]
                }
            })

            //Style polygon
            var batasWilayah = new google.maps.Polygon({
                paths: polygon_desa,
                strokeColor: '<?= $desa['warna_garis'] ?>',
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: '<?= $desa['warna'] ?>',
                fillOpacity: 0.25
            });

            batasWilayah.setMap(map)
        <?php endif; ?>
    }
</script>

<!-- widget Peta Wilayah Desa -->
<!--
<div class="col-md-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Peta Wilayah Kerja</h3>
            <div class="card-tools"> <span class="badge badge-danger">Peta</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <div id="peta-desa" class="set-map" style="height: 280px"></div>
        </div>
    </div>
</div>-->
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Peta</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="d-md-flex">
                <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <div id="peta-desa" style="height: 325px; overflow: hidden">
                        <div class="map"></div>
                    </div>
                </div>
                <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                    <div class="description-block mb-4">
                        <!--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>-->
                        <h5 class="description-header"><?php foreach ($pegawai as $data) : ?><?= $data['jumlah'] ?><?php endforeach; ?></h5>
                        <span class="description-text">Pegawai</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block mb-4">
                        <!--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>-->
                        <h5 class="description-header"><?php foreach ($penduduk as $data) : ?><?= $data['jumlah'] ?><?php endforeach; ?></h5>
                        <span class="description-text">Biodata</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block mb-4">
                        <!--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>-->
                        <h5 class="description-header"><?php foreach ($penduduk as $data) : ?><?= $data['jumlah'] ?><?php endforeach; ?></h5>
                        <span class="description-text">Mahasiswa</span>
                    </div>
                    <div class="description-block mb-4">
                        <!--<div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>-->
                        <h5 class="description-header"><?php foreach ($penduduk as $data) : ?><?= $data['jumlah'] ?><?php endforeach; ?></h5>
                        <span class="description-text">Lulusan</span>
                    </div>

                    <!-- /.description-block -->
                </div><!-- /.card-pane-right -->
            </div><!-- /.d-md-flex -->
        </div>
    </div>
</div>