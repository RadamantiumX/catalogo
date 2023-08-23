<?php include('conn.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
   <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <h3>Basics:</h3>
                            <ul>
                                <li>Model: <?php echo $product['SoC_model'] ?></li>
                                <li>Speed:  <?php echo $product['core_speed'] ?>.</li>
                                <li>Archictecture: </li>                       
                                <li>Core Count: <?php echo $product['rear_camera'] ?></li>
                                <li>RAM: <?php echo $product['RAM__DDR3_'] ?></li>
                                <li>Storage: <?php echo $product['memory'] ?></li>
                                <li>External Support: <?php echo $product['SD_Card'] ?></li>
                                
                            </ul>
                        </div>

                        <div class="col-md-8">
                            
                            <h3>Display:</h3>
                            <ul>
                                <li>Screen Size: <?php echo $product['display_size_and_technology'] ?></li>
                                <li>Horizontal:  </li>
                                <li>Ratio: <?php echo $product['display_ratio'] ?> </li>                       
                                <li>Curve Edge: </li>
                                <li>Screen Type: <?php echo $product['display_technology'] ?></li>
                                <li>Protection: <?php echo $product['glass_type'] ?></li>
                                <li>Vertical: </li>
                                <li>Touch: <?php echo $product['touch_panel_capacitive_points'] ?></li>
                                <li>Refresh Rate: <?php echo $product['display_refresh_frequency'] ?></li>
                                <li>PPI: <?php echo $product['pixel_density'] ?></li>
                                
                            </ul>
                        </div>

                        <div class="col-md-8">
                            
                            <h3>Communications:</h3>
                            <ul>
                                <li>WIFI: <?php echo $product['Wifi'] ?></li>
                                <li>Bluetooth:  <?php echo $product['Bluetooth'] ?>.</li>
                                <?php if(empty($product['GPS'])) {?>
                                <li>GPS: NO</li> 
                                <?php }else{ ?>
                                <li>GPS: YES</li>   
                                <?php } ?> 
                                <?php if(empty($product['NFC'])) {?>                      
                                <li>NFC: NO</li>
                                <?php }else{ ?>
                                <li>NFC: Supported</li>
                                <?php } ?>   
                                <li>5G: </li>
                                <li>Netowork Type: </li>
                                <li>5G USA: </li>
                                
                            </ul>
                        </div>

                        <div class="col-md-8">
                            
                            <h3>Cammera:</h3>
                            <ul>
                                <li>Rear Camera: <?php echo $product['rear_camera'] ?></li>
                                <li>Rear Camera 2:  <?php echo $product['rear_camera_2'] ?>.</li>
                                <li>Rear Camera 3: <?php echo $product['rear_camera_3'] ?></li>                       
                                <li>Rear Camera 4: <?php echo $product['rear_camera_4'] ?></li>
                                <li>Front Camera: <?php echo $product['front_camera'] ?></li>
                                <li>Rear Camera Video Recording: <?php echo $product['rear_camera_video_recording'] ?></li>
                                <li>Front Camera Video Recording: <?php echo $product['front_camera_video_recording'] ?></li>
                                
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