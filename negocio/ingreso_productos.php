<HTML>
<HEAD>
<?php
      require("config.php");

      $db = mysql_connect($dbhost, $dbuser, $dbpassword);
      mysql_select_db($dbdatabase, $db);

      if (isset($_REQUEST['id_producto']))
      {
           echo "<TITLE>DATOS DEL PRODUCTO</TITLE>";
           echo "</HEAD>";
           echo "<BODY>";
           echo "<H1>INFORMACION DEL PRODUCTO</H1>";

           $nuevo = 0;

           $id_producto = $_REQUEST['id_producto'];

           $sql = "SELECT * FROM producto WHERE id_producto = $id_producto LIMIT 1";

           $resultado = mysql_query($sql);
           $registro = mysql_fetch_assoc($resultado);

           $c_producto = $registro['cantidad_producto'];
           $n_producto = $registro['nombre_producto'];
           $pc_producto = $registro['pvp_compra_producto'];
           $pv_producto = $registro['pvp_venta_producto'];
           $e_producto =  $registro['estado_producto'];
       }
       else
       {
           echo "<TITLE>INGRESO DE UN NUEVO PRODUCTO</TITLE>";
           echo "</HEAD>";
           echo "<BODY>";
           echo "<center> <H1>INGRESO DE DATOS DEL PRODUCTO</H1> </center>";

                $nuevo = 1;
       }

              if ($nuevo == 1)
              {

                  echo "<form method='POST' action='insertar_producto.php'>";
                  echo "<table border='7' align='center'";
                  echo "<tr> <td> CANTIDAD </td>        <td> <input type='text' name='cantidad_producto'   value=''> </td> </tr>";
                  echo "<tr> <td> NOMBRE PRODUCTO </td> <td> <input type='text' name='nombre_producto'     value=''> </td> </tr>";
                  echo "<tr> <td> P.V.P COMPRA </td>    <td> <input type='text' name='pvp_compra_producto' value=''> </td> </tr>";
                  echo "<tr> <td> P.V.P VENTA  </td>    <td> <input type='text' name='pvp_venta_producto'  value=''> </td> </tr>";
                  echo "</table>";
                  echo "<BR>";
                  echo "<center><input type='Submit' value='Guardar Nuevo Producto'></center>";
                  echo "</form>";
               }
               else
               {
                   if ($nuevo == 0)
                   echo "<form method='POST' action='actualizar_producto.php'>";
                   echo "<input type='text' name='cantidad'   value='$c_producto'>";
                   echo "<input type='text' name='nombre'     value='$n_producto'>";
                   echo "<input type='text' name='pvp_compra' value='$pc_producto'>";
                   echo "<input type='text' name='pvp_venta'  value='$pv_producto'>";

                   echo "<input type='hidden' name='id' value='$id_producto'";
                   echo "<input type='Submit' value='Actualizar Producto'>";
                   echo "</form>";
               }


?>
<center>
     <form method='post' action='index.php'>
     <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
     </form>
</center>
</BODY>
</HTML>
