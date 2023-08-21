<?php include('conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <table>
    <tr>
        <th>Nombre del producto</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Memoria</th>
    </tr>
    <?php
      $sql = "SELECT * FROM catalogo";
      $result = mysqli_query($conn,$sql);
      
      while($show=mysqli_fetch_array($result))
      {
    ?>
    <tr>
        <td><?php echo $show['product_name']?></td>
        <td><?php echo $show['model']?></td>
        <td><?php echo $show['brand']?></td>
        <td><?php echo $show['memory']?></td>
    </tr>
      
    <?php
      }
    ?>
    </table>
</body>
</html>