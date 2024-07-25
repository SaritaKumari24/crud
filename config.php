<?php


$servername = "localhost";
$username = "root"; // change if necessary
$password = ""; // change if necessary
$dbname = "form_submission";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function insertData($table_name, $data){
    global $conn;
    $cols =implode(",",array_keys($data));
    $values=implode("','", array_values($data));
    $query=$conn->query("insert into $table_name ($cols) values ('$values')");
   return $query;
}
//calling
function callingData($table, $cond) {
    global $conn;
    $query = $conn->query("SELECT * FROM $table WHERE $cond");
    $data = $query->fetch_all(MYSQLI_ASSOC);
    return $data;
}


//delete

function deleteRecord($table, $cond){
    global $conn;
    $query=$conn->query("DELETE FROM $table WHERE $cond");
    return $query;
}

//redirect function
function redirect($page){
    echo "<script>window.open('$page','_self')</script>";
}
function updateData($table, $data, $cond) {
    global $conn;
    $setString = "";
    foreach ($data as $key => $value) {
        $setString .= "$key = '$value', ";
    }
    $setString = rtrim($setString, ", ");
    $query = "UPDATE $table SET $setString WHERE $cond";
    return $conn->query($query);
}

?>