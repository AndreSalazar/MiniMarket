<HTML>
<HEAD>
 <TITLE>SISTEMA PARA VENDER PRODUCTOS</TITLE>
</HEAD>
<BODY>
    <center> <h2> SELECCIONE A UN CLIENTE</h2> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_cliente, apellido_cliente, nombre_cliente, ruc_cliente,
  telefono_cliente, direccion_cliente FROM clientes";

  $resultado = mysql_query($sql);
  $numregistros = mysql_num_rows($resultado);


  if ($numregistros == 0)
  {
     echo "<center> No existen clientes para mostrar...</center>";
  }
  else
  {
      echo "<table border='7' align='center'>";
      echo "<tr>";

      echo "<td>ESCOGA</td>";
      echo "<td>APELLIDOS</td>";
      echo "<td>NOMBRES</td>";
      echo "<td>R.U.C / C.I</td>";
      echo "<td>TELEFONO</td>";
      echo "<td>DIRECCION</td>";
      echo "</tr>";

   while($registro = mysql_fetch_assoc($resultado))
   {

      $id_cli =      $registro['id_cliente'];
      $apellidos =   $registro['apellido_cliente'];
      $nombres =     $registro['nombre_cliente'];
      $ruc =         $registro['ruc_cliente'];
      $telefono =    $registro['telefono_cliente'];
      $direccion =   $registro['direccion_cliente'];

      echo "<form method='post' action='procesar_ventas.php'>";

      echo "<tr>";
      echo "<td>";
      //**********************AQUI SE ENVIAN LOS VALORES DE LOS DATOS DEL PROVEEDOR***************************//
      echo "<input type='radio' name='selec_cliente' value='$id_cli'>";
      //*******************************************************************************************************//
      echo "</td>";
      echo "<td>$apellidos </td>";
      echo "<td>$nombres   </td>";
      echo "<td>$ruc       </td>";
      echo "<td>$telefono  </td>";
      echo "<td>$direccion </td>";

   }
      echo "</tr>";
      echo "</table>";
  }
  echo "<center> <h2> SELECCIONE UN PRODUCTO </h2> </center>";
  //**************************************AQUI SELECCIONO EL PRODUCTO***************************************//
  //********************************************************************************************************//
  $sql2 = "SELECT id_producto, nombre_producto, cantidad_producto,
  pvp_venta_producto FROM producto";

  $resultado2 = mysql_query($sql2);
  $numregistros2 = mysql_num_rows($resultado2);


  if ($numregistros2 == 0)
  {
     echo "<center> No existen productos para mostrar...</center>";
  }
  else
  {
      echo "<table border='7' align='center'>";
      echo "<tr>";
      echo "<td>ESCOGA</td>";
      echo "<td>CANTIDAD</td>";
      echo "<td>DESCRIPCION</td>";
      echo "<td>P.V.P DE LA VENTA</td>";
      echo "</tr>";

   while($registro = mysql_fetch_assoc($resultado2))
   {
      $id =         $registro['id_producto'];
      $nombre =     $registro['nombre_producto'];
      $cantidad=    $registro['cantidad_producto'];
      $pvp_venta =  $registro['pvp_venta_producto'];

      echo "<tr>";
      echo "<td>";

      //**************************AQUI SE ENVIAN LOS VALORES DE LA SELECCION***************************//
      echo "<input type='radio' name='selec_producto' value='$id'>";
      //***********************************************************************************************//
      echo "</td>";

      echo "<td>$cantidad   </td>";
      echo "<td>$nombre     </td>";
      echo "<td>$ $pvp_venta </td>";
   }
      echo "</tr>";
      echo "</table>";

      echo "<center> <h2> INGRESE CANTIDAD DEL PRODUCTO A COMPRAR </h2>";
      echo "<input type='text' name='cantidad' size='5' value=''> </center>";

      echo "<p align='center'><input type='submit' name='comprar' value='Comprar'></p>";
      echo "</form>";

  }
?>
<center>

     <form method='post' action='index.php'>
     <BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
     </form>

</center>
</BODY>
</HTML>
