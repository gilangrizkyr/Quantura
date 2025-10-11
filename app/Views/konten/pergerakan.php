<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Pergerakan Produk</h4>
                    </div>
                    <div class="pull-right">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary btn-sm"
                            onclick="openCreatePergerakan()"
                            role="button">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Product</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Create</th>
                            <th scope="col">Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pergerakan)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($pergerakan as $pergerakan): ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($pergerakan['product_name']) ?></td>
                                    <td><?= htmlspecialchars($pergerakan['type']) ?></td>
                                    <td><?= htmlspecialchars($pergerakan['quantity']) ?></td>
                                    <td><?= htmlspecialchars($pergerakan['reference']) ?></td>
                                    <td><?= htmlspecialchars($pergerakan['created_at']) ?></td>
                                    <td><?= htmlspecialchars($pergerakan['updated_at']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $pergerakan['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="<?= base_url('pergerakan/delete/' . $pergerakan['id']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data pergerakan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Pop Up -->
<div id="pergerakanModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; color: #000 !important;">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h5 class="modal-title" id="modalTitle" style="color: #fff;">Tambah Data</h5>
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

            <form id="pergerakanForm" method="POST" action="<?= base_url('pergerakan/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="pergerakanId" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_id" style="color: #000 !important;">Pilih Produk <span class="text-danger">*</span></label>
                            <select
                                class="form-control"
                                id="product_id"
                                name="product_id"
                                required
                                style="background-color: #fff; color: #000 !important; width: 100%;">
                                <option value="">-- Pilih Produk --</option>
                                <?php foreach ($products as $product): ?>
                                    <option value="<?= $product['id'] ?>"><?= esc($product['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="type" style="color: #000 !important;">Tipe <span class="text-danger">*</span></label>
                            <select
                                class="form-control"
                                id="type"
                                name="type"
                                required
                                style="background-color: #fff; color: #000 !important;">
                                <option value="">-- Pilih Tipe --</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= $role ?>"><?= ucfirst($role) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reference" style="color: #000 !important;">Reference <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="reference"
                                name="reference"
                                required
                                placeholder="Referensi"
                                style="background-color: #fff; color: #000 !important;">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quantity" style="color: #000 !important;">Jumlah <span class="text-danger">*</span></label>
                            <input
                                type="number"
                                class="form-control"
                                id="quantity"
                                name="quantity"
                                required
                                placeholder="Masukkan Jumlah"
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
<style>
    .select2-container .select2-selection--single {
        height: 45px !important;
        /* sesuai form-control */
        padding: 6px 3px;
        border: 1px solid #ced4da;
        background-color: #fff;
        color: #000;
        border-radius: 7px;
        font-family: sans-serif;
        font-size: 15px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: center;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<!-- JavaScript -->
<script>
    $(document).ready(function() {
        $('#product_id').select2({
            placeholder: 'Pilih Produk...',
            width: '100%',
            dropdownParent: $('#pergerakanModal')
        });
    });


    function openCreatePergerakan() {
        $('#modalTitle').text('Tambah Data');
        $('#pergerakanForm')[0].reset();
        $('#product_id').val('').trigger('change');
        $('#type').val('');
        $('#pergerakanId').val('');
        $('#quantity').val('');
        $('#reference').val('');
        $('#pergerakanModal').modal('show');
    }

    function closeModal() {
        $('#pergerakanModal').modal('hide');
    }

    function openEditModal(id) {
        $.ajax({
            url: '<?= base_url('pergerakan/edit/') ?>' + id,
            method: 'GET',
            success: function(data) {
                $('#modalTitle').text('Edit Data');
                $('#pergerakanId').val(data.id);
                $('#product_id').val(data.product_id).trigger('change');
                $('#type').val(data.type);
                $('#quantity').val(data.quantity);
                $('#reference').val(data.reference);
                $('#pergerakanModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data.');
            }
        });
    }

    $('#pergerakanForm').on('submit', function(e) {
        const productId = $('#product_id').val();
        if (!productId) {
            e.preventDefault();
            alert('Silakan pilih produk terlebih dahulu!');
        }
    });
</script>