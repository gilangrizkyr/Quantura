<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Data Produk</h4>
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
                                    <td><?= htmlspecialchars($pergerakan['product_id']) ?></td>
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
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data produk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah/Edit Produk -->
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

            <form id="productForm" method="POST" action="<?= base_url('pergerakan/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="pergerakanId" name="id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_id" style="color: #000 !important;">Pilih Produk <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="product_id"
                                name="product_id"
                                required
                                placeholder="Pilih Produk"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="type" style="color: #000 !important;">Tipe <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="type"
                                name="type"
                                required
                                placeholder="Pilih Tipe"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reference" style="color: #000 !important;">
                                Reference<span class="text-danger">*</span>
                            </label>
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
                            <label for="quantity" style="color: #000 !important;">Quantity <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="quantity"
                                name="quantity"
                                required
                                placeholder="Masukkan Quantity"
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
    function openCreatePergerakan() {
        $('#modalTitle').text('Tambah Data');
        $('#productForm')[0].reset();
        $('#pergerakanId').val('');
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
                $('#product_id').val(data.product_id);
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

    // function formatRupiah(angka, prefix) {
    //     let number_string = angka.replace(/[^,\d]/g, "").toString(),
    //         split = number_string.split(","),
    //         sisa = split[0].length % 3,
    //         rupiah = split[0].substr(0, sisa),
    //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    //     if (ribuan) {
    //         let separator = sisa ? "." : "";
    //         rupiah += separator + ribuan.join(".");
    //     }

    //     rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
    //     return prefix === undefined ? rupiah : (rupiah ? "Rp " + rupiah : "");
    // }

    // function setupRupiahInput(id) {
    //     const input = document.getElementById(id);
    //     input.addEventListener("keyup", function(e) {
    //         this.value = formatRupiah(this.value, "Rp ");
    //     });
    // }

    // setupRupiahInput("cost_price");
    // setupRupiahInput("selling_price");

    // document.getElementById("productForm").addEventListener("submit", function(e) {
    //     const costInput = document.getElementById("cost_price");
    //     const sellInput = document.getElementById("selling_price");

    //     costInput.value = costInput.value.replace(/[^0-9]/g, "");
    //     sellInput.value = sellInput.value.replace(/[^0-9]/g, "");
    // });
</script>