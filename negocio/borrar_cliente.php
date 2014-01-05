<HTML>
<HEAD>
 <TITLE>Borrar Clientes</TITLE>
</HEAD>
<BODY>
<?
     require("config.php");
     require("header.php");

     $db = mysql_connect($dbhost, $dbuser, $dbpassword);
     mysql_select_db($dbdatabase, $db);

     $id = $_REQUEST ['id'];
     $estado = $_REQUEST['estados'];
     
     echo "<BR><BR><BR><BR><BR><BR><BR><BR>";
     
     if($estado == "ACTIVO")
     {
         echo "<center> <h1>Recuerde que no se puede borrar a un cliente Activo</h1> </center>";
     }
     else
     {
         echo "<center> <h1>Borrado exitosamente </h1> </center>";
         
         $sql="DELETE FROM clientes WHERE id_cliente = $id";
         $resultado = mysql_query($sql);
     }

     echo "<meta http-equiv='refresh' content='2;URL=$config_basedir/index_clientes.php'> ";
?>
</BODY>
</HTML>
