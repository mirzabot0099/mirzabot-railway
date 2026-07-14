cat > /app/config.php << 'EOF'
<?php
$db = new SQLite3('/app/database.sqlite');

$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    telegram_id TEXT UNIQUE,
    username TEXT,
    first_name TEXT,
    last_name TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS configs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    config_data TEXT,
    status TEXT DEFAULT 'active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$db->exec("CREATE TABLE IF NOT EXISTS settings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    setting_key TEXT UNIQUE,
    setting_value TEXT
)");

$db->exec("INSERT OR IGNORE INTO settings (setting_key, setting_value) VALUES ('bot_name', 'MirzaBot')");
$db->exec("INSERT OR IGNORE INTO settings (setting_key, setting_value) VALUES ('start_message', 'به ربات میرزا خوش آمدید!')");

$APIKEY = '8681272669:AAEeMHPNFldsBFFaP9RIBu3294bVnLarG58';
$adminnumber = '123456789';
$domainhosts = 'https://mirzabot-railway-production.up.railway.app';
$usernamebot = 'Evegeve_bot';

function db_query($sql, $params = []) {
    global $db;
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        throw new Exception("SQL Error: " . $db->lastErrorMsg());
    }
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $result = $stmt->execute();
    if ($result === false) {
        throw new Exception("Query Error: " . $db->lastErrorMsg());
    }
    return $result;
}
?>
EOF
