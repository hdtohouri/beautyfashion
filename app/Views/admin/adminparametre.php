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
        <?php echo view('template/sidebar.php');?>
        <!-- /#sidebar-wrapper -->
        <?php echo view('template/container.php');?>
        <?php

            if( isset($special_message) )
            echo $special_message;
        ?>
        <br>
        
    <div class="row ">
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-body">
                <div class="container my-3">
                    <form class="user" method="post" action="<?= base_url('common/admindashboard/adminparametre') ?>" enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-4">
                            <i class="fas fa-camera"></i>
                            <label for="image" class="form-label">Photo de Profil</label>
                            <input class="form-control" type="file" name="file">
                            <?php  if (isset($validation) && $validation->hasError('file')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('file')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="form-label">Numero de Téléphone</label>
                            <input type="tel"  class="form-control" name="number" placeholder="Veuillez saisir votre Numero au format +212658749622"/>
                            <?php  if (isset($validation) && $validation->hasError('number')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('number')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="form-label">Nom Complet</label>
                            <input type="text"  class="form-control" name="fullname" placeholder="Veuillez saisir votre nom complet"/>
                            <?php  if (isset($validation) && $validation->hasError('fullname')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('fullname')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="image" class="form-label">Adresse Email</label>
                            <input type="email" class="form-control form-control-user" name="email" placeholder="Veuillez saisir votre adresse email"/>
                            <?php  if (isset($validation) && $validation->hasError('email')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('email')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4 form-group">
                            <label for="image" class="form-label">Lieu de résidence</label>
                            <input type="text" class="form-control form-control-user" name="adress" placeholder="Veuillez saisir votre adresse de résidence" />
                            <?php  if (isset($validation) && $validation->hasError('adress')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('adress')."</div>";
                            } ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Enregistrer"/>
                    </form>
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