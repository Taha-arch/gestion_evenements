<?php
require_once '../config/Database.php';

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "✅ Connection to the database established successfully!";
} else {
    echo "❌ Failed to connect to the database.";
}
?>
