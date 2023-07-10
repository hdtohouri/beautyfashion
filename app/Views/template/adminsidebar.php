
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <?php if(session('pic_profil')): ?>
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img class="avatar avatar-128 rounded-circle p-1"
                    src="<?php echo session('pic_profil'); ?>" height='175' alt="avatar"></div>
                
                <?php else: ?>
                    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom">
                    <img class="avatar avatar-128 rounded-circle p-1"
                    src="<?php echo base_url('img/user.webp')?>" height='175' alt="avatar"></div>
                <?php endif; ?> 
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/admindashboard') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="<?php echo base_url('common/admindashboard/adminparametre') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-user-cog me-2"></i>Parametre</a>
                <a href="<?php echo base_url('common/admindashboard/compteadmin') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-check-circle me-2"></i>Mon Compte</a>
                <a href="<?php echo base_url('common/admindashboard/list_user') ;?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Utilisateurs</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Reports</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                <a href="<?php echo base_url('common/admindashboard/adminproduit'); ?>" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Produits</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a>
                <a href="<?php echo base_url('common/logout'); ?>" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Deconnexion</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
