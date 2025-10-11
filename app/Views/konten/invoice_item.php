<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Striped table start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Invoice Item</h4>
                    </div>
                    <div class="pull-right">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary btn-sm"
                            onclick="openCreateInvoice()"
                            role="button">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Quatity</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Sub Total</th>
   
                            <th scope="col">Update</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($invoice)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($invoice as $invoice): ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($invoice['invoice_id']) ?></td>
                                    <td><?= htmlspecialchars($invoice['product_id']) ?></td>
                                    <td><?= htmlspecialchars($invoice['price']) ?></td>
                                    <td><?= htmlspecialchars($invoice['subtotal']) ?></td>
                                    <td><?= htmlspecialchars($invoice['creates_at']) ?></td>
                                    <td><?= htmlspecialchars($invoice['update_at']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $invoice['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="<?= base_url('invoice/delete/' . $invoice['id']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus invoice ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data Invoice.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="invoiceModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
            <form id="invoiceForm" method="POST" action="<?= base_url('invoice/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="invoiceId" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="invoice_number" style="color: #000 !important;">Nomor Invoice <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="invoice_number"
                                name="invoice_number"
                                required
                                placeholder="Nomor Invoce"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="customer_id" style="color: #000 !important;">Nama Pelangan <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="customer_id"
                                name="customer_id"
                                required
                                placeholder="Nama Pelanggan"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="date" style="color: #000 !important;">Tangal<span class="text-danger">*</span></label>
                            <input
                                type="date"
                                class="form-control"
                                id="date"
                                name="date"
                                required
                                placeholder=""
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="text" style="color: #000 !important;">Total <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="total"
                                name="total"
                                required
                                placeholder="Total Harga"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="text" style="color: #000 !important;">Status Pembayaran <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="payment_status"
                                name="payment_status"
                                required
                                placeholder="Status Pembayaran"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="text" style="color: #000 !important;">Catatan <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="notes"
                                name="notes"
                                required
                                placeholder="Status Pembayaran"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <!-- <div class="form-group col-md-6 position-relative">
                            <label for="text" style="color: #000 !important;">Created <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="created_at"
                                name="created_at"
                                required
                                placeholder="Status Pembayaran"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <label for="text" style="color: #000 !important;">Update <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="updated_at"
                                name="updated_at"
                                required
                                placeholder="Status Pembayaran"
                                autocomplete="off"
                                style="background-color: #fff; color: #000 !important;">
                        </div> -->

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



<!-- Tambahkan ini di bawah sebelum tag </body> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script> -->

<script>
    const locationInput = document.getElementById('location');
    const resultBox = document.getElementById('location-results');

    locationInput.addEventListener('input', function() {
        const query = this.value;
        if (query.length < 3) {
            resultBox.innerHTML = '';
            return;
        }

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&addressdetails=1`)
            .then(response => response.json())
            .then(data => {
                resultBox.innerHTML = '';
                data.forEach(place => {
                    const item = document.createElement('a');
                    item.classList.add('list-group-item', 'list-group-item-action');
                    item.textContent = place.display_name;
                    item.addEventListener('click', function() {
                        locationInput.value = place.display_name;
                        resultBox.innerHTML = '';
                    });
                    resultBox.appendChild(item);
                });
            });
    });

    // Klik di luar dropdown untuk menutupnya
    document.addEventListener('click', function(e) {
        if (!locationInput.contains(e.target) && !resultBox.contains(e.target)) {
            resultBox.innerHTML = '';
        }
    });

    function openCreateInvoice() {
        $('#modalTitle').text('Tambah Gudang');
        $('#invoiceForm')[0].reset();
        $('#invoiceId').val('');
        $('#invoiceModal').modal('show');
    }

    function closeModal() {
        $('#invoiceModal').modal('hide');
    }

    function openEditModal(id) {
        $.ajax({
            url: '<?= base_url('warehouse/edit/') ?>' + id,
            method: 'GET',
            success: function(data) {
                $('#modalTitle').text('Edit Gudang');
                $('#invoiceId').val(data.id);
                $('#name').val(data.name);
                $('#location').val(data.location);
                $('#invoiceModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data produk.');
            }
        });
    }
</script>