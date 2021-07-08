<section class="gallery3 cid-sAW74Rr42t" id="gallery3-26">


    <div class="container-fluid">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Mata Pelajaran SMA</strong></h4>

        </div>
        <div class="row mt-4">
            <?php foreach ($getKelasSma as $val) : ?>
                <div class="item features-image сol-12 col-md-6 col-lg-4">
                    <div class="item-wrapper">
                        <div class="item-img">
                            <img src="<?= base_url() ?>assets/home/images/mtk-a-500x500.jpg" alt="">
                        </div>
                        <div class="item-content">
                            <h5 class="item-title mbr-fonts-style display-7"><strong><?= $val->mapelname ?></strong></h5>


                        </div>
                        <div class="mbr-section-btn item-footer mt-2"><a href="<?= site_url('smp/mapel/') . $val->id_mapel; ?>" class="btn btn-primary item-btn display-7"><span class="mobi-mbri mobi-mbri-touch mbr-iconfont mbr-iconfont-btn"></span>Lanjut</a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>