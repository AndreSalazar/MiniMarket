<HTML>
<HEAD>
 <TITLE>HISTORIAL DE VENTAS</TITLE>
</HEAD>
<BODY>
    <center> <h1>VENTAS REALIZADAS</h1> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_venta, cantidad_venta, descripcion_venta, pvp_venta, total_venta, fecha_venta,
  apellido_cliente, nombre_cliente, ruc_cliente, telefono_cliente, direccion_cliente FROM venta";

  $resultado = mysql_query($sql);
  $numregistros = mysql_num_rows($resultado);


  if ($numregistros == 0)
  {
     echo "<center> No existen ventas para mostrar...</center>";
  }
  else
  {

      echo "<table border='7' align='center'>";
      echo "<tr>";
      echo "<td>CANTIDAD</td>";
      echo "<td>DESCRIPCION</td>";
      echo "<td>P.V.P DE LA VENTA </td>";
      echo "<td>TOTAL DE LA VENTA </td>";
      echo "<td>FECHA DE LA VENTA </td>";
      echo "<td>APELLIDO CLIENTE</td>";
      echo "<td>NOMBRE CLIENTE</td>";
      echo "<td>R.U.C CLIENTE</td>";
      echo "<td>TELEFONO CLIENTE</td>";
      echo "<td>DIRECCION CLIENTE</td>";
      echo "</tr>";

        while($registro = mysql_fetch_assoc($resultado))
        {
            $id_venta = $registro['id_venta'];
            $ca_venta = $registro['cantidad_venta'];
            $de_venta = $registro['descripcion_venta'];
            $pv_venta = $registro['pvp_venta'];
            $to_venta = $registro['total_venta'];
            $fe_venta = $registro['fecha_venta'];
            $ap_clien = $registro['apellido_cliente'];
            $no_clien = $registro['nombre_cliente'];
            $ru_clien = $registro['ruc_cliente'];
            $te_clien = $registro['telefono_cliente'];
            $di_clien = $registro['direccion_cliente'];


            echo "<tr>";
            echo "<td>$ca_venta </td>";
            echo "<td>$de_venta </td>";
            echo "<td>$pv_venta </td>";
            echo "<td>$to_venta </td>";
            echo "<td>$fe_venta </td>";
            echo "<td>$ap_clien </td>";
            echo "<td>$no_clien </td>";
            echo "<td>$ru_clien </td>";
            echo "<td>$te_clien </td>";
            echo "<td>$di_clien </td>";
         }

                   echo "</tr>";
                   echo "</table>";
  }




?>

<BR>    <BR>
<center>

   <form method='post' action='index.php'>
   <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
   </form>

</center>




</BODY>
</HTML>
