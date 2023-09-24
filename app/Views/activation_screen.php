<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    
    <!--bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">

    <!--favicon-->
    <link rel="icon"  href="<?php echo base_url('favicon.ico'); ?>">
    <title>Beautyfashion</title>
</head>

     
<body class="bg-info">
    
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-3">
                                    <div class="text-center">
                                    <?php if(isset($error_message)) : ?>
                                        <h1 class="h4 text-gray-900 mb-4">Activation du compte </h1>
                                        <div class="alert alert-danger"><?= $error_message ?></div>
                                    <?php else: ?>
                                        <div class="col-lg-6 d-none d-lg-block bg-login-image"> <img src="<?php echo base_url('img/validation.gif'); ?>" alt=""></div>
                                        <h5 class="alert alert-success">Votre compte a été activé</h5>
                                    <?php endif; ?>
                                        <?php
                                        if( isset($validation) )
                                            echo "<div style='color: #ff0000'>".$validation->listErrors()."</div>";

                                        if( isset($special_message) )
                                            echo $special_message;
                                        ?>
                                    </div>
                                    
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('common/login'); ?>">Se Connecter</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
