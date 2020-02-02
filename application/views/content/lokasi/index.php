<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lokasi</h1>
    
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?=base_url()?>index.php/lokasi/add" class="btn btn-info btn-circle btn-lg">
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
                    <th>Kecamatan</th>
                    <th>Alamat</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;

                    foreach($lokasi as $row){ ?>
                         <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->kota?></td>
                            <td><?=$row->kecamatan?></td>
                            <td><?php echo strlen($row->alamat) > 20 ? substr($row->alamat, 0, 20)."..." : $row->alamat;?></td>
                            <td><?=$row->lat?></td>
                            <td><?=$row->lng?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around ">
                                    <a href="<?=base_url()?>index.php/lokasi/edit/<?=$row->id_lokasi?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="<?=base_url()?>index.php/lokasi/delete/<?=$row->id_lokasi?>" class="btn btn-danger btn-circle btn-sm">
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