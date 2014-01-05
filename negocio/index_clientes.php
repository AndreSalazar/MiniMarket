<HTML>
<HEAD>
 <TITLE>SISTEMA PARA LISTAR CLIENTES</TITLE>
</HEAD>
<BODY>
    <center> <h1>LISTADO DE CLIENTES</h1> </center>
<?
  require("config.php");

  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  $sql = "SELECT id_cliente, apellido_cliente, nombre_cliente, ruc_cliente,
  telefono_cliente, direccion_cliente, estado_cliente FROM clientes";

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
      echo "<td>ESTADO</td>";
      echo "<td>APELLIDOS</td>";
      echo "<td>NOMBRES</td>";
      echo "<td>R.U.C / C.I</td>";
      echo "<td>TELEFONO</td>";
      echo "<td>DIRECCION</td>";
      echo "<td colspan='2'>OPERACIONES</td>";
      echo "</tr>";

        while($registro = mysql_fetch_assoc($resultado))
        {
            $id =        $registro['id_cliente'];
            $apellidos = $registro['apellido_cliente'];
            $nombres =   $registro['nombre_cliente'];
            $ruc =       $registro['ruc_cliente'];
            $telefono =  $registro['telefono_cliente'];
            $direccion = $registro['direccion_cliente'];
            $estado =    $registro['estado_cliente'];


            echo "<tr>";
            echo "<td>$estado    </td>";
            echo "<td>$apellidos </td>";
            echo "<td>$nombres   </td>";
            echo "<td>$ruc       </td>";
            echo "<td>$telefono  </td>";
            echo "<td>$direccion </td>";

               if($id == $id)
               {
                   echo "<form action='ingreso_clientes.php?id_cliente=$id' method='post'";
                   echo "<td> <input type='submit' value='Actualizar'></td>";
                   echo "</form>";
               }

               if("id_cliente" == "id_cliente")
               {
                   echo "<form action='borrar_clientes.php?id_cliente=$id' method='post'";
                   echo "<td> <input type='submit' value='Borrar'></td>";
                   echo "<input type='hidden' name='estado' value='$estado'>";
                   echo "</form>";
               }
               
               
               

         }

                   echo "</tr>";
                   echo "</table>";
  }




?>

<BR>    <BR>
<center>
<form method="POST" action="ingreso_clientes.php">
<input type="submit" value="Ingresar">
</form>

   <form method='post' action='index.php'>
   <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
   </form>

</center>




</BODY>
</HTML>
