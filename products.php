<?php include('conn.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                   <form action="products.php" method="post" id="brand-form" class="form-dropdown">
                    <select onchange="document.getElementById('brand-form').submit()" id="select-brand" name="marca">
                        <option selected>Marca</option>
                        <?php
                        $sql_brand = "SELECT DISTINCT brand FROM catalogo";
                        $b_results = mysqli_query($conn, $sql_brand);
                        while ($show_b = mysqli_fetch_assoc($b_results)) {


                        ?>
                            <option value="<?php echo $show_b['brand'] ?>"><?php echo $show_b['brand'] ?></option>

                        <?php } ?>
                    </select>
                     </form>
                    <!-- dropdown search de modelos -->
                    <form action="products.php" method="post" id="model-form" class="form-dropdown">
                    <select onchange="document.getElementById('model-form').submit()" id="model-select"  name="modelo">
                     <option selected>Modelo</option>
                       <?php 
                       if(isset($_POST['marca'])){

                        $brand = $_POST['marca'];
                        $sql_model = "SELECT * FROM catalogo WHERE brand = '".$brand."'";
                        $m_results = mysqli_query($conn,$sql_model);
                        while($show_m=mysqli_fetch_assoc($m_results)){
                       ?>
                       
                       <option value="<?php echo $show_m['catID'] ?>"><?php echo $show_m['model']  ?></option>
                       <?php }} ?>
                    </select>
                  </form>

                    

                    
                    

                </div>
            </div>


            <!-- Detalles del equipo -->
           <?php
           if(isset($_POST['modelo'])){
              
            $id = $_POST['modelo'];
            $sql_id = "SELECT * FROM catalogo WHERE catID =".$id;
            $i_results = mysqli_query($conn,$sql_id);
            $product = mysqli_fetch_assoc($i_results);
           ?>
            <div class="producto">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- imagen del producto -->
                            <img style="width:10rem; max-width: 100%;" src="<?php echo $product['image_path'] ?>" alt="Producto de alta Tecnologia, SmartPhones, Tablets, Notebooks" />
                        </div>
                        <div class="col-md-8">
                            <h1><?php echo $product['brand']." | ".$product['model']  ?></h1>
                            <h3>Características</h3>
                            <ul>
                                <li>Pantalla de <?php echo $product['display_size_and_technology'] ?></li>
                                <li>Dimensiones:  <?php echo $product['Dimensions'] ?>.</li>
                                <li>Memoria de almacenamiento de <?php echo $product['memory'] ?> y espacio ilimitado en Google Cloud para fotos y videos 4k.</li>
                                <li>Cámara principal de <?php echo $product['rear_camera'] ?> con doble flash y frontal de <?php echo $product['front_camera'] ?>.</li>
                                <li><?php echo $product['features'] ?></li>
                                <li><?php echo $product['Lithium_Battery'] ?></li>
                                <li><?php echo $product['RAM__DDR3_'] ?> Memoria RAM</li>
                                <li>Android OS: <?php echo $product['android_version'] ?></li>
                                <li><a href="<?php echo $product['Product_URL'] ?>" target="new">Link de compra</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             <?php } ?>


        </div>






        

        <!--AXIOS-->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/39f24fdfe8.js" crossorigin="anonymous"></script>
        <script src="./js/sidebar.js"></script>
        <script src="./js/dropdown.js"></script>



</body>

</html>