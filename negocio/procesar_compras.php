<HTML>
<HEAD>
 <TITLE>COMPRA DE PRODUCTOS</TITLE>
</HEAD>
<BODY>
<?php
  require("config.php");
  //***************************ESTOS PARAMETROS SON PARA CONECTARSE A LA BASE DE DATOS*****************************//
  $db = mysql_connect($dbhost, $dbuser, $dbpassword);
  mysql_select_db($dbdatabase, $db);
  //************************************AQUI OBTENGO EL RESULTADO DE LA TABLA PRODUCTO**************************************//
  $sql = "SELECT producto.id_producto, producto.nombre_producto, producto.cantidad_producto,
  producto.pvp_compra_producto, proveedor.id_proveedor, proveedor.apellido_proveedor,
  proveedor.nombre_proveedor, proveedor.ruc_proveedor, proveedor.telefono_proveedor,
  proveedor.direccion_proveedor FROM producto, proveedor";

  $resultado = mysql_query($sql);

  //************************************OBTENGO LOS DATOS DE INDEX_COMPRAS.PHP***************************************//
  /* *********** */  $id_proveed =  $_REQUEST['selec_proveedor'];  /* *********** */
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
      $pvp_compra = $registro['pvp_compra_producto'];
      
      $id_proveedor = $registro['id_proveedor'];
      $ap_proveedor = $registro['apellido_proveedor'];
      $no_proveedor = $registro['nombre_proveedor'];
      $ru_proveedor = $registro['ruc_proveedor'];
      $te_proveedor = $registro['telefono_proveedor'];
      $di_proveedor = $registro['direccion_proveedor'];

      if($id_proveed == $id_proveedor)
      {
          if($id_producto == $id)
          {
          //***********************************AQUI SE INSERTA AL PROVEEDOR*******************************************//
          $sql2 = "INSERT INTO compra(cantidad_compra, descripcion_compra, pvp_compra, fecha_compra,
          apellido_proveedor, nombre_proveedor, ruc_proveedor, telefono_proveedor, direccion_proveedor)"
          . " values ('$cantidad_to', '$nombre', '$pvp_compra', '$a', '$ap_proveedor', '$no_proveedor', '$ru_proveedor',
          '$te_proveedor', '$di_proveedor')";

          $resultado2 = mysql_query($sql2);

          //**********************************AQUI RESTO LOS PRODUCTOS QUE COMPRO****************************************//
          $result = $cantidad +  $cantidad_to;
          //*************************************************************************************************************//
          //*************************************SENTENCIA PARA EJECUTAR LA RESTA****************************************//

               $sql3 = "UPDATE producto SET cantidad_producto = '$result', estado_producto = 'ACTIVO' WHERE id_producto = '$id_producto'";
               $resultado3 = mysql_query($sql3);

               $sql7 = "UPDATE proveedor SET estado_proveedor = 'ACTIVO' WHERE id_proveedor = '$id_proveedor'";
               $resultado7 = mysql_query($sql7);

    echo "<meta http-equiv='refresh' content='0;URL=$config_basedir/index_compras.php>";

      }
   }
   
 }


?>
</BODY>
</HTML>
