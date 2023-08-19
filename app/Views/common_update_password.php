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
        <br>
        
        <div class="row ">
            <div class="col-lg-10">
                <div class="card mb-4">
                    <div class="card-body">
                    <div class="container my-3">
                        <form class="user" method="post" action="<?= base_url('common/dashboard/update_password') ?>" autocomplete="off">               
                            <div class="mb-4">
                                <label for="password1" class="form-label">Nouveau mot de passe</label>
                                <input type="password"  class="form-control" name="password1" id="password1" placeholder="Entrer le nouveau password"/>
                                <?php  if (isset($validation) && $validation->hasError('password1')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('password1')."</div>";
                                } ?>
                            </div>
                            <div class="mb-4">
                                <label for="password2" class="form-label">Ressaisir le nouveau password</label>
                                <input type="password"  class="form-control" name="password2" id="password2" placeholder="Ressaisir le nouveau password"/>
                                <?php  if (isset($validation) && $validation->hasError('password2')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('password2')."</div>";
                                } ?>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Enregistrer" />
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