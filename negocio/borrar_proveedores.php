<HTML>
<HEAD>
 <TITLE>Borrar Proveedores</TITLE>
</HEAD>
<BODY>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);
  
  $estado = $_REQUEST['estado'];

  if (isset($_REQUEST['id_proveedor']))
  {

      $nuevo = 3;

      $id_proveedor = $_REQUEST['id_proveedor'];

      $sql = "SELECT * FROM proveedor WHERE id_proveedor = $id_proveedor LIMIT 1";

      $resultado = mysql_query($sql);
      $registro = mysql_fetch_assoc($resultado);


  }
  
  if($nuevo == 3)
  {

      echo "<form method='POST' action='borrar_proveedor.php'>";

       echo "Seguro que quiere eliminar proveedor";
       echo "<input type='hidden' name='id'     value='$id_proveedor'";
       echo "<input type='hidden' name='estado' value='$estado'";
       echo "<input type='Submit' value='Si'>";
       echo "</form>";
  
  }
       echo "<form method='POST' action='index_proveedores.php'>";
       echo "<input type='Submit' value='No'>";
       echo "</form>";
  
  
?>
<center>
        <form method='post' action='index.php'>
        <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
        </form>
</center>
</BODY>
</HTML>
