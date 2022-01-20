<!-- Content Header (Page header) -->
<section class="content">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sales Report
                        <small>(Laporan Penjualan)</small>
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
                    <h3 class="card-title">Data Penjualan</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-hover text-nowrap" id="table1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Invoice</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td style="width:5%;"><?= $no++ ?>.</td>
                                    <td><?= $data->invoice ?></td>
                                    <td><?= indo_date($data->date) ?></td>
                                    <td><?= $data->customer_id == null ? "Umum" : $data->customer_name ?></td>
                                    <td><?= indo_currency($data->total_price) ?></td>
                                    <td><?= indo_currency($data->discount) ?></td>
                                    <td><?= indo_currency($data->final_price) ?></td>
                                    <td class="text-center" width="200px">
                                        <button id="set_dtl" data-target="#modal-detail" data-toggle="modal" class="btn btn-default btn-xs" data-invoice="<?= $data->invoice ?>" data-date="<?= indo_date($data->date) ?>" data-time="<?= substr($data->sale_created, 11, 5) ?>" data-customer="<?= $data->customer_id == null ? "Umum" : $data->customer_name ?>" data-total="<?= indo_currency($data->total_price) ?>" data-discount="<?= indo_currency($data->discount) ?>" data-grandtotal="<?= indo_currency($data->final_price) ?>" data-cash="<?= indo_currency($data->cash) ?>" data-remaining="<?= indo_currency($data->remaining) ?>" data-note="<?= $data->note ?>" data-cashier="<?= ucfirst($data->user_name) ?>" data-saleid="<?= $data->sale_id ?>">
                                            <i class="fas fa-eye"></i> Detail
                                        </button>
                                        <a href="<?= site_url('sale/cetak/' . $data->sale_id) ?>" target="_blank" class="btn btn-info btn-xs">
                                            <i class="fas fa-print"></i> Print
                                        </a>
                                        <?php if ($this->fungsi->user_login()->level == 1) { ?>
                                            <a href="<?= site_url('sale/del/' . $data->sale_id) ?>" id="btn-hapus" class="btn btn-danger btn-xs">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        <?php } ?>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sales Report Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="width:20%">Invoice</th>
                                <td style="width:30%"><span id="invoice"></span></td>
                                <th style="width:20%">Customer</th>
                                <td style="width:30%"><span id="cust"></span></td>
                            </tr>
                            <tr>
                                <th>Date Time</th>
                                <td><span id="datetime"></span></td>
                                <th>Cashier</th>
                                <td><span id="cashier"></span></td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><span id="total"></alspan>
                                </td>
                                <th>Cash</th>
                                <td><span id="cash"></span></td>
                            </tr>
                            <tr>
                                <th>Discount</th>
                                <td><span id="discount"></span></td>
                                <th>Change</th>
                                <td><span id="change"></span></td>
                            </tr>
                            <tr>
                                <th>Grand Total</th>
                                <td><span id="grandtotal"></span></td>
                                <th>Note</th>
                                <td><span id="note"></span></td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td colspan="3"><span id="product"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script>
        $(document).on('click', '#set_dtl', function() {
            $('#invoice').text($(this).data('invoice'))
            $('#cust').text($(this).data('customer'))
            $('#datetime').text($(this).data('date') + ' ' + $(this).data('time'))
            $('#total').text($(this).data('total'))
            $('#discount').text($(this).data('discount'))
            $('#cash').text($(this).data('cash'))
            $('#change').text($(this).data('remaining'))
            $('#grandtotal').text($(this).data('grandtotal'))
            $('#note').text($(this).data('note'))
            $('#cashier').text($(this).data('cashier'))

            var product = '<table class="table no-margin">'
            product += '<tr><th>Item</th><th>Price</th><th>Qty</th><th>Disc</th><th>Total</th></tr>'
            $.getJSON('<?= site_url('report/sale_product/') ?>' + $(this).data('saleid'), function(data) {
                $.each(data, function(key, val) {
                    product += '<tr><td>' + val.nama + '</td><td>' + val.detail_price + '</td><td>' + val.qty + '</td><td>' + val.discount_item + '</td><td>' + val.total + '</td></tr>'
                })
                product += '</table>'
                $('#product').html(product)
            })
        })
    </script>