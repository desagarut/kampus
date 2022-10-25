
<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<!--<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap">
</script>-->


<script>
<?php if (!empty($lokasi_op['lat'] && !empty($lokasi_op['lng']))): ?>
	var center = { lat: <?= $lokasi_op['lat'].", lng: ".$lokasi_op['lng']; ?> };
<?php else: ?>
	var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
<?php endif; ?>

function initMap() {
	var myLatlng = new google.maps.LatLng(center.lat, center.lng);
	var mapOptions = { zoom: 17, center }
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
  #map_lokasi
  {
	z-index: 1;
    width: 100%;
    height: 450px;
    border: 1px solid #f39c12;
	margin-top:auto;
  }
</style>

<div class="pcoded-main-container">
	<div class="pcoded-content">


	<div class="page-header">
		<h5 class="m-b-10">Lokasi Objek Pajak</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('data_sppt')?>"> Pengaturan Lokasi</a></li>
						<li class="breadcrumb-item active">Lokasi OP <?= $lokasi_op['nama']?></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>

<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div id="map_lokasi"></div>
				<input type="hidden" name="lat" id="lat" value="<?= $lokasi_op['lat']?>"/>
                <input type="hidden" name="lng" id="lng" value="<?= $lokasi_op['lng']?>" />
			</div>
		</div>
	</div>
	<div class="modal-footer">
        <div class='col-xs-12'>
            <a href="<?= site_url('data_sppt')?>" class="btn btn-box bg-purple btn-sm " title="Kembali"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
            <a href="#" class="btn btn-box btn-success btn-sm " download="SIDeGa.gpx" id="exportGPX"><i class='fa fa-download'></i> Export ke GPX</a>
            <button type="reset" class="btn btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
            <button type="submit" class="btn btn-box btn-info btn-sm"><i class='fa fa-check'></i> Simpan</button>
		</div>
    </div>
</form>
</div>

