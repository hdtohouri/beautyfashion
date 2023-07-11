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
            if( isset($validation) )
            echo "<div style='color: #ff0000'>".$validation->getErrors()."</div>";

            if( isset($special_message) )
            echo $special_message;
        ?>
        <br>
        
    <div class="row ">
        <div class="col-lg-10">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="container my-3">
                    <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="d-flex justify-content-center mb-2">
                                <h5 class="mb-0">Mes informations</h5>
                        </div>
                        <hr>
                        <div class="col-sm-3">
                            <p class="mb-0">Nom Complet </p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><strong><?php echo session('full_name'); ?></strong></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Adresse Email :</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0 text-lowercase"><strong><?php echo session('email_address'); ?></strong></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Contact :</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><strong><?php echo session('user_number'); ?></strong></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Addresse :</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><strong><?php echo session('user_adress'); ?></strong></p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-2">
                                <h5 class="mb-0">Modifier mes informations</h5>
                            </div>
                            
                                <a href="<?php echo base_url("common/dashboard/parametre")?>" class="nav-link text-dark">
                                            <i class="fas fa-plus-circle mr-3 text-primary fa-fw"></i>
                                            Clicker Ici pour modifier vos Informations!
                                </a>
                                <a href="<?php echo base_url("common/dashboard/update_password")?>" class="nav-link text-dark">
                                            <i class="fas fa-plus-circle mr-3 text-primary fa-fw"></i>
                                            Clicker Ici pour modifier Mot de passe!
                                </a>
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