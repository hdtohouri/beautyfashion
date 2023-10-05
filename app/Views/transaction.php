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
            <?php echo view('template/container.php'); ?>
        </div>
        <?php

            if( isset($special_message) )
            echo $special_message;
        ?>
        <?php endif; ?>   
        <br>
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Liste des Articles En Stock</h3>
                    <div class="col">
                <table class="table table-success">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image Article</th>
                        <th scope="col">Nom Article</th>
                        <th scope="col">Prix Unitaire</th>
                        <th scope="col">Quantité en Stock</th>
                        <?php if(session('level')== "admin"): ?>
                        <th scope="col">Actions disponibles</th>
                        <?php endif; ?> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($liste_articles as $articles): ?>
                        <tr>
                            <td><?= ++$i ?></td>
                            <td><img src="<?= $articles->image_produit ?>" height="100" width="100" alt="image du produit"></td>
                            <td><?= strtoupper($articles->nom_produit) ?></td>
                            <td><?= $articles->prix_unitaire ?></td>
                            <td><?= $articles->quantité ?></td>
                            <?php if(session('level')== "admin"): ?>
                            <td>  
                            <button type="button" class="btn user-action-button edit-article-button" data-bs-toggle="modal" data-bs-target="#Modal1" data-articleid="<?=$articles->id_produit ?>">
                                <i class="far fa-edit me-2" data-toggle="tooltip" title="Editer cet article"></i>
                            </button> 

                            <button type="button" class="btn user-action-button delete-article-button" data-bs-toggle="modal" data-bs-target="#Modal2" data-articleid="<?= $articles->id_produit ?>">
                                <i class="fas fa-trash" data-toggle="tooltip" title="Supprimer cet article"></i> 
                            </button>

                                 
                            </td>
                            <?php endif; ?> 
                        </tr>
                        <?php endforeach; ?>
                       
                    </tbody>
                </table>               
    <!-- /#page-content-wrapper -->
    </div>

    <script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    
</body>

</html>


