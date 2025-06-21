<?php

function read_user($conn,$username){
    $sql="SELECT * FROM `users` WHERE `jmeno` = '$username';";
    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        /*while($row = $result->fetch_assoc()) {
            print "jmeno: " . $row["jmeno"]. " - heslo: " . $row["heslo"]. " email:" . $row["email"]. " level:". $row["level"]."<br>";
        };*/
        $row = $result->fetch_assoc();
        return [$row["jmeno"],$row["heslo"],$row["email"],row["level"]];
    }   
    else {
        //echo "0 results";
        return [0,0,0,0];
    };
}

function if_exist_user($conn,$username){
    $sql="SELECT * FROM `users` WHERE `jmeno` = '$username';";
    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows = 0) {
        return 0;
    }
    else {
        return 1;
    }
};




?>