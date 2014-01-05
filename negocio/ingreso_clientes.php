<HTML>
<HEAD>
<?php

  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  if (isset($_REQUEST['id_cliente']))
  {
      echo "<TITLE>DATOS DEL CLIENTE</TITLE>";
      echo "</HEAD>";
      echo "<BODY>";
      echo "<H1>INFORMACION DEL CLIENTE</H1>";

      $nuevo = 0;

      $id_cliente = $_REQUEST['id_cliente'];

      $sql = "SELECT * FROM clientes WHERE id_cliente = $id_cliente LIMIT 1";

      $resultado = mysql_query($sql);
      $registro = mysql_fetch_assoc($resultado);

      $n_cliente = $registro['nombre_cliente'];
      $a_cliente = $registro['apellido_cliente'];
      $r_cliente = $registro['ruc_cliente'];
      $t_cliente = $registro['telefono_cliente'];
      $d_cliente = $registro['direccion_cliente'];
      $e_cliente = $registro['estado_cliente'];
  }
  else
  {
      echo "<TITLE>INGRESO DE UN NUEVO CLIENTE</TITLE>";
      echo "</HEAD>";
      echo "<BODY>";
      echo "<center> <H1>INGRESO DE DATOS DEL CLIENTE</H1> </center>";

      $nuevo = 1;
  }

     if ($nuevo == 1)
     {
       echo "<form method='POST' action='insertar_cliente.php'>";
       echo "<table border='7' align='center'";
       echo "<tr> <td> APELLIDOS </td> <td colspan='2'> <input type='text' name='apellido_cliente' value=''> </td> </tr>";
       echo "<tr> <td> NOMBRES </td>   <td colspan='2'> <input type='text' name='nombre_cliente' value=''> </td> </tr>";
       echo "<tr> <td> R.U.C / C.I</td><td colspan='2'> <input type='text' name='ruc_cliente' value=''> </td> </tr>";
       echo "<tr> <td> TELEFONO </td>  <td colspan='2'> <input type='text' name='telefono_cliente' value=''> </td> </tr>";
       echo "<tr> <td> DIRECCION</td>  <td colspan='2'> <input type='text' name='direccion_cliente' value=''> </td> </tr>";
       echo "</table>";
       echo "<BR>";
       echo "<center><input type='Submit' value='Guardar Nuevo Cliente'></center>";
       echo "</form>";
     }
     else
     {
      if ($nuevo == 0)
       echo "<form method='POST' action='actualizar_cliente.php'>";
       echo "<input type='text' name='apellido'  value='$a_cliente'>";
       echo "<input type='text' name='nombre'    value='$n_cliente'>";
       echo "<input type='text' name='ruc'       value='$r_cliente'>";
       echo "<input type='text' name='telefono'  value='$t_cliente'>";
       echo "<input type='text' name='direccion' value='$d_cliente'>";

       echo "<input type='hidden' name='id' value='$id_cliente'";
       echo "<BR><input type='Submit' value='Actualizar Cliente'>";
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
