<section class="menu menu2 cid-sAQnV185uk" once="menu" id="menu2-11">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="<?= site_url() ?>">
                            <img src="<?= base_url() ?>assets/home/images/screenshot-3-removebg-preview.png" alt="Mobirise" style="height: 8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="<?= site_url('home') ?>">LESSIN TUTOR</a></span>
                </div>
            <?php } else { ?>
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="<?= site_url() ?>">
                            <img src="<?= base_url() ?>assets/home/images/screenshot-3-removebg-preview.png" alt="Mobirise" style="height: 8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-7" href="<?= site_url('home') ?>">LESSIN TUTOR</a></span>
                </div>
            <?php } ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url('sd') ?>">SD</a></li>

                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url('smp') ?>">SMP</a></li>

                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url('sma') ?>">SMA</a></li>


                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url() ?>#footer6-p">Alamat</a></li>

                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url() ?>#team1-9">Tentang Kami</a></li>

                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="<?= site_url() ?>#form3-e">Hubungi Kami</a></li>

                    <?php if ($this->session->userdata('logged_in')) { ?>
                        <li class="nav-item" style="background-color: palegoldenrod;">
                            <a class="nav-link link text-black text-primary display-4" href="<?= site_url('2/pengajar') ?>"><?= $profile->username ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item" style="background-color: palegoldenrod;">
                            <a class="nav-link link text-black text-primary display-4" href="<?= site_url('login') ?>">Login</a>
                        </li>
                    <?php } ?>

                </ul>

                <div class="icons-menu">
                    <a href="https://instagram.com/lessin.tutor.soq" target="_blank"><span class="p-2 mbr-iconfont socicon-instagram socicon" style="color: rgb(0, 0, 0); fill: rgb(0, 0, 0); font-size: 25px;"></span></a>
                </div>

            </div>
        </div>
    </nav>
</section>