
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle second-text fw-bold" id="navbarDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2" aria-hidden="true"></i> <?php echo strtoupper(session('user_name')); ?>
                        </button>
                       
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(session('level')=== 'users'):?>
                                <li><a class="dropdown-item" href="<?php echo base_url('common/dashboard/parametre') ;?>">Parametre</a></li>
                                <?php else: ?>
                                <li><a class="dropdown-item" href="<?php echo base_url('common/admindashboard/adminparametre') ;?>">Parametre</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('common/logout'); ?>">Deconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"> <?php ?></h3>
                                <p class="fs-5">Articles</p>
                            </div>
                            <i class="fas fa-shopping-cart fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4920</h3>
                                <p class="fs-5">Ventes</p>
                            </div>
                            <i
                                class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Profit</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">2500</h3>
                                <p class="fs-5">Revenu</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
