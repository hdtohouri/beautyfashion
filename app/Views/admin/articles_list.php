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
                    <!-- Modal 1 Modifier ce produit-->
                    <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5>Souhaitez vous éditer cet article ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo base_url('common/articles'); ?>" enctype="multipart/form-data">
                                    <div class="mb-4">
                                        <label for="Nom_article" class="form-label">Nom Article</label>
                                        <input type="text"  class="form-control" name="Nom_article" placeholder="<?=$articles->id_produit ?>"/>
                                        <?php  if (isset($validation) && $validation->hasError('Nom_article')) {
                                                echo "<div style='color: #ff0000'>".$validation->getError('Nom_article')."</div>";
                                        } ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="file" class="form-label">Image de l'Article</label>
                                        <input type="file"  class="form-control" name="file" placeholder="Veuillez selectionner l'image"/>
                                        <?php  if (isset($validation) && $validation->hasError('file')) {
                                                echo "<div style='color: #ff0000'>".$validation->getError('file')."</div>";
                                        } ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="prix_unitaire" class="form-label">Prix unitaire</label>
                                        <input type="number"  class="form-control" min="1" name="prix_unitaire" placeholder="Veuillez saisir le prix unitaire de l'article"/>
                                        <?php  if (isset($validation) && $validation->hasError('prix_unitaire')) {
                                                echo "<div style='color: #ff0000'>".$validation->getError('prix_unitaire')."</div>";
                                        } ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="quantité_article" class="form-label">Quantité de l'Article</label>
                                        <input type="number" min="1" class="form-control" name="quantité_article" placeholder="Veuillez saisir la quantité de l'article"/>
                                        <?php  if (isset($validation) && $validation->hasError('quantité_article')) {
                                                echo "<div style='color: #ff0000'>".$validation->getError('quantité_article')."</div>";
                                        } ?>
                                    </div>
                                    <div class="mb-4 form-group">
                                        <input type="hidden" name="id_produit" value="<?= $articles->id_produit ?>">
                                        <input type="hidden" name="action" value="editer">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Editer l'Article"/>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal 2 Supprimer ce produit-->
                    <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5>Souhaitez vous supprimer cet article ?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <h6>Cliquer Sur supprimer ou sur fermer pour annuler</h6>
                            </div>
                            <div class="modal-footer">
                                <form class="user" method="post" action="<?php echo base_url('common/articles'); ?>">
                                    <div class="mb-4 form-group">
                                        <input type="hidden" name="id_produit" value="<?= $articles->id_produit ?>">
                                        <input type="hidden" name="action" value="supprimer">
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
            // Pour le modal d'édition
            $('.edit-article-button').click(function() {
                var articleId = $(this).data('articleid');
                $('#Modal1 input[name="id_produit"]').val(articleId);
            });

            // Pour le modal de suppression
            $('.delete-article-button').click(function() {
                var articleId = $(this).data('articleid');
                $('#Modal2 input[name="id_produit"]').val(articleId);
            });
        });
    </script>
</body>

</html>