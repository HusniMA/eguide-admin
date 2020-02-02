<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-3">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Useri</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=base_url()?>index.php/user/save">
                        <input type="hidden" name="id_user" value=""/>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success" style="margin-right:10px;">Simpan</button>
                            <a href="<?=base_url()?>index.php/user" class="btn btn-danger" style="margin-left:10px;">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
