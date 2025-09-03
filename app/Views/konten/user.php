<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <?php if (session()->getFlashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success') ?>',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= session()->getFlashdata('error') ?>',
            });
        </script>
    <?php endif; ?>
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
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($user)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($user as $u): ?>

                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= htmlspecialchars($u['username']) ?></td>
                                    <td><?= htmlspecialchars($u['role']) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $u['id'] ?>)">
                                            <i class="icon-copy dw dw-edit2"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                            onclick="deleteUser(<?= $u['id'] ?>, '<?= htmlspecialchars($u['username'], ENT_QUOTES) ?>', '<?= htmlspecialchars($u['role'], ENT_QUOTES) ?>')"
                                            title="Hapus">
                                            <i class="icon-copy dw dw-delete text-danger"></i>
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
                <h5 class="modal-title" id="modalTitle" style="color: #fff;">Tambah Pengguna</h5>
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
            <form id="userForm" method="POST" action="<?= base_url('users/save') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="userId" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="profile_image" style="color: #000 !important;">Foto Profil</label>
                            <input
                                type="file"
                                class="form-control"
                                id="profile_image"
                                name="profile_image"
                                accept="image/*"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
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
                                placeholder="Masukkan Password"
                                style="background-color: #fff; color: #000 !important;">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="role" style="color: #000 !important;">Role <span class="text-danger">*</span></label>
                            <select
                                class="form-control"
                                id="role"
                                name="role"
                                required
                                style="background-color: #fff; color: #000 !important;">
                                <option value="">-- Pilih Role --</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= $role ?>"><?= ucfirst($role) ?></option>
                                <?php endforeach; ?>
                            </select>

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
        $('#profile_image').val('');
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
                $('#password').val('');
                $('#role').val(data.role);
                $('#profile_image').val('');
                $('#userModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data pengguna.');
            }
        });
    }

    function deleteUser(id, username, role) {
        Swal.fire({
            title: 'Yakin ingin menghapus pengguna ini?',
            html: `Username: <strong>${username}</strong><br>Role: <em>${role}</em>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('users/delete/') ?>" + id;
            }
        });
    }
</script>