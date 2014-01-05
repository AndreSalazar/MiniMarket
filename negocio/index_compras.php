<HTML>
<HEAD>
 <TITLE>SISTEMA PARA COMPRAR PRODUCTOS</TITLE>
</HEAD>
<BODY>
    <center> <h2> SELECCIONE A UN PROVEEDOR</h2> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_proveedor, nombre_proveedor, apellido_proveedor, ruc_proveedor,
  telefono_proveedor, direccion_proveedor, estado_proveedor FROM proveedor";

  $resultado = mysql_query($sql);
  $numregistros = mysql_num_rows($resultado);


  if ($numregistros == 0)
  {
     echo "<center> No existen proveedores para mostrar...</center>";
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
   
      $id_pro =      $registro['id_proveedor'];
      $apellidos =   $registro['apellido_proveedor'];
      $nombres =     $registro['nombre_proveedor'];
      $ruc =         $registro['ruc_proveedor'];
      $telefono =    $registro['telefono_proveedor'];
      $direccion =   $registro['direccion_proveedor'];

      echo "<form method='post' action='procesar_compras.php'>";
      
      echo "<tr>";
      echo "<td>";
      //**********************AQUI SE ENVIAN LOS VALORES DE LOS DATOS DEL PROVEEDOR***************************//
      echo "<input type='radio' name='selec_proveedor' value='$id_pro'>";
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
  pvp_compra_producto, pvp_venta_producto FROM producto";

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
      echo "<td>P.V.P DE LA COMPRA</td>";
      echo "</tr>";

   while($registro = mysql_fetch_assoc($resultado2))
   {
      $id =         $registro['id_producto'];
      $nombre =     $registro['nombre_producto'];
      $cantidad=    $registro['cantidad_producto'];
      $pvp_compra = $registro['pvp_compra_producto'];

      echo "<tr>";
      echo "<td>";

      //**************************AQUI SE ENVIAN LOS VALORES DE LA SELECCION***************************//
      echo "<input type='radio' name='selec_producto' value='$id'>";
      //***********************************************************************************************//
      echo "</td>";

      echo "<td>$cantidad   </td>";
      echo "<td>$nombre     </td>";
      echo "<td>$ $pvp_compra </td>";
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
