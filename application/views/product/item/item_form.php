<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Items
                        <small>(Data Barang)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Item</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php $this->view('messages'); ?>
        <div class="container-fluid">

            <!-- Mulai tabel  -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= ucfirst($page) ?> Item</h3>
                    <div class="float-right">
                        <a href="<?= site_url('item') ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-undo-alt"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Mulai Form -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <?php echo form_open_multipart('item/process') ?>

                            <div class="form-group">
                                <label>Barcode *</label>
                                <input type="hidden" name="id" value="<?= $row->item_id ?>">
                                <input type="text" class="form-control" name="barcode" value="<?= $row->barcode ?>" placeholder="Barcode" required>
                            </div>
                            <div class="form-group">
                                <label for="product_name">Nama Produk *</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" value="<?= $row->nama ?>" placeholder="Nama Produk" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori *</label>
                                <select name="category" class="form-control" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($category->result() as $key => $data) { ?>
                                        <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Unit *</label>
                                <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                            </div>

                            <div class="form-group">
                                <label>Harga *</label>
                                <input type="number" class="form-control" name="price" value="<?= $row->price ?>" placeholder="Harga" required>
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>

                                <?php if ($page == 'edit') {
                                    if ($row->image != null) { ?>
                                        <div style="margin-bottom:4px">
                                            <img src="<?= base_url('uploads/product/' . $row->image) ?>" style="width:100px">
                                        </div>
                                <?php
                                    }
                                } ?>
                                <input type="file" class="form-control" name="image">
                                <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                            </div>
                            <!-- /.card-body -->
                            <div class="form-group">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success">
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-secondary">
                                    <i class="fas fa-undo-alt"></i> Reset
                                </button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
                <!-- Akhir Form -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->