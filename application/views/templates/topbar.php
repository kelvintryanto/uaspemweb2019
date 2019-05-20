    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item Cart -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <?php
                        //Check data belanjaan ada atau tidak
                        $cart_check = $this->cart->contents();
                        ?>
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter"><?= $this->cart->total_items(); ?></span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Cart Item
                            </h6>
                            <?php if (empty($cart_check)) { ?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Cart Empty</a>
                            <?php
                        } else {
                            $total_price = $this->cart->total();
                            // tampilkan data belanja
                            foreach ($cart_check as $cart) {
                                ?>
                                    <a class="dropdown-item d-flex align-items-center" href="">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="<?= base_url('assets/img/item/') . $cart['image']; ?>" alt="">
                                            <div class="status-indicator bg-success"></div>
                                        </div>
                                        <div class="font-weight-bold">
                                            <div class="text-truncate"><?= $cart['name']; ?></div>
                                            <div class="small text-gray-500"><?= $cart['qty'] . "x Rp " . number_format($cart['price'], 0, ',', '.') ?></div>
                                        </div>
                                    </a>
                                <?php
                            } //ini tutup foreach
                            ?>
                                <p class="dropdown-item text-right small text-gray-500"> Total <?= "Rp " . number_format($total_price, 0, ',', '.'); ?> </p>

                                <div class="row">
                                    <div class="col-sm-6 pr-0">
                                        <a class="dropdown-item text-center small text-gray-500" href="#"><i class="fas fa-fw fa-shopping-cart"></i> View Cart</a>
                                    </div>
                                    <div class="col-sm-6 pl-0">
                                        <a class="dropdown-item text-center small text-gray-500" href="#"><i class="far fa-credit-card"></i> Check Out</a>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ini tutup else -->
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username'] ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="<?= base_url('user') ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                            </a>
                            <a class="dropdown-item" href="<?= base_url('user/editprofile') ?>">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Edit Profile
                            </a>
                            <a class="dropdown-item" href="<?= base_url('user/changepassword') ?>">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                Change Password
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('auth/logout') ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->