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
    $obj = new control_contenido();
    $arreglo = $obj->obtenerArchivosCompartidos();
    ?>
    <hr>
    <div class="row">
                
                <div class="col-sm-12">
                    <?php
                    $obj = new control_contenido();
                    foreach ($arreglo as $archivo)
                    {
                        $nombreArchivo=$archivo->getAcnombre();


                            echo "
                            <div class='row'>
                                    <ul class='list-group col-sm-4'>
                                        <li class='list-group-item'>$nombreArchivo</li>
                                    </ul>
                                    
                                    
                                    
                                    <div class='col-sm-1'>
                                        <form name='formEliminar' id='formEliminar' method='POST' action='eliminararchivocompartido.php'> 
                                            <input id='botonDejarCompartir' name='botonDejarCompartir:$nombreArchivo' class='btn btn-info'  type='submit' value='DejarDeCompartir'/>
                                        </form>
                                    </div>
                                
                            </div>
                        
                        ";
                            
                        // }     
                            
                        
                    }

                    ?>

                    
                    
                    
            
                </div>
                
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

