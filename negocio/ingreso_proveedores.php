<HTML>
<HEAD>
<?php

  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  if (isset($_REQUEST['id_proveedor']))
  {
      echo "<TITLE>DATOS DEL PROVEEDOR</TITLE>";
      echo "</HEAD>";
      echo "<BODY>";
      echo "<H1>INFORMACION DEL PROVEEDOR</H1>";
      
      $nuevo = 0;

      $id_proveedor = $_REQUEST['id_proveedor'];
      
      $sql = "SELECT * FROM proveedor WHERE id_proveedor = $id_proveedor LIMIT 1";

      $resultado = mysql_query($sql);
      $registro = mysql_fetch_assoc($resultado);

      $n_proveedor = $registro['nombre_proveedor'];
      $a_proveedor = $registro['apellido_proveedor'];
      $r_proveedor = $registro['ruc_proveedor'];
      $t_proveedor = $registro['telefono_proveedor'];
      $d_proveedor = $registro['direccion_proveedor'];
      $e_proveedor = $registro['estado_proveedor'];
  }
  else
  {
      echo "<TITLE>INGRESO DE UN NUEVO PROVEEDOR</TITLE>";
      echo "</HEAD>";
      echo "<BODY>";
      echo "<center> <H1>INGRESO DE DATOS DEL PROVEEDOR</H1> </center>";

      $nuevo = 1;
  }

     if ($nuevo == 1)
     {
       echo "<form method='POST' action='insertar_proveedor.php'>";
       echo "<table border='7' align='center'";
       echo "<tr> <td> APELLIDOS </td>  <td colspan='2'> <input type='text'  name='apellido_proveedor' value=''> </td> </tr>";
       echo "<tr> <td> NOMBRES </td>    <td colspan='2'> <input type='text'  name='nombre_proveedor' value=''> </td> </tr>";
       echo "<tr> <td> R.U.C / C.I</td> <td colspan='2'> <input type='text'  name='ruc_proveedor' value=''> </td> </tr>";
       echo "<tr> <td> TELEFONO </td>   <td colspan='2'> <input type='text'  name='telefono_proveedor' value=''> </td> </tr>";
       echo "<tr> <td> DIRECCION </td>  <td colspan='2'> <input type='text'  name='direccion_proveedor' value=''> </td> </tr>";
       echo "</table>";
       echo "<BR>";
       echo "<center><input type='Submit' value='Guardar Nuevo Proveedor'></center>";
       echo "</form>";
       
       
     }
     else
     {
      if ($nuevo == 0)
       echo "<form method='POST' action='actualizar_proveedor.php'>";
       echo "<input type='text'   name='apellido' value='$a_proveedor'>";
       echo "<input type='text'   name='nombre' value='$n_proveedor'>";
       echo "<input type='text'   name='ruc' value='$r_proveedor'>";
       echo "<input type='text'   name='telefono' value='$t_proveedor'>";
       echo "<input type='text'   name='direccion' value='$d_proveedor'>";
       echo "<input type='hidden' name='id' value='$id_proveedor'> <BR>";
       echo "<input type='Submit' value='Actualizar Proveedor'>";
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
