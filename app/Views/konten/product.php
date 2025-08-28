<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Produk</h5>

            <!-- Tombol Tambah -->
            <button class="btn btn-success mb-3" onclick="openCreateProduct()">
              <i class="icon-copy dw dw-add"></i> Tambah
            </button>

            <!-- Tabel Produk -->
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Gudang</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($products)): ?>
                    <?php $no = 1; ?>
                    <?php foreach ($products as $product): ?>
                      <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['sku']) ?></td>
                        <td><?= htmlspecialchars($product['category']) ?></td>
                        <td><?= htmlspecialchars($product['unit']) ?></td>
                        <td><?= htmlspecialchars($product['cost_price']) ?></td>
                        <td><?= htmlspecialchars($product['selling_price']) ?></td>
                        <td><?= htmlspecialchars($product['stock']) ?></td>
                        <td><?= htmlspecialchars($product['warehouse']) ?></td>
                        <td>
                          <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $product['id'] ?>)">
                            <i class="icon-copy dw dw-edit2"></i>
                          </a>
                          <a href="<?= base_url('product/delete/' . $product['id']) ?>"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')" title="Hapus">
                            <i class="icon-copy dw dw-delete3 text-danger"></i>
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
    </div>
  </div>
</div>

<!-- Modal Tambah/Edit Produk -->
<div id="productModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
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

      <form id="productForm" method="POST" action="<?= base_url('product/save') ?>">
        <div class="modal-body">
          <input type="hidden" id="productId" name="id">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name" style="color: #000 !important;">Nama Produk <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                required
                placeholder="Masukkan nama produk"
                style="background-color: #fff; color: #000 !important;">
            </div>
            <div class="form-group col-md-6">
              <label for="sku" style="color: #000 !important;">SKU <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="sku"
                name="sku"
                required
                placeholder="Masukkan SKU"
                style="background-color: #fff; color: #000 !important;">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="category" style="color: #000 !important;">Kategori <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="category"
                name="category"
                required
                placeholder="Masukkan kategori"
                style="background-color: #fff; color: #000 !important;">
            </div>
            <div class="form-group col-md-6">
              <label for="unit" style="color: #000 !important;">Unit <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="unit"
                name="unit"
                required
                placeholder="Masukkan unit"
                style="background-color: #fff; color: #000 !important;">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cost_price" style="color: #000 !important;">Harga Beli <span class="text-danger">*</span></label>
              <input
                type="number"
                step="0.01"
                class="form-control"
                id="cost_price"
                name="cost_price"
                required
                placeholder="Masukkan harga beli"
                style="background-color: #fff; color: #000 !important;">
            </div>
            <div class="form-group col-md-6">
              <label for="selling_price" style="color: #000 !important;">Harga Jual <span class="text-danger">*</span></label>
              <input
                type="number"
                step="0.01"
                class="form-control"
                id="selling_price"
                name="selling_price"
                required
                placeholder="Masukkan harga jual"
                style="background-color: #fff; color: #000 !important;">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="stock" style="color: #000 !important;">Stok <span class="text-danger">*</span></label>
              <input
                type="number"
                class="form-control"
                id="stock"
                name="stock"
                required
                placeholder="Masukkan stok"
                style="background-color: #fff; color: #000 !important;">
            </div>
            <div class="form-group col-md-6">
              <label for="warehouse" style="color: #000 !important;">Gudang <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control"
                id="warehouse"
                name="warehouse"
                required
                placeholder="Masukkan lokasi gudang"
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
  function openCreateProduct() {
    $('#modalTitle').text('Tambah Produk');
    $('#productForm')[0].reset();
    $('#productId').val('');
    $('#productModal').modal('show');
  }

  function closeModal() {
    $('#productModal').modal('hide');
  }

  function openEditModal(id) {
    $.ajax({
      url: '<?= base_url('product/edit/') ?>' + id,
      method: 'GET',
      success: function(data) {
        $('#modalTitle').text('Edit Produk');
        $('#productId').val(data.id);
        $('#name').val(data.name);
        $('#sku').val(data.sku);
        $('#category').val(data.category);
        $('#unit').val(data.unit);
        $('#cost_price').val(data.cost_price);
        $('#selling_price').val(data.selling_price);
        $('#stock').val(data.stock);
        $('#warehouse').val(data.warehouse);
        $('#productModal').modal('show');
      },
      error: function() {
        alert('Gagal mengambil data produk.');
      }
    });
  }
</script>