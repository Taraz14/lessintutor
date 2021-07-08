<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Mata Pelajaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= site_url('admin/KelasManage/insertMapel') ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tingkat">Tingkat</label>
                                    <select class="form-control" name="tingkat">
                                        <?php foreach ($tingkatan as $val) : ?>
                                            <option value="<?= $val->id ?>"><?= $val->tingkat; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <input type="text" class="form-control" name="mapel">
                                </div>
                            </div>
                            <hr />
                            <table class="table table-border nowrap" width="100%">
                                <thead>
                                    <th>Tingkatan</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($mapel as $val) : ?>
                                        <tr>
                                            <td><?= $val->tingkat ?></td>
                                            <td><?= $val->mapelname ?></td>
                                            <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>