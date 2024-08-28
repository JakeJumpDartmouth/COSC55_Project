<?php
// This script connects to the HR database, retrieves employee data, and displays it in a formatted table on an HTML page.

// Database credentials
$servername = "172.31.17.247"; // MySQL server private IP address
$username = "root"; // MySQL username
$password = "fat"; // MySQL password
$dbname = "hr"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection to ensure the database is accessible
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all records from the employees table
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Department</title>
    <style>
        /* Basic styling for the page layout and table */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Retrieve the username from query parameters for a personalized greeting
        $name = htmlspecialchars($_GET["name"]);
        ?>

        <h1>Welcome to the HR Department, <?php echo $name; ?>!</h1>
        <p>Here you will find employee information.</p>

        <?php
        if ($result->num_rows > 0) {
            // Output data of each row into a table format
            echo "<table>";
            echo "<tr><th>ID</th
