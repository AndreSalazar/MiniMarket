<HTML>
<HEAD>
 <TITLE>Insertar Proveedor</TITLE>
</HEAD>
<BODY>
<?

  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $apellido =  $_REQUEST['apellido_proveedor'];
  $nombre =    $_REQUEST['nombre_proveedor'];
  $ruc  =      $_REQUEST['ruc_proveedor'];
  $telefono  = $_REQUEST['telefono_proveedor'];
  $direccion = $_REQUEST['direccion_proveedor'];
  $estado    = "INACTIVO";
  
  $sql = "INSERT INTO proveedor(apellido_proveedor, nombre_proveedor, ruc_proveedor, telefono_proveedor, direccion_proveedor, estado_proveedor)"
  . " values ('$apellido', '$nombre', '$ruc', '$telefono', '$direccion', '$estado')";

  $resultado = mysql_query($sql);
  
  echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_proveedores.php'> ";


?>


</BODY>
</HTML>
