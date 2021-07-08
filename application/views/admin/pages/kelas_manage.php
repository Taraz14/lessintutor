<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Kelas dan Pengajar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= site_url('admin/KelasManage/saveKelasAjar') ?>" method="post">
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="tingkat">Tingkat</label>
                                    <select class="form-control" name="tingkat" id="tingkat">
                                        <option hidden>-- Pilih Tingkatan --</option>
                                        <?php foreach ($tingkatan as $val) : ?>
                                            <option value="<?= $val->id ?>"><?= $val->tingkat ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <select class="form-control" name="mapel" id="mapel">
                                        <option hidden>-- Pilih Mata Pelajaran --</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pengajar">Pengajar</label>
                                    <select class="form-control" name="pengajar" id="pengajar">
                                        <?php foreach ($pengajar as $val) : ?>
                                            <option value="<?= $val->id ?>"><?= $val->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Kelas dan Pengajar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <table class="table table-bordered" width="100%">
                            <thead>
                                <th>Aksi</th>
                                <th>Nama Pengajar</th>
                                <th>Tingkatan</th>
                                <th>Mata Pelajaran</th>
                            </thead>
                            <tbody>

                                <?php foreach ($getKP as $val) : ?>
                                    <tr>
                                        <td><a href="#"><a class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></a></td>
                                        <td><?= $val->nama ?></td>
                                        <td><?= $val->tingkat ?></td>
                                        <td><?= $val->mapelname ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script>
    window.onload = () => {
        $("#tingkat").change(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/KelasManage/getMapelTrigger') ?>",
                data: {
                    id: id
                },
                async: true,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_mapel + '>' + data[i].mapelname + '</option>';
                    }
                    $('#mapel').html(html);
                }
            });

            return false;
        });
    }
</script>