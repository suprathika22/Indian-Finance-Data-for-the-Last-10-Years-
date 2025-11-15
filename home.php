<?php session_start(); ?>
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
    <!-- Welcome Section -->
    <div class="welcome-message">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Here's your personalized financial dashboard.</p>
    </div>

    <!-- Quick Finance Stats -->
    <section class="stats-summary">
        <div class="stat-box">Total Portfolio Value: ₹750,000</div>
        <div class="stat-box">Annual ROI: 12%</div>
        <div class="stat-box"><a href="transactions.php" style="text-decoration: none; color: black; font-weight: bold;">Savings Balance: ₹500,000</a>
        </div>
        <div class="stat-box">Asset Diversification</div>
    </section>

    <!-- Investment Insights -->
    <section class="investment-insights">
        <h3>Top Investment Insights</h3>
        <div class="insight-card">
            <h4>Equity Market Trends</h4>
            <p>Equities have seen a growth of 15% this year.</p>
        </div>
        <div class="insight-card">
            <h4>Real Estate Returns</h4>
            <p>Real estate investments are yielding steady returns of 8%.</p>
        </div>
        <div class="insight-card">
            <h4>Cryptocurrency Investments</h4>
            <p>Top cryptocurrencies are showing promising gains of 20%.</p>
        </div>
    </section>

    <!-- Financial News -->
    <section class="financial-news">
        <h3>Latest Financial News</h3>
        <div class="news-card">
            <h4><a href="stock_market.php" style="text-decoration: none; color: black; font-weight: bold;">Stock Market Hits New Highs</a></h4>
            <p>Indian stock markets have surged, reaching record highs this quarter.</p>
        </div>
        <div class="news-card">
            <h4><a href="digital_payment.php" style="text-decoration: none; color: black; font-weight: bold;">Digital Payments Revolution</a></h4>
            <p>Digital transactions have increased by 30% across the nation.</p>
        </div>
        <div class="news-card">
            <h4><a href="intrest_rate.php" style="text-decoration: none; color: black; font-weight: bold;"> Interest Rates Adjustment</a></h4>
            <p>Government announces new changes to interest rates on savings accounts.</p>
        </div>
    </section>

</main>

<footer>
    <p>&copy; 2024 Indian Finance Dashboard | All Rights Reserved</p>
</footer>

</body>
</html>
