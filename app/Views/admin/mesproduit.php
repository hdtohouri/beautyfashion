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
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Liste des produits</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Produit</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Acheté Par</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$1200</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                    <td>Jonny</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                    <td>Jonny</td>
                                </tr>
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