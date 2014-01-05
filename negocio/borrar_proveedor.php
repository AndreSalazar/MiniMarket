<HTML>
<HEAD>
 <TITLE>Borrar Proveedor</TITLE>
</HEAD>
<BODY>
<?
     require("config.php");
     require("header.php");

     $db = mysql_connect($dbhost, $dbuser, $dbpassword);
     mysql_select_db($dbdatabase, $db);

     $id =  $_REQUEST ['id'];
     $estado =  $_REQUEST ['estado'];

     echo "<BR><BR><BR><BR><BR><BR><BR><BR>";
     
     if($estado == "ACTIVO")
     {
         echo "<center> <h1>Recuerde que no se puede borrar a un Proveedor activo</h1> </center>";
     }
     else
     {
     echo "<center> <h1>Borrado exitosamente </h1> </center>";
         
         $sql="DELETE FROM proveedor WHERE id_proveedor = $id";
         $resultado = mysql_query($sql);
     }
     echo "<meta http-equiv='refresh' content='2;URL=$config_basedir/index_proveedores.php'> ";

?>
</BODY>
</HTML>
