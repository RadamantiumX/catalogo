<?php include('conn.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Catálogo</title>
</head>

<body>

    <div class="main-container">
        <div class="sidebar">
            <div class="toggle">
                <i class="bx bx-chevron-right"></i>
            </div>
            <div class="logo">
                <img src="./assets/img/logo.png" alt="...">
                <h3>MARKET PULSE</h3>
            </div>
            <nav>
                <ul>
                    <li class="nav-item active">
                        <i class="bx bxs-dashboard"></i>
                        <span>Products</span>
                    </li>
                    <li class="nav-item">
                        <i class="bx bxs-bar-chart-alt-2"></i>
                        <span>Lorem</span>
                    </li>
                    <li class="nav-item">
                        <i class="bx bxs-wallet"></i>
                        <span>Lorem</span>
                    </li>
                    <li class="nav-item">
                        <i class="bx bxs-bell"></i>
                        <span>Lorem</span>
                    </li>
                    <li class="nav-item">
                        <i class="bx bxs-cog"></i>
                        <span>lorem</span>
                    </li>
                </ul>
                <hr>
                <div class="nav-title">
                    Supports
                </div>
                <ul>
                    <li class="nav-item">
                        <i class="bx bxs-help-circle"></i>
                        <span>Get Help</span>
                    </li>
                    <li class="nav-item">
                        <i class="bx bxs-message-dots"></i>
                        <span>Send Feedback</span>
                    </li>
                </ul>
            </nav>

        </div>

        <div class="container flex-1">
            <ul class="breadcrumb">
                <li class="breadcrumb__item breadcrumb__item-firstChild">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">Home</span>
                    </span>
                </li>
                <li class="breadcrumb__item">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">Category</span>
                    </span>
                </li>
                <li class="breadcrumb__item">
                    <span class="breadcrumb__inner">
                        <span class="breadcrumb__title">Phone</span>
                    </span>
                </li>
            </ul>


            <!-- dropdown search de marcas -->
            <div class="main">
                <div class="select-container">
                    
                    <select id="select-brand" onchange="handleBrand()" name="Marca">
                    <option selected>Seleccione una opcion</option>
                        <?php
                         $sql_brand = "SELECT DISTINCT brand FROM catalogo";
                         $b_results = mysqli_query($conn, $sql_brand);
                         while($show_b = mysqli_fetch_assoc($b_results)){

                         
                        ?>
                        <option value="<?php echo $show_b['brand'] ?>"><?php echo $show_b['brand'] ?></option>
                        
                        <?php } ?>
                    </select>

                    <!-- dropdown search de modelos -->

                    <select id="model-select" name="Modelo">
                        <option selected>Modelo</option>

                        
                        
                        
                    </select>
                </div>
            </div>


            <!-- Detalles del equipo -->

            <div class="producto">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- imagen del producto -->
                <img style="width: 100%; max-width: 100%;" src="https://storage.googleapis.com/madebygoog/v1/phone/phone_hero-module_hero-image_1440_2x.png" alt="" />
            </div>
            <div class="col-md-8">
                <h1>Smartphone Google Pixel 32 GB-Negro</h1>
                <h3>Características</h3>
                <ul>
                    <li>Pantalla de 5 pulgadas.</li>
                    <li>Procesador Snapdragon 821.</li>
                    <li>Memoria de almacenamiento de 32 gb y espacio ilimitado en Google Cloud para fotos y videos 4k.</li>
                    <li>Cámara principal de 12 MP con doble flash y frontal de 8 MP.</li>
                    <li>Sensor de huellas Pixel Imprint y asistente personal Google Assistant.</li>
                    <li>Carga de hasta 7 horas de duración en sólo 15 mins</li>
                    <li>4GB Memoria RAM</li>
                    <li>Android OS, v7.1 (Nougat)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

                  

                </div>








                <!--AXIOS-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
                    crossorigin="anonymous">
                </script>
                <script src="https://kit.fontawesome.com/39f24fdfe8.js" crossorigin="anonymous"></script>
                <script src="./js/sidebar.js"></script>
                <script src="./js/dropdown.js"></script>
                <script src="./js/request.js"></script>


</body>

</html>