<?php
	$conn = mysqli_connect("db", "aan", "aan", "aan");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>