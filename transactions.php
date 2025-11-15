<?php
session_start();

// Database connection details
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$database = 'finance_data';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve transactions
$sql = "SELECT transaction_type, amount, transaction_date FROM transactions ORDER BY transaction_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Indian Finance Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .nav-btn {
            color: white;
            padding: 4px 8px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .nav-btn:hover {
            background-color: #4CAF50;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<header>
    <h1>Indian Finance Dashboard</h1>
    <nav>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
</header>

<main>
    <div class="welcome-message">
        <h2>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?>!</h2>
        <p>Here's your personalized financial dashboard.</p>
    </div>

    <h3 style="text-align:center; margin-top: 20px;">Recent Transactions</h3>

    <table>
        <tr>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Transaction Date</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['transaction_type']) . "</td>";
                echo "<td>₹" . htmlspecialchars($row['amount']) . "</td>";
                echo "<td>" . htmlspecialchars($row['transaction_date']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No transactions found</td></tr>";
        }
        ?>

    </table>
</main>

<footer>
    <p>&copy; 2024 Indian Finance Dashboard | All Rights Reserved</p>
</footer>

<?php mysqli_close($conn); ?>

</body>
</html>
