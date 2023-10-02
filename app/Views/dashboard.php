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
    <?php if(session('logged_in') && session('level')=='user'): ?>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <?php echo view('template/sidebar.php');?>
              
            <!-- /#sidebar-wrapper -->
            <?php echo view('template/container.php');?>
        </div>
    <div class="row my-5">
    <div class="container-fluid px-5">
        <div class="row g-3 my-2">
            <div class="col-md-12">
                    <h3 class="fs-4 mb-3">Commandes Recente</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; foreach($commandes_liste as $commandes): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= strtoupper($commandes->nom_produit) ?></td>
                                    <td><?= $commandes->quantité_article ?></td> 
                                    <td><?= $commandes->total ?></td> 
                                    <td><?= date('d-m-Y H:i', strtotime($commandes->update_at))   ?> </td> 
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


