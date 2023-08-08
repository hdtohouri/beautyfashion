<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
        <?= view('admin/modal.php'); ?>
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
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Modal1" data-userid="<?= $user['user_id'] ?>">
                                    <i class="fas fa-user-slash me-2" data-toggle="tooltip" title="Desactiver ce compte"></i>
                                </button> 
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Modal2" data-userid="<?= $user['user_id'] ?>">
                                    <i class="fas fa-user me-2" data-toggle="tooltip" title="Activer ce compte"></i> 
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Modal3" data-userid="<?= $user['user_id'] ?>">
                                    <i class="fas fa-user-times" data-toggle="tooltip" title="Supprimer ce compte"></i> 
                                </button> 
                                 
                            </td>
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>
                
                
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php else: ?>                    
    <?php endif; ?>   
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>

</html>