<div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Lokasi Sekolah</div>
            <div class="panel-body">
                <div id="map" style="height: 500px;"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Gambar Sekolah</div>
            <div class="panel-body">
                <img src="<?= base_url('gambar/' . $sekolah->gambar) ?>" width="100%" height="500px">
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Data Sekolah</div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="200px">Nama Sekolah</th>
                            <th width="50px">:</th>
                            <td><?= $sekolah->nama_sekolah ?></td>
                        </tr>
                        <tr>
                            <th>Status Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah->status_sekolah ?></td>
                        </tr>
                        <tr>
                            <th>Kepala Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah->kepala_sekolah ?></td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <th>:</th>
                            <td><?= $sekolah->latitude ?></td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <th>:</th>
                            <td><?= $sekolah->longitude ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <th>:</th>
                            <td><?= $sekolah->ket ?></td>
                        </tr>
                    </thead>
                </table>
                <a class="btn btn-warning" href="<?= base_url('webgis') ?>">Back</a>
            </div>
        </div>
    </div>
</div>
<div>&nbsp;</div>

<script>
    const map = L.map('map').setView([-6.170671514492242, 106.64022582642112], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var icon = L.icon({
        iconUrl: '<?= base_url('icon/sekolah1.png') ?>',
        iconSize: [45, 50], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([<?= $sekolah->latitude ?>, <?= $sekolah->longitude ?>], {
        icon: icon
    }).addTo(map).
    bindPopup(
        "<b style = 'font-size: x-small' > <?= $sekolah->nama_sekolah ?> </b><br>" +
        "<div style='font-size: xx-small'><b>Alamat : </b><?= $sekolah->alamat ?></div>" +
        "<div style='font-size: xx-small'><b>Keterangan : </b><?= $sekolah->ket ?></div>"
    );
</script>