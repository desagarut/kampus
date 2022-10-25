<!--<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap">
</script>-->

<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>
<?php if (!empty($lokasi_op['lat'] && !empty($lokasi_op['lng']))): ?>
	var center = { lat: <?= $lokasi_op['lat'].", lng: ".$lokasi_op['lng']; ?> };
<?php else: ?>
	var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
<?php endif; ?>

function initMap() {
	var myLatlng = new google.maps.LatLng(center.lat, center.lng);
	var mapOptions = { zoom: 19, center }
	var map = new google.maps.Map(document.getElementById("map_lokasi"), mapOptions);

	// Place a draggable marker on the map
	var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			draggable: true,
			title: "<?=$lokasi_op['nama']?>"
	});

	marker.addListener('dragend', (e) => {
		document.getElementById('lat').value = e.latLng.lat();
		document.getElementById('lng').value = e.latLng.lng();
	})
}
</script>
<style>
#map_lokasi {
	z-index: 1;
	width: 100%;
	height: 300px;
    border: 1px solid #f39c12;
	margin-top: auto;
}
</style>
<style>
.input-sm {
	padding: 4px 4px;
}
 @media (max-width:780px) {
.btn-group-vertical {
	display: block;
}
}
.table-responsive {
	min-height: 275px;
}
.padat {
	width: 1%;
}
th.horizontal {
	width: 20%;
}
</style>

<div class="pcoded-main-container">
	<div class="pcoded-content">
 
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row class-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <h5 class="m-b-10">Pengelolaan SPPT <?= ucwords($this->setting->sebutan_desa) ?> <?= $desa["nama_desa"]; ?></h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item active"><a href="#!">Pertanahan</a></li>
              <li class="breadcrumb-item"><a href="#!">Detai Data SPPT PBB</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

      <div class="card">
        <div class="card-header">
          <!-- Start Menu -->
          <?php $this->load->view('data_sppt/menu.php') ?>
          <!-- end Menu -->
        </div>
      </div>

        <div class="card">
          <div class="card-header"> 
            <!--<a href="<?=site_url("data_sppt/create_mutasi_sppt/".$sppt['id'])?>" class="btn btn-box btn-success btn-sm btn-sm "  title="Tambah Persil">
							<i class="fa fa-plus"></i>Tambah Mutasi SPPT
						</a>--> 
            <a href="<?=site_url('data_sppt')?>" class="btn btn-info mb-2 mr-2" title="Kembali Ke Daftar Daftar SPPT"> Kembali</a> 
            <a href="<?= site_url("data_sppt/form_data_sppt/".$sppt['id'])?>" class="btn btn-icon btn-success mb-2 mr-2" title="Cetak Data" target="_blank"><i class="feather icon-printer"></i></a> </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <form id="mainform" name="mainform" action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">
                          <h4 class="card-title text-center">Detail Data SPPT PBB</h4>

                            <div class="row">
                              <div class="col-sm-6">
                                <h5> Lokasi Objek Pajak</h5>
                                <div id="map_lokasi"></div>
                                <input type="hidden" name="lat" id="lat" value="<?= $lokasi_op['lat']?>"/>
                                <input type="hidden" name="lng" id="lng" value="<?= $lokasi_op['lng']?>" />
                              </div>
                              <div class="col-sm-6">
                                <!-- /.box -->
                                <table class="table table-hover" >
                                  <tbody>
                                    <tr>
                                      <th class="horizontal">Nama Tertagih
                                        </td>
                                      <td> : <strong>
                                        <?= $wajib_pajak["namatertagih"]?>
                                        </strong></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">NIK
                                        </td>
                                      <td> :
                                        <?= $wajib_pajak["nik"]?></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">Alamat Tagih
                                        </td>
                                      <td> :
                                        <?= $wajib_pajak["alamat"]?></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">Nomor Objek Pajak
                                        </td>
                                      <td> :
                                        <?= sprintf("%04s", $data_sppt['nomor'])?></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">Nama Wajib Pajak Tertulis di SPPT
                                        </td>
                                      <td> : <strong>
                                        <?= $data_sppt["nama_wp"]?>
                                        </strong></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">Tahun Awal Masuk SPPT PBB
                                        </td>
                                      <td> : <strong>
                                        <?= $data_sppt["tahun_awal"]?>
                                        </strong></td>
                                    </tr>
                                    <tr>
                                      <th class="horizontal">Letak Objek Pajak
                                        </td>
                                      <td> : <strong>
                                        <?= $data_sppt["letak_op"]?>
                                        </strong></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br />
                                <table class="table table-hover" >
                                  <tbody>
                                    <tr>
                                      <th class="horizontal">Objek Pajak
                                        </td>
                                      <td width="10%" align="center"> Luas m<sup>2</sup></td>
                                      <td width="10%" align="center"> Kelas </td>
                                      <td width="25%" align="center"> NJOP PER m<sup>2</sup></td>
                                      <td width="25%" align="center"> TOTAL NJOP (Rp.)</td>
                                    </tr>
                                    <tr>
                                      <td align="right">Bumi</td>
                                      <td align="right"><?= $data_sppt["luas_tanah"]?></td>
                                      <td align="center"><?= ($data_sppt["kelas_tanah"])?></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["pajak_tanah"])?></td>
                                      <td align="right" class="Rupiah"></td>
                                    </tr>
                                    <tr>
                                      <td align="right">Bangunan</td>
                                      <td align="right"><?= $data_sppt["luas_bangunan"]?></td>
                                      <td align="center"><?= ($data_sppt["kelas_bangunan"])?></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["pajak_bangunan"])?></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["total_pajak_bangunan"])?></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <br />
                                <table class="table table-hover" >
                                  <tbody>
                                    <tr>
                                      <td class="horizontal"><b>NJOP sebagai dasar pengenaan PBB</b></td>
                                      <td width="10%" align="center"></td>
                                      <td width="25%" align="center"></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["dp_pbb"])?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">NJOPTKP (NJOP Tidak Kena Pajak</td>
                                      <td align="center"></td>
                                      <td align="right" class="Rupiah"></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["njop_tkp"])?></td>
                                    </tr>
                                    <tr>
                                      <td align="left">NJOP untuk perhitungan PBB</td>
                                      <td align="center"></td>
                                      <td align="right" class="Rupiah"></td>
                                      <td align="right" class="Rupiah"><?= ($data_sppt["njop_ppbb"])?></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>PBB yang Terhutang</b></td>
                                      <td align="center"><b>0,11%</b></td>
                                      <td align="right" class="Rupiah"><b>
                                        <?= ($data_sppt["njop_ppbb"])?>
                                        </b></td>
                                      <td align="right" class="Rupiah"><b>
                                        <?= ($data_sppt["pbb_terhutang"])?>
                                        </b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
