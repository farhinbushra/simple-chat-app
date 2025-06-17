<?
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_database');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}