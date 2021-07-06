  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= site_url() ?>" class="brand-link">
          <img src="<?= base_url() ?>assets/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Lessin Tutor</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?= $profile->foto == NULL ? base_url('assets/uploads/noimage.jpeg') : $profile->foto; ?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <span class="d-block"><?= $profile->nama ?></span>
              </div>
          </div>

          <?php if ($profile->role == 99) : ?>
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= site_url('profile') ?>" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Profile
                              </p>
                          </a>
                      </li>
                      <li class="nav-header">Management</li>

                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-users"></i>
                              <p>
                                  User Management
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= site_url('0/pengajar') ?>" class="nav-link <?= $this->uri->segment(2) == 'pengajar' ? 'active' : '' ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Pengajar</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= site_url('0/siswa') ?>" class="nav-link <?= $this->uri->segment(2) == 'siswa' ? 'active' : '' ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Siswa</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-header">Verifikasi Data Transaksi</li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-dollar-sign"></i>
                              <p>
                                  Data Transaksi
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= site_url('0/pembayaran') ?>" class="nav-link <?= $this->uri->segment(2) == 'pembayaran' ? 'active' : '' ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Proses Pembayaran</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="<?= site_url('0/refund') ?>" class="nav-link <?= $this->uri->segment(2) == 'refund' ? 'active' : '' ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Refund Pembayaran</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-header">Menu Lain</li>

                      <li class="nav-item">
                          <a href="<?= site_url('logout') ?>" class="nav-link">
                              <i class="nav-icon fas fa-sign-out-alt"></i>
                              <p>
                                  Logout
                              </p>
                          </a>
                      </li>

                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          <?php endif;
            if ($this->session->userdata('role') == 88) :
            ?>
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= site_url('profile') ?>" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Profile
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?= site_url('1/konfirmasi') ?>" class="nav-link <?= $this->uri->segment(2) == 'konfirmasi' ? 'active' : '' ?>">
                              <i class="nav-icon fas fa-dollar-sign"></i>
                              <p>
                                  Konfirmasi Pembayaran
                              </p>
                          </a>
                      </li>
                      <li class="nav-header">Menu Lain</li>

                      <li class="nav-item">
                          <a href="<?= site_url('logout') ?>" class="nav-link">
                              <i class="nav-icon fas fa-sign-out-alt"></i>
                              <p>
                                  Logout
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          <?php endif;
            if ($this->session->userdata('role') == 77) :
            ?>
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item">
                          <a href="<?= site_url('profile') ?>" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                              <i class="nav-icon fas fa-user"></i>
                              <p>
                                  Profile
                              </p>
                          </a>
                      </li>
                      <li class="nav-header">Menu Lain</li>

                      <li class="nav-item">
                          <a href="<?= site_url('logout') ?>" class="nav-link">
                              <i class="nav-icon fas fa-sign-out-alt"></i>
                              <p>
                                  Logout
                              </p>
                          </a>
                      </li>
                  </ul>
              </nav>
              <!-- /.sidebar-menu -->
          <?php endif; ?>
      </div>
      <!-- /.sidebar -->
  </aside>