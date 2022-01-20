<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer
                        <small>(Pelanggan)</small>
                    </h1>
                </div>

                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item"><?= ucfirst($this->uri->segment(1)) ?></li>
                        <li class="breadcrumb-item active"><?= ucfirst($this->uri->segment(2)) ?></li>
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
                    <h3 class="card-title"><?= ucfirst($page) ?> customer</h3>
                    <div class="float-right">
                        <a href="<?= site_url('customer') ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-undo-alt"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Mulai Form -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="<?= site_url('customer/process') ?>" method="post">
                                <div class="form-group">
                                    <label>Nama Customer *</label>
                                    <input type="hidden" name="id" value="<?= $row->customer_id ?>">
                                    <input type="text" class="form-control" name="customer_name" value="<?= $row->nama ?>" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin *</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="">- Pilih -</option>
                                        <option value="L" <?= $row->gender == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="P" <?= $row->gender == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nomor HP *</label>
                                    <input type="number" class="form-control" name="phone" value="<?= $row->phone ?>" placeholder="Nomor HP" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="addr"><?= $row->alamat ?></textarea>
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