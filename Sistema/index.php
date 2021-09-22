<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php";?>
    <title>Sisteme Ventas</title>
</head>

<body>
    <?php 
    include "includes/header.php";
    include "../conexion.php";

    $query_dash=mysqli_query($conection,"CALL datDashboard();");
    $result_dash=mysqli_num_rows($query_dash);
    if($result_dash > 0){
        $data_dash=mysqli_fetch_assoc($query_dash);
        mysqli_close($conection);

    }
    
    
    ?>
    <section id="container">
        <div class="divContainer">
            <div>
                <h1 class="titlePanelControl">Bienvenido, <?php echo $_SESSION['nombre'] ?></h1>
               
            </div>
            
    </section>
    <center>
    <img src="img/cbs-gto.png" width="600" height="500"></center>
    <?php include "includes/footer.php";?>
</body>

</html>