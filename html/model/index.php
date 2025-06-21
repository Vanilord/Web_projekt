<?php
    //phpinfo();

    $servername = "localhost";
    $username = "admin";
    $password = "513701";
    $dbname = "knihy";



try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}

mysqli_set_charset($conn, 'utf8mb4');

if (isset($_POST["_text"])) {
    $text1=$_POST["_text"];
    $sql = "INSERT INTO `blog` (`id`, `cas_datum`, `text`, `autor`) VALUES (NULL, '2025-06-19 20:17:29.000000', '$text1', '1');";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        }

$sql="SELECT * FROM `blog`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   print "id: " . $row["id"]. " - Čas: " . $row["cas_datum"]. " " . $row["text"]. "<br>";
  }
} else {
  echo "0 results";
}


?>

<form action="index.php" method="post">
    text: <input type="text" name="_text" value="">
    <input type="submit" value="odeslat">
</form>
