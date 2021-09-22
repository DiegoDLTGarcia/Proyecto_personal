<?php
    $alert='';
    session_start();
    if(!empty($_SESSION['active'])){
        header('location: sistema/');

    }else{

    
    if(!empty($_POST)){
        if(empty($_POST['usuario']) || empty($_POST['clave'])){
            $alert='Ingrese su usaurio y su clave';
        }else{
            require "conexion.php";
            $user = mysqli_real_escape_string($conection,$_POST['usuario']);
            //$pass= md5(mysqli_real_escape_string($conection,$_POST['clave']));
            $pass= mysqli_real_escape_string($conection,$_POST['clave']);

            $query=mysqli_query($conection,"SELECT u.idusuario,u.usuario,r.idrol,r.rol,e.Nombre,e.Apepaterno,e.Apematerno
            FROM 
            usuarios u 
            INNER JOIN roles r
            ON u.idrol=r.idrol
            INNER JOIN empleados e
            ON u.idempleado=e.idempleado
            WHERE u.usuario='$user' AND u.clave='$pass'");
            print_r($query);
            mysqli_close($conection);
            $result=mysqli_num_rows($query);
            if($result>0){
                $data= mysqli_fetch_array($query);
                session_start();
                $_SESSION['activate']= true;
                $_SESSION['idUser']=$data['idusuario'];
                $_SESSION['nombre']=$data['Nombre'];
                $_SESSION['user']=$data['usuario'];
                $_SESSION['rol']=$data['idrol'];
                $_SESSION['rol_name']=$data['rol'];
                header('location: sistema/');
            }else{
                $alert='El usuario o la clave son erroneas';
                session_destroy();
                
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login| Facturacion</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>

<body>
    <section id="container">
        <form action="" method="post">
            <h3>Iniciar Sesion hola</h3>
            <img src="sistema/img/login-usuario.png" alt="Login">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
            <div class="alert"><?php echo isset($alert) ? $alert : '';?></div>
            <input type="submit" value="INGRESAR">
         </form>
    </section>

</body>

</html>