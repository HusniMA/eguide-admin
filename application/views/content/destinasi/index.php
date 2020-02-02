<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Destinasi</h1>
    
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Saran</th>
                    <th>Lokasi</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;

                    foreach($destinasi as $row){ ?>
                         <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->nama?></td>
                            <td><?php echo strlen($row->saran) > 20 ? substr($row->saran, 0, 20)."..." : $row->saran;?></td>
                            <td><?php echo strlen($row->lokasi) > 20 ? substr($row->lokasi, 0, 20)."..." : $row->lokasi;?></td>
                            <td><?=$row->lat?></td>
                            <td><?=$row->lng?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around ">
                                   
                                    <a href="<?=base_url()?>index.php/destinasi/delete/<?=$row->id_destinasi?>" class="btn btn-danger btn-circle btn-sm">
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