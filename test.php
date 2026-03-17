<?php

$host = '0.0.0.0';
$db = 'meerkat';
$user = 'local_user';
$pass = 'local_password'; // Copy exactly from .env

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    echo "✅ Success! Laravel's driver can connect.";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
