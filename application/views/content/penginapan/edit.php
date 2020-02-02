<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penginapan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-3">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penginapan</h6>
                </div>
                <div class="card-body">
                    <form>
                        <input type="hidden" id="id_penginapan" name="id_penginapan" value="<?=$penginapan[0]->id_penginapan?>"/>
                        <div class="input-group mb-3">
                            <select  class="select-wisata form-control" name="select-wisata" id="select-wisata">
                                <option value="" selected disabled>Pilih Wisata</option>
                                <?php 
                                    foreach($wisata as $row){
                                        echo '<option value="'.$row->id_wisata.'">'.$row->nama.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?=$penginapan[0]->nama?>" placeholder="Nama Penginapan">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="kontak" name="kontak" value="<?=$penginapan[0]->kontak?>" placeholder="Kontak">
                        </div>

                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="tarif" name="tarif" value="<?=$penginapan[0]->tarif?>" placeholder="Tarif">
                        </div>

                        <div class="input-group mb-3">
                            <label>Foto</label><br>
                            <input type="file" class="form-control-file" id="files" multiple name="foto"><br>
                            <div class="d-flex" id="uploaded_images">
                                <?php 
                                    $images = json_decode($penginapan[0]->foto);
                                    for($count = 0; $count < count($images); $count++){
                                        echo '<div id="img'.($count+1).'" class="col-md-3">
                                        <img data-filename="'.$images[$count].'" src="'.base_url()."assets/upload/".$images[$count].'" class="img-responsive img-thumbnail" />
                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi" ><?=$penginapan[0]->deskripsi?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" data-toggle="modal" data-target="#myModal" id="alamat" value="<?=$penginapan[0]->alamat?>" name="alamat" placeholder="Alamat">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" value="<?=$penginapan[0]->lat?>">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lng" id="lng" placeholder="Longitude" value="<?=$penginapan[0]->lng?>">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button id="btn-save" type="submit" class="btn btn-success" style="margin-right:10px;">Simpan</button>
                            <a href="<?=base_url()?>index.php/penginapan" class="btn btn-danger" style="margin-left:10px;">Batal</a>
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
    $('#files').change(function(){
        var files = $('#files')[0].files;
        var error = '';
        var form_data = new FormData()

        for(var count = 0; count < files.length; count++){
            var name = (files[count].name).replace('.png','.jpg');
            var extension = name.split('.').pop().toLowerCase()
            if($.inArray(extension, ['gif','png','jpg','jpeg']) == 1){
                error += "Invalid "+count+" Image File"
            }else{
                form_data.append("files[]", files[count]);
            }
        }

        if(error == ''){
            $.ajax({
                url:"<?=base_url()?>index.php/penginapan/upload",
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                    $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
                },
                success:function(data){
                    $('#uploaded_images').html(data);
                    $('#files').val('');
                }
            })
        }else{
            alert(error);
        }
    })

    $('#btn-save').on('click', function(e){
        e.preventDefault()
        var images = []
        for(var i = 0; i < 4; i++){
            images[i] = $('#img'+(i+1)+' img').attr('data-filename')
        }

        var id_penginapan = $('#id_penginapan').val()
        var id_wisata = $('#select-wisata').val()
        var nama = $('#nama').val()
        var tarif = $('#tarif').val()
        var kontak = $('#kontak').val()
        var deskripsi = $('#deskripsi').val()
        var alamat = $('#alamat').val()
        var lat = $('#lat').val()
        var lng = $('#lng').val()

        var data = {
            id_penginapan,
            id_wisata,
            nama,
            tarif,
            foto:JSON.stringify(images),
            deskripsi,
            kontak,
            alamat,
            lat,
            lng
        }

        console.log(data)

        
        $.ajax({
            url:"<?=base_url()?>index.php/penginapan/save",
            method:"POST",
            dataType:'json',
            data:data,
            success:function(data){
                window.location = "<?=base_url()?>index.php/penginapan"
            }
        })
        
        
    })

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