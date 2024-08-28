<?php
// database connection details
$servername = "172.31.30.248"; // MySQL server private IP address
$username = "root"; // MySQL username
$password = "fat"; // MySQL password
$dbname = "it"; // Database name

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection to the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// query to get all records from it_employees
$sql = "SELECT * FROM it_employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Department</title>
    <style>
        /* basic styles for the page */
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
        // retrieve the username from URL parameters
        $name = htmlspecialchars($_GET["name"]);
        ?>

        <h1>Welcome to the IT Department, <?php echo $name; ?>!</h1>
        <p>Here you will find employee information.</p>

        <?php
        if ($result->num_rows > 0) {
            // display results in a table format
            echo "<table>";
            echo "<tr><th>ID</th><th>Full Name</th><th>Email</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["full_name"]. "</td><td>" . $row["email"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found</p>";
        }

        // close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
