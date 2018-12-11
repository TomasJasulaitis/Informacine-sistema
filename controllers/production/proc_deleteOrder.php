<?php

if (isset($_POST["submit"])) {
    include_once '../../inc/dbconn.php';
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $memory_size = $_POST['memory_size'];
    $ram_size = $_POST['ram_size'];
     echo $brand;
     echo $model;
     echo $color;
     echo $memory_size;
     echo $ram_size;

     if (empty($brand) || empty($model) || empty($color) || empty($memory_size)|| empty($ram_size)){
        header("Location: ../../views/production/assemblySelection.php");
        exit();
      } else {
        header("Location: ../../views//production/productionMain.php");
        $sql = "INSERT INTO orders 
        (brand, model, color, memory_size, ram_size) VALUES
        ('$brand','$model','$color','$memory_size','$ram_size')";
        mysqli_query($conn, $sql);
        exit();
}
}
?>