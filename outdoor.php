<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MAISON — Outdoor</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="shared.css">
<link rel="stylesheet" href="style.css">
<style>
.page-hero-bg { background-image:url('images/outdoor.jpg'); }
.filter-bar { padding:30px 40px; display:flex; gap:12px; flex-wrap:wrap; justify-content:center; }
.filter-btn { background:none; border:1px solid var(--sand); color:var(--text-mid); padding:8px 22px; font-family:'Jost',sans-serif; font-size:11px; letter-spacing:2px; text-transform:uppercase; cursor:pointer; transition:var(--transition); border-radius:1px; }
.filter-btn:hover,.filter-btn.active { background:var(--espresso); color:var(--cream); border-color:var(--espresso); }
.info-strip { background:var(--sand); padding:50px 60px; display:grid; grid-template-columns:repeat(4,1fr); gap:30px; text-align:center; margin-bottom:0; }
.info-item h3 { font-family:'Cormorant Garamond',serif; font-size:30px; color:var(--espresso); font-weight:300; }
.info-item p { font-size:12px; letter-spacing:2px; text-transform:uppercase; color:var(--text-mid); margin-top:4px; }
@media(max-width:768px){.info-strip{grid-template-columns:1fr 1fr;padding:30px 20px}.filter-bar{padding:20px}.page-hero-content{padding:0 24px}}
</style>
</head>
<body>

 <?php include "navbar.php"; ?>

<div class="page-hero">
  <div class="page-hero-bg" id="heroBg"></div>
  <div class="page-hero-content">
    <p class="page-tag">Al Fresco Living</p>
    <h1 class="page-title">The <em>Outdoor</em><br>Collection</h1>
  </div>
</div>

<div class="marquee-bar">
  <div class="marquee-track">
    <span>Lounge Sets</span> <span class="marquee-sep">✦</span> <span>Garden Chairs</span> <span class="marquee-sep">✦</span> <span>Outdoor Tables</span> <span class="marquee-sep">✦</span> <span>Daybeds</span> <span class="marquee-sep">✦</span> <span>Planters</span> <span class="marquee-sep">✦</span> <span>Hammocks</span> <span class="marquee-sep">✦</span> <span>Lounge Sets</span> <span class="marquee-sep">✦</span> <span>Garden Chairs</span> <span class="marquee-sep">✦</span> <span>Outdoor Tables</span> <span class="marquee-sep">✦</span> <span>Daybeds</span> <span class="marquee-sep">✦</span> <span>Planters</span> <span class="marquee-sep">✦</span> <span>Hammocks</span>
  </div>
</div>

<div class="filter-bar">
  <button class="filter-btn active">All Pieces</button>
  <button class="filter-btn">New Arrivals</button>
  <button class="filter-btn">Bestsellers</button>
  <button class="filter-btn">On Sale</button>
  <button class="filter-btn">Under Rs.5000</button>
  <button class="filter-btn">Premium</button>
</div>

<div class="section-head reveal">
  <p class="section-tag">Al Fresco Living</p>
  <h2 class="section-title">Our <em>Outdoor</em> Range</h2>
  <div class="section-line"></div>
</div>

<div class="products-section">
  <div class="products-grid">
    
      <div class="product-card reveal">
        <div class="product-img-wrap">
          <img src="images/o1.jpg" alt="Soleil Lounge Set" loading="lazy">
          <div class="product-badge">Bestseller</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Lounge Sets</p>
          <h3 class="product-name">Soleil Lounge Set</h3>
          <p class="product-desc">4-piece teak lounge set with premium Sunbrella cushions. UV and weather-resistant.</p>
          <div class="product-footer">
            <div class="product-price">Rs.41200</div>
           <button class="btn-add" onclick="addToCart(
  'Soleil Lounge Set',
  41200,
  'images/o1.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.08s">
        <div class="product-img-wrap">
          <img src="images/o2.jpg" alt="Canopy Daybed" loading="lazy">
          <div class="product-badge">Sale</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Chair</p>
          <h3 class="product-name">Garden chair</h3>
          <p class="product-desc">Poolside or terrace — this chair  transforms any outdoor space.</p>
          <div class="product-footer">
            <div class="product-price"><span>Rs.32400</span>Rs.21800</div>
            <button class="btn-add" onclick="addToCart(
  'Garden chair',
  21800,
  'images/o2.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.16s">
        <div class="product-img-wrap">
          <img src="images/o3.jpg" alt="Terra Garden Chair" loading="lazy">
          <div class="product-badge">New</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Garden Chairs</p>
          <h3 class="product-name">Terra Garden Chair</h3>
          <p class="product-desc">Set of 2. Sculpted recycled aluminium chairs with woven cord seat. Stack-able.</p>
          <div class="product-footer">
            <div class="product-price">RS.2640</div>
           <button class="btn-add" onclick="addToCart(
  'Terra Garden Chair',
  2640,
  'images/o3.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.24s">
        <div class="product-img-wrap">
          <img src="images/o4.jpg" alt="Drift Outdoor Table" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Outdoor Tables</p>
          <h3 class="product-name">Drift Outdoor Table</h3>
          <p class="product-desc">Powder-coated steel table with concrete top. Seats 4–6 and handles any weather.</p>
          <div class="product-footer">
            <div class="product-price">Rs.12100</div>
          <button class="btn-add" onclick="addToCart(
  'Drift Outdoor Table',
  12100,
  'images/04.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.32s">
        <div class="product-img-wrap">
          <img src="images/o5.jpg" alt="Wicker Planter Set" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Planters</p>
          <h3 class="product-name">Wicker Planter Set</h3>
          <p class="product-desc">Set of 3 resin wicker planters in graduated sizes. Drainage holes included.</p>
          <div class="product-footer">
            <div class="product-price">Rs.6220</div>
         <button class="btn-add" onclick="addToCart(
  'Wicker Planter Set',
  6260,
  'images/o5.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.40s">
        <div class="product-img-wrap">
          <img src="images/o7.jpg" alt="Cocoon Hammock" loading="lazy">
          <div class="product-badge">Sale</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Hammocks</p>
          <h3 class="product-name">Cocoon Hammock</h3>
          <p class="product-desc">Brazilian-style hammock in outdoor fabric with weathered steel stand included.</p>
          <div class="product-footer">
            <div class="product-price"><span>Rs.10580</span>Rs.8480</div>
          <button class="btn-add" onclick="addToCart(
  'Cocoon Hammock',
  8480,
  'images/o7.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="info-strip">
  <div class="info-item reveal">
    <h3>Free</h3>
    <p>White Glove Delivery</p>
  </div>
  <div class="info-item reveal" style="transition-delay:0.1s">
    <h3>5 Yr</h3>
    <p>Craftsmanship Warranty</p>
  </div>
  <div class="info-item reveal" style="transition-delay:0.2s">
    <h3>60 Day</h3>
    <p>Returns &amp; Exchanges</p>
  </div>
  <div class="info-item reveal" style="transition-delay:0.3s">
    <h3>100%</h3>
    <p>Sustainably Sourced</p>
  </div>
</div>

<footer>
  <div class="footer-grid">
    <div>
      <div class="footer-logo">MAISON</div>
      <p class="footer-desc">Timeless furniture for the modern home. Handcrafted with purpose, designed to endure, and made to inspire.</p>
    </div>
    <div class="footer-col">
      <h4>Collections</h4>
      <ul>
        <li><a href="living.html">Living Room</a></li>
        <li><a href="bedroom.html">Bedroom</a></li>
        <li><a href="dining.html">Dining</a></li>
        <li><a href="outdoor.html">Outdoor</a></li>
        <li><a href="storage.html">Storage</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Company</h4>
      <ul>
        <li><a href="#">Our Story</a></li>
        <li><a href="#">Sustainability</a></li>
        <li><a href="#">Craftsmanship</a></li>
        <li><a href="#">Careers</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Delivery &amp; Returns</a></li>
        <li><a href="#">Care Guide</a></li>
        <li><a href="#">Custom Orders</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2026 MAISON. All rights reserved.</p>
    <div class="social-links">
      <a href="#">Instagram</a>
      <a href="#">Pinterest</a>
      <a href="#">Facebook</a>
    </div>
  </div>
</footer>

<script>
  document.getElementById('hamburger').addEventListener('click',()=>document.getElementById('mobileMenu').classList.add('open'));
  document.getElementById('closeMenu').addEventListener('click',()=>document.getElementById('mobileMenu').classList.remove('open'));
  document.querySelectorAll('.filter-btn').forEach(btn=>btn.addEventListener('click',function(){document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));this.classList.add('active')}));
  const revealEls=document.querySelectorAll('.reveal');
  const observer=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible')}),{threshold:0.1});
  revealEls.forEach(el=>observer.observe(el));
  setTimeout(()=>document.getElementById('heroBg').classList.add('loaded'),100);
</script>
</body>
</html>