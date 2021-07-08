<section class="team2 cid-sBMvywo3Id" xmlns="http://www.w3.org/1999/html" id="team2-3d">


    <div class="container">
        <?php foreach ($pengajar as $val) : ?>
            <div class="card">
                <div class="card-wrapper">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <div class="image-wrapper">
                                <img src="<?= base_url() ?>assets/home/images/team1.jpg" alt="Mobirise">
                            </div>
                        </div>
                        <div class="col-12 col-md">
                            <form action="<?= site_url('home/sd/getKontrak') ?>" method="post">
                                <input type="hidden" name="id_pengajar" value="<?= $val->id_user ?>">
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id'); ?>">
                                <input type="hidden" name="id_mapel" value="<?= $val->id_mapel ?>">
                                <div class="card-box">
                                    <h5 class="card-title mbr-fonts-style m-0 display-5">
                                        <strong><?= $val->nama ?></strong>
                                    </h5>
                                    <h6 class="mbr-fonts-style mb-3 display-4">
                                        <strong><?= $val->rolename ?></strong>
                                    </h6>
                                    <p class="mbr-text mbr-fonts-style display-7">
                                        Themes in the Mobirise website builder offer multiple blocks: intros, sliders,
                                        galleries, forms, articles, and so on. Start a project and click on the red plus buttons
                                        to see the blocks available for your theme.
                                    </p>
                                    <div class="social-row display-7">
                                        <div class="soc-item">
                                            <a href="https://www.facebook.com/Mobirise/" target="_blank">
                                                <span class="mbr-iconfont socicon socicon-facebook"></span>
                                            </a>
                                        </div>
                                        <div class="soc-item">
                                            <a href="https://twitter.com/mobirise" target="_blank">
                                                <span class="mbr-iconfont socicon socicon-twitter"></span>
                                            </a>
                                        </div>
                                        <div class="soc-item">
                                            <a href="https://instagram.com/mobirise" target="_blank">
                                                <span class="mbr-iconfont socicon socicon-instagram"></span>
                                            </a>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">
                                                Kontrak
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>