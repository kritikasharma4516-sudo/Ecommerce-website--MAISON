<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAISON — Bedroom</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="shared.css">
  <link rel="stylesheet" href="style.css">
  <style>
    .page-hero-bg {
      background-image: url('https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=1800&q=80');
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
      <p class="page-tag">Rest & Restore</p>
      <h1 class="page-title">The <em>Bedroom</em><br>Collection</h1>
    </div>
  </div>

  <div class="marquee-bar">
    <div class="marquee-track">
      <span>Bed Frames</span> <span class="marquee-sep">✦</span> <span>Nightstands</span> <span
        class="marquee-sep">✦</span> <span>Wardrobes</span> <span class="marquee-sep">✦</span> <span>Dressers</span>
      <span class="marquee-sep">✦</span> <span>Mirrors</span> <span class="marquee-sep">✦</span> <span>Benches</span>
      <span class="marquee-sep">✦</span> <span>Headboards</span> <span class="marquee-sep">✦</span> <span>Bed
        Frames</span> <span class="marquee-sep">✦</span> <span>Nightstands</span> <span class="marquee-sep">✦</span>
      <span>Wardrobes</span> <span class="marquee-sep">✦</span> <span>Dressers</span> <span class="marquee-sep">✦</span>
      <span>Mirrors</span> <span class="marquee-sep">✦</span> <span>Benches</span> <span class="marquee-sep">✦</span>
      <span>Headboards</span>
    </div>
  </div>

  <div class="filter-bar">
    <button class="filter-btn active">All Pieces</button>
    <button class="filter-btn">New Arrivals</button>
    <button class="filter-btn">Bestsellers</button>
    <button class="filter-btn">On Sale</button>
    <button class="filter-btn">Under Rs.10000</button>
    <button class="filter-btn">Premium</button>
  </div>

  <div class="section-head reveal">
    <p class="section-tag">Rest & Restore</p>
    <h2 class="section-title">Our <em>Bedroom</em> Range</h2>
    <div class="section-line"></div>
  </div>

  <div class="products-section">
    <div class="products-grid">

      <div class="product-card reveal">
        <div class="product-img-wrap">
          <img src="https://images.unsplash.com/photo-1588046130717-0eb0c9a3ba15?w=700&q=80" alt="Santal Bed Frame"
            loading="lazy">
          <div class="product-badge">Bestseller</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Bed Frames</p>
          <h3 class="product-name">Santal Bed Frame</h3>
          <p class="product-desc">Upholstered headboard in warm linen with solid oak base. Queen and King available.</p>
          <div class="product-footer">
            <div class="product-price">Rs.21000</div>
            <button class="btn-add" onclick="addToCart(
  'Santal Bed Frame',
  21000,
  'https://images.unsplash.com/photo-1588046130717-0eb0c9a3ba15?w=700&q=80'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.08s">
        <div class="product-img-wrap">
          <img src="images/br1.jpg" alt="Dusk Nightstand" loading="lazy">
          <div class="product-badge">Sale</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Nightstands</p>
          <h3 class="product-name">Dusk Nightstand</h3>
          <p class="product-desc">Two-drawer nightstand in natural oak with a soft-close mechanism and brass handles.
          </p>
          <div class="product-footer">
            <div class="product-price"><span>Rs.12640</span>Rs.10200</div>
            <button class="btn-add" onclick="addToCart(
  'Dusk Nightstand',
  10200,
  'images/br1.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.16s">
        <div class="product-img-wrap">
          <img src="images/wardrobe.jpg" alt="Reverie Wardrobe" loading="lazy">
          <div class="product-badge">New</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Wardrobes</p>
          <h3 class="product-name">Reverie Wardrobe</h3>
          <p class="product-desc">Floor-to-ceiling sliding door wardrobe with cedar-lined interior. Built to last a
            lifetime.</p>
          <div class="product-footer">
            <div class="product-price">Rs.38300</div>
            <button class="btn-add" onclick="addToCart(
  'Reverie Wardrobe',
  38300,
  'images/wardrobe.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.24s">
        <div class="product-img-wrap">
          <img src="images/dresser (1).jpg" alt="Lumière Dresser" loading="lazy">

        </div>
        <div class="product-info">
          <p class="product-cat">Dressers</p>
          <h3 class="product-name">Lumière Dresser</h3>
          <p class="product-desc">Six-drawer solid walnut dresser with a hand-finished French polish surface.</p>
          <div class="product-footer">
            <div class="product-price">Rs.11240</div>
        <button class="btn-add" onclick="addToCart(
  'Lumière Dresser',
  11240,
  'images/dresser (1).jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.32s">
        <div class="product-img-wrap">
          <img src="images/bench.jpg" alt="Serene Bench" loading="lazy">

        </div>
        <div class="product-info">
          <p class="product-cat">Benches</p>
          <h3 class="product-name">Serene Bench</h3>
          <p class="product-desc">Upholstered velvet bench on tapered oak legs — perfect at the foot of any bed.</p>
          <div class="product-footer">
            <div class="product-price">Rs.32000</div>
            <button class="btn-add" onclick="addToCart(
  'Serene Bench',
  32000,
  'images/bench.jpg'
)">
              Add to Cart
            </button>
          </div>
        </div>
      </div>
      <div class="product-card reveal" style="transition-delay:0.40s">
        <div class="product-img-wrap">
          <img src="images/mirror.jpg" alt="Arch Mirror" loading="lazy">
          <div class="product-badge">Sale</div>
        </div>
        <div class="product-info">
          <p class="product-cat">Mirrors</p>
          <h3 class="product-name">Arch Mirror</h3>
          <p class="product-desc">Full-length arched mirror with a hand-burnished brass frame. 180 × 60 cm.</p>
          <div class="product-footer">
            <div class="product-price"><span>Rs.4900</span>Rs.3800</div>
             <button class="btn-add" onclick="addToCart(
  'Arch Mirror',
  3800,
  'images/mirror.jpg'
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
        <p class="footer-desc">Timeless furniture for the modern home. Handcrafted with purpose, designed to endure, and
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