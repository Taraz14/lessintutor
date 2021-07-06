<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengajar</h3>
                <a href="<?= site_url('0/add/pengajar') ?>" class="btn btn-primary btn-sm" style="float:right"><i class="fa fa-user-plus"></i> Tambah Pengajar</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Aksi</th>
                            <th>Nama</th>
                            <th>Username(s)</th>
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
                "ajax": {
                    url: "<?= site_url('admin/Pengajar/getPengajar') ?>",
                    'responsive': true
                },
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    }
</script>