<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Stock out
                        <small>(Barang Keluar)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Transaction</li>
                        <li class="breadcrumb-item active">Stock Out</li>

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
                    <h3 class="card-title">Data Stock out</h3>
                    <div class="float-right">
                        <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Stock out
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
                                <th>Info</th>
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
                                    <td><?= ucfirst($data->nama) ?></td>
                                    <td><?= $data->qty ?></td>
                                    <td><?= $data->detail ?></td>
                                    <td><?= indo_date($data->date) ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('stock/out/del/' . $data->stock_id . '/' . $data->item_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
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