<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Striped table start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Warehouse Product</h4>
                    </div>
                    <div class="pull-right">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary btn-sm"
                            onclick="openCreateWarehouse()"
                            role="button">
                            <i class="fa fa-plus"></i> Tambah Gudang
                        </a>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Gudang</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($warehouse)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($warehouse as $warehouse): ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($warehouse['name']) ?></td>
                                    <td><?= htmlspecialchars($warehouse['location']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $warehouse['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="<?= base_url('warehouse/delete/' . $warehouse['id']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus gudang ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data Gudang.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- MODEL POP UP -->
<div id="warehouseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; color: #000 !important;">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h5 class="modal-title" id="modalTitle" style="color: #fff;">Tambah Produk</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Tutup"
                    onclick="closeModal()"
                    style="color: #fff !important; opacity: 1;">
                    <span aria-hidden="true" style="color: #fff !important;">&times;</span>
                </button>
            </div>

            <form id="warehouseForm" method="POST" action="<?= base_url('warehouse/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="warehouseId" name="id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" style="color: #000 !important;">Nama Gudang <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                required
                                placeholder="Masukkan Nama Kategori"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location" style="color: #000 !important;"> Alamat <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="location"
                                name="location"
                                required
                                placeholder="Masukkan Alamat Gudang"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()" style="color: #000 !important;">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>




<!-- JavaScript -->
<script>
    function openCreateWarehouse() {
        $('#modalTitle').text('Tambah Gudang');
        $('#warehouseForm')[0].reset();
        $('#warehouseId').val('');
        $('#warehouseModal').modal('show');
    }

    function closeModal() {
        $('#warehouseModal').modal('hide');
    }

    function openEditModal(id) {
        $.ajax({
            url: '<?= base_url('warehouse/edit/') ?>' + id,
            method: 'GET',
            success: function(data) {
                $('#modalTitle').text('Edit Gudang');
                $('#warehouseId').val(data.id);
                $('#name').val(data.name);
                $('#location').val(data.location);
                $('#warehouseModal').modal('show');

            },
            error: function() {
                alert('Gagal mengambil data produk.');
            }
        });
    }
</script>