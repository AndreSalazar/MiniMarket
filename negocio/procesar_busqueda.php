<HTML>
<HEAD>
 <TITLE>Procesar Busqueda</TITLE>
</HEAD>
<BODY>
<?
  require ('header.php');
  require("config.php");

  echo "<BR><BR><BR><BR><BR><BR><BR><BR>";


  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);

  //**********************************Obtengo el caracter que ingreso en el formulario********************************
  $caracter = $_REQUEST['caracteres'];     //Obtengo la cadena de caracteres que ingreso en el formulario
  $datos = $_REQUEST['datos'];             //Obtengo la informacion que vieve del boton tipo radio
  $busqueda = $_REQUEST['busqueda'];       //Obtengo los valores del select
  $caracter1 = $_REQUEST['caracter'];      //Obtengo la cadena de caracteres que ingreso en el formulario para productos


  //**************************************Selecciono la tabla Proveedores*********************************************
  $sql_apellido = "SELECT * FROM proveedor WHERE apellido_proveedor like '$caracter%' LIMIT 0, 30";
  $sql_nombre   = "SELECT * FROM proveedor WHERE nombre_proveedor like '$caracter%' LIMIT 0, 30";
  
  $resultado_apellido = mysql_query($sql_apellido);
  $resultado_nombre   = mysql_query($sql_nombre);
  
  //**************************************Selecciono la tabla Clientes*************************************************
  $sql_ape_cli = "SELECT * FROM clientes  WHERE apellido_cliente like '$caracter%' LIMIT 0, 30";
  $sql_nom_cli = "SELECT * FROM clientes  WHERE nombre_cliente   like '$caracter%' LIMIT 0, 30";

  $resultado_ape_cli = mysql_query($sql_ape_cli);
  $resultado_nom_cli = mysql_query($sql_nom_cli);
  
  //**************************************Selecciono la tabla Productos*************************************************
  $sql_nom_pro = "SELECT * FROM producto  WHERE nombre_producto like '$caracter1%' LIMIT 0, 30";

  $resultado_nom_pro = mysql_query($sql_nom_pro);


  //***************************En esta sentencia verifico si la variable caracter viene vacia*************************
  if(empty($caracter1) AND empty($caracter))
  {
     echo "<h1>Por favor ingrese datos validos</h1>";
  }



  //*******************************************Sentencia para proveedores***********************************************

  if($datos == "Proveedor")
  { //if de proveedor
       if($busqueda == 1)
       {
           if($caracter)
           {
               echo "<table border='7' align='center'>";
               echo "<tr>";
               echo "<td>APELLIDOS</td>";
               echo "<td>NOMBRES</td>";
               echo "<td>R.U.C / C.I</td>";
               echo "<td>TELEFONO</td>";
               echo "<td>DIRECCION</td>";
               echo "</tr>";

                    while($registro = mysql_fetch_assoc($resultado_apellido))
                    {
                        $id =          $registro['id_proveedor'];
                        $apellidos =   $registro['apellido_proveedor'];
                        $nombres =     $registro['nombre_proveedor'];
                        $ruc =         $registro['ruc_proveedor'];
                        $telefono =    $registro['telefono_proveedor'];
                        $direccion =   $registro['direccion_proveedor'];

                        //En esta funcion extraigo las primeras letras del apellido
                        substr($apellidos,0,1);

                        echo "<tr>";
                        echo "<td>$apellidos </td>";
                        echo "<td>$nombres   </td>";
                        echo "<td>$ruc       </td>";
                        echo "<td>$telefono  </td>";
                        echo "<td>$direccion </td>";
                    }
                        echo "</tr>";
                        echo "</table>";
           }
       }
       else
       //En esta sentencia verifico si la variable busqueda viebe con valor de 2
   
       if($busqueda == 2)
       {
            if($caracter)
            {
                 echo "<table border='7' align='center'>";
                 echo "<tr>";
                 echo "<td>APELLIDOS</td>";
                 echo "<td>NOMBRES</td>";
                 echo "<td>R.U.C / C.I</td>";
                 echo "<td>TELEFONO</td>";
                 echo "<td>DIRECCION</td>";
                 echo "</tr>";

                 while($registro = mysql_fetch_assoc($resultado_nombre))
                 {
                       $id =          $registro['id_proveedor'];
                       $apellidos =   $registro['apellido_proveedor'];
                       $nombres =     $registro['nombre_proveedor'];
                       $ruc =         $registro['ruc_proveedor'];
                       $telefono =    $registro['telefono_proveedor'];
                       $direccion =   $registro['direccion_proveedor'];

                       //En esta funcion extraigo las primeras letras del nombre
                       substr($nombres,0,1);

                       echo "<tr>";
                       echo "<td>$apellidos </td>";
                       echo "<td>$nombres   </td>";
                       echo "<td>$ruc       </td>";
                       echo "<td>$telefono  </td>";
                       echo "<td>$direccion </td>";
                  }
                       echo "</tr>";
                       echo "</table>";
             }
       }
  }//cerrar if de proveedor

  
  //*****************************************Sentencia para clientes***************************************************

  if($datos == "Cliente")
  { //if del cliente
       if($busqueda == 1)
       {
           if($caracter)
           {
               echo "<table border='7' align='center'>";
               echo "<tr>";
               echo "<td>APELLIDOS</td>";
               echo "<td>NOMBRES</td>";
               echo "<td>R.U.C / C.I</td>";
               echo "<td>TELEFONO</td>";
               echo "<td>DIRECCION</td>";
               echo "</tr>";

                    while($registro = mysql_fetch_assoc($resultado_ape_cli))
                    {
                        $id =          $registro['id_cliente'];
                        $apellidos =   $registro['apellido_cliente'];
                        $nombres =     $registro['nombre_cliente'];
                        $ruc =         $registro['ruc_cliente'];
                        $telefono =    $registro['telefono_cliente'];
                        $direccion =   $registro['direccion_cliente'];

                        //En esta funcion extraigo las primeras letras del apellido
                        substr($apellidos,0,1);

                        echo "<tr>";
                        echo "<td>$apellidos </td>";
                        echo "<td>$nombres   </td>";
                        echo "<td>$ruc       </td>";
                        echo "<td>$telefono  </td>";
                        echo "<td>$direccion </td>";
                    }
                        echo "</tr>";
                        echo "</table>";
           }
       }
       else
       //En esta sentencia verifico si la variable busqueda viebe con valor de 2

       if($busqueda == 2)
       {
            if($caracter)
            {
                 echo "<table border='7' align='center'>";
                 echo "<tr>";
                 echo "<td>APELLIDOS</td>";
                 echo "<td>NOMBRES</td>";
                 echo "<td>R.U.C / C.I</td>";
                 echo "<td>TELEFONO</td>";
                 echo "<td>DIRECCION</td>";
                 echo "</tr>";

                 while($registro = mysql_fetch_assoc($resultado_nom_cli))
                 {
                       $id =          $registro['id_cliente'];
                       $apellidos =   $registro['apellido_cliente'];
                       $nombres =     $registro['nombre_cliente'];
                       $ruc =         $registro['ruc_cliente'];
                       $telefono =    $registro['telefono_cliente'];
                       $direccion =   $registro['direccion_cliente'];

                       //En esta funcion extraigo las primeras letras del nombre
                       substr($nombres,0,1);

                       echo "<tr>";
                       echo "<td>$apellidos </td>";
                       echo "<td>$nombres   </td>";
                       echo "<td>$ruc       </td>";
                       echo "<td>$telefono  </td>";
                       echo "<td>$direccion </td>";
                  }
                       echo "</tr>";
                       echo "</table>";
             }
       }
  }//cerrar if del cliente
  
  //*****************************************Sentencia para productos***************************************************

  if($datos == "Producto")
  { //if del producto
       if($caracter1)
       {
               echo "<table border='7' align='center'>";
               echo "<tr>";
               echo "<td>NOMBRE PRODUCTO</td>";
               echo "<td>P.V.P DE LA COMPRA </td>";
               echo "<td>P.V.P DE LA VENTA </td>";
               echo "</tr>";

                    while($registro = mysql_fetch_assoc( $resultado_nom_pro))
                    {
                        $id =         $registro['id_producto'];
                        $nombres =    $registro['nombre_producto'];
                        $pvp_compra = $registro['pvp_compra_producto'];
                        $pvp_venta  = $registro['pvp_venta_producto'];

                        //En esta funcion extraigo las primeras letras del apellido
                        substr($nombres,0,1);

                        echo "<tr>";
                        echo "<td>$nombres    </td>";
                        echo "<td>$pvp_compra </td>";
                        echo "<td>$pvp_venta  </td>";

                    }
                        echo "</tr>";
                        echo "</table>";
           }


  }//cerrar if del producto

   echo "<form method='post' action='index_busqueda.php'>";
   echo "<BR><BR><input type='submit' style='background:Lightgreen' name='Enviar' value='Inicio de Busqueda'>";
   echo "</form>";

?>
</BODY>
</HTML>
