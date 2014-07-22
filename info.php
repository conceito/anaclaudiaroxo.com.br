<?php
//phpinfo();


$conecta = mysql_connect("mysql01.anaclaudiaroxo1.hospedagemdesites.ws", "anaclaudiaroxo1", "anabase01") or print (mysql_error());
mysql_select_db("anaclaudiaroxo1", $conecta) or print(mysql_error());
print "Conexão e Seleção OK!";
mysql_close($conecta);
?>
