<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MAISON — Dining</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="shared.css">
<link rel="stylesheet" href="style.css">
<style>
.page-hero-bg { background-image:url('images/dinning.jpg'); }
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
    <p class="page-tag">Gather & Share</p>
    <h1 class="page-title">The <em>Dining</em><br>Collection</h1>
  </div>
</div>

<div class="marquee-bar">
  <div class="marquee-track">
    <span>Dining Tables</span> <span class="marquee-sep">✦</span> <span>Chairs</span> <span class="marquee-sep">✦</span> <span>Bar Stools</span> <span class="marquee-sep">✦</span> <span>Buffets</span> <span class="marquee-sep">✦</span> <span>China Cabinets</span> <span class="marquee-sep">✦</span> <span>Benches</span> <span class="marquee-sep">✦</span> <span>Dining Tables</span> <span class="marquee-sep">✦</span> <span>Chairs</span> <span class="marquee-sep">✦</span> <span>Bar Stools</span> <span class="marquee-sep">✦</span> <span>Buffets</span> <span class="marquee-sep">✦</span> <span>China Cabinets</span> <span class="marquee-sep">✦</span> <span>Benches</span>
  </div>
</div>

<div class="filter-bar">
  <button class="filter-btn active">All Pieces</button>
  <button class="filter-btn">New Arrivals</button>
  <button class="filter-btn">Bestsellers</button>
  <button class="filter-btn">On Sale</button>
  <button class="filter-btn">Under Rs.12000</button>
  <button class="filter-btn">Premium</button>
</div>

<div class="section-head reveal">
  <p class="section-tag">Gather & Share</p>
  <h2 class="section-title">Our <em>Dining</em> Range</h2>
  <div class="section-line"></div>
</div>

<div class="products-section">
  <div class="products-grid">
    
      <div class="product-card reveal">
        <div class="product-img-wrap">
          <img src="images/dr1 (1).jpg" alt="Harvest Dining Table" loading="lazy">
          <div class="product-badge">Bestseller</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Dining Tables</p>
          <h3 class="product-name">Harvest Dining Table</h3>
          <p class="product-desc">Solid oak plank table seating 6–8. Hand-oiled finish that deepens beautifully with age.</p>
          <div class="product-footer">
            <div class="product-price">Rr.22600</div>
           <button class="btn-add" onclick="addToCart(
  'Harvest Dining Table',
  22600,
  'images/dr1 (1).jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.08s">
        <div class="product-img-wrap">
          <img src="images/dr1 (2).jpg" alt="Cane Dining Chair" loading="lazy">
          <div class="product-badge">New</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Chairs</p>
          <h3 class="product-name">Cane Dining Chair</h3>
          <p class="product-desc">Set of 2. Rattan weave seat on a beechwood frame — lightweight yet remarkably sturdy.</p>
          <div class="product-footer">
            <div class="product-price">Rs.22480</div>
            <button class="btn-add" onclick="addToCart(
  'Cane Dining Chair',
  22480,
  'images/dr1 (2).jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.16s">
        <div class="product-img-wrap">
          <img src="images/dr3.jpg" alt="Slate Buffet" loading="lazy">
          <div class="product-badge">Sale</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Buffets</p>
          <h3 class="product-name">Slate Buffet</h3>
          <p class="product-desc">Four-door buffet sideboard with herringbone oak veneer and soft-close drawers.</p>
          <div class="product-footer">
            <div class="product-price"><span>Rs.12200</span>Rs.11850</div>
            <button class="btn-add" onclick="addToCart(
  'Slate Buffet',
  11850,
  'images/dr3.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.24s">
        <div class="product-img-wrap">
          <img src="images/dr4.jpg" alt="Alto Bar Stool" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Bar Stools</p>
          <h3 class="product-name">Alto Bar Stool</h3>
          <p class="product-desc">Swivel seat, footrest, and adjustable height — the perfect kitchen counter companion.</p>
          <div class="product-footer">
            <div class="product-price">Rs.9290</div>
          <button class="btn-add" onclick="addToCart(
  'Alto Bar Stool',
  9290,
  'images/dr4.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.32s">
        <div class="product-img-wrap">
          <img src="images/dr5.jpg" alt="Carve Bench" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Benches</p>
          <h3 class="product-name">Carve Bench</h3>
          <p class="product-desc">Solid teak dining bench with chamfered edges. Seats 3 comfortably at any table.</p>
          <div class="product-footer">
            <div class="product-price">Rs.14620</div>
           <button class="btn-add" onclick="addToCart(
  'Carve Bench',
  14620,
  'images/dr5.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.40s">
        <div class="product-img-wrap">
          <img src="images/dr6.jpg" alt="Heirloom China Cabinet" loading="lazy">
          <div class="product-badge">New</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Storage</p>
          <h3 class="product-name">Heirloom China Cabinet</h3>
          <p class="product-desc">Glass-front display cabinet with interior lighting. Store and showcase your finest pieces.</p>
          <div class="product-footer">
            <div class="product-price">Rs.22100</div>
           <button class="btn-add" onclick="addToCart(
  'Heirloom China Cabinet',
  22100,
  'images/dr6.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.24s">
        <div class="product-img-wrap">
          <img src="images/dr7.jpg" alt="lamp" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Lamp</p>
          <h3 class="product-name">Table Lamp</h3>
          <p class="product-desc">Swivel seat, footrest, and adjustable height — the perfect kitchen counter companion.</p>
          <div class="product-footer">
            <div class="product-price">Rs.4800</div>
          <button class="btn-add" onclick="addToCart(
  'Table Lamp',
  4800,
  'images/dr7.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.24s">
        <div class="product-img-wrap">
          <img src="images/dr8.jpg" alt="plant" loading="lazy">
          
        </div>
        <div class="product-info">
          <p class="product-cat">Decor</p>
          <h3 class="product-name">Indoor Plant</h3>
          <p class="product-desc">Swivel seat, footrest, and adjustable height — the perfect kitchen counter companion.</p>
          <div class="product-footer">
            <div class="product-price">Rs.5400</div>
         <button class="btn-add" onclick="addToCart(
  'Indoor Plant',
  5400,
  'images/dr8.jpg'
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