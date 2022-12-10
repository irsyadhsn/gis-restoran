<div id="map" style="width: 1255px; height: 600px;"></div>

<script>
    const map = L.map('map').setView([-6.2315655,106.8143889], 11);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 25,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

 var icon = L.icon({
        iconUrl: '<?= base_url('icon/restaurant.png') ?>',
        iconSize: [45, 50], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    <?php foreach ($restoran as $key => $value) { ?>
        L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {
            icon: icon
        }).addTo(map).
        bindPopup("<b style='font-size: x-small'><?= $value->nama_restoran ?></b><br>" +
            "<div style='font-size: xx-small'><b>Alamat : </b><?= $value->alamat ?></div> <br>" +
						"<img src='<?= base_url('gambar/' . $value->gambar) ?>' width='200px' >"
        );
    <?php } ?>;
</script>