<HTML>
<HEAD>
 <TITLE>SISTEMA PARA LISTAR PROVEEDORES</TITLE>
</HEAD>
<BODY>
    <center> <h1>LISTADO DE PROVEEDORES</h1> </center>
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
      $id =          $registro['id_proveedor'];
      $apellidos =   $registro['apellido_proveedor'];
      $nombres =     $registro['nombre_proveedor'];
      $ruc =         $registro['ruc_proveedor'];
      $telefono =    $registro['telefono_proveedor'];
      $direccion =   $registro['direccion_proveedor'];
      $estado    =   $registro['estado_proveedor'];

      echo "<tr>";
      echo "<td>$estado </td>";
      echo "<td>$apellidos </td>";
      echo "<td>$nombres   </td>";
      echo "<td>$ruc       </td>";
      echo "<td>$telefono  </td>";
      echo "<td>$direccion </td>";


      if($id == $id)
      {
         echo "<form action='ingreso_proveedores.php?id_proveedor=$id' method='post'";
         echo "<td> <input type='submit' value='Actualizar'></td>";
         echo "</form>";
      }

      if($nombres == $nombres)
      {
         echo "<form action='borrar_proveedores.php?id_proveedor=$id' method='post'";
         echo "<input type='hidden' name='estado' value='$estado'> </td>";
         echo "<td> <input type='submit' value='Borrar'> </td>";
         echo "</form>";
      }

   }

      echo "</tr>";
      echo "</table>";
  }
?>
<BR><BR>
<center>
<form method="POST" action="ingreso_proveedores.php">
<input type="submit" value="Ingresar Proveedores">
</center>
</form>


<BR><BR>
<center>

     <form method='post' action='index.php'>
     <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
     </form>

</center>





</BODY>
</HTML>
