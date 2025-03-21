<?php
session_start();
include 'db_connect.php'; // Ensure this file has correct DB connection settings

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "Email and password are required!";
        header("Location: login.php");
        exit();
    }

    // Use prepared statement for security
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify password using password_verify()
        if (password_verify($password, $row["password"])) {
            $_SESSION["email"] = $email;
            $_SESSION["success"] = "Login successful!";
            header("Location: home.php");
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password!";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "Email not found!";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
