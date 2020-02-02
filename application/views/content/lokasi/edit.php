<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Lokasi</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-3">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Lokasi</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=base_url()?>index.php/lokasi/save">
                        <input type="hidden" name="id_lokasi" value="<?=$lokasi[0]->id_lokasi?>"/>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="kota" value="<?=$lokasi[0]->kota?>" placeholder="Kota">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="kecamatan" value="<?=$lokasi[0]->kecamatan?>" placeholder="Kecamatan">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" data-toggle="modal" data-target="#myModal" id="alamat" name="alamat" value="<?=$lokasi[0]->alamat?>" placeholder="Alamat">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lat" id="lat" value="<?=$lokasi[0]->lat?>" placeholder="Latitude">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lng" id="lng" value="<?=$lokasi[0]->lng?>" placeholder="Longitude">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success" style="margin-right:10px;">Simpan</button>
                            <a href="<?=base_url()?>index.php/lokasi" class="btn btn-danger" style="margin-left:10px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body" >
                <div id='geocoder' class='geocoder'></div>
                <div id='map'></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal" >Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiaHVzbmlhaWxhdGF0IiwiYSI6ImNqbGUwMGpxNjBndHEza21jdW9vNm14OWUifQ.a8t7pYxo0VYWileena1dwg';
    var coordinates = document.getElementById('coordinates');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [110.36444, -7.80139],
        zoom: 11
    });

    var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });

    $('#myModal').on('shown.bs.modal', function() {
        map.resize();
    });

    $('#close').on('click', function(){
        $('#alamat').val('');
        $('#lat').val('');
        $('#lng').val('');
    })

    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        marker:false,
        proximity:[-7.80139,110.36444]
    });

    var marker = new mapboxgl.Marker({
            draggable: true
    })

    geocoder.on('loading', function(){
        marker.remove();
    })

    geocoder.on('result', function(data) {
        $('#alamat').val(data.result.place_name);
        $('#lat').val(data.result.geometry.coordinates[1]);
        $('#lng').val(data.result.geometry.coordinates[0]);
        
        marker.setLngLat(data.result.geometry.coordinates)
        .addTo(map);

        marker.on('dragend', function(){
            var lngLat = marker.getLngLat();
            setForm(mapboxClient, lngLat.lng, lngLat.lat)
        });
    })

    map.on('click', function(e){
        setForm(mapboxClient, e.lngLat.lng, e.lngLat.lat)

        marker.setLngLat([
            e.lngLat.lng,
            e.lngLat.lat
        ])
        .addTo(map);

        marker.on('dragend', function(){
            
            var lngLat = marker.getLngLat();
            setForm(mapboxClient, lngLat.lng, lngLat.lat)
        });
    })

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    
    function setForm(mapboxClient, lng, lat){
        mapboxClient.geocoding.reverseGeocode({
            query: [
                lng,
                lat
            ],
            limit: 1
        })
        .send()
        .then(function (response) {
            geocoder.setInput(response.body.features[0].place_name)
            $('#alamat').val(response.body.features[0].place_name);
            $('#lat').val(response.body.features[0].geometry.coordinates[1]);
            $('#lng').val(response.body.features[0].geometry.coordinates[0]);

        })
    }
</script>