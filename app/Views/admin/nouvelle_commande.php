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
        <?php

            if( isset($special_message) )
            echo $special_message;
        ?>
        <?php endif; ?>   
        <br>
        
    <div class="row ">
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-body">
                <div class="container my-3">
                    <h3 class="fs-4 mb-3">Ajouter une commande</h3>
                    <form class="user" method="post" action="<?= base_url('common/admindashboard/commandes') ?>" enctype="multipart/form-data" autocomplete="off">
                
                        <div class="mb-4">
                            <label for="category_article" class="form-label"></label>
                            <select class="form-select" name="category_article" id="category_article">
                                <option selected> ------ Veuillez Selectionner l'article ------ </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div> 
                         
                        <div class="mb-4">
                            <label for="prix" class="form-label">Prix de l'article</label>
                            <input type="numeric"  class="form-control" name="prix" placeholder="Prix unitaire de l'article"/>
                            <?php  if (isset($validation) && $validation->hasError('prix')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('prix')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4">
                            <label for="Quantité" class="form-label">Quantité </label>
                            <input type="numeric"  class="form-control" name="Quantité" placeholder="Veuillez saisir la quantité"/>
                            <?php  if (isset($validation) && $validation->hasError('Quantité')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('Quantité')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="Total" class="form-label">Montant Total</label>
                            <input type="numeric" class="form-control form-control-user" name="Total" placeholder="Total à payer"/>
                            <?php  if (isset($validation) && $validation->hasError('Total')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('Total')."</div>";
                            } ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Creer la commande"/>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper -->
    </div>

    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>