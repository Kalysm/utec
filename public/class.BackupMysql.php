<?php

/**
 * Permet d'effectuer une sauvegarde d'une base de données MySQL
 * A appeler via une tâche CRON : www.setcronjob.com
 * Gestion de la suppression des anciennes sauvegardes.
 * 
 */
class BackupMysql
{
    private $db_server;// mariadb10.4.10
    private $db_name;// my_restaurant
    private $db_username; // root
    private $db_password;// ''
    private $db_charset;// encodage de la base utf8 ou latin1
    private $port;// 3306

    private $nFileDuration;// Ancienneté des fichiers à conserver en s
    private $repertoire_sauvegardes;// répertoire des sauvegardes
    private $projetProg;// nom de l'archive gzip
    /**
     * @var string
     */


    /**
     * initialisation des variables
     * @param $sDBServer
     * @param $sDBName
     * @param $sDBUsername
     * @param $sDBPassword
     * @param string $sDBCharset
     * @param string $sRepSave [description]
     * @param string $sNameZip
     * @param string $sDBPort [description]
     */
    function __construct($sDBServer, $sDBName, $sDBUsername, $sDBPassword,
                          $sDBCharset, $sRepSave, $sNameZip,  $sDBPort)
    {
        $this->db_server = $sDBServer;
        $this->db_name = $sDBName;
        $this->db_username = $sDBUsername;
        $this->db_password = $sDBPassword;
        $this->db_charset = $sDBCharset;
        $this->port = $sDBPort;

        $this->repertoire_sauvegardes = $sRepSave;
        $this->projetProg = $sNameZip.date('Y-m-d_H-i-s').".sql";
    }

    /**
     * suppression des anciennes sauvegardes
     * @param  integer $sFileDuration : 3600s = 1h ---> 90 jours = 7776000
     * @return [type]                 [description]
     */
    public function deleteOldFile($nDuration = 7776000)
    {
        $this->nFileDuration = $nDuration;
        echo "<br /> Liste des fichiers du repertoire : ".$this->repertoire_sauvegardes;

        // liste les fichiers présents dans le répertoire
        foreach (glob( $this->repertoire_sauvegardes."*") as $file)
        {
            echo "<br />".$file;
            if ( filemtime($file) <=  (time() - $this->nFileDuration) )
                unlink($file);// supprime les vieux fichiers
        }

        echo "<br /><br /> Suppression des anciens fichiers effectuee.";
    }


    /**
     * Effectue la sauvegarde de la base de données dans un fichier gzip.
     * 
     */
    public function setBbackupMySQL()
    {
        // Vérification et création dossier sauvegarde
        if( is_dir($this->repertoire_sauvegardes) === FALSE )
        {
            // 0700 repertoire non visible par les visiteurs
            if( mkdir($this->repertoire_sauvegardes) === FALSE )
              exit('<br /><br />Impossible de creer le repertoire pour la sauvegarde mysql!!!');
        }

        echo "<br />Fin de la configuration mysql";

        //---------------------------------------------
        // execution de la commande mysql dump
        //---------------------------------------------
        $commande0 = 'cd C:\wamp64\bin\mariadb\mariadb10.4.10\bin';
        $commande1 = 'mysqldump -u root -p mon_restaurant > C:\wamp64\www\mon_restaurant\projetProg\backupMR.sql';

        system($commande0);
        system($commande1);


        echo "<br /><br />Sauvegarde terminee pour le fichier : ".$this->projetProg;
    }

}
