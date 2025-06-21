<?php
    include "./db_connect.php";
    include "./user_db.php";

    [$jmeno,$heslo,$email,$level]= read_user($conn,"test1");  
    echo $jmeno." ".$heslo." ".$heslo." ".$level."[/br]";

?>