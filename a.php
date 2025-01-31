<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the path to the file
$file = __DIR__ . '/path/to/your/file.php';

// Check if the file exists
if (file_exists($file)) {
    include $file;
} else {
    echo "File not found: " . htmlspecialchars($file);
}
?>
