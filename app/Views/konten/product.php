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
              onclick="openCreateProduct()"
              role="button">
              <i class="fa fa-plus"></i> Tambah Produk
            </a>
          </div>

        </div>
        <table class="table table-striped">
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
              <th scope="col">Create</th>
              <th scope="col">Update</th>
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
                  <td><?= htmlspecialchars($product['category_id']) ?></td>
                  <td><?= htmlspecialchars($product['unit']) ?></td>
                  <td><?= 'Rp ' . number_format($product['cost_price'], 0, ',', '.') ?></td>
                  <td><?= 'Rp ' . number_format($product['selling_price'], 0, ',', '.') ?></td>
                  <td><?= htmlspecialchars($product['stock']) ?></td>
                  <td><?= htmlspecialchars($product['warehouse_id']) ?></td>
                  <td><?= htmlspecialchars($product['created_at']) ?></td>
                  <td><?= htmlspecialchars($product['updated_at']) ?></td>
                  <td>
                    <a href="javascript:void(0)" title="Edit" onclick="openEditModal(<?= $product['id'] ?>)">
                      <i class="icon-copy dw dw-edit2"></i>
                    </a>
                    <a href="<?= base_url('product/delete/' . $product['id']) ?>"
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
              <label for="category_id" style="color: #000 !important;">Kategori <span class="text-danger">*</span></label>
              <select
                class="form-control"
                id="category_id"
                name="category_id"
                required
                style="background-color: #fff; color: #000 !important;">
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($category as $category): ?>
                  <option value="<?= $category['id'] ?>">
                    <?= $category['name'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
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
              <label for="cost_price" style="color: #000 !important;">
                Harga Beli <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                class="form-control"
                id="cost_price"
                name="cost_price"
                required
                placeholder="Masukkan harga beli"
                style="background-color: #fff; color: #000 !important;">
            </div>

            <div class="form-group col-md-6">
              <label for="selling_price" style="color: #000 !important;">
                Harga Jual <span class="text-danger">*</span>
              </label>
              <input
                type="text"
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
              <label for="warehouse_id" style="color: #000 !important;">Gudang <span class="text-danger">*</span></label>
              <select
                class="form-control"
                id="warehouse_id"
                name="warehouse_id"
                required
                style="background-color: #fff; color: #000 !important;">
                <option value="">-- Pilih Gudang --</option>
                <?php foreach ($warehouse as $warehouse): ?>
                  <option value="<?= $warehouse['id'] ?>">
                    <?= $warehouse['name'] ?>
                  </option>
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
        $('#category_id').val(data.category_id);
        $('#unit').val(data.unit);
        $('#cost_price').val(data.cost_price);
        $('#selling_price').val(data.selling_price);
        $('#stock').val(data.stock);
        $('#warehouse_id').val(data.warehouse_id);
        $('#productModal').modal('show');
      },
      error: function() {
        alert('Gagal mengambil data produk.');
      }
    });
  }

  function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      let separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
    return prefix === undefined ? rupiah : (rupiah ? "Rp " + rupiah : "");
  }

  function setupRupiahInput(id) {
    const input = document.getElementById(id);
    input.addEventListener("keyup", function(e) {
      this.value = formatRupiah(this.value, "Rp ");
    });
  }

  setupRupiahInput("cost_price");
  setupRupiahInput("selling_price");

  document.getElementById("productForm").addEventListener("submit", function(e) {
    const costInput = document.getElementById("cost_price");
    const sellInput = document.getElementById("selling_price");

    costInput.value = costInput.value.replace(/[^0-9]/g, "");
    sellInput.value = sellInput.value.replace(/[^0-9]/g, "");
  });
</script>