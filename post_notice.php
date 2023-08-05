<?php

$db = new mysqli('localhost', 'root', '', 'notices');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

$sql = "SELECT * FROM notices
ORDER BY created_at DESC;";

try {
    $results = $db->query($sql);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        echo '<li><a href="#">' . $row['subject'] . '</a></li>';
    }
} else {
    echo 'No notices found';
}

$db->close();
