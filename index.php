<?php
// correct username and password
$correct_username = 'LJ26';
$correct_password = 'Goldstein';

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $name = $_POST['name']; 
    $password = $_POST['password'];
    $department = $_POST['department'];

    // validate username and password
    if ($username === $correct_username && $password === $correct_password) {
        // redirect user based on department selection, include name in query
        switch ($department) {
            case 'sales':
                header("Location: sales.php?name=" . urlencode($name));
                exit();
            case 'engineering':
                header("Location: engineering.php?name=" . urlencode($name));
                exit();
            case 'hr':
                header("Location: hr.php?name=" . urlencode($name));
                exit();
            case 'it':
                header("Location: it.php?name=" . urlencode($name));
                exit();
            default:
                echo "Invalid department selected.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>
