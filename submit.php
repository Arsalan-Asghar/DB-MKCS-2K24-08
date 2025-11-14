<?php
// submit.php - basic example (for learning only). DO NOT publish real DB credentials in GitHub

$host = 'localhost';         // your MySQL host
$db   = 'students_db';      // your database name
$user = 'db_user';          // your MySQL username
$pass = 'db_password';      // your MySQL password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (Exception $e) {
    http_response_code(500);
    echo "DB connection failed: " . htmlspecialchars($e->getMessage());
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$roll = trim($_POST['roll_number'] ?? '');
$dob  = $_POST['date_of_birth'] ?? '';
$hobby= trim($_POST['hobby'] ?? '');

// Validate
if (!$name || !$roll || !$dob || !$hobby) {
    echo "All fields are required. <a href='index.html'>Back</a>";
    exit;
}

// Insert into database
try {
    $stmt = $pdo->prepare("INSERT INTO students (name, roll_number, date_of_birth, hobby) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $roll, $dob, $hobby]);
    echo "Submitted successfully. <a href='index.html'>Back</a>";
} catch (Exception $e) {
    echo "Insert failed: " . htmlspecialchars($e->getMessage());
}
