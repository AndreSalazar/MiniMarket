<HTML>
<HEAD>
 <TITLE>Actualizar Proveedores</TITLE>
</HEAD>
<BODY>
<?
     require("config.php");
     $db = mysql_connect($dbhost, $dbuser, $dbpassword);
     mysql_select_db($dbdatabase, $db);

     $id = $_REQUEST['id'];
     $apellido = $_REQUEST['apellido'];
     $nombre = $_REQUEST['nombre'];
     $ruc  = $_REQUEST['ruc'];
     $telefono  = $_REQUEST['telefono'];
     $direccion  = $_REQUEST['direccion'];

      $sql = "UPDATE proveedor SET apellido_proveedor = '$apellido',
      nombre_proveedor='$nombre', ruc_proveedor='$ruc', telefono_proveedor='$telefono',
      direccion_proveedor='$direccion' WHERE id_proveedor = '$id'";

      $resultado = mysql_query($sql);
      echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_proveedores.php>";

?>
</BODY>
</HTML>
