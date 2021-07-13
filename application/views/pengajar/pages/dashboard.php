<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Atas Nama</th>
                            <th>Mata Pelajaran</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<script>
    window.onload = () => {
        $(function() {
            $("#example1").DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [],

                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "ajax": {
                    url: "<?= site_url('pengajar/Dashboard/getPembayaran') ?>",
                    'responsive': true
                },
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    }
</script>