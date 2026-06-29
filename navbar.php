<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!-- NAVBAR -->
  <link rel="stylesheet" href="style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<nav id="navbar">

  <!-- LOGO -->
  <a href="index.php" class="nav-logo">MAISON</a>

  <!-- NAV LINKS -->
  <ul class="nav-links">
    <li><a href="living.php">Living</a></li>
    <li><a href="bedroom.php">Bedroom</a></li>
    <li><a href="dining.php">Dining</a></li>
    <li><a href="outdoor.php">Outdoor</a></li>
    <li><a href="about.php">About</a></li>

    <!-- USER LOGIN / PROFILE -->
    <?php if (isset($_SESSION['user_name'])): ?>
      <li class="user-container">

        <!-- USER AVATAR -->
        <div class="user-avatar" id="userMenuBtn">
          <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
        </div>

        <!-- DROPDOWN -->
        <div class="user-dropdown" id="userDropdown">
         

            <div class="dropdown-header">
              <span class="welcome-text">Welcome,</span>
              <span class="user-display-name"><?php echo $_SESSION['user_name']; ?></span>
            </div>
            <div class="dropdown-divider"></div>
            <a href="login.php" class="dropdown-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="20" y1="8" x2="20" y2="14"></line>
                <line x1="23" y1="11" x2="17" y2="11"></line>
              </svg>
              Add Account
            </a>
            <a href="logout.php" class="dropdown-item logout-link">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              Exit Account
            </a>
          </div>
        </li>
      <?php else: ?>
        <li><a href="login.php" class="nav-cta">login/signup</a></li>
      <?php endif; ?>
      <li>
        <a href="#" onclick="toggleCart()" style="display:flex; align-items:center; gap:3px;font-size:20px;"><i
            class="fa-solid fa-cart-arrow-down"></i> (<span id="cartCount">0</span>)</a>
        <div id="cartSidebar" class="cart-sidebar">
          <div class="cart-header">
            <h3>Your Cart</h3>
            <span id="closeCart">✕</span>
          </div>

          <div id="cartItems" class="cart-items"></div>

          <div class="cart-footer">
            <div class="cart-summary">
              <span>Total</span>
              <strong>₹<span id="cartTotal">0</span></strong>
            </div>

            <form action="checkout.php" method="POST" id="checkoutForm">
              <input type="hidden" name="cart" id="cartInput">
              <button type="submit" class="checkout-btn">Secure Checkout</button>
            </form>
          </div>
        </div>
      </li>


  <!-- MOBILE MENU BUTTON -->
  <div class="hamburger" id="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>

</nav>

<!-- CART SIDEBAR -->
<div id="cartSidebar" class="cart-sidebar">

  <div class="cart-header">
    <h3>Your Cart</h3>
    <span id="closeCart">✕</span>
  </div>

  <div id="cartItems" class="cart-items"></div>

  <div class="cart-footer">
    <div class="cart-summary">
      <span>Total</span>
      <strong>₹<span id="cartTotal">0</span></strong>
    </div>

    <form action="checkout.php" method="POST" id="checkoutForm">
      <input type="hidden" name="cart" id="cartInput">
      <button type="submit" class="checkout-btn">Secure Checkout</button>
    </form>
  </div>

</div>

<!-- JAVASCRIPT -->
<script>

let cart = JSON.parse(localStorage.getItem("cart")) || [];

/* TOGGLE CART */
function toggleCart() {
  const sidebar = document.getElementById("cartSidebar");
  if (sidebar) {
    sidebar.classList.toggle("open");
    renderCart();
  }
}

/* ADD TO CART */
function addToCart(name, price, image) {
  let existing = cart.find(item => item.name === name);

  if (existing) {
    existing.qty++;
  } else {
    cart.push({ name, price, image, qty: 1 });
  }

  saveCart();
}

/* REMOVE ITEM */
function removeItem(index) {
  cart.splice(index, 1);
  saveCart();
}

/* CHANGE QTY */
function changeQty(index, type) {
  if (type === "inc") cart[index].qty++;
  if (type === "dec" && cart[index].qty > 1) cart[index].qty--;
  saveCart();
}

/* SAVE CART */
function saveCart() {
  localStorage.setItem("cart", JSON.stringify(cart));
  renderCart();
}

/* RENDER CART */
function renderCart() {
  const container = document.getElementById("cartItems");
  if (!container) return;

  let total = 0;
  container.innerHTML = "";

  if (cart.length === 0) {
    container.innerHTML = `<p style="text-align:center;">Cart is empty</p>`;
    document.getElementById("cartTotal").innerText = 0;
    document.getElementById("cartCount").innerText = 0;
    return;
  }

  cart.forEach((item, i) => {
    let subtotal = item.price * item.qty;
    total += subtotal;

    container.innerHTML += `
      <div class="cart-item">
        <img src="${item.image}" class="cart-img">

        <div class="cart-middle">
          <h4>${item.name}</h4>
          <p>₹${item.price}</p>

          <div class="qty-box">
            <button onclick="changeQty(${i},'dec')">−</button>
            <span>${item.qty}</span>
            <button onclick="changeQty(${i},'inc')">+</button>
          </div>
        </div>

        <div class="cart-right">
          <p>₹${subtotal}</p>
          <span onclick="removeItem(${i})">✕</span>
        </div>
      </div>
    `;
  });

  document.getElementById("cartTotal").innerText = total;
  document.getElementById("cartCount").innerText = cart.length;
}

/* SAFE EVENTS */
document.addEventListener("DOMContentLoaded", () => {

  renderCart();

  const closeCart = document.getElementById("closeCart");
  if (closeCart) {
    closeCart.addEventListener("click", () => {
      document.getElementById("cartSidebar").classList.remove("open");
    });
  }

  const checkoutForm = document.getElementById("checkoutForm");
  if (checkoutForm) {
    checkoutForm.addEventListener("submit", function (e) {
      if (cart.length === 0) {
        alert("Cart is empty!");
        e.preventDefault();
        return;
      }
      document.getElementById("cartInput").value = JSON.stringify(cart);
    });
  }

  /* USER DROPDOWN */
  const avatar = document.getElementById("userMenuBtn");
  const dropdown = document.getElementById("userDropdown");

  if (avatar) {
    avatar.addEventListener("click", (e) => {
      e.stopPropagation();
      dropdown.style.display =
        dropdown.style.display === "block" ? "none" : "block";
    });
  }

  document.addEventListener("click", () => {
    if (dropdown) dropdown.style.display = "none";
  });

});

</script>