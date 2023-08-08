
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img class="avatar avatar-128 rounded-circle p-1"
                    src="<?php echo base_url("img/logo.png") ?>" alt ="logo" height='160'></div>

                <?php if(session('level')==='user'): ?>
            <div class="list-group list-group-flush my-3">
                <a href="<?php echo base_url('common/dashboard') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/dashboard/parametre') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-cog me-2"></i>Parametre</a>
                <a href="<?php echo base_url('common/dashboard/compte') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-check-circle me-2"></i>Mon Compte</a>
                <a href="<?php echo base_url('common/dashboard/stock') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-cart-arrow-down me-2"></i>Etat Stock </a>
                        <a href="<?php echo base_url('common/dashboard/rapports') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tasks me-2"></i>Rapports </a> 
                <a href="<?php echo base_url('common/dashboard/produit'); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Produits</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Rapports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Rapports</a>
                <a href="<?php echo base_url('common/logout'); ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Deconnexion</a>
            </div>
            <?php else: ?>
            <div class="list-group list-group-flush my-3">
                <a href="<?php echo base_url('common/admindashboard') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/admindashboard/adminparametre') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-cog me-2"></i>Parametre</a>
                <a href="<?php echo base_url('common/admindashboard/compteadmin') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-check-circle me-2"></i>Mon Compte</a>
                <a href="<?php echo base_url('common/admindashboard/list_user') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i> Utilisateurs </a>
                <a href="<?php echo base_url('common/admindashboard/list_user') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-cart-arrow-down me-2"></i> Etat Stock </a>
                <a href="<?php echo base_url('common/admindashboard/list_user') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Rapports </i></a>
                <a href="<?php echo base_url('common/admindashboard/adminproduit'); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Produits </a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Rapports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Rapports</a>
                <a href="<?php echo base_url('common/logout'); ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Deconnexion</a>
            </div>
        <?php endif; ?> 
        </div>
        <!-- /#sidebar-wrapper -->
