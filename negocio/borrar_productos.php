<HTML>
<HEAD>
 <TITLE>Borrar Productos</TITLE>
</HEAD>
<BODY>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);
  
  $estados = $_REQUEST['estado'];

  if (isset($_REQUEST['id_producto']))
  {

      $nuevo = 3;

      $id_producto = $_REQUEST['id_producto'];

      $sql = "SELECT * FROM producto WHERE id_producto = $id_producto LIMIT 1";

      $resultado = mysql_query($sql);
      $registro = mysql_fetch_assoc($resultado);


  }

  if($nuevo == 3)
  {

      echo "<form method='POST' action='borrar_producto.php'>";

       echo "Seguro que quiere eliminar Producto";
       echo "<input type='hidden' name='id' value='$id_producto'";
       echo "<input type='hidden' name='estados' value='$estados'";
       echo "<input type='Submit' value='Si'>";
       echo "</form>";

  }
       echo "<form method='POST' action='index_productos.php'>";
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
