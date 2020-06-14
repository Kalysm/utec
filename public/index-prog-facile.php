<?php

require_once('class.BackupMysql.php'); 

echo "<br/> Debut de la sauvgarde MySQL";

$oBackupMysql = new BackupMysql( "mariadb-10.4.10", "mon_restaurant", "root", "", "UTF-8", "C:\wamp64\www\mon_restaurant\projetProg", "backupMR", "3306");
$oBackupMysql->deleteOldFile();
$oBackupMysql->setBbackupMySQL();

echo "<br /><br />----> Sauvegarde MySQL terminee !";

?>