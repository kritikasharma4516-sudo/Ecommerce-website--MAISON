<?php
session_start();

// 🔐 Check login
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

// 🔌 DB connection
$conn = new mysqli("localhost", "root", "", "project");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 🛑 Check cart
if (!isset($_POST['cart'])) {
    die("Cart not received");
}

// Decode cart
$cart = json_decode($_POST['cart'], true);

if (!is_array($cart) || count($cart) === 0) {
    die("Cart is empty or invalid");
}

$user = $_SESSION['user_name'];

// 💰 Calculate total
$total = 0;
foreach ($cart as $item) {
    if (isset($item['price'], $item['qty'])) {
        $total += $item['price'] * $item['qty'];
    }
}

// 🔥 1. Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (user_name, total) VALUES (?, ?)");
$stmt->bind_param("si", $user, $total);
$stmt->execute();

// Get order ID
$order_id = $stmt->insert_id;

// 🔥 2. Insert each item into order_items
$stmt_item = $conn->prepare(
    "INSERT INTO order_items (order_id, product_name, price, qty) VALUES (?, ?, ?, ?)"
);

foreach ($cart as $item) {

    if (!isset($item['name'], $item['price'], $item['qty'])) {
        continue;
    }

    $name = $item['name'];
    $price = (int)$item['price'];
    $qty = (int)$item['qty'];

    $stmt_item->bind_param("isii", $order_id, $name, $price, $qty);
    $stmt_item->execute();
}

$stmt->close();
$stmt_item->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Successful</title>

<style>
body {
  margin: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #f5efe6, #e8d5b7);
  font-family: 'Jost', sans-serif;
}

.success-box {
  background: white;
  padding: 50px 60px;
  text-align: center;
  border-radius: 12px;
  box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.checkmark {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 4px solid #4CAF50;
  margin: 0 auto;
  position: relative;
}

.checkmark::after {
  content: '';
  position: absolute;
  left: 22px;
  top: 18px;
  width: 18px;
  height: 35px;
  border-right: 4px solid #4CAF50;
  border-bottom: 4px solid #4CAF50;
  transform: rotate(45deg);
}

h2 {
  margin-top: 20px;
  color: #3D2B1F;
}

p {
  color: #6B4A35;
  font-size: 14px;
}

.btn {
  margin-top: 25px;
  display: inline-block;
  padding: 12px 26px;
  background: #3D2B1F;
  color: white;
  text-decoration: none;
}
</style>
</head>

<body>

<div class="success-box">
  <div class="checkmark"></div>

  <h2>Order Placed Successfully</h2>
  <p>Your Order ID: <strong>#<?php echo $order_id; ?></strong></p>
  <p>Total Amount: ₹<?php echo $total; ?></p>

  <a href="index.php" class="btn">Continue Shopping</a>
</div>

<!-- 🧹 Clear cart -->
<script>
localStorage.removeItem("cart");
</script>

</body>
</html>