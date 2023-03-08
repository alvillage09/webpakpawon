<div class="pagetitle">
    <h1>Menu</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/menu">Menu</a></li>
        <li class="breadcrumb-item active">Menu Makanan</li>
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
                            <h5 class="modal-title">Tambah Data Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" novalidate action="<?= BASEURL; ?>/menu/store" method="post" enctype="multipart/form-data">
                                <div class="col-12">
                                    <label for="menu_name" class="form-label">Nama Menu</label>
                                    <input type="text" class="form-control" id="menu_name" name="menu_name" placeholder="Masukan Nama Menu" required>
                                    <div class="valid-feedback">
                                        Nama Menu Valid!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="menu_stock" class="form-label">Stok</label>
                                    <input type="number" class="form-control" id="menu_stock" name="menu_stock" placeholder="Masukan Stok" required>
                                    <div class="valid-feedback">
                                        Stok Valid!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="menu_price" class="form-label">Harga</label>
                                    <input type="number" class="form-control" id="menu_price" name="menu_price" placeholder="Masukan Harga" required>
                                    <div class="valid-feedback">
                                        Harga Valid!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="menu_image" class="form-label">Unggah Gambar</label>
                                    <input type="file" class="form-control" id="menu_image" name="menu_image" required>
                                    <div class="valid-feedback">
                                        Gambar Valid!
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="menu_desc" class="form-label">Deskripsi Menu</label>
                                    <input type="text" class="form-control" id="menu_desc" name="menu_desc" placeholder="Masukan Deskripsi Menu" required>
                                    <div class="valid-feedback">
                                        Deskripsi Menu Valid
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
                        <th scope="col">Gambar Menu</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Stok Menu</th>
                        <th scope="col">Harga Menu</th>
                        <th scope="col">Deskripsi Menu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 0;
                    foreach ($data['dataMenu'] as $menu) {
                        $no +=1;
                ?>
                    <tr>
                        <th scope="row"><a href="#"><?= $no ?></a></th>
                        <td>
                            <img src="<?= BASEURL; ?>/img/menu/<?= $menu['menu_image'] ?>" alt="<?= $menu['menu_name'] ?>" class="rounded" style="width: 150px;">
                        </td>
                        <td><?= $menu['menu_name'] ?></a></td>
                        <td><?= $menu['menu_stock'] ?></a></td>
                        <td><?= $menu['menu_price'] ?></a></td>
                        <td><?= $menu['menu_desc'] ?></td>
                        <td>
                            <button type="button" class="btn bg-warning text-dark" data-bs-toggle="modal" data-bs-target="#formUpdateModal<?= $menu['menu_id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn bg-danger" data-bs-toggle="modal" data-bs-target="#formDeleteModal<?= $menu['menu_id'] ?>">
                                <i class="bi bi-trash"></i>
                            </button>


                            <!-- update Modal -->
                            <div class="modal fade" id="formUpdateModal<?= $menu['menu_id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data Menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Custom Styled Validation -->
                                        <form id="formUpdate<?= $menu['menu_id'] ?>" class="row g-3 needs-validation" novalidate action="<?= BASEURL; ?>/menu/update/<?= $menu['menu_id'] ?>" method="post">
                                            <input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?= $menu['menu_id'] ?>"  required>
                                            <input type="hidden" class="form-control" id="current_menu_img" name="current_menu_img" value="<?= $menu['menu_image'] ?>"  required>
                                            <div class="col-12">
                                                <label for="menu_name" class="form-label">Nama Menu</label>
                                                <input type="text" class="form-control" id="menu_name" name="menu_name" value="<?= $menu['menu_name'] ?>"  required>
                                                <div class="valid-feedback">
                                                    Nama Menu Valid!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="menu_stock" class="form-label">Stok</label>
                                                <input type="number" class="form-control" id="menu_stock" name="menu_stock" value="<?= $menu['menu_stock'] ?>" required>
                                                <div class="valid-feedback">
                                                    Stok Valid!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="menu_price" class="form-label">Harga</label>
                                                <input type="number" class="form-control" id="menu_price" name="menu_price" value="<?= $menu['menu_price'] ?>" required>
                                                <div class="valid-feedback">
                                                    Harga Valid!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="menu_image" class="form-label">Unggah Gambar</label>
                                                <div class="container my-2">
                                                    <img src="<?= BASEURL; ?>/img/menu/<?= $menu['menu_image'] ?>" alt="<?= $menu['menu_name'] ?>" class="rounded" style="width: 150px;">
                                                </div>
                                                <input type="file" class="form-control" id="menu_image" name="menu_image" required>
                                                <div class="valid-feedback">
                                                    Gambar Valid!
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="menu_desc" class="form-label">Deskripsi Menu</label>
                                                <input type="text" class="form-control" id="menu_desc" name="menu_desc" value="<?= $menu['menu_desc'] ?>"  required>
                                                <div class="valid-feedback">
                                                    Deskripsi Menu Valid
                                                </div>
                                            </div>
                                            
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" form="formUpdate<?= $menu['menu_id'] ?>">Ubah</button>
                                        </form>
                                        <!-- End Custom Styled Validation -->
                                    </div>
                                </div>
                                </div>
                            </div><!-- End update Modal-->
                            
                            <!-- delete Modal -->
                            <div class="modal fade" id="formDeleteModal<?= $menu['menu_id'] ?>" tabindex="-1">
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
                                            <form action="<?= BASEURL; ?>/menu/delete/<?= $menu['menu_id'] ?>" method="post">
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