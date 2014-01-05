<HTML>
<HEAD>
 <TITLE>Actualizar Productos</TITLE>
</HEAD>
<BODY>
<?
     require("config.php");
     $db = mysql_connect($dbhost, $dbuser, $dbpassword);
     mysql_select_db($dbdatabase, $db);

     $id   =        $_REQUEST['id'];
     $cantidad =    $_REQUEST['cantidad'];
     $nombre =      $_REQUEST['nombre'];
     $pvp_compra  = $_REQUEST['pvp_compra'];
     $pvp_venta  =  $_REQUEST['pvp_venta'];

      $sql = "UPDATE producto SET cantidad_producto = '$cantidad', nombre_producto = '$nombre',
      pvp_compra_producto = '$pvp_compra', pvp_venta_producto = '$pvp_venta' WHERE id_producto = '$id'";

      $resultado = mysql_query($sql);
      echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_productos.php>";

?>
</BODY>
</HTML>
