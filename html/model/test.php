<?php
    include "./db_connect.php";
    include "./user_db.php";

    [$id,$jmeno,$heslo,$email,$level]= read_user($conn,"test11");  
    update_user($conn,"test11","heslo","test11@cz","0");
    [$id,$jmeno,$heslo,$email,$level]= read_user($conn,"test11");  
    echo "<br>čtení z databáze po změně ".$id." ".$jmeno." hash: ".$heslo." ".$email." ".$level." <br>";
    echo verifi_user($conn,"test11","heslo1") ? 'Heslo ověřeno<br>' : 'Špatné heslo<br>';
    
?>