<?php include('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Catálogo</title>
</head>

<body>

    <div class="header">
        <nav class="navbar navbar-expand-lg  bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <h3>Market Pulse</h3>
                </a>
            </div>
        </nav>
        <div class="inner-header flex">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="container">

                            <!--Listados de MARCAS-->
                            <?php
                            //Se redujo la consulta a 4 registros para realizar un test
                            $sql_brand = "SELECT DISTINCT brand FROM catalogo LIMIT 4";
                            $brand_results = mysqli_query($conn, $sql_brand);

                            while ($show_brand = mysqli_fetch_array($brand_results)) {
                            ?>
                                <div class="faq-drawer">
                                    <input class="faq-drawer__trigger" id="faq-drawer<?php echo $show_brand['brand'] ?>" type="checkbox" /><label class="faq-drawer__title" for="faq-drawer<?php echo $show_brand['brand'] ?>"><?php echo $show_brand['brand'] ?></label>
                                    <div class="faq-drawer__content-wrapper">

                                        <div class="faq-drawer__content">
                                            <ul>
                                                <!--Listado de MODELOS X MARCA-->
                                                <?php
                                                //Se redujo la consulta a 3 registros para realizar el test
                                                $sql_model = "SELECT * FROM catalogo WHERE brand = '" . $show_brand['brand'] . "' LIMIT 3";
                                                $model_results = mysqli_query($conn, $sql_model);
                                                while ($show_model = mysqli_fetch_array($model_results)) {


                                                ?>
                                                    <li><a class="btn-modal" href="#"><?php echo $show_model['model'] ?></a></li>

                                                    <!-- Modal -->
                                                    <!--Todavia falta cambiar el TAG del modal para q muestre el producto q corresponde-->
                                                    <div class="modal">
                                                        <div class="modal-contenido">
                                                            <span class="close modal__button modal__button--no">&times;</span>
                                                            <h3 class="modal__title"><?php echo $show_model['model'] ?></h3>
                                                            <p class="modal__text">
                                                                <?php echo $show_model['product_name'] ?>
                                                            </p>
                                                            <p class="modal__text">
                                                              Memory: <?php echo $show_model['memory'] ?> </br>
                                                              Display Resolution: <?php echo $show_model['display_resolution'] ?>
                                                            </p>
                                                        </div>
                                                    </div>


                                                <?php } ?>
                                                <!--Listado de MODELOS X MARCA-->
                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                            <!--Listados de MARCAS-->



                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="./assets/img/phone.png" width="400px" height="400px" alt="GIF Descargado">
                    </div>
                </div>
            </div>
        </div>
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
    </div>
    <div class="content flex">
        <p>Design by <a href="https://epsiweb.com/" target="_blank">Epsiweb</a></p>
    </div>

    <!-- Modal -->
    <!--div class="modal">
        <div class="modal-contenido">
            <span class="close modal__button modal__button--no">&times;</span>
            <h3 class="modal__title">Lorem ipsum dolor</h3>
            <p class="modal__text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga et quos eligendi,
                cumque iusto, tenetur consequatur sit laborum qui est voluptates veniam,
                assumenda quasi neque!
            </p>
            <p class="modal__text">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Necessitatibus non quam repellendus id reiciendis provident, fuga
                culpa, doloribus fugit eaque dolorum unde ipsam itaque odit illum
                quisquam ipsum, aut quis.
            </p>
        </div>
    </div-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/dropdown.js"></script>
    <script src="./js/modal.js"></script>
</body>

</html>