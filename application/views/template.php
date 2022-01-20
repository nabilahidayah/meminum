<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="<?= base_url() ?>uploads/web/iconweb1.svg">
  <title>Meminum</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css" />
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css" />
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- jquery -->
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- datepicker -->
  <link href="<?= base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
</head>


<body class="hold-transition sidebar-mini layout-navbar-fixed">

  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= site_url('dashboard') ?>" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- mulai logout -->
        <div class="top-menu">
          <ul class="nav float-right top-menu">
            <li>
              <a class="btn btn-success my-2 my-sm-0" role="button" href="<?= site_url('auth/logout') ?>">
                <i class="fas fa-sign-out-alt mr-1"></i> Logout
              </a>
            </li>
          </ul>
        </div>
        <!-- selesai logout -->
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= site_url('dashboard') ?>" class="brand-link">
        <img src="<?= base_url() ?>uploads/web/iconweb1.svg" style="width:30px" class="img-circle elevation-3 ml-3 mr-1" style="opacity: 0.8" />
        <b class="brand-text font-weight-light"><b> ME</b>MINUM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image mt-1">
            <img src="<?= base_url() ?>uploads/user/user.png" alt="User Avatar" style="width:50px" class="img-circle elevation-2 ">
          </div>
          <div class="info">
            <a href="#" class="d-block">
              <b><?= ucfirst($this->fungsi->user_login()->nama) ?></b>
              <br><i class="fas fa-circle fa-xs text-success"></i> Online
              </br>
            </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">MAIN NAVIGATION</li>
            <!-- mulai dasbor -->
            <li class="nav-item ">
              <a href="<?= site_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : null ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!-- akhir dasbor -->

            <!-- mulai suplliers -->
            <li class="nav-item">
              <a href="<?= site_url('supplier') ?>" class="nav-link <?= $this->uri->segment(1) == 'supplier' ? 'active' : null ?>">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Supplier
                </p>
              </a>
            </li>
            <!-- akhir supplier -->

            <!-- awal customer -->
            <li class="nav-item">
              <a href="<?= site_url('customer') ?>" class="nav-link <?= $this->uri->segment(1) == 'customer' ? 'active' : null ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Customer
                </p>
              </a>
            </li>
            <!-- akhir customer -->


            <!-- Awal products -->
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="nav-item has-treeview <?php echo $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'menu-open' : null ?>">
                <a class="nav-link <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : null ?>">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= site_url('category') ?>" class="nav-link <?= $this->uri->segment(1) == 'category' ? 'active' : null ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Categories</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('unit') ?>" class="nav-link <?= $this->uri->segment(1) == 'unit' ? 'active' : null ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Units</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= site_url('item') ?>" class="nav-link <?= $this->uri->segment(1) == 'item' ? 'active' : null ?>">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Items</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>
            <!-- akhir product -->

            <!-- Awal Stock -->
            <li class="nav-item has-treeview <?php echo $this->uri->segment(1) == 'stock' ? 'menu-open' : null ?>">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'stock' ?: '' ?>">
                <i class="nav-icon fas fa-box-open"></i>
                <p>
                  Stocks
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="<?= site_url('stock/in') ?>" class="nav-link <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stock In</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('stock/out') ?>" class="nav-link <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stock Out</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Akhir Stock -->

            <!-- Awal Transactions -->
            <li class="nav-item <?php echo $this->uri->segment(1) == 'sale' ? 'menu-open' : null ?>">
              <a href="<?= site_url('sale') ?>" class="nav-link <?= $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Manual Transaction
                </p>
              </a>
            </li>
            <!-- Akhir Transaction -->

            <!-- Awal Report -->
            <li class="nav-item has-treeview <?php echo $this->uri->segment(1) == 'report' || $this->uri->segment(2) == 'sale' || $this->uri->segment(1) == 'simpan' || $this->uri->segment(2) == 'sale_alat'  ? 'menu-open' : null ?>">
              <a href="#" class="nav-link <?= $this->uri->segment(1) == 'report' || $this->uri->segment(2) == 'sale' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('report/sale') ?>" class="nav-link <?= $this->uri->segment(1) == 'report' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('simpan/sale_alat') ?>" class="nav-link <?= $this->uri->segment(1) == 'simpan' ? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sales Alat</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Akhir Report -->
            <!-- Awal Setting -->
            <?php if ($this->fungsi->user_login()->level == 1) { ?>
              <li class="nav-header">SETTING</li>
              <!-- Akhir Setting -->
              <!-- Awal User set -->
              <li class="nav-item">
                <a href="<?= site_url('user') ?>" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
            <?php } ?>
            <!-- Akhir User set -->

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2680.4px;">

      <?php echo $contents ?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      Developed by <strong> <a href="#">Nabila Hidayah</a> © 2021
      </strong>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- PAGE PLUGINS -->

  <!-- jQuery Mapael -->
  <script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- datepicker -->
  <script src="<?= base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Bootstrap datepicker JavaScript-->
  <script type="text/javascript">
    $(function() {
      $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
    });
  </script>
  <!-- END scripts Bootstrap datepicker JavaScript-->
  <!-- Flash data -->
  <script>
    //flash data success
    var flash = $('#flash').data('flash');
    if (flash) {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: flash,
        showConfirmButton: false,
        timer: 1500
      })
    }
    //end flash data
    //flash data hapus
    $(document).on('click', '#btn-hapus', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Yakin Menghapus?',
        text: "Data Akan Dihapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })
    //end flash data hapus
  </script>
  <!-- end flashdata -->
  <!-- datatables -->
  <script>
    $(document).ready(function() {
      $('#table1').DataTable()
    })
    $('.dropdown-menu').on('click', function(e) {
      e.stopPropagation();
    });
  </script>
  <!-- end datatables -->



</body>

</html>