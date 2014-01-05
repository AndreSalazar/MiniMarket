<?php
       require("config.php");  //aqui se conecta a la pagina config.php
       $db = mysql_connect($dbhost, $dbuser, $dbpassword);
       mysql_select_db($dbdatabase, $db);
?>

       
       <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
       <html>
       <head>
       <title><?php echo $config_blogname; ?></title>
       <link rel="stylesheet" href="stylesheet.css" type="text/css" />
       </head>
       <body bgcolor=>
       <div id="header">
       <h1><?php echo "<font color='#00FF00'>SUPERMARKET</font>"; ?></h1>
       <h2>
       [<a href="historial_compras.php"> <font color="#FF0000">HISTORIAL DE COMPRAS</font> </a>]
       [<a href="historial_ventas.php"> <font color="#FF0000">HISTORIAL DE VENTAS</font> </a>]
       [<a href="index_busqueda.php"> <font color="#FF0000">BUSQUEDA</font> </a>]
       </h2>
       </div>
       </body>
       </html>


