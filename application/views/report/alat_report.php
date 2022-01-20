<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales Report Alat
                        <small>(Laporan Penjualan Alat)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Reports</li>
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
                    <h3 class="card-title">Data Penjualan Alat</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Barang</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Quantity</th>
                                <th>Jumlah Uang</th>
                                <th>User</th>
                                <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                    <th>Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) {
                            ?>
                                <tr>
                                    <td style="width:5%;"><?= $no++ ?>.</td>
                                    <td><?= $data->item_name ?></td>
                                    <td><?= indo_date($data->tanggal) ?></td>
                                    <td><?= indo_time($data->tanggal) ?></td>
                                    <td><?= $data->qty ?></td>
                                    <td><?= indo_currency($data->jml_uang) ?></td>
                                    <td><?= $data->user_name ?></td>
                                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                        <td class="text-center" width="200px">
                                            <a href="<?= site_url('simpan/del/' . $data->transaksi_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
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