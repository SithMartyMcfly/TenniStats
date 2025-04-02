<?php
include '../../../header.php';
include '../../../conexionBBDD/conexion.php';
?>

<div class="text-center display-6 py-2">
    Estadísticas
</div>
<?php
mysqli_select_db($conexion, 'TenniStats');
//recibimos id que viene del listado de jugadores
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

?>
<h1><?php echo $id ?></h1>



<?php
include '../../../footer.php';
?>