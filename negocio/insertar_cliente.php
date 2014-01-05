<HTML>
<HEAD>
 <TITLE>Insertar Cliente</TITLE>
</HEAD>
<BODY>
<?

  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $apellido =  $_REQUEST['apellido_cliente'];
  $nombre =    $_REQUEST['nombre_cliente'];
  $ruc  =      $_REQUEST['ruc_cliente'];
  $telefono  = $_REQUEST['telefono_cliente'];
  $direccion = $_REQUEST['direccion_cliente'];
  $estado  =   "INACTIVO";
  
  $sql = "INSERT INTO clientes(apellido_cliente, nombre_cliente, ruc_cliente, telefono_cliente, direccion_cliente, estado_cliente)"
  . " values ('$apellido', '$nombre', '$ruc', '$telefono', '$direccion', '$estado')";

  $resultado = mysql_query($sql);

  echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_clientes.php'> ";


?>


</BODY>
</HTML>
