<?php
// ==============================
// config.php – Optimized for PH Time
// ==============================

// Detect environment
$httpHost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
$hostName = preg_replace('/:.+$/', '', $httpHost);
$isLocal = in_array($hostName, array('localhost', '127.0.0.1', '::1'), true)
    || preg_match('/\.(test|local|localhost|dev|localdomain)$/i', $hostName);

function getConfigValue($key, $default = '') {
    $value = getenv($key);
    if ($value !== false) {
        return $value;
    }
    if (isset($_SERVER[$key])) {
        return $_SERVER[$key];
    }
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }
    return $default;
}

if (!function_exists('str_starts_with')) {
    function str_starts_with($haystack, $needle) {
        if ($needle === '') {
            return true;
        }
        return strpos($haystack, $needle) === 0;
    }
}

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        if ($needle === '') {
            return true;
        }
        return strpos($haystack, $needle) !== false;
    }
}

function loadDotEnv($filePath) {
    if (!file_exists($filePath) || !is_readable($filePath)) {
        return array();
    }

    $content = file_get_contents($filePath);
    if ($content === false) {
        return array();
    }

    $lines = preg_split('/\r\n|\r|\n/', $content);
    $data = array();

    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#') || str_starts_with($line, ';')) {
            continue;
        }
        if (!str_contains($line, '=')) {
            continue;
        }
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);
        if (strlen($value) >= 2 && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
            $value = substr($value, 1, -1);
        }
        $data[$key] = $value;
    }

    if (empty($data)) {
        preg_match_all('/^([A-Z0-9_]+)\s*=\s*(.*)$/m', $content, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $data[trim($match[1])] = trim($match[2]);
        }
    }

    return $data;
}

// Database credentials
$host = getConfigValue('DB_HOST', 'localhost');
$db   = getConfigValue('DB_NAME', '');
$user = getConfigValue('DB_USER', '');
$pass = getConfigValue('DB_PASS', '');

function findDotEnvFile($fileNames) {
    $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '';
    $paths = array(
        __DIR__,
        dirname(__DIR__),
        $documentRoot,
        rtrim($documentRoot, '\\/') . '/public_html',
        __DIR__ . '/public_html',
        dirname(__DIR__) . '/public_html',
    );

    foreach ($paths as $path) {
        if (!$path) {
            continue;
        }
        foreach ($fileNames as $fileName) {
            $candidate = rtrim($path, '\\/') . '/' . ltrim($fileName, '\\/');
            if (file_exists($candidate) && is_readable($candidate)) {
                return $candidate;
            }
        }
    }

    return null;
}

$envFile = findDotEnvFile(['.env.hostinger', '.env']);
$envConfig = array();
if ($envFile !== null) {
    $envConfig = loadDotEnv($envFile);
    if (empty($envConfig) && function_exists('parse_ini_file')) {
        $iniConfig = parse_ini_file($envFile, false, INI_SCANNER_RAW);
        $envConfig = $iniConfig ? $iniConfig : array();
    }
}

$host = $host ?: (isset($envConfig['DB_HOST']) ? $envConfig['DB_HOST'] : 'localhost');
$db   = $db ?: (isset($envConfig['DB_NAME']) ? $envConfig['DB_NAME'] : '');
$user = $user ?: (isset($envConfig['DB_USER']) ? $envConfig['DB_USER'] : '');
$pass = $pass ?: (isset($envConfig['DB_PASS']) ? $envConfig['DB_PASS'] : '');

if ($isLocal) {
    $db   = $db ?: 'gym_mgmt';
    $user = $user ?: 'root';
    $pass = $pass ?: '';
}

if (!$db || !$user) {
    die('Missing database configuration. Set DB_NAME and DB_USER in environment variables, or create a .env.hostinger file in the project root. Env file path tried: ' . ($envFile ?: 'none'));
}

// Set PHP timezone to Philippines
date_default_timezone_set('Asia/Manila');

// Enable debug output when running locally or when APP_DEBUG=true is set.
$debugMode = $isLocal || strtolower(getConfigValue('APP_DEBUG', 'false')) === 'true';
if ($debugMode) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Determine the public base URL for this deployment.
// If the app is in root, BASE_URL becomes '/'. If installed in a subfolder, it respects that path.
$documentRoot = realpath(isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : '') ?: '';
$projectRoot = realpath(__DIR__) ?: '';
$basePath = '/';
if ($documentRoot && $projectRoot && str_starts_with(str_replace('\\', '/', $projectRoot), str_replace('\\', '/', $documentRoot))) {
    $basePath = '/' . trim(str_replace('\\', '/', ltrim(substr(str_replace('\\', '/', $projectRoot), strlen(str_replace('\\', '/', $documentRoot))), '/')), '/') . '/';
    if ($basePath === '//') {
        $basePath = '/';
    }
}
define('BASE_URL', $basePath);

try {
    // Connect to MySQL
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        $isAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')
            || (isset($_SERVER['HTTP_ACCEPT']) && stripos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)
            || strpos(basename($_SERVER['SCRIPT_NAME']), 'login_handler.php') !== false
            || (isset($_SERVER['REQUEST_URI']) && stripos($_SERVER['REQUEST_URI'], 'login_handler.php') !== false);

        if ($isAjax) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
            exit;
        }

        die("Connection failed: " . $conn->connect_error);
    }

    // Force MySQL session to Philippine Time (+08:00)
    $conn->query("SET time_zone = '+08:00'");

    // Optional: Verify MySQL timezone (for debugging)
    // $res = $conn->query("SELECT NOW() AS now_ph");
    // if ($res) { $row = $res->fetch_assoc(); echo $row['now_ph']; }

} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

// ==============================
// USAGE NOTES
// ==============================
// 1. For attendance (DATETIME or TIMESTAMP):
//    INSERT INTO attendance (time_in) VALUES (NOW());
//    → will store Philippine time in 24-hour format.
// 2. For payments (DATETIME or TIMESTAMP):
//    INSERT INTO payments (payment_date) VALUES (NOW());
//    → will store Philippine time correctly.
?>