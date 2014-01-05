<HTML>
<HEAD>
 <TITLE>HISTORIAL DE COMPRAS</TITLE>
</HEAD>
<BODY>
    <center> <h1>COMPRAS REALIZADAS</h1> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_compra, cantidad_compra, descripcion_compra, pvp_compra, fecha_compra,
  apellido_proveedor, nombre_proveedor, ruc_proveedor, telefono_proveedor, direccion_proveedor FROM compra";

  $resultado = mysql_query($sql);
  $numregistros = mysql_num_rows($resultado);


  if ($numregistros == 0)
  {
     echo "<center> No existen compras para mostrar...</center>";
  }
  else
  {

      echo "<table border='7' align='center'>";
      echo "<tr>";
      echo "<td>CANTIDAD</td>";
      echo "<td>DESCRIPCION</td>";
      echo "<td>P.V.P DE LA COMPRA </td>";
      echo "<td>FECHA DE LA COMPRA </td>";
      echo "<td>APELLIDO PROVEEDOR</td>";
      echo "<td>NOMBRE PROVEEDOR</td>";
      echo "<td>R.U.C PROVEEDOR</td>";
      echo "<td>TELEFONO PROVEEDOR</td>";
      echo "<td>DIRECCION PROVEEDOR</td>";
      echo "</tr>";

        while($registro = mysql_fetch_assoc($resultado))
        {
            $id_compra = $registro['id_compra'];
            $ca_compra = $registro['cantidad_compra'];
            $de_compra = $registro['descripcion_compra'];
            $pv_compra = $registro['pvp_compra'];
            $fe_compra = $registro['fecha_compra'];
            $ap_provee = $registro['apellido_proveedor'];
            $no_provee = $registro['nombre_proveedor'];
            $ru_provee = $registro['ruc_proveedor'];
            $te_provee = $registro['telefono_proveedor'];
            $di_provee = $registro['direccion_proveedor'];


            echo "<tr>";
            echo "<td>$ca_compra </td>";
            echo "<td>$de_compra </td>";
            echo "<td>$pv_compra </td>";
            echo "<td>$fe_compra </td>";
            echo "<td>$ap_provee </td>";
            echo "<td>$no_provee </td>";
            echo "<td>$ru_provee </td>";
            echo "<td>$te_provee </td>";
            echo "<td>$di_provee </td>";
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
