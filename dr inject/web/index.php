<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Portal Login</title>
<style>
body { font-family: Arial, sans-serif; background:#f2f2f2; }
.box { width:360px; margin:80px auto; padding:20px; background:#fff; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1); }
label{display:block;margin-top:10px}
</style>
</head>
<body>
<div class="box">
<h2>Portal Login</h2>
<form method="POST" action="login.php">
<label>Username</label>
<input type="text" name="username" style="width:100%" />
<label>Password</label>
<input type="password" name="password" style="width:100%" />
<div style="margin-top:12px">
<button type="submit">Login</button>
</div>
</form>
<p style="margin-top:12px">Known credential: <b>test:test</b></p>
</div>
</body>
</html>
