<?php
include_once("estructura/cabecera.php");
include_once("../configuracion.php");
include_once("../control/control_contenido.php");

?>

<?php
$verificarSession=$objSession->validar();
// Verifico si ya existe una sesion activa , esto lo hago por si el usuario
// entra de vuelta a login.php no muestro el formulario de login
    
if($verificarSession){  
    $datos = data_submitted();
    $objAbm=new AbmArchivoCargado();
    $resp=$objAbm->compartir($datos);
    ?>
    <hr>
    <?php
    if($resp){
        echo '<div class="alert alert-primary" role="alert">
        Se pudo compartir el archivo con exito!!!
      </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        no se pudo compartir el archivo
      </div>';
    }
    ?>

<?php
}
else{
  //si no hay una session activa redirecciono al usuario para que se loguee o se registre
  header('Location: login.php');
  exit();
}
include_once("estructura/pie.php");
?>