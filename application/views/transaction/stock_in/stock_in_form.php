<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stock In
                        <small>(Barang Masuk/ Pembelian)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Transaction</li>
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
        <div class="container-fluid">

            <!-- Mulai tabel  -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Stock In</h3>
                    <div class="float-right">
                        <a href="<?= site_url('stock/in') ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-undo-alt"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Mulai Form -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="<?= site_url('stock/process') ?>" method="post">
                                <div class="form-group">
                                    <label>Date *</label>
                                    <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" placeholder="Date" required>
                                </div>

                                <div class="form-group">
                                    <label for="barcode">Barcode * </label>
                                </div>
                                <div class="form-group input-group">
                                    <input type="hidden" name="item_id" id="item_id">
                                    <input type="text" class="form-control" name="barcode" id="barcode" required autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="item_name">Nama Item *</label>
                                    <input type="text" class="form-control" name="item_name" id="item_name" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="unit_name">Nama Unit</label>
                                            <input type="text" class="form-control" name="unit_name" id="unit_name" value="" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stock">Stock Awal</label>
                                            <input type="text" class="form-control" name="stock" id="stock" value="" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input type="text" class="form-control" name="detail" id="detail" placeholder="Kulakan / Tambahan / dll">
                                </div>

                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier">
                                        <option value=""> - Pilih -</option>
                                        <?php foreach ($supplier as $i => $data) {
                                            echo '<option value="' . $data->supplier_id . '">' . $data->nama . ' </option>';
                                        } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="detail">Quantity *</label>
                                    <input type="number" class="form-control" name="qty" id="qty" required>
                                </div>

                                <div class="form-group">
                                    <label for="detail">Harga *</label>
                                    <input type="number" class="form-control" name="harga" id="harga" required>
                                </div>
                                <!-- /.card-body -->
                                <div class="form-group">
                                    <button type="submit" name="in_add" class="btn btn-success">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-undo-alt"></i> Reset
                                    </button>
                                </div>
                            </form>
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
    <!-- mulai modal -->
    <div class="modal fade modal-item-modal-lg" id="modal-item">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Product Item</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($item as $i => $data) { ?>
                                <tr>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->unit_name ?></td>
                                    <td><?= indo_currency($data->price) ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-nama="<?= $data->nama ?>" data-unit="<?= $data->unit_name ?>" data-stock="<?= $data->stock ?>">
                                            <i class="fas fa-check"></i> Select
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    </div>


    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                // sesuai dengan database -- data- diatas

                var item_id = $(this).data('id');
                var barcode = $(this).data('barcode');
                var nama = $(this).data('nama');
                var unit_name = $(this).data('unit');
                var stock = $(this).data('stock');
                //sesuai dengan id tiap template 
                $('#item_id').val(item_id);
                $('#barcode').val(barcode);
                $('#item_name').val(nama);
                $('#unit_name').val(unit_name);
                $('#stock').val(stock);
                $('#modal-item').modal('hide');
            })
        })
    </script>