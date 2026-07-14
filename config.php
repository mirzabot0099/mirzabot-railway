<?php
$request_exec_timeout = null;

// ==================== تنظیمات دیتابیس ====================
$dbhost = 'localhost';
$dbname = 'mirzabot';
$usernamedb = 'mirza';
$passworddb = getenv('DB_PASSWORD');

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$dbhost;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $usernamedb, $passworddb, $options);
} catch (\PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("error: database connection failed");
}

// ==================== تنظیمات ربات تلگرام ====================
$APIKEY = getenv('BOT_TOKEN');
$adminnumber = getenv('ADMIN_ID');

// ==================== تنظیمات دامنه و وب‌هوک ====================
$domainhosts = 'https://mirzabot-railway-production.up.railway.app';
$usernamebot = 'YourBotUsername';
?>
