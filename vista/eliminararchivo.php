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
    $obj = new control_contenido();
    $arregloDatos=$obj->obtenerNombreArchivo($datos);

    $nombreArchivo=$arregloDatos["nombreArchivo"];

    ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/4.5.2/style.css" media="screen" />

        <hr>


    <form id="formEliminar" name="formEliminar" method="post" action="accionEliminar.php" enctype="multipart/formdata" data-toggle="validator">
        <div class="row">    
            <div class="col-md-3 mb-2">
                <label for="nombreArchivo" class="control-label">Nombre del archivo a eliminar:</label>
                
                <div class="alert alert-primary" role="alert">
                    <?php echo $nombreArchivo ?>
                    </div>
                <input class="form-control " id="nombreArchivo" name="nombreArchivo" value="<?php echo $nombreArchivo ?>" type="hidden" >
                <div class="invalid-feedback">
                </div>
            </div>  
        </div>
        <div class="row">

            <div class="col-md-3 mb-2">
                <label for="motivoEliminar" class="control-label">Motivo</label>
                <textarea class="form-control" id="motivoEliminar" name="motivoEliminar" placeholder="Ingrese el motivo por el cual desea eliminar el archivo compartido" required></textarea>
                <div class="invalid-feedback">

                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="usuarioCarga" class="control-label">Usuario</label>
                <select class="custom-select my-1 mr-sm-2" id="usuarioCarga" name="usuarioCarga" required>
                <option value="" >elija una opcion....</option>
                    <option value="<?php echo $_SESSION["idUsuario"]?>" selected><?php echo $_SESSION["uslogin"]?></option>
                </select>
                <div class="invalid-feedback">
                </div> 
            </div> 
        </div>
    
        <div class="row">
            <div class="col-md-3 mb-2">
                <input id="btn_eje4" class="btn btn-primary" name="btn_eje4" type="submit" value="Enviar">
            
                <div class="invalid-feedback">
                </div> 
            </div> 

        </div>
        

    </form>    
    </div>


<?php
}
else{
    //si no hay una session activa redirecciono al usuario para que se loguee o se registre
    header('Location: login.php');
    exit();
}
include_once("estructura/pie.php");
?>