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
                        <li class="breadcrumb-item">Transaction</li>
                        <li class="breadcrumb-item active">Stock In</li>

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
        <div id="flash" data-flash="<?= $this->session->flashdata('success');
                                    unset($_SESSION['success']); ?>"></div>
        <div class="container-fluid">

            <!-- Mulai tabel  -->
            <!-- /.col -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Stock In</h3>
                    <div class="float-right">
                        <a href="<?= site_url('stock/in/add') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Stock In
                        </a>
                    </div>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Barcode</th>
                                <th>Product Item</th>
                                <th>Quantity</th>
                                <th>Harga </th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $key => $data) { ?>
                                <tr>
                                    <td style="width:5%;"><?= $no++ ?>.</td>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= ucfirst($data->item_name) ?></td>
                                    <td><?= $data->qty ?></td>
                                    <td><?= indo_currency($data->harga) ?></td>
                                    <td><?= indo_date($data->date) ?></td>
                                    <td class="text-center" width="160px">
                                        <a id="set_dtl" class="btn btn-default btn-bordered btn-xs" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $data->barcode ?>" data-itemname="<?= $data->item_name ?>" data-detail="<?= $data->detail ?>" data-suppliername="<?= $data->supplier_name ?>" data-qty="<?= $data->qty ?>" data-date="<?= indo_date($data->date) ?>">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <a href="<?= site_url('stock/in/del/' . $data->stock_id . '/' . $data->item_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <!-- Akhir tabel  -->



                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <!-- mulai modal -->
    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Stock In Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>Barcode</th>
                                <td><span id="barcode"></span></td>
                            </tr>
                            <tr>
                                <th>Item Name</th>
                                <td><span id="item_name"></span></td>
                            </tr>
                            <tr>
                                <th>Detail</th>
                                <td><span id="detail"></span></td>
                            </tr>
                            <tr>
                                <th>Supplier Name</th>
                                <td><span id="supplier_name"></span></td>
                            </tr>
                            <tr>
                                <th>Quantity</th>
                                <td><span id="qty"></span></td>
                            </tr>
                            <tr>
                                <th>Tanggal </th>
                                <td><span id="date"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {
                // sesuai dengan membuat variable sendiri -- data- diatas
                var barcode = $(this).data('barcode');
                var itemname = $(this).data('itemname');
                var detail = $(this).data('detail');
                var suppliername = $(this).data('suppliername');
                var qty = $(this).data('qty');
                var date = $(this).data('date');
                // #sesuai dengan id tiap template . sesuai dengan variable var diatas
                //pakai text karena pakai span, kalau val pakai input
                $('#barcode').text(barcode);
                $('#item_name').text(itemname);
                $('#detail').text(detail);
                $('#supplier_name').text(suppliername);
                $('#qty').text(qty);
                $('#date').text(date);
                $('#detail').modal('detail');
            })
        })
    </script>