<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Striped table start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Data Pelanggan</h4>
                    </div>
                    <div class="pull-right">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary btn-sm"
                            onclick="openCreateCustomers()"
                            role="button">
                            <i class="fa fa-plus"></i> Tambah Pelanggan
                        </a>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nomor</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($customers)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($customers as $customers): ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($customers['name']) ?></td>
                                    <td><?= htmlspecialchars($customers['phone']) ?></td>
                                    <td><?= htmlspecialchars($customers['email']) ?></td>
                                    <td><?= htmlspecialchars($customers['address']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $customers['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="<?= base_url('customers/delete/' . $customers['id']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus pelanggan ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data Pelanggan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- MODEL POP UP -->
<div id="customersModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color: #f8f9fa; color: #000 !important;">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h5 class="modal-title" id="modalTitle" style="color: #fff;">Tambah Pelanggan</h5>
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

            <form id="customersForm" method="POST" action="<?= base_url('customers/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="customersId" name="id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" style="color: #000 !important;">Nama Pelanggan <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                required
                                placeholder="Masukkan Nama Pelanggan"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" style="color: #000 !important;">No.Hp <span class="text-danger">*</span></label>
                            <input
                                type="number"
                                class="form-control"
                                id="phone"
                                name="phone"
                                required
                                placeholder="08********"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" style="color: #000 !important;">Email<span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                required
                                placeholder="(-) Jika Tidak ada"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address" style="color: #000 !important;"> Alamat <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="address"
                                name="address"
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
    function openCreateCustomers() {
        $('#modalTitle').text('Tambah Pelanggan');
        $('#customersForm')[0].reset();
        $('#customersId').val('');
        $('#customersModal').modal('show');
    }

    function closeModal() {
        $('#customersModal').modal('hide');
    }

    function openEditModal(id) {
        $.ajax({
            url: '<?= base_url('customers/edit/') ?>' + id,
            method: 'GET',
            success: function(data) {
                $('#modalTitle').text('Edit Gudang');
                $('#customersId').val(data.id);
                $('#name').val(data.name);
                $('#phone').val(data.phone);
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#customersModal').modal('show');

            },
            error: function() {
                alert('Gagal mengambil data produk.');
            }
        });
    }
</script>