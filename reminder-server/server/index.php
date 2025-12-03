<?php
session_start();

header("Content-Security-Policy: default-src 'none'; script-src 'none'; style-src 'self' 'unsafe-inline';");

$title = $_GET['title'] ?? '';
$desc  = $_GET['desc'] ?? '';

if ($title && $desc) {
    $_SESSION['tasks'][] = [
        'title' => $title,
        'desc'  => $desc
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reminder</title>
    <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
          background: #fafafa;
          padding: 60px 20px;
          line-height: 1.6;
        }

        .box {
          max-width: 500px;
          margin: 0 auto;
          background: white;
          padding: 40px;
          border-radius: 2px;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        h2 {
          font-size: 20px;
          font-weight: 500;
          color: #1a1a1a;
          margin-bottom: 24px;
        }

        label {
          display: block;
          font-size: 13px;
          color: #666;
          margin-bottom: 6px;
          margin-top: 16px;
        }

        input {
          width: 100%;
          padding: 10px 12px;
          border: 1px solid #ddd;
          border-radius: 2px;
          font-size: 14px;
          transition: border-color 0.2s;
        }

        button {
          margin-top: 24px;
          padding: 10px 24px;
          border: none;
          background: #1a1a1a;
          color: white;
          font-size: 14px;
          border-radius: 2px;
          cursor: pointer;
        }

        .task {
          max-width: 500px;
          margin: 24px auto 0;
          padding: 32px 40px;
          background: white;
          border-radius: 2px;
          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .task h3 {
          font-size: 18px;
          font-weight: 500;
          color: #1a1a1a;
          margin-bottom: 12px;
        }

        .task p {
          font-size: 14px;
          color: #666;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Create Task</h2>
    <form method="GET">
        <label>Title</label>
        <input type="text" name="title" required>

        <label>Description</label>
        <input type="text" name="desc" required>

        <button type="submit">Add</button>
    </form>
</div>

<?php if (!empty($_SESSION['tasks'])): ?>
    <?php foreach ($_SESSION['tasks'] as $task): ?>
        <div class="task">
            <h3><?= htmlspecialchars($task['title']) ?></h3>

            <p><?= $task['desc'] ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
