<?php

include ("./config.php");

$pattern = '/\b(sh|flag|bin|nc|netcat|bash|rm)\b/i'; //very stronk

if($_SESSION["auth"] === "admin"){

    $command = isset($_GET["cmd"]) ? $_GET["cmd"] : "ls";
    $sanitized_command = str_replace("\n","",$command);
    if (preg_match($pattern, $sanitized_command)){
        exit("not that easy boayyyyy");
    }
    $result = shell_exec(escapeshellcmd($sanitized_command));
}
else if($_SESSION["auth"]=== "guest") {

    $command = "hello guest";
    $result = shell_exec($command);

}

else {
    $result = "Authentication first";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Output</title>
<style>
:root{--bg:#0b1220;--card:#0f1724;--accent:#7c3aed;--muted:#9aa4b2;--success:#22c55e}
*{box-sizing:border-box}
body{margin:0;min-height:100vh;font-family:Inter,ui-sans-serif,system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial;color:#e6eef8;background:linear-gradient(180deg,var(--bg),#071026);display:flex;align-items:center;justify-content:center;padding:24px}
.wrap{width:100%;max-width:900px;padding:22px;border-radius:12px;background:linear-gradient(180deg,rgba(255,255,255,0.02),rgba(255,255,255,0.01));border:1px solid rgba(255,255,255,0.03);box-shadow:0 12px 40px rgba(2,6,23,0.6);display:grid;grid-template-columns:1fr 360px;gap:20px}
.left{padding:12px}
h1{margin:0 0 8px;font-size:18px}
.meta{color:var(--muted);font-size:13px;margin-bottom:12px}
.output{background:#010409;border-radius:8px;padding:14px;min-height:320px;overflow:auto;border:1px solid #111315;font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,'Liberation Mono','Courier New',monospace;font-size:13px;color:#cbd5e1}
.right{padding:12px;background:rgba(255,255,255,0.01);border-radius:8px;border:1px solid rgba(255,255,255,0.02)}
label{display:block;font-weight:600;margin-bottom:6px;color:#cbd5e1}
input[type="text"]{width:100%;padding:10px;border-radius:8px;border:1px solid rgba(255,255,255,0.04);background:transparent;color:inherit}
.btn{display:inline-block;margin-top:10px;padding:10px 12px;border-radius:8px;border:none;background:linear-gradient(90deg,var(--accent),#5b21b6);color:#fff;font-weight:700;cursor:pointer}
.hint{font-size:13px;color:var(--muted);margin-top:8px}
.error{color:#ff7b72;margin-top:10px}
.ok{color:var(--success);margin-top:10px}
pre.empty{opacity:0.6}
@media (max-width:880px){.wrap{grid-template-columns:1fr;}.right{order:2}}
</style>
</head>
<body>
<div class="container">
<h2>Enter Username</h2>
<form method="POST" action="index.php">
<label for="username">Username:</label>
<input type="text" id="username" name="username" required>
<input type="submit" value="Submit">
<div class="message"><?php echo $message; ?></div>
</form>
</div>
</body>
</html>