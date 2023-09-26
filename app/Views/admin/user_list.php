<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
     <!--bootstrap-->
     <link rel="stylesheet" href="<?php echo base_url('css/dashboard.css'); ?>">
    
    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">

    <!--favicon-->
    <link rel="icon"  href="<?php echo base_url('favicon.ico'); ?>">
    <title>Beautyfashion</title>
</head>

<body>
    <?php if(session('logged_in')): ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php echo view('template/sidebar.php');?>
        <!-- /#sidebar-wrapper -->
        <?php echo view('template/container.php');?>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Liste des Utilisateurs</h3>
                    <div class="col">
                <table class="table table-success">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Etat du compte</th>
                        <th scope="col">Actions disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($liste_user as $user): ?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= strtoupper($user['full_name']) ?></td>
                            <td><?= strtoupper($user['user_name']) ?></td>
                            <td><?= $user['user_status'] ?></td>
                            <td> 
                                <button type="button" class="btn user-action-button" data-bs-toggle="modal" data-bs-target="#Modal1" data-userid="<?=$user['user_id'] ?>">
                                    <i class="fas fa-user-slash me-2" data-toggle="tooltip" title="Desactiver ce compte"></i>
                                </button> 
                                <button type="button" class="btn user-action-button" data-bs-toggle="modal" data-bs-target="#Modal2" data-userid="<?= $user['user_id'] ?>">
                                    <i class="fas fa-user me-2" data-toggle="tooltip" title="Activer ce compte"></i> 
                                </button>
                                <button type="button" class="btn user-action-button" data-bs-toggle="modal" data-bs-target="#Modal3" data-userid="<?= $user['user_id'] ?>">
                                    <i class="fas fa-user-times" data-toggle="tooltip" title="Supprimer ce compte"></i> 
                                </button> 
                                 
                            </td>
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>
                    <!-- Modal 1 Desactiver ce compte-->
                    <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Souhaitez vous désactiver ce compte ?
                                <h6>Cliquer Sur désactiver ou sur fermer pour annuler</h6>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="<?php echo base_url('common/admindashboard/list_user'); ?>">
                                    <div class="mb-4 form-group">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                        <input type="hidden" name="action" value="desactivate">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Désactiver"/>
                                </form>
                            </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal 2 Activer ce compte-->
                    <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Souhaitez vous activer ce compte ?
                                <h6>Cliquer Sur activer ou sur fermer pour annuler</h6>
                            </div>
                            <div class="modal-footer">
                                <form class="user" method="post" action="<?php echo base_url('common/admindashboard/list_user'); ?>">
                                    <div class="mb-4 form-group">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                        <input type="hidden" name="action" value="activate">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Activer"/>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal 3 Supprimer ce compte-->
                    <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Souhaitez vous supprimer ce compte ?
                                    <h6>Cliquer supprimer ou sur fermer pour annuler</h6>
                                </div>
                                <div class="modal-footer">
                                    <form class="user" method="post" action="<?php echo base_url('common/admindashboard/list_user'); ?>">
                                    <div class="mb-4 form-group">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                                        <input type="hidden" name="action" value="delete">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Supprimer"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php else: ?>                    
    <?php endif; ?>   
    <!-- /#page-content-wrapper -->
    </div>

    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    <script>
        $(document).ready(function() {
            $('.user-action-button').click(function() {
                var userId = $(this).data('userid'); // Récupère l'ID de l'utilisateur depuis le bouton cliqué

                // Met à jour la valeur de l'ID dans les modals
                $('#Modal1 input[name="user_id"]').val( );
                $('#Modal2 input[name="user_id"]').val(userId);
                $('#Modal3 input[name="user_id"]').val(userId);
            });
        });
    </script>

</body>

</html>