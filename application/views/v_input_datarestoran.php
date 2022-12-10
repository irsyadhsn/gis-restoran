<div class="row">
        <div class="col-sm-7">
            <div class="card mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lokasi Restoran</h6>
                </div>
            <div class="card-body">
                <div id="mapid" style="height: 500px;"></div>
            </div>
        </div>
    </div>


        <div class="col-sm-5">
            <div class="card mb-1">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Restoran</h6>
            </div>
                <div class="card-body">
                    <?php
                    //notifikasi gagal input gambar
                    if (isset($error_upload)) {
                        echo '<div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' . $error_upload . '</div>';
                    }


                    //validasi tidak boleh kosong
                    echo validation_errors(
                        '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>',
                        '</div>'
                    );

                    //notifikasi pesan berhasil diinput
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    echo form_open_multipart('restoran/input'); ?>
                    <div class="form-group">
                        <label>Nama restoran</label>
                        <input class="form-control" placeholder="Nama restoran" name="nama_restoran" value="<?= set_value('nama_restoran') ?>" />
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" placeholder="Alamat" name="alamat" value="<?= set_value('alamat') ?>" />
                    </div>

                    <div class="form-group">
                        <label>Latitude</label>
                        <input id="Latitude" class="form-control" placeholder="Latitude"  name="latitude" value="<?= set_value('latitude') ?>" />
                    </div>

                    <div class="form-group">
                        <label>Longitude</label>
                        <input id="Longitude" class="form-control" placeholder="Longitude"  name="longitude" value="<?= set_value('longitude') ?>" />
                    </div>

                     <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*" required>
                    </div>
                    

                    <div class="form-group">
                        <label></label>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <script>
            var curLocation = [0, 0];
            if (curLocation[0] == 0 && curLocation[1] == 0) {
                curLocation = [-6.2315655,106.8143889];
            }

            var mymap = L.map('mapid').setView([-6.2315655,106.8143889], 14);
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            }).addTo(mymap);

            var icon = L.icon({
                iconUrl: '<?= base_url('icon/location.png') ?>',
                iconSize: [45, 50], // size of the icon
                shadowSize: [50, 64], // size of the shadow
                iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
                shadowAnchor: [4, 62], // the same for the shadow
                popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            var latInput = document.querySelector("[name='latitude']");
            var lngInput = document.querySelector("[name='longitude']");

            mymap.attributionControl.setPrefix(false);
            var marker = new L.marker(curLocation, {
                draggable: 'true'
            });

            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
                marker.setLatLng(position, {
                    draggable: 'true'
                }).bindPopup(position).update();
                $("#Latitude").val(position.lat);
                $("#Longitude").val(position.lng).keyup();
            });

            $("#Latitude, #Longitude").change(function() {
                var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
                marker.setLatLng(position, {
                    draggable: 'true'
                }).bindPopup(position).update();
                mymap.panTo(position);
            });

            mymap.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                if (!marker) {
                    marker = L.marker(e.latlng).addTo(map);
                } else {
                    marker.setLatLng(e.latlng);
                }
                latInput.value = lat;
                lngInput.value = lng;
            });

            mymap.addLayer(marker);
        </script>
    </div>
</div>
