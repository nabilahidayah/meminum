<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Users
                        <small>(Menambah Pengguna)</small>
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Users</li>
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
                    <h3 class="card-title">Add User</h3>
                    <div class="float-right">
                        <a href="<?= site_url('user') ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-undo-alt"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Mulai Form -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nama *</label>
                                    <input type="text" class="form-control <?= form_error('fullname') ? 'is-invalid' : null ?>" name="fullname" value="<?= set_value('fullname') ?>" placeholder="Nama Panjang">
                                    <small><span class="text-danger"><i><?= form_error('fullname') ?></i></span></small>
                                </div>
                                <div class="form-group ">
                                    <label>Username *</label>
                                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null ?>" name="username" value="<?= set_value('username') ?>" placeholder="Username">
                                    <small><span class="text-danger"><i><?= form_error('username') ?></i></span></small>
                                </div>
                                <div class="form-group ">
                                    <label>Password *</label>
                                    <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null ?>" name="password" value="<?= set_value('password') ?>" placeholder="Password">
                                    <small><span class="text-danger"><i><?= form_error('password') ?></i></span></small>
                                </div>
                                <div class="form-group  ">
                                    <label>Password Confirmation *</label>
                                    <input type="password" name="passconf" class="form-control <?= form_error('passconf') ? 'is-invalid' : null ?>" value="<?= set_value('passconf') ?>" placeholder="Password Confirmation">
                                    <small><span class="text-danger"><i><?= form_error('passconf') ?></i></span></small>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="address" placeholder="Alamat"><?= set_value('address') ?></textarea>
                                    <?= form_error('address') ?>
                                </div>
                                <div class="form-group ">
                                    <label>Level *</label>
                                    <select class="form-control <?= form_error('level') ? 'is-invalid' : null ?>" name="level">
                                        <option value=""> Pilih- </option>
                                        <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin </option>
                                        <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Kasir </option>
                                    </select>
                                    <small><span class="text-danger"><i><?= form_error('level') ?></i></span></small>
                                </div>
                                <!-- /.card-body -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Submit
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