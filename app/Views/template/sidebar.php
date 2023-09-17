
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img class="avatar avatar-128 rounded-circle p-1"
                    src="<?php echo base_url("img/logo.png") ?>" alt ="logo" height='160'></div>

                <?php if(session('level')==='user'): ?>
            <div class="list-group list-group-flush my-3">
                <a href="<?php echo base_url('common/dashboard') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/dashboard/parametre') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-cog text-primary me-2"></i>Parametre</a>
                <a href="<?php echo base_url('common/dashboard/compte') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-check-circle text-primary me-2"></i>Mon Compte</a>
                <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                        data-bs-toggle="collapse" href="#collap2" role="button" aria-expanded="false" aria-controls="collapseExample"><i
                        class="fab fa-shopify text-primary me-2"></i> Articles </a>
                        <div class="collapse" id="collap2">
                                <div class="card card-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                        class="fas fa-shopping-bag me-2"></i>Liste des Articles</a>
                                </div>
                        </div>
                <a href="<?php echo base_url('common/dashboard/stock') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-cart-arrow-down text-primary me-2"></i>Etat Stock </a>
                <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fab fa-shopify text-primary me-2"></i> Articles
                                </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Liste des Articles</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-basket me-2"></i>Ajouter Article</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="fas fa-cart-arrow-down text-primary me-2"></i> Commandes
                                </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Nouvelle Commande</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-basket me-2"></i>Liste des Commandes</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-cart-arrow-down text-primary me-2"></i> Etat Stock
                                </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Liste des Articles</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-basket me-2"></i>Ajouter Article</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fas fa-cart-arrow-down text-primary me-2"></i> Factures
                                </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Etablire une Facture</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-basket me-2"></i>Liste des Factures</a>
                                </div>
                        </div>
                        </div>
                </div>
                <a href="<?php echo base_url('common/logout'); ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Deconnexion</a>
            </div>
            <?php else: ?>
            <div class="list-group list-group-flush my-3">
                <a href="<?php echo base_url('common/admindashboard') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/admindashboard/adminparametre') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-cog text-primary me-2"></i>Parametre</a>
                <a href="<?php echo base_url('common/admindashboard/compteadmin') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-check-circle text-primary me-2"></i>Mon Compte</a>
                <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-users text-primary me-2"></i> Utilisateurs
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                                <a href="<?php echo base_url('common/admindashboard/list_user') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                        class="fas fa-users me-2"></i>Liste des Utilisateurs</a> <br>
                                <a href="<?php echo base_url('common/admindashboard/admin_add_users') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                        class="fas fa-user-plus me-2"></i>Ajouter Utilisateur</a>
                        </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fab fa-shopify text-primary me-2"></i> Articles
                                </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-gifts me-2"></i>Liste des Articles</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Ajouter Article</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="fas fa-wallet text-primary me-2"></i> Commandes
                                </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/admindashboard/commandes') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shipping-fast me-2"></i>Nouvelle Commande</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-truck me-2"></i>Liste des Commandes</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-chart-line text-primary me-2"></i> Etat Stock
                                </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-shopping-bag me-2"></i>Liste des Articles</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-shopping-basket me-2"></i>Ajouter Article</a>
                                </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed second-text fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fas fa-receipt text-primary me-2"></i> Factures
                                </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                        <a href="<?php echo base_url('common/articles') ;?>" class="bg-transparent second-text fw-bold mb-2 text-decoration-none"><i
                                                class="fas fa-paste me-2"></i>Etablire une Facture</a> <br>
                                        <a href="<?php echo base_url('common/articles/add_articles') ;?>" class="bg-transparent second-text fw-bold text-decoration-none"><i
                                                class="fas fa-file-alt me-2"></i>Liste des Factures</a>
                                </div>
                        </div>
                        </div>
                </div>
                <a href="<?php echo base_url('common/logout'); ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Deconnexion</a>
            </div>
        <?php endif; ?> 
        </div>
        <!-- /#sidebar-wrapper -->
