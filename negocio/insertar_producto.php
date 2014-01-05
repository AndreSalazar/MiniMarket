<HTML>
<HEAD>
 <TITLE>Insertar Producto</TITLE>
</HEAD>
<BODY>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $cantidad =   $_REQUEST['cantidad_producto'];
  $nombre =     $_REQUEST['nombre_producto'];
  $pvp_compra = $_REQUEST['pvp_compra_producto'];
  $pvp_venta  = $_REQUEST['pvp_venta_producto'];
  $estado = "INACTIVO";

  $sql = "INSERT INTO producto(cantidad_producto, nombre_producto, pvp_compra_producto, pvp_venta_producto, estado_producto)"
  . " values ('$cantidad', '$nombre', '$pvp_compra', '$pvp_venta', '$estado')";

  $resultado = mysql_query($sql);

  echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_productos.php'> ";

?>


</BODY>
</HTML>
