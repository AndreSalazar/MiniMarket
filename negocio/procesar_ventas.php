<HTML>
<HEAD>
 <TITLE>VENTA DE PRODUCTOS</TITLE>
</HEAD>
<BODY>
<?php
  require("config.php");
  //***************************ESTOS PARAMETROS SON PARA CONECTARSE A LA BASE DE DATOS*****************************//
  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);
  //************************************AQUI OBTENGO EL RESULTADO DE LA TABLA PRODUCTO**************************************//
  $sql = "SELECT producto.id_producto, producto.nombre_producto, producto.cantidad_producto,
  producto.pvp_venta_producto, clientes.id_cliente, clientes.apellido_cliente,
  clientes.nombre_cliente, clientes.ruc_cliente, clientes.telefono_cliente,
  clientes.direccion_cliente FROM producto, clientes";

  $resultado = mysql_query($sql);

  //************************************OBTENGO LOS DATOS DE INDEX_COMPRAS.PHP***************************************//
  /* *********** */  $id_client =  $_REQUEST['selec_cliente'];  /* *********** */
  /* *********** */  $id_producto = $_REQUEST['selec_producto'];   /* *********** */
  /* *********** */  $cantidad_to = $_REQUEST['cantidad'];         /* *********** */
  //*********************************************************************************************************//

   //******************OBTENGO LA FECHA****************************//
   $a = date ("Y - m - j");

   while($registro = mysql_fetch_assoc($resultado))
   {
      $id =         $registro['id_producto'];
      $nombre =     $registro['nombre_producto'];
      $cantidad=    $registro['cantidad_producto'];
      $pvp_venta =  $registro['pvp_venta_producto'];

      $id_cliente = $registro['id_cliente'];
      $ap_cliente = $registro['apellido_cliente'];
      $no_cliente = $registro['nombre_cliente'];
      $ru_cliente = $registro['ruc_cliente'];
      $te_cliente = $registro['telefono_cliente'];
      $di_cliente = $registro['direccion_cliente'];
      

      if($id_client == $id_cliente)
      {
          if($id_producto == $id)
          {
            $subtotal = $cantidad_to *  $pvp_venta;
            $iva = ($subtotal * 12)/100;
            $total = $subtotal + $iva;
            echo "<center>";
            echo "EL SUBTOTAL ES:      $subtotal <BR>";
            echo "EL IVA ES:           $iva <BR>";
            echo "EL TOTAL A PAGAR ES: $total <BR>";
            echo "</center>";
          //***********************************AQUI SE INSERTA AL PROVEEDOR*******************************************//
          $sql2 = "INSERT INTO venta(cantidad_venta, descripcion_venta, pvp_venta, total_venta, fecha_venta,
          apellido_cliente, nombre_cliente, ruc_cliente, telefono_cliente, direccion_cliente)"
          . " values ('$cantidad_to', '$nombre', '$pvp_venta', '$total', '$a', '$ap_cliente', '$no_cliente', '$ru_cliente',
          '$te_cliente', '$di_cliente')";

          $resultado2 = mysql_query($sql2);

          //**********************************AQUI RESTO LOS PRODUCTOS QUE COMPRO****************************************//
          $result = $cantidad -  $cantidad_to;
          
            if($cantidad_to > $cantidad)
            {
               echo "<center><h1>Usted a excedido su cantidad de productos</h1> </center>";
            }
            else
            {
            //*************************************SENTENCIA PARA EJECUTAR LA RESTA****************************************//

               $sql3 = "UPDATE producto SET cantidad_producto = '$result', estado_producto = 'ACTIVO' WHERE id_producto = '$id_producto'";
               $resultado3 = mysql_query($sql3);
               
               $sql7 = "UPDATE clientes SET estado_cliente = 'ACTIVO' WHERE id_cliente = '$id_cliente'";
               $resultado7 = mysql_query($sql7);
            }
            


    echo "<meta http-equiv='refresh' content='15;URL=$config_basedir/index_ventas.php>";

      }
   }

 }


?>
</BODY>
</HTML>
