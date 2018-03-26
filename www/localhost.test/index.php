<?php

echo "hello localhost";


try {
    $conn = new PDO('dblib:host=192.168.1.210;dbname=wildix;port=1433;version=7.0;charset=UTF-8', 'sa', 'wildix');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

$stmt = $conn->prepare("SELECT @@version;");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}

$stmt = $conn->prepare("SELECT * FROM [тест] ");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
}


$link = mysqli_connect("db", "root", "secret", "mytest");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
echo 'end';