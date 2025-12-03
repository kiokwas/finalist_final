<?php
session_start();
if (!isset($_SESSION['user'])) {
header('Location: index.php');
exit;
}
require_once 'db.php';


$user = $_SESSION['user'];


// For completeness show user's stored DB row (non-sensitive fields only)
$stmt = $mysqli->prepare('SELECT id, username, role FROM users WHERE username=?');
$stmt->bind_param('s', $user['username']);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();


?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Profile</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($row['username']); ?> (<?php echo htmlspecialchars($row['role']); ?>)</h2>
<p>User ID: <?php echo htmlspecialchars($row['id']); ?></p>
<p>Role: <?php echo htmlspecialchars($row['role']); ?></p>


<?php if ($row['role'] === 'admin'): ?>
<h3>Admin secret</h3>
<pre>
<?php
// Show admin secret
$qq = "SELECT secret FROM users WHERE username='admin' LIMIT 1";
$r = $mysqli->query($qq);
if ($r && $r->num_rows == 1) {
$s = $r->fetch_assoc();
echo htmlspecialchars($s['secret']);
</html>
