<?php

function read_user($conn,$username){
    $sql="SELECT * FROM `users` WHERE `jmeno` = '$username';";
    //echo "<br>1".$sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       // print_r ($row);
        return [$row["id"],$row["jmeno"],$row["heslo"],$row["email"],$row["level"]];
    }   
    else {
        //echo "0 results";
        return [0,0,0,0];
    };
}

function if_exist_user($conn,$jmeno){
    $sql="SELECT * FROM `users` WHERE `jmeno` = '$jmeno';";
    //echo "<br>2".$sql;
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        return 0;
    }
    else {
        return 1;
    }
};

function update_user($conn,$jmeno,$heslo,$email,$level){
    [$id,$old_jmeno,$old_heslo,$old_email,$old_level]=read_user($conn,$jmeno);
    if ($heslo=="0"){ $heslo=$old_heslo;}    
    if ($email=="0"){ $email=$old_email;}
    if ($level=="0"){ $level=$old_level;}
    echo "heslo pro update je ".$heslo;
    $hash=password_hash($heslo,PASSWORD_DEFAULT);
    $sql = "UPDATE `users` SET `jmeno` = '$jmeno', `heslo` = '$hash', `email` = '$email', `level` = '$level' WHERE `users`.`id` = '$id';";
    $result = $conn->query($sql);
        
}

function create_user($conn,$jmeno,$heslo,$email,$level){
    if (!if_exist_user($conn,$jmeno)){
        $pass_hash=password_hash($heslo,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`id`, `jmeno`, `heslo`, `email`, `level`) VALUES (NULL, '$jmeno', '$pass_hash','$email', '$level');";
        echo "<br>".$sql;
        $result = $conn->query($sql);
        return 1;
    }
    else {
        echo "<br>uživatel již existuje";
        return 0;
    }
}

function verifi_user ($conn,$jmeno,$heslo){
    [$id,$jmeno,$heslo_db,$email,$level]= read_user($conn,$jmeno);  
     return (password_verify($heslo, $heslo_db));
        
}


?>