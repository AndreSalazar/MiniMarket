<HTML>
<HEAD>
 <TITLE>Busquedas</TITLE>
</HEAD>
<BODY>
<?php
  require ('header.php');

      echo "<BR><BR><BR><BR><BR><BR>";
  
      echo "<form action='procesar_busqueda.php' method='post'>";
      echo "<h2>PAGINA DE BUSQUEDA: </h2> <BR>";
      echo "PROVEDORES <input type='radio' name='datos' value='Proveedor'> ";
      echo "CLIENTES   <input type='radio' name='datos' value='Cliente'> ";

            echo "<BR><BR> <select name='busqueda'>";
            echo "<option value='2'>Nombres  </option>";
            echo "<option value='1'>Apellidos</option>";
            echo "</select>";
      echo "<BR><BR><input type='text' name='caracteres' value=''>";
      echo "<BR><BR><input type='submit' style='background:Yellow' name='buscar' value='Buscar'>";
      


      echo "<BR><BR> <HR COLOR='FF0000' WIDTH=280 SIZE=8  >";
      echo "<BR><BR>NOMBRE DEL PRODUCTO <input type='radio' name='datos' value='Producto'> ";

      echo "<BR><BR><input type='text' name='caracter' value=''>";
      echo "<BR><BR><input type='submit' style='background:Yellow' name='busca' value='Buscar'>";
      echo "</form>";
?>

      <form method='post' action='index.php'>
      <BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio'>
      </form>

</BODY>
</HTML>
