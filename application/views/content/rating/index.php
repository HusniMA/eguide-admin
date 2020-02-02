<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rating</h1>
    
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Nama User</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;

                    foreach($rating as $row){ ?>
                         <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->nama?></td>
                            <td><?=$row->username?></td>
                            <td><?=$row->rating?></td>
                            <td>
                                <div class="d-flex align-items-center justify-content-around ">
                                   
                                    <a href="<?=base_url()?>index.php/rating/delete/<?=$row->id_rating?>" class="btn btn-danger btn-circle btn-sm">
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