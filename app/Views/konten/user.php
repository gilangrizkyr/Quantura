<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <!-- Striped table start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Pengguna</h4>
                    </div>
                    <div class="pull-right">
                        <a
                            href="javascript:void(0);"
                            class="btn btn-primary btn-sm"
                            onclick="openCreateUser()"
                            role="button">
                            <i class="fa fa-plus"></i> Tambah Pengguna
                        </a>
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($user as $user): ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['role']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $user['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="<?= base_url('user/delete/' . $user['id']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus pengguna ini?')" title="Hapus">
                                            <i class="icon-copy dw dw-delete"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Belum ada data pengguna.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- POP UP -->
<div id="userModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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
            <form id="userForm" method="POST" action="<?= base_url('users/save') ?>">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username" style="color: #000 !important;">Username <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="username"
                                name="username"
                                required
                                placeholder="Masukkan Username"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" style="color: #000 !important;">Password <span class="text-danger">*</span></label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                required
                                placeholder="Masukkan Password"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="role" style="color: #000 !important;">Role <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="role"
                                name="role"
                                required
                                placeholder="Masukkan Nama Kategori"
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
    function openCreateUser() {
        $('#modalTitle').text('Tambah Pengguna');
        $('#userForm')[0].reset();
        $('#userId').val('');
        $('#userModal').modal('show');
    }

    function closeModal() {
        $('#userModal').modal('hide');
    }

    function openEditModal(id) {
        $.ajax({
            url: '<?= base_url('users/edit/') ?>' + id,
            method: 'GET',
            success: function(data) {
                $('#modalTitle').text('Edit Pengguna');
                $('#userId').val(data.id);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#role').val(data.role);
                $('#userModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data pengguna.');
            }
        });
    }
</script>