<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories
                        <small>(Kategori Barang)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item active">Category</li>
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
                    <h3 class="card-title">Data Categories</h3>
                    <div class="float-right">
                        <a href="<?= site_url('category/add') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Create
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
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td style="width:5%;"><?= $no++ ?>.</td>
                                    <td><?= ucfirst($data->nama) ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('category/edit/' . $data->category_id) ?>" id="btn-update" class="btn btn-primary btn-xs">
                                            <i class="fas fa-edit"></i> Update
                                        </a>
                                        <a href="<?= site_url('category/del/' . $data->category_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
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