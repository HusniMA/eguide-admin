<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lokasi</h1>
    
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?=base_url()?>index.php/wisata/add" class="btn btn-info btn-circle btn-lg">
                <i class="fas fa-plus"></i>
                
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kota</th>
                    <th>Nama Wisata</th>
                    <th>Harga Tiker</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;

                    foreach($wisata as $row){ ?>
                         <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->kota?></td>
                            <td><?=$row->nama?></td>
                            <td><?=$row->harga_tiket?></td>
                            <td>
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                            $images = json_decode($row->foto);
                                            for($count = 0; $count < count($images); $count++){
                                                echo '<div class="carousel-item '.($count == 0 ? 'active':'').'">
                                                        <img class="d-block w-100 img-responsive img-thumbnail" src="'.base_url()."assets/upload/".$images[$count].'" alt="First slide">
                                                    </div>';
                                            }
                                            
                                        ?>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo strlen($row->deskripsi) > 20 ? substr($row->deskripsi, 0, 20)."..." : $row->deskripsi;?></td>
                            <td><?php echo strlen($row->alamat) > 20 ? substr($row->alamat, 0, 20)."..." : $row->alamat;?></td>
                            <td><?=$row->lat?></td>
                            <td><?=$row->lng?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around ">
                                    <a href="<?=base_url()?>index.php/wisata/edit/<?=$row->id_wisata?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?=base_url()?>index.php/wisata/delete/<?=$row->id_wisata?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php 
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>