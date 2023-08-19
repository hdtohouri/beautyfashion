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
                    <form class="user" method="post" action="<?= base_url('common/articles/add_articles') ?>" enctype="multipart/form-data" autocomplete="off">

                        <div class="mb-4 form-group">
                            <label for="category_article"></label>
                            <select name="category_article" id="category_article">
                                <option value="">--Veuillez Selectionner la categorie--</option>             
                            </select>
                        </div>                     
                        <div class="mb-4">
                            <label for="Nom_article" class="form-label">Nom Article</label>
                            <input type="text"  class="form-control" name="Nom_article" placeholder="Veuillez saisir le nom de l'article"/>
                            <?php  if (isset($validation) && $validation->hasError('Nom_article')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('Nom_article')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4">
                            <label for="file" class="form-label">Image Article</label>
                            <input type="file"  class="form-control" name="file" placeholder="Veuillez selectionner l'image"/>
                            <?php  if (isset($validation) && $validation->hasError('file')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('file')."</div>";
                            } ?>
                        </div>
                        <div class="mb-4">
                            <label for="quantité_article" class="form-label">Quantité Article</label>
                            <input type="number"  class="form-control" name="quantité_article" placeholder="Veuillez saisir la quantité de l'article"/>
                            <?php  if (isset($validation) && $validation->hasError('quantité_article')) {
                                    echo "<div style='color: #ff0000'>".$validation->getError('quantité_article')."</div>";
                            } ?>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Ajouter L'article"/>
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