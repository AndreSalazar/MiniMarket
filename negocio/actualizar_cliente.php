<HTML>
<HEAD>
 <TITLE>Actualizar Clientes</TITLE>
</HEAD>
<BODY>
<?
     require("config.php");
     $db = mysql_connect($dbhost, $dbuser, $dbpassword);
     mysql_select_db($dbdatabase, $db);

     $id =        $_REQUEST['id'];
     $apellido =  $_REQUEST['apellido'];
     $nombre =    $_REQUEST['nombre'];
     $ruc  =      $_REQUEST['ruc'];
     $telefono =  $_REQUEST['telefono'];
     $direccion = $_REQUEST['direccion'];

      $sql = "UPDATE clientes SET apellido_cliente = '$apellido',
      nombre_cliente='$nombre', ruc_cliente='$ruc', telefono_cliente='$telefono',
      direccion_cliente='$direccion' WHERE id_cliente = '$id'";

      $resultado = mysql_query($sql);
      echo "<meta http-equiv='refresh' content='1;URL=$config_basedir/index_clientes.php>";

?>
</BODY>
</HTML>
