<?php
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "robonexus";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // connect to the database
    if ($conn) {
        echo "Connected";
    } else {
        echo "Not Connected";
    }

    return $conn;
}
