<div class="pagetitle">
    <h1>Peranan</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/role">Pengguna</a></li>
        <li class="breadcrumb-item active">Peranan</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="my-3">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#formTambah">
                    <i class="bi bi-file-earmark-plus me-1"></i> 
                    Tambah Data
                </button>
                <!-- Large Modal -->
                <div class="modal fade" id="formTambah" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Peranan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" novalidate action="<?= BASEURL; ?>/role/store" method="post">
                                <div class="col-12">
                                    <label for="role_name" class="form-label">Nama Peranan</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Masukan Nama Peran" required>
                                    <div class="valid-feedback">
                                        Nama Peran Valid!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="role_desc" class="form-label">Deskripsi Peranan</label>
                                    <input type="text" class="form-control" id="role_desc" name="role_desc" placeholder="Masukan Deskripsi Peran" required>
                                    <div class="valid-feedback">
                                        Deskripsi Peran Valid
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form><!-- End Custom Styled Validation -->
                        </div>
                    </div>
                    </div>
                </div><!-- End Large Modal-->
            </div>
            <!-- Data Table -->
            <div>
                <?php
                    app\config\Helper::flash();
                ?>
            </div>
            <table class="table table-borderled datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Peranan</th>
                        <th scope="col">Deskripsi Peranan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 0;
                    foreach ($data['dataRole'] as $role) {
                        $no +=1;
                ?>
                    <tr>
                        <th scope="row"><a href="#"><?= $no ?></a></th>
                        <td><?= $role['role_name'] ?></a></td>
                        <td><?= $role['role_desc'] ?></td>
                        <td>
                            <button type="button" class="btn bg-warning text-dark" data-bs-toggle="modal" data-bs-target="#formUpdateModal<?= $role['role_id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn bg-danger" data-bs-toggle="modal" data-bs-target="#formDeleteModal<?= $role['role_id'] ?>">
                                <i class="bi bi-trash"></i>
                            </button>


                            <!-- update Modal -->
                            <div class="modal fade" id="formUpdateModal<?= $role['role_id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Peranan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Custom Styled Validation -->
                                        <form id="formUpdate<?= $role['role_id'] ?>" class="row g-3 needs-validation" novalidate action="<?= BASEURL; ?>/role/update/<?= $role['role_id'] ?>" method="post">
                                            <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?= $role['role_id'] ?>" placeholder="Masukan Nama Peran" required>
                                            <div class="col-12">
                                                <label for="role_name" class="form-label">Nama Peranan</label>
                                                <input type="text" class="form-control" id="role_name" name="role_name" value="<?= $role['role_name'] ?>" placeholder="Masukan Nama Peran" required>
                                                <div class="valid-feedback">
                                                    Nama Peran Valid!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="role_desc" class="form-label">Deskripsi Peranan</label>
                                                <input type="text" class="form-control" id="role_desc" name="role_desc" value="<?= $role['role_desc'] ?>" placeholder="Masukan Deskripsi Peran" required>
                                                <div class="valid-feedback">
                                                    Deskripsi Peran Valid
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" form="formUpdate<?= $role['role_id'] ?>">Ubah</button>
                                        </form>
                                        <!-- End Custom Styled Validation -->
                                    </div>
                                </div>
                                </div>
                            </div><!-- End update Modal-->
                            
                            <!-- delete Modal -->
                            <div class="modal fade" id="formDeleteModal<?= $role['role_id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Data!!!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus data?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?= BASEURL; ?>/role/delete/<?= $role['role_id'] ?>" method="post">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End delete Modal-->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- End Data Table -->

        </div>
    </div>
</section>