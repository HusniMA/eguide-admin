<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Wisata</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-3">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Wisata</h6>
                </div>
                <div class="card-body">
                    <form>
                        <input type="hidden" name="id_wisata" id="id_wisata" value="<?=$wisata[0]->id_wisata?>"/>
                        <div class="input-group mb-3">
                            <select  class="select-kota form-control" name="select-kota" id="select-kota">
                                <option value="" selected disabled>Pilih Kota</option>
                                <?php 
                                    foreach($lokasi as $row){
                                        echo '<option value="'.$row->id_lokasi.'">'.$row->kota.'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?=$wisata[0]->nama?>" placeholder="Nama Wisata">
                        </div>

                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="harga" min="0" name="harga" value="<?=$wisata[0]->harga_tiket?>" placeholder="Harga Tiket">
                        </div>

                        <div class="input-group mb-3">
                            <label>Foto</label><br>
                            <input type="file" class="form-control-file" id="files" multiple name="foto"><br>
                            <div class="d-flex" id="uploaded_images">
                                <?php 
                                    $images = json_decode($wisata[0]->foto);
                                    for($count = 0; $count < count($images); $count++){
                                        echo '<div id="img'.($count+1).'" class="col-md-3">
                                        <img data-filename="'.$images[$count].'" src="'.base_url()."assets/upload/".$images[$count].'" class="img-responsive img-thumbnail" />
                                        </div>';
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <textarea name="deskripsi" id="deskripsi" class="form-control"><?=$wisata[0]->deskripsi?></textarea>
                        </div>

                        <div style="height: 200px;" id="editor" class="input-group mb-3">
                            
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="link" name="link" value="<?=$wisata[0]->link?>" placeholder="Masukan Link">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" data-toggle="modal" data-target="#myModal" id="alamat" name="alamat" value="<?=$wisata[0]->alamat?>" placeholder="Alamat">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="lat" name="lat" id="lat" value="<?=$wisata[0]->lat?>" placeholder="Latitude">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="lng" name="lng" id="lng" value="<?=$wisata[0]->lng?>" placeholder="Longitude">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button id="btn-save" type="submit" class="btn btn-success" style="margin-right:10px;">Simpan</button>
                            <a href="<?=base_url()?>index.php/wisata" class="btn btn-danger" style="margin-left:10px;">Batal</a>
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
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    var options = {
        debug: 'info',
        placeholder: 'Masukan Deskripsi ...',
        theme: 'snow'
    };

    var quill = new Quill('#editor', options);

    quill.clipboard.dangerouslyPasteHTML('<?=$wisata[0]->deskripsi?>')

    $('#files').change(function(){
        $('#uploaded_images').empty();
        var files = $('#files')[0].files;
        var error = '';
        var form_data = new FormData()

        for(var count = 0; count < files.length; count++){
            var name = (files[count].name).replace('.png','.jpg');
            console.log(name)
            var extension = name.split('.').pop().toLowerCase()
            
            if($.inArray(extension, ['gif','png','jpg','jpeg']) == 1){
                error += "Invalid "+count+" Image File"
            }else{
                form_data.append("files[]", files[count]);
            }
        }

        if(error == ''){
            $.ajax({
                url:"<?=base_url()?>index.php/wisata/upload",
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

        var id_wisata = $('#id_wisata').val()
        var id_lokasi = $('#select-kota').val()
        var nama = $('#nama').val()
        var harga = $('#harga').val()
        var deskripsi = quill.root.innerHTML
        var link = $('#link').val()
        var alamat = $('#alamat').val()
        var lat = $('#lat').val()
        var lng = $('#lng').val()

        var data = {
            id_wisata,
            id_lokasi,
            nama,
            harga,
            foto:JSON.stringify(images),
            deskripsi,
            link,
            alamat,
            lat,
            lng
        }
        
        
        $.ajax({
            url:"<?=base_url()?>index.php/wisata/save",
            method:"POST",
            dataType:'json',
            data:data,
            success:function(data){
                window.location = "<?=base_url()?>index.php/wisata"
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