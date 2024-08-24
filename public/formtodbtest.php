<?php
// Database connection
$host = 'your-rds-endpoint.rds.amazonaws.com';
$db   = 'web_board';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Function to sanitize input
function sanitize($input) {
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'] ?? '';
    if (!empty($content)) {
        $stmt = $pdo->prepare("INSERT INTO posts (content, created_at) VALUES (?, NOW())");
        $stmt->execute([sanitize($content)]);
    }
}

// Fetch posts
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web掲示板</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .post {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .post-date {
            color: #666;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <h1>Web掲示板</h1>
    <form method="post">
        <textarea name="content" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="投稿">
    </form>
    <h2>投稿一覧</h2>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <p><?= sanitize($post['content']) ?></p>
            <p class="post-date"><?= $post['created_at'] ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
    <dd><?= nl2br(htmlspecialchars($row['text'])) ?></dd>
  </dl>
<?php endforeach ?>
