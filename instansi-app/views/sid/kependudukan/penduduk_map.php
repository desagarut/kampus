<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>
<?php if (!empty($penduduk_map['lat'] && !empty($penduduk_map['lng']))): ?>
	var center = { lat: <?= $penduduk_map['lat'].", lng: ".$penduduk_map['lng']; ?> };
<?php else: ?>
	var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
<?php endif; ?>

function initMap() {
	var myLatlng = new google.maps.LatLng(center.lat, center.lng);
	var mapOptions = { zoom: 17, center, mapTypeId:google.maps.MapTypeId.HYBRID }
	var map = new google.maps.Map(document.getElementById("map_penduduk"), mapOptions);

	// Place a draggable marker on the map
	var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			draggable: false,
			title: "Lokasi Rumah <?=$penduduk_map['nama']?>"
	});

	marker.addListener('dragend', (e) => {
		document.getElementById('lat').value = e.latLng.lat();
		document.getElementById('lng').value = e.latLng.lng();
	})
}
</script>
<style>
  #map_penduduk
  {
	z-index: 1;
    width: 100%;
    height: 300px;
    border: 1px solid #F90;
	margin-top:auto;
  }
</style>

<div class='body'>
    <div id="map_penduduk"></div>
</div>