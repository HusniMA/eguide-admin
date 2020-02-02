<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lokasi</h1>
    
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?=base_url()?>index.php/penginapan/add" class="btn btn-info btn-circle btn-lg">
                <i class="fas fa-plus"></i>
                
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Nama Penginapan</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                    <th>Tarif</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;

                    foreach($penginapan as $row){ ?>
                         <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->nama_wisata?></td>
                            <td><?=$row->nama?></td>
                            <td><?php echo strlen($row->alamat) > 20 ? substr($row->alamat, 0, 20)."..." : $row->alamat;?></td>
                            <td><?=$row->kontak?></td>
                            <td><?=$row->tarif?></td>
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
                            <td><?=$row->lat?></td>
                            <td><?=$row->lng?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around ">
                                    <a href="<?=base_url()?>index.php/penginapan/edit/<?=$row->id_penginapan?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?=base_url()?>index.php/penginapan/delete/<?=$row->id_penginapan?>" class="btn btn-danger btn-circle btn-sm">
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