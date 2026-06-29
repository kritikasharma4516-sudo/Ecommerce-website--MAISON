<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAISON — Living Room</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="shared.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .page-hero-bg {
      background-image: url('images/lr1.jpg');
    }

    .filter-bar {
      padding: 30px 40px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .filter-btn {
      background: none;
      border: 1px solid var(--sand);
      color: var(--text-mid);
      padding: 8px 22px;
      font-family: 'Jost', sans-serif;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 1px;
    }

    .filter-btn:hover,
    .filter-btn.active {
      background: var(--espresso);
      color: var(--cream);
      border-color: var(--espresso);
    }

    .info-strip {
      background: var(--sand);
      padding: 50px 60px;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
      text-align: center;
      margin-bottom: 0;
    }

    .info-item h3 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 30px;
      color: var(--espresso);
      font-weight: 300;
    }

    .info-item p {
      font-size: 12px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--text-mid);
      margin-top: 4px;
    }

    .reveal {
      opacity: 1 !important;
      transform: none !important;
    }

    @media(max-width:768px) {
      .info-strip {
        grid-template-columns: 1fr 1fr;
        padding: 30px 20px
      }

      .filter-bar {
        padding: 20px
      }

      .page-hero-content {
        padding: 0 24px
      }
    }
  </style>
</head>

<body>

  <?php include "navbar.php"; ?>

  <div class="page-hero">
    <div class="page-hero-bg" id="heroBg"></div>
    <div class="page-hero-content">
      <p class="page-tag">Comfort & Style</p>
      <h1 class="page-title">The <em>Living</em><br>Collection</h1>
    </div>
  </div>

  <div class="marquee-bar">
    <div class="marquee-track">
      <span>Sofas</span> <span class="marquee-sep">✦</span> <span>Armchairs</span> <span class="marquee-sep">✦</span>
      <span>Coffee Tables</span> <span class="marquee-sep">✦</span> <span>Side Tables</span> <span
        class="marquee-sep">✦</span> <span>Shelves</span> <span class="marquee-sep">✦</span> <span>TV Units</span> <span
        class="marquee-sep">✦</span> <span>Ottomans</span> <span class="marquee-sep">✦</span> <span>Sofas</span> <span
        class="marquee-sep">✦</span> <span>Armchairs</span> <span class="marquee-sep">✦</span> <span>Coffee
        Tables</span> <span class="marquee-sep">✦</span> <span>Side Tables</span> <span class="marquee-sep">✦</span>
      <span>Shelves</span> <span class="marquee-sep">✦</span> <span>TV Units</span> <span class="marquee-sep">✦</span>
      <span>Ottomans</span>
    </div>
  </div>

  <div class="filter-bar">
    <button class="filter-btn active">All Pieces</button>
    <button class="filter-btn">New Arrivals</button>
    <button class="filter-btn">Bestsellers</button>
    <button class="filter-btn">On Sale</button>
    <button class="filter-btn">Under Rs.15000</button>
    <button class="filter-btn">Premium</button>
  </div>

  <div class="section-head reveal">
    <p class="section-tag">Comfort & Style</p>
    <h2 class="section-title">Our <em>Living Room</em> Range</h2>
    <div class="section-line"></div>
  </div>

  <div class="products-section">
    <div class="products-grid">

      <!-- 1 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=700&q=80">
    <div class="product-badge">New</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Armchairs</p>
    <h3 class="product-name">Ellsworth Lounge Chair</h3>
    <p class="product-desc">Italian leather with walnut frame.</p>
    <div class="product-footer">
      <div class="product-price"><span>Rs.19890</span> Rs.14900</div>
      <button class="btn-add" onclick="addToCart('Ellsworth Lounge Chair',14900,'https://images.unsplash.com/photo-1567016432779-094069958ea5?w=700&q=80')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 2 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=700&q=80">
    <div class="product-badge">Bestseller</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Sofas</p>
    <h3 class="product-name">Meridian Sofa</h3>
    <p class="product-desc">Cloud-like comfort with oak legs.</p>
    <div class="product-footer">
      <div class="product-price">Rs.50000</div>
      <button class="btn-add" onclick="addToCart('Meridian Sofa',50000,'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=700&q=80')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 3 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/table.jpg">
    <div class="product-badge">Sale</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Tables</p>
    <h3 class="product-name">Hazel Coffee Table</h3>
    <p class="product-desc">Solid oak live-edge finish.</p>
    <div class="product-footer">
      <div class="product-price"><span>Rs.9800</span> Rs.7800</div>
      <button class="btn-add" onclick="addToCart('Hazel Coffee Table',7800,'images/table.jpg')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 4 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/sidetable.jpg">
  </div>
  <div class="product-info">
    <p class="product-cat">Side Tables</p>
    <h3 class="product-name">Ember Side Table</h3>
    <p class="product-desc">Minimal brass + walnut design.</p>
    <div class="product-footer">
      <div class="product-price">Rs.3200</div>
      <button class="btn-add" onclick="addToCart('Ember Side Table',3200,'images/sidetable.jpg')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 5 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/lamp.jpg">
    <div class="product-badge">New</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Lighting</p>
    <h3 class="product-name">Wren Floor Lamp</h3>
    <p class="product-desc">Elegant curved brass lamp.</p>
    <div class="product-footer">
      <div class="product-price">Rs.5400</div>
      <button class="btn-add" onclick="addToCart('Wren Floor Lamp',5400,'images/lamp.jpg')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 6 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/bookshelf.jpg">
    <div class="product-badge">Bestseller</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Shelves</p>
    <h3 class="product-name">Alcott Bookshelf</h3>
    <p class="product-desc">Modern asymmetric storage.</p>
    <div class="product-footer">
      <div class="product-price">Rs.12100</div>
      <button class="btn-add" onclick="addToCart('Alcott Bookshelf',12100,'images/bookshelf.jpg')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 7 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/l shape.jpg">
    <div class="product-badge">Sale</div>
  </div>
  <div class="product-info">
    <p class="product-cat">Sofas</p>
    <h3 class="product-name">L-Shape Sofa</h3>
    <p class="product-desc">Spacious and ultra-comfortable.</p>
    <div class="product-footer">
      <div class="product-price"><span>Rs.42000</span> Rs.35000</div>
      <button class="btn-add" onclick="addToCart('L-Shape Sofa',35000,'images/l shape.jpg')">Add to Cart</button>
    </div>
  </div>
</div>

<!-- 8 -->
<div class="product-card reveal">
  <div class="product-img-wrap">
    <img src="images/tv.jpg">
    <div class="product-badge">Bestseller</div>
  </div>
  <div class="product-info">
    <p class="product-cat">TV Units</p>
    <h3 class="product-name">Stone TV Unit</h3>
    <p class="product-desc">Premium wood + stone finish.</p>
    <div class="product-footer">
      <div class="product-price">Rs.22100</div>
      <button class="btn-add" onclick="addToCart('Stone TV Unit',22100,'images/tv.jpg')">Add to Cart</button>
    </div>
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
          <p class="footer-desc">Timeless furniture for the modern home. Handcrafted with purpose, designed to endure,
            and
            made to inspire.</p>
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

      /* SAFE REVEAL ONLY */
      const revealEls = document.querySelectorAll('.reveal');

      const observer = new IntersectionObserver(entries => {
        entries.forEach(e => {
          if (e.isIntersecting) e.target.classList.add('visible');
        });
      }, { threshold: 0.12 });

      revealEls.forEach(el => observer.observe(el));

    </script>
</body>

</html>