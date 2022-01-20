<!-- Content Header (Page header) -->
<section class="content">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
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
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Items</span>
              <span class="info-box-number">
                <?= $this->fungsi->count_item() ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Suppliers</span>
              <span class="info-box-number">
                <?= $this->fungsi->count_supplier() ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Pengeluaran</span>
              <span class="info-box-number">
                <?php echo indo_currency($this->dashboard_m->total_pengeluaran()->total_pengeluaran) ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Seluruh Profit</span>
              <span class="info-box-number">
                <?php echo indo_currency($this->dashboard_m->total_transaksi()->total_profit) ?>
              </span>
            </div>


            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- END INFO BOX -->
      <!-- Menmpilkan data by Tanggal pake DATEPICKER -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Filter Tanggal</h3>
        </div>
        <div class="card-body">
          <div class="col-lg-10">
            <form action="<?php echo base_url(); ?>dashboard/tanggalFilter" method="post">
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tanggal Awal</label>
                <div class="col-sm-10">
                  <input placeholder="YYYY-MM-DD" type="text" class="form-control datepicker" name="tanggalAwal">
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-10">
                  <input placeholder="YYYY-MM-DD" type="text" class="form-control datepicker" name="tanggalAkhir">
                </div>
              </div>

              <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                  <input type="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End-script Menmpilkan data by tanggal pake DATEPICKER -->

      <!-- awal chart -->
      <!-- BAR CHART -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Paling Laku Bulan Ini</h3>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="PalingLakuBulanIni" width="200" height="100" style="min-height: 300px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>

          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- akhir chart -->

      <!-- /.row -->
    </div>
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  <!-- ChartJS -->
  <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

  <!-- test chart -->


  <!-- chart -->
  <script>
    // mulai chartlarisbulanini
    var ctx = document.getElementById("PalingLakuBulanIni").getContext('2d');
    var mychart = new Chart(ctx, {
      type: 'bar',
      options: {
        responsive: true,
        scales: {
          yAxes: [{
            ticks: {
              type: 'linear',
              grace: '5%',
              beginAtZero: true
            }
          }]
        }
      },
      data: {
        labels: [<?php
                  if (count($laris) > 0) {
                    foreach ($laris as $val) {
                      echo "'" . $val->nama . "',";
                    }
                  } ?>],
        datasets: [{
          label: 'Paling Laris',
          data: [<?php
                  if (count($laris) > 0) {
                    foreach ($laris as $val) {
                      echo "'" . $val->sold . "',";
                    }
                  } ?>],
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          borderWidth: 1
        }]
      },
    });
    // akhir chartlarisbulanini
  </script>
  <!-- end chart -->