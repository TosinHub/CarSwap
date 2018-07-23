<?php

define('DBHOST','localhost');
define('DBNAME','swap');
define('DBUSER','root');
define('DBPASS','123');

  
        //Set DSN
        $dsn = 'mysql:host='. DBHOST.';dbname='. DBNAME;
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION

        );
        //CREATE NEW PDO
        try{
            $conn = new PDO($dsn, DBUSER, DBPASS, $options);

        }catch(PDOExeption $e){
            $error = $e->getMessage();
        }
    


