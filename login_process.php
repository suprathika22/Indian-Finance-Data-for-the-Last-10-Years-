<?php
// Database connection details
$host = '127.0.0.1';
$user = 'root';
$pass = ''; // Replace with your MySQL password
$database = 'finance_data';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Query to check user
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("Location: home.php"); // Redirect to dashboard
            exit;
        } else {
            echo "<p style='color: red; text-align: center;'>Incorrect password. Please try again.</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>User does not exist. Please register.</p>";
    }

    $stmt->close();
}

mysqli_close($conn);
?>
