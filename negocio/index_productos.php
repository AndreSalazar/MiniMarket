<HTML>
<HEAD>
 <TITLE>SISTEMA PARA LISTAR PRODUCTOS</TITLE>
</HEAD>
<BODY>
    <center> <h1>LISTADO DE PRODUCTOS</h1> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_producto, nombre_producto, cantidad_producto,
  pvp_compra_producto, pvp_venta_producto, estado_producto FROM producto";

  $resultado = mysql_query($sql);
  $numregistros = mysql_num_rows($resultado);


  if ($numregistros == 0)
  {
     echo "<center> No existen productos para mostrar...</center>";
  }
  else
  {

      echo "<table border='7' align='center'>";
      echo "<tr>";
      echo "<td>ESTADO</td>";
      echo "<td>CANTIDAD</td>";
      echo "<td>DESCRIPCION</td>";
      echo "<td>P.V.P DE LA COMPRA</td>";
      echo "<td>P.V.P DE LA VENTA</td>";
      echo "<td colspan='2' align='center'>ACCION</td>";
      
      echo "</tr>";

   while($registro = mysql_fetch_assoc($resultado))
   {
      $id =         $registro['id_producto'];
      $nombre =     $registro['nombre_producto'];
      $cantidad=    $registro['cantidad_producto'];
      $pvp_compra = $registro['pvp_compra_producto'];
      $pvp_venta =  $registro['pvp_venta_producto'];
      $estado =     $registro['estado_producto'];

      echo "<tr>";
      echo "<td>$estado   </td>";
      echo "<td>$cantidad   </td>";
      echo "<td>$nombre     </td>";
      echo "<td>$ $pvp_compra </td>";
      echo "<td>$ $pvp_venta  </td>";
      
      if($id == $id)
      {
            echo "<form action='ingreso_productos.php?id_producto=$id' method='post'>";
            echo "<td> <input type='submit' value='Actualizar'></td>";
            echo "</form>";
      }

      if("id_producto" == "id_producto")
      {
            echo "<form action='borrar_productos.php?id_producto=$id' method='post'>";
            echo "<input type='hidden' name='estado' value='$estado'>";
            echo "<td> <input type='submit' value='Borrar'></td>";
            echo "</form>";
      }
      
      
      
   }



      echo "</tr>";
      echo "</table>";
  }
  

?>

<BR>    <BR>
<center>
<form method="POST" action="ingreso_productos.php">
<input type="submit" value="Ingresar Productos">
</form>


       <form method='post' action='index.php'>
       <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
       </form>
       
</center>


</BODY>
</HTML>
