<?php
session_start();
require_once 'db.php';


$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$passhash = md5($password);


// VULNERABLE QUERY (intentional for CTF)
$query = "SELECT * FROM users WHERE username='$username' AND password='$passhash'";
$result = $mysqli->query($query);


if ($result && $result->num_rows == 1) {
$row = $result->fetch_assoc();
// store minimal info in session
$_SESSION['user'] = [
'id' => $row['id'],
'username' => $row['username'],
'role' => $row['role']
];
header('Location: profile.php');
exit;
}


// If not successful, show simple message and the raw query for easier exploitation and deterministic behaviour
echo "Invalid credentials.<br/><br/>";
echo "Query used: <pre>" . htmlspecialchars($query) . "</pre>";


?>
