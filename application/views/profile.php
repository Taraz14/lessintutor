<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= site_url('') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="false" value="<?= $profile->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $profile->username ?>" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= $profile->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="" value="<?= $profile->tanggal_lahir ?>">
                            </div>
                            <div class="form-group">
                                <label for="norek">No Rek.</label>
                                <input type="text" class="form-control" id="norek" name="norek" placeholder="Nomor Rekening" value="<?= $profile->no_rek ?>">
                            </div>
                            <div class="form-group">
                                <label for="nohp">No HP.</label>
                                <input type="text" class="form-control" id="norek" name="nohp" placeholder="08123456789" value="<?= $profile->no_hp ?>">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.card-body -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Klik pada foto untuk mengganti</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group" align="center">
                            <img class="profile-user-img img-responsive img-circle prof" src="<?= $profile->foto == NULL ? base_url('assets/uploads/noimage.jpeg') : $profile->foto; ?>" alt="User profile picture" onClick="triggerClick()" style="cursor:pointer; width:50%" id="profileDisplay">
                            <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" value="<?= $profile->foto; ?>">
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Alamat Pengguna</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat"><?= $profile->alamat ?></textarea>
                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                </form>
                <!-- /.card -->


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (right) -->

</section>
<script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>