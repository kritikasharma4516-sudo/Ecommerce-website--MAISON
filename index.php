<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAISON — Timeless Furniture</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    :root {
      --cream: #F5EFE6;
      --warm-white: #FAF7F2;
      --sand: #E8D5B7;
      --caramel: #C9935A;
      --terracotta: #B5603B;
      --espresso: #3D2B1F;
      --mocha: #6B4226;
      --gold: #C8A96E;
      --text-dark: #2C1810;
      --text-mid: #6B4A35;
      --transition: 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Jost', sans-serif;
      background: var(--warm-white);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    /* ── NAV ── */
    nav {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 100;
      padding: 20px 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(250, 247, 242, 0.92);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(200, 169, 110, 0.2);
      transition: var(--transition);
    }

    .nav-logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 28px;
      font-weight: 300;
      letter-spacing: 6px;
      color: var(--espresso);
      text-decoration: none;
    }

    .nav-links {

      display: flex;
      align-items: center;
      gap: 28px;
      list-style: none;
    }

    .nav-links li {
      display: flex;
      align-items: center;
    }

    .nav-links i {
      font-size: 20px;
      margin-top: 20px;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--text-mid);
      font-size: 12px;
      letter-spacing: 3px;
      text-transform: uppercase;
      font-weight: 400;
      transition: var(--transition);
      position: relative;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -3px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--caramel);
      transition: var(--transition);
    }

    .nav-links a:hover {
      color: var(--caramel);
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .nav-cta {
      background: var(--espresso);
      color: var(--cream) !important;
      padding: 10px 24px;
      border-radius: 1px;
      font-size: 11px !important;
      letter-spacing: 2px;
      transition: var(--transition) !important;
    }

    .nav-cta:hover {
      background: var(--caramel) !important;
    }

    .nav-cta::after {
      display: none !important;
    }

    .user-container {
      position: relative;
      display: flex;
      align-items: center;
    }

    .user-avatar {
      width: 38px;
      height: 38px;
      background: var(--terracotta);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 500;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      border: 2px solid transparent;
    }

    .user-avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 12px rgba(181, 96, 59, 0.3);
    }

    .user-dropdown {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      width: 200px;
      background: var(--warm-white);
      border: 1px solid var(--sand);
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(61, 43, 31, 0.15);
      padding: 8px 0;
      z-index: 1000;
      animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .dropdown-header {
      padding: 12px 20px;
      display: flex;
      flex-direction: column;
      height: 80px;
      width: 100px;
    }

    .welcome-text {
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--mocha);
      opacity: 1;
    }

    .user-display-name {
      font-size: 20px;
      color: var(--espresso);
      font-style: italic;
      height: 80vh;
    }

    .dropdown-divider {
      height: 1px;
      background: var(--sand);
      margin: 8px 0;
      opacity: 0.5;
    }

    .dropdown-item {
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      color: var(--espresso);
      font-size: 14px;
      transition: background 0.2s;
    }

    .dropdown-item:hover {
      background: var(--cream);
      color: var(--terracotta);
    }

    .logout-link {
      color: #a04a32;
      font-weight: 500;
    }

    .nav-links i {
      height: 40px;
      width: 40px;
    }

    /* ── CART SIDEBAR (PREMIUM) ── */
    .cart-sidebar {
      position: fixed;
      top: 0;
      right: -420px;
      width: 400px;
      height: 100vh;

      background: linear-gradient(180deg,
          #faf7f2 0%,
          #f5efe6 60%,
          #efe3d3 100%);

      box-shadow: -12px 0 40px rgba(0, 0, 0, 0.18);
      transition: 0.4s ease;
      z-index: 999;

      display: flex;
      flex-direction: column;
    }

    /* Open state */
    .cart-sidebar.open {
      right: 0;
    }

    /* ── HEADER ── */
    .cart-header {
      padding: 22px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;

      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      letter-spacing: 1px;

      border-bottom: 1px solid rgba(0, 0, 0, 0.08);
      background: transparent;
    }

    .cart-header span {
      cursor: pointer;
      font-size: 18px;
      transition: 0.3s;
    }

    .cart-header span:hover {
      color: var(--terracotta);
    }

    /* ── CART ITEMS AREA ── */
    .cart-items {
      flex: 1;
      overflow-y: auto;
      padding: 20px 24px;
    }

    /* Individual item */
    .cart-item {
      display: flex;
      gap: 14px;
      margin-bottom: 22px;
      padding-bottom: 16px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }

    /* Product image */
    .cart-img {
      width: 72px;
      height: 72px;
      object-fit: cover;
      border-radius: 6px;
    }

    /* Middle content */
    .cart-middle {
      flex: 1;
    }

    .cart-middle h4 {
      font-size: 14px;
      margin-bottom: 6px;
      color: var(--espresso);
    }

    .price {
      font-size: 13px;
      color: var(--text-mid);
      margin-bottom: 8px;
    }

    /* Quantity controls */
    .qty-box {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .qty-box button {
      width: 26px;
      height: 26px;
      border: none;
      background: #eee;
      cursor: pointer;
      font-size: 14px;
      transition: 0.2s;
    }

    .qty-box button:hover {
      background: var(--caramel);
      color: white;
    }

    /* Right side */
    .cart-right {
      text-align: right;
    }

    .subtotal {
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 10px;
    }

    .remove {
      cursor: pointer;
      font-size: 14px;
      color: #c0392b;
      transition: 0.2s;
    }

    .remove:hover {
      color: #e74c3c;
    }

    /* ── FOOTER ── */
    .cart-footer {
      padding: 20px 24px;
      border-top: 1px solid rgba(0, 0, 0, 0.08);
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(6px);
    }

    /* Total row */
    .cart-summary {
      display: flex;
      justify-content: space-between;
      font-size: 16px;
      margin-bottom: 16px;
      color: var(--espresso);
    }

    /* Checkout button */
    .checkout-btn {
      display: block;
      text-align: center;
      background: var(--espresso);
      color: white;
      padding: 14px;
      text-decoration: none;
      font-size: 12px;
      letter-spacing: 2px;
      transition: 0.3s;
    }

    .checkout-btn:hover {
      background: var(--caramel);
    }

    /* Scrollbar styling (optional premium touch) */
    .cart-items::-webkit-scrollbar {
      width: 6px;
    }

    .cart-items::-webkit-scrollbar-thumb {
      background: rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }


    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
    }

    .hamburger span {
      width: 25px;
      height: 1px;
      background: var(--espresso);
      transition: var(--transition);
    }

    /* ── HERO SLIDESHOW ── */
    .hero {
      height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      inset: 0;
      opacity: 0;
      transition: opacity 1.2s ease;
      background-size: cover;
      background-position: center;
    }

    .slide.active {
      opacity: 1;
    }

    .slide::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(61, 43, 31, 0.55) 0%, rgba(61, 43, 31, 0.15) 60%, transparent 100%);
    }

    .slide-1 {
      background-image: url('https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=1800&q=80');
    }

    .slide-2 {
      background-image: url('https://images.unsplash.com/photo-1567016432779-094069958ea5?w=1800&q=80');
    }

    .slide-3 {
      background-image: url('https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=1800&q=80');
    }

    .slide-4 {
      background-image: url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=1800&q=80');
    }

    .hero-content {
      position: absolute;
      z-index: 10;
      bottom: 15%;
      left: 8%;
      max-width: 620px;
    }

    .hero-tag {
      font-size: 11px;
      letter-spacing: 5px;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 20px;
      animation: fadeUp 1s ease 0.3s both;
    }

    .hero-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(52px, 8vw, 96px);
      font-weight: 300;
      line-height: 1.05;
      color: var(--cream);
      animation: fadeUp 1s ease 0.5s both;
    }

    .hero-title em {
      font-style: italic;
      color: var(--sand);
    }

    .hero-sub {
      margin-top: 20px;
      font-size: 15px;
      font-weight: 300;
      color: rgba(245, 239, 230, 0.8);
      line-height: 1.7;
      letter-spacing: 0.5px;
      animation: fadeUp 1s ease 0.7s both;
      max-width: 420px;
    }

    .hero-btns {
      margin-top: 36px;
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
      animation: fadeUp 1s ease 0.9s both;
    }

    .btn-primary {
      background: var(--caramel);
      color: white;
      padding: 14px 36px;
      border: none;
      border-radius: 1px;
      font-family: 'Jost', sans-serif;
      font-size: 12px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      cursor: pointer;
      text-decoration: none;
      transition: var(--transition);
      display: inline-block;
    }

    .btn-primary:hover {
      background: var(--terracotta);
      transform: translateY(-2px);
    }

    .btn-outline {
      background: transparent;
      color: var(--cream);
      padding: 14px 36px;
      border: 1px solid rgba(245, 239, 230, 0.5);
      border-radius: 1px;
      font-family: 'Jost', sans-serif;
      font-size: 12px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      cursor: pointer;
      text-decoration: none;
      transition: var(--transition);
      display: inline-block;
    }

    .btn-outline:hover {
      border-color: var(--cream);
      background: rgba(245, 239, 230, 0.1);
    }

    /* Slideshow dots */
    .slide-dots {
      position: absolute;
      bottom: 40px;
      right: 60px;
      z-index: 10;
      display: flex;
      gap: 10px;
    }

    .dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: rgba(245, 239, 230, 0.4);
      cursor: pointer;
      transition: var(--transition);
    }

    .dot.active {
      background: var(--gold);
      transform: scale(1.4);
    }

    /* Slide counter */
    .slide-counter {
      position: absolute;
      bottom: 45px;
      left: 60px;
      z-index: 10;
      font-size: 11px;
      color: rgba(245, 239, 230, 0.6);
      letter-spacing: 3px;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ── MARQUEE ── */
    .marquee-bar {
      background: var(--espresso);
      color: var(--gold);
      padding: 14px 0;
      overflow: hidden;
      font-size: 11px;
      letter-spacing: 4px;
      text-transform: uppercase;
    }

    .marquee-track {
      display: flex;
      gap: 80px;
      width: max-content;
      animation: marquee 25s linear infinite;
    }

    .marquee-track span {
      white-space: nowrap;
    }

    .marquee-sep {
      color: var(--caramel);
    }

    @keyframes marquee {
      from {
        transform: translateX(0);
      }

      to {
        transform: translateX(-50%);
      }
    }

    /* ── SECTION HEADER ── */
    .section-head {
      text-align: center;
      padding: 80px 20px 50px;
    }

    .section-tag {
      font-size: 10px;
      letter-spacing: 5px;
      text-transform: uppercase;
      color: var(--caramel);
      margin-bottom: 14px;
    }

    .section-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(36px, 5vw, 60px);
      font-weight: 300;
      color: var(--espresso);
      line-height: 1.2;
    }

    .section-title em {
      font-style: italic;
      color: var(--mocha);
    }

    .section-line {
      width: 60px;
      height: 1px;
      background: var(--gold);
      margin: 20px auto 0;
    }

    /* ── CATEGORIES GRID ── */
    .categories {
      padding: 0 40px 80px;
    }

    .cat-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      max-width: 1400px;
      margin: 0 auto;
    }

    .cat-card {
      position: relative;
      overflow: hidden;
      border-radius: 2px;
      cursor: pointer;
      text-decoration: none;
      display: block;
    }

    .cat-card:nth-child(1) {
      grid-row: span 2;
    }

    .cat-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      display: block;
    }

    .cat-card:nth-child(1) img {
      height: 560px;
    }

    .cat-card:not(:nth-child(1)) img {
      height: 260px;
    }

    .cat-card:hover img {
      transform: scale(1.06);
    }

    .cat-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(61, 43, 31, 0.75) 0%, rgba(61, 43, 31, 0.1) 50%, transparent 100%);
      transition: var(--transition);
    }

    .cat-card:hover .cat-overlay {
      background: linear-gradient(to top, rgba(61, 43, 31, 0.85) 0%, rgba(61, 43, 31, 0.25) 60%, transparent 100%);
    }

    .cat-info {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 28px;
      transform: translateY(4px);
      transition: var(--transition);
    }

    .cat-card:hover .cat-info {
      transform: translateY(-4px);
    }

    .cat-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 26px;
      font-weight: 400;
      color: var(--cream);
      letter-spacing: 1px;
    }

    .cat-count {
      font-size: 11px;
      letter-spacing: 3px;
      color: var(--gold);
      text-transform: uppercase;
      margin-top: 4px;
    }

    .cat-arrow {
      display: inline-block;
      color: var(--gold);
      margin-top: 10px;
      font-size: 18px;
      opacity: 0;
      transform: translateX(-8px);
      transition: var(--transition);
    }

    .cat-card:hover .cat-arrow {
      opacity: 1;
      transform: translateX(0);
    }

    /* ── FEATURED PRODUCTS ── */
    .featured {
      padding: 0 40px 80px;
      background: var(--warm-white);
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .product-card {
      background: white;
      border-radius: 2px;
      overflow: hidden;
      cursor: pointer;
      transition: var(--transition);
      box-shadow: 0 2px 20px rgba(61, 43, 31, 0.06);
    }

    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 40px rgba(61, 43, 31, 0.15);
    }

    .product-img-wrap {
      position: relative;
      overflow: hidden;
      height: 280px;
    }

    .product-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s ease;
    }

    .wishlist-btn {
      position: absolute;
      top: 12px;
      right: 12px;
      background: white;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: 0.3s;
    }

    .wishlist-btn:hover {
      background: #ffe6e6;
    }

    .wishlist-btn i {
      color: #cc0000;
    }

    .product-card:hover .product-img-wrap img {
      transform: scale(1.05);
    }

    .product-badge {
      position: absolute;
      top: 16px;
      left: 16px;
      background: var(--caramel);
      color: white;
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 5px 12px;
    }

    .product-info {
      padding: 22px 24px 26px;
    }

    .product-cat {
      font-size: 10px;
      letter-spacing: 3px;
      color: var(--caramel);
      text-transform: uppercase;
      margin-bottom: 8px;
    }

    .product-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 22px;
      font-weight: 400;
      color: var(--espresso);
      margin-bottom: 8px;
    }

    .product-desc {
      font-size: 13px;
      color: var(--text-mid);
      line-height: 1.6;
      margin-bottom: 16px;
    }

    .product-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .product-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 24px;
      color: var(--espresso);
      font-weight: 400;
    }

    .product-price span {
      font-size: 14px;
      color: var(--text-mid);
      text-decoration: line-through;
      margin-right: 8px;
      font-family: 'Jost', sans-serif;
    }

    .btn-add {
      background: var(--espresso);
      color: var(--cream);
      border: none;
      padding: 10px 20px;
      font-family: 'Jost', sans-serif;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 1px;
    }

    .btn-add:hover {
      background: var(--caramel);
    }

    /* ── BANNER ── */
    .banner {
      margin: 0 0 80px;
      position: relative;
      overflow: hidden;
      height: 460px;
      background-image: url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1800&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      display: flex;
      align-items: center;
    }

    .banner::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(61, 43, 31, 0.8) 0%, rgba(61, 43, 31, 0.3) 60%, transparent 100%);
    }

    .banner-content {
      position: relative;
      z-index: 1;
      padding: 0 80px;
      max-width: 560px;
    }

    .banner-tag {
      font-size: 11px;
      letter-spacing: 5px;
      color: var(--gold);
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    .banner-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(36px, 5vw, 56px);
      font-weight: 300;
      color: var(--cream);
      line-height: 1.15;
      margin-bottom: 20px;
    }

    .banner-text {
      font-size: 14px;
      color: rgba(245, 239, 230, 0.8);
      line-height: 1.7;
      margin-bottom: 28px;
    }

    /* ── TESTIMONIALS ── */
    .testimonials {
      background: var(--sand);
      padding: 80px 40px;
    }

    .test-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
      max-width: 1100px;
      margin: 0 auto;
    }

    .test-card {
      background: var(--warm-white);
      padding: 36px;
      border-radius: 2px;
      position: relative;
    }

    .test-card::before {
      content: '"';
      font-family: 'Cormorant Garamond', serif;
      font-size: 80px;
      color: var(--gold);
      position: absolute;
      top: 10px;
      left: 30px;
      line-height: 1;
      opacity: 0.4;
    }

    .test-text {
      font-size: 14px;
      line-height: 1.8;
      color: var(--text-mid);
      margin-bottom: 20px;
      padding-top: 30px;
    }

    .test-author {
      font-weight: 500;
      font-size: 13px;
      letter-spacing: 1px;
      color: var(--espresso);
    }

    .test-loc {
      font-size: 11px;
      letter-spacing: 2px;
      color: var(--caramel);
      text-transform: uppercase;
    }

    .stars {
      color: var(--gold);
      margin-bottom: 12px;
      font-size: 14px;
    }

    /* ── NEWSLETTER ── */
    .newsletter {
      padding: 80px 40px;
      text-align: center;
      background: var(--espresso);
    }

    .newsletter .section-tag {
      color: var(--gold);
    }

    .newsletter .section-title {
      color: var(--cream);
    }

    .newsletter .section-title em {
      color: var(--sand);
    }

    .newsletter-sub {
      font-size: 14px;
      color: rgba(245, 239, 230, 0.7);
      margin: 16px 0 36px;
    }

    .newsletter-form {
      display: flex;
      gap: 0;
      max-width: 480px;
      margin: 0 auto;
    }

    .newsletter-form input {
      flex: 1;
      padding: 16px 22px;
      border: 1px solid rgba(200, 169, 110, 0.3);
      border-right: none;
      background: rgba(245, 239, 230, 0.08);
      color: var(--cream);
      font-family: 'Jost', sans-serif;
      font-size: 13px;
      outline: none;
      transition: var(--transition);
      border-radius: 1px 0 0 1px;
    }

    .newsletter-form input::placeholder {
      color: rgba(245, 239, 230, 0.4);
    }

    .newsletter-form input:focus {
      border-color: var(--gold);
      background: rgba(245, 239, 230, 0.12);
    }

    .newsletter-form button {
      background: var(--caramel);
      color: white;
      border: none;
      padding: 16px 28px;
      font-family: 'Jost', sans-serif;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: var(--transition);
      border-radius: 0 1px 1px 0;
    }

    .newsletter-form button:hover {
      background: var(--terracotta);
    }

    /* ── FOOTER ── */
    footer {
      background: var(--text-dark);
      color: var(--sand);
      padding: 60px 60px 30px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 60px;
      margin-bottom: 50px;
    }

    .footer-logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 32px;
      font-weight: 300;
      letter-spacing: 6px;
      color: var(--cream);
      margin-bottom: 16px;
    }

    .footer-desc {
      font-size: 13px;
      line-height: 1.8;
      color: rgba(232, 213, 183, 0.6);
      max-width: 260px;
    }

    .footer-col h4 {
      font-size: 15px;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: var(--warm-white);
      margin-bottom: 20px;
    }

    .footer-col ul {
      list-style: none;
    }

    .footer-col ul li {
      margin-bottom: 12px;
    }

    .footer-col ul li a {
      color: rgba(232, 213, 183, 0.6);
      text-decoration: none;
      font-size: 13px;
      transition: var(--transition);
    }

    .footer-col ul li a:hover {
      color: var(--gold);
    }

    .footer-bottom {
      border-top: 1px solid rgba(200, 169, 110, 0.15);
      padding-top: 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer-bottom p {
      font-size: 12px;
      color: rgba(232, 213, 183, 0.4);
    }

    .social-links {
      display: flex;
      gap: 20px;
    }

    .social-links a {
      color: rgba(232, 213, 183, 0.5);
      text-decoration: none;
      font-size: 12px;
      letter-spacing: 1px;
      transition: var(--transition);
    }

    .social-links a:hover {
      color: var(--gold);
    }

    /* ── MOBILE NAV ── */
    .mobile-menu {
      display: none;
      position: fixed;
      inset: 0;
      background: var(--warm-white);
      z-index: 200;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 32px;
    }

    .mobile-menu.open {
      display: flex;
    }

    .mobile-menu a {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px;
      font-weight: 300;
      color: var(--espresso);
      text-decoration: none;
      letter-spacing: 2px;
      transition: var(--transition);
    }

    .mobile-menu a:hover {
      color: var(--caramel);
    }

    .close-menu {
      position: absolute;
      top: 24px;
      right: 30px;
      font-size: 30px;
      cursor: pointer;
      color: var(--espresso);
      background: none;
      border: none;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
      nav {
        padding: 18px 30px;
      }

      .nav-links {
        gap: 24px;
      }

      .cat-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .cat-card:nth-child(1) {
        grid-row: span 1;
      }

      .cat-card:nth-child(1) img {
        height: 260px;
      }

      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .footer-grid {
        grid-template-columns: 1fr 1fr;
        gap: 40px;
      }
    }

    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }

      .hamburger {
        display: flex;
      }

      nav {
        padding: 16px 24px;
      }

      .hero-content {
        left: 5%;
        bottom: 20%;
      }

      .slide-dots {
        right: 24px;
      }

      .slide-counter {
        left: 24px;
      }

      .categories,
      .featured {
        padding: 0 20px 60px;
      }

      .cat-grid {
        grid-template-columns: 1fr 1fr;
        gap: 12px;
      }

      .products-grid {
        grid-template-columns: 1fr;
      }

      .test-grid {
        grid-template-columns: 1fr;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 30px;
      }

      footer {
        padding: 40px 24px 20px;
      }

      .footer-bottom {
        flex-direction: column;
        gap: 16px;
        text-align: center;
      }

      .banner {
        background-attachment: scroll;
      }

      .banner-content {
        padding: 0 30px;
      }

      .newsletter-form {
        flex-direction: column;
      }

      .newsletter-form input {
        border-right: 1px solid rgba(200, 169, 110, 0.3);
        border-bottom: none;
        border-radius: 1px 1px 0 0;
      }

      .newsletter-form button {
        border-radius: 0 0 1px 1px;
      }

      .hero-btns {
        flex-direction: column;
        gap: 12px;
      }
    }

    /* scroll reveal */
    .reveal {
      opacity: 0;
      transform: translateY(28px);
      transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: none;
    }
  </style>
</head>

<body>

  <!-- NAV -->
  <nav id="navbar">
    <a href="index.php" class="nav-logo">MAISON</a>
    <ul class="nav-links">

      <li><a href="living.php">Living</a></li>
      <li><a href="bedroom.php">Bedroom</a></li>
      <li><a href="dining.php">Dining</a></li>
      <li><a href="outdoor.php">Outdoor</a></li>
     <li><a href="about.php">About</a></li>
      <?php if (isset($_SESSION['user_name'])): ?>
        <li class="user-container">
          <!-- The Circle -->
          <div class="user-avatar" id="userMenuBtn">
            <?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?>
          </div>

          <!-- The Dropdown Menu -->
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

    </ul>
    <div class="hamburger" id="hamburger">
      <span></span><span></span><span></span>
    </div>
  </nav>

  <!-- MOBILE MENU -->
  <div class="mobile-menu" id="mobileMenu">
    <button class="close-menu" id="closeMenu">✕</button>
    <a href="index.php">Home</a>
    <a href="living.php">Living Room</a>
    <a href="bedroom.php">Bedroom</a>
    <a href="dining.php">Dining</a>
    <a href="outdoor.php">Outdoor</a>
    <a href="storage.php">Storage</a>
  </div>

  <!-- HERO SLIDESHOW -->
  <section class="hero">
    <div class="slide slide-1 active"></div>
    <div class="slide slide-2"></div>
    <div class="slide slide-3"></div>
    <div class="slide slide-4"></div>

    <div class="hero-content">
      <p class="hero-tag">Est. 2009 · Artisan Crafted</p>
      <h1 class="hero-title">Where Every<br><em>Space Tells</em><br>a Story</h1>
      <p class="hero-sub">Handcrafted furniture that blends timeless craftsmanship with contemporary living. Each piece
        is made to last generations.</p>
      <div class="hero-btns">
        <a href="living.php" class="btn-primary">Explore Collections</a>
        <a href="#categories" class="btn-outline">View Categories</a>
      </div>
    </div>

    <div class="slide-counter">
      <span id="currentSlide">01</span> / 04
    </div>
    <div class="slide-dots">
      <div class="dot active" data-slide="0"></div>
      <div class="dot" data-slide="1"></div>
      <div class="dot" data-slide="2"></div>
      <div class="dot" data-slide="3"></div>
    </div>
  </section>

  <!-- MARQUEE -->
  <div class="marquee-bar">
    <div class="marquee-track">
      <span>Handcrafted Excellence</span><span class="marquee-sep">✦</span>
      <span>Solid Oak & Walnut</span><span class="marquee-sep">✦</span>
      <span>Free White Glove Delivery</span><span class="marquee-sep">✦</span>
      <span>5-Year Craftsmanship Warranty</span><span class="marquee-sep">✦</span>
      <span>Sustainably Sourced Materials</span><span class="marquee-sep">✦</span>
      <span>Bespoke Custom Orders</span><span class="marquee-sep">✦</span>
      <span>Handcrafted Excellence</span><span class="marquee-sep">✦</span>
      <span>Solid Oak & Walnut</span><span class="marquee-sep">✦</span>
      <span>Free White Glove Delivery</span><span class="marquee-sep">✦</span>
      <span>5-Year Craftsmanship Warranty</span><span class="marquee-sep">✦</span>
      <span>Sustainably Sourced Materials</span><span class="marquee-sep">✦</span>
      <span>Bespoke Custom Orders</span><span class="marquee-sep">✦</span>
    </div>
  </div>

  <!-- CATEGORIES -->
  <section id="categories">
    <div class="section-head reveal">
      <p class="section-tag">Browse by Room</p>
      <h2 class="section-title">Our <em>Collections</em></h2>
      <div class="section-line"></div>
    </div>
    <div class="categories">
      <div class="cat-grid">
        <a href="living.php" class="cat-card">
          <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&q=80" alt="Living Room">
          <div class="cat-overlay"></div>
          <div class="cat-info">
            <div class="cat-name">Living Room</div>
            <div class="cat-arrow">→</div>
          </div>
        </a>
        <a href="bedroom.php" class="cat-card">
          <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=800&q=80" alt="Bedroom">
          <div class="cat-overlay"></div>
          <div class="cat-info">
            <div class="cat-name">Bedroom</div>
            <div class="cat-arrow">→</div>
          </div>
        </a>
        <a href="dining.php" class="cat-card">
          <img src="https://images.unsplash.com/photo-1617104678098-de229db51175?w=800&q=80" alt="Dining">
          <div class="cat-overlay"></div>
          <div class="cat-info">
            <div class="cat-name">Dining</div>
            <div class="cat-arrow">→</div>
          </div>
        </a>
        <a href="outdoor.php" class="cat-card">
          <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?w=800&q=80" alt="Outdoor">
          <div class="cat-overlay"></div>
          <div class="cat-info">
            <div class="cat-name">Outdoor</div>
            <div class="cat-arrow">→</div>
          </div>
        </a>
        <a href="storage.php" class="cat-card">
          <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80" alt="Storage">
          <div class="cat-overlay"></div>
          <div class="cat-info">
            <div class="cat-name">Storage</div>
            <div class="cat-arrow">→</div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- FEATURED -->
  <section>
    <div class="section-head reveal">
      <p class="section-tag">Curated Selection</p>
      <h2 class="section-title">New <em>Arrivals</em></h2>
      <div class="section-line"></div>
    </div>
    <div class="featured">
      <div class="products-grid">
        <div class="product-card reveal">
          <div class="product-img-wrap">
            <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=700&q=80" alt="Lounge Chair">
            <div class="wishlist-btn">
              <i class="fa-regular fa-heart"></i>
            </div>
            <div class="product-badge">New</div>
          </div>
          <div class="product-info">
            <p class="product-cat">Living Room</p>
            <h3 class="product-name">Ellsworth Lounge Chair</h3>
            <p class="product-desc">Hand-stitched Italian leather meets solid walnut frame in this sculptural statement
              piece.</p>
            <div class="product-footer">
              <div class="product-price"><span>Rs.18900</span>Rs.14,900</div>
              <button class="btn-add"
                onclick="addToCart('Ellsworth Lounge Chair', 14900, 'https://images.unsplash.com/photo-1567016432779-094069958ea5?auto=format&fit=crop&w=200&q=80')">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <div class="product-card reveal" style="transition-delay:0.1s">
          <div class="product-img-wrap">
            <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=700&q=80" alt="Sofa">
          </div>

          <div class="wishlist-btn">
            <i class="fa-regular fa-heart"></i>
          </div>

          <div class="product-info">
            <p class="product-cat">Living Room</p>
            <h3 class="product-name">Meridian 3-Seat Sofa</h3>
            <p class="product-desc">Cloud-like cushioning wrapped in warm bouclé. A contemporary classic for every home.
            </p>
            <div class="product-footer">
              <div class="product-price">Rs.50,000</div>
              <button class="btn-add"
                onclick="addToCart('Meridian 3-Seat Sofa', 50000, 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=200&q=80')">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <div class="product-card reveal" style="transition-delay:0.2s">
          <div class="product-img-wrap">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=700&q=80" alt="Coffee Table">
            <div class="wishlist-btn">
              <i class="fa-regular fa-heart"></i>
            </div>
            <div class="product-badge">Bestseller</div>
          </div>
          <div class="product-info">
            <p class="product-cat">Living Room</p>
            <h3 class="product-name">Hazel Coffee Table</h3>
            <p class="product-desc">Solid oak with a live edge, each piece entirely unique. Pair with any sofa for
              warmth.</p>
            <div class="product-footer">
              <div class="product-price">Rs.20,000</div>
              <button class="btn-add"
                onclick="addToCart('Hazel Coffee Table', 20000, 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=200&q=80')">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BANNER -->
  <div class="banner">
    <div class="banner-content">
      <p class="banner-tag">Craftsmanship Series</p>
      <h2 class="banner-title">Made to Last a Lifetime</h2>
      <p class="banner-text">Every joint is hand-fitted. Every finish is hand-applied. We source only the finest
        sustainably-harvested hardwoods — because furniture should outlive trends.</p>
      <a href="about.php" class="btn-primary">Discover More</a>
    </div>
  </div>

  <!-- TESTIMONIALS -->
  <section class="testimonials">
    <div class="section-head reveal">
      <p class="section-tag">Client Stories</p>
      <h2 class="section-title">Loved by <em>Homeowners</em></h2>
      <div class="section-line"></div>
    </div>
    <div class="test-grid">
      <div class="test-card reveal">
        <div class="stars">★★★★★</div>
        <p class="test-text">The craftsmanship on our dining table is extraordinary. Five years later, it still looks as
          stunning as the day it arrived. Worth every penny.</p>
        <div class="test-author">Priya Sharma</div>
        <div class="test-loc">Mumbai, India</div>
      </div>
      <div class="test-card reveal" style="transition-delay:0.1s">
        <div class="stars">★★★★★</div>
        <p class="test-text">We furnished our entire living room with MAISON pieces. The quality, service, and the way
          every piece complements each other — it's truly exceptional.</p>
        <div class="test-author">James Whitfield</div>
        <div class="test-loc">London, UK</div>
      </div>
      <div class="test-card reveal" style="transition-delay:0.2s">
        <div class="stars">★★★★★</div>
        <p class="test-text">Our custom bedroom set arrived ahead of schedule and exceeded every expectation. The warmth
          and character of the walnut is absolutely breathtaking.</p>
        <div class="test-author">Amara Patel</div>
        <div class="test-loc">Dubai, UAE</div>
      </div>
    </div>
  </section>

  <!-- NEWSLETTER -->
  <section class="newsletter">
    <div class="section-head">
      <p class="section-tag">Stay Connected</p>
      <h2 class="section-title">Design <em>Inspiration</em><br>in Your Inbox</h2>
    </div>
    <p class="newsletter-sub">Exclusive drops, styling guides, and early access to our new collections.</p>
    <div class="newsletter-form">
      <input type="email" placeholder="Your email address">
      <button>Subscribe</button>
    </div>
  </section>

  <!-- FOOTER -->
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
          <li><a href="living.php">Living Room</a></li>
          <li><a href="bedroom.php">Bedroom</a></li>
          <li><a href="dining.php">Dining</a></li>
          <li><a href="outdoor.php">Outdoor</a></li>
          <li><a href="storage.php">Storage</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Company</h4>
        <ul>
          <li><a href="#">Our Story</a></li>
          <li><a href="#">Sustainability</a></li>
          <li><a href="#">Craftsmanship</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Press</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Support</h4>
        <ul>
          <li><a href="#">Delivery & Returns</a></li>
          <li><a href="#">Care Guide</a></li>
          <li><a href="#">Custom Orders</a></li>
          <li><a href="#">Warranty</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 MAISON. All rights reserved. Crafted with intention.</p>
      <div class="social-links">
        <a href="#">Instagram</a>
        <a href="#">Pinterest</a>
        <a href="#">Facebook</a>
      </div>
    </div>
  </footer>

  <script>
    /* ---------------- CART SYSTEM ---------------- */

    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Toggle Cart Sidebar
    function toggleCart() {
      document.getElementById("cartSidebar").classList.toggle("open");
      renderCart();
    }

    // Add to Cart (NOW WITH IMAGE)
    function addToCart(name, price, image) {
      let existing = cart.find(item => item.name === name);

      if (existing) {
        existing.qty++;
      } else {
        cart.push({ name, price, image, qty: 1 });
      }

      saveCart();
    }

    // Remove Item
    function removeItem(index) {
      cart.splice(index, 1);
      saveCart();
    }

    // Change Quantity
    function changeQty(index, type) {
      if (type === "inc") {
        cart[index].qty++;
      } else if (type === "dec" && cart[index].qty > 1) {
        cart[index].qty--;
      }
      saveCart();
    }

    // Save Cart
    function saveCart() {
      localStorage.setItem("cart", JSON.stringify(cart));
      renderCart();
    }

    // Render Cart UI
    function renderCart() {
      let container = document.getElementById("cartItems");
      let total = 0;

      container.innerHTML = "";

      if (cart.length === 0) {
        container.innerHTML = `
      <p style="text-align:center; color:#888; margin-top:40px;">
        Your cart is empty
      </p>`;
        document.getElementById("cartTotal").innerText = 0;
        document.getElementById("cartCount").innerText = 0;
        return;
      }

      cart.forEach((item, i) => {
        let subtotal = item.price * item.qty;
        total += subtotal;

        container.innerHTML += `
      <div class="cart-item">
        
        <div class="cart-left">
          <img src="${item.image}" class="cart-img">
        </div>

        <div class="cart-middle">
          <h4>${item.name}</h4>
          <p class="price">₹${item.price}</p>

          <div class="qty-box">
            <button onclick="changeQty(${i},'dec')">−</button>
            <span>${item.qty}</span>
            <button onclick="changeQty(${i},'inc')">+</button>
          </div>
        </div>

        <div class="cart-right">
          <p class="subtotal">₹${subtotal}</p>
          <span class="remove" onclick="removeItem(${i})">✕</span>
        </div>

      </div>
    `;
      });

      document.getElementById("cartTotal").innerText = total;
      document.getElementById("cartCount").innerText = cart.length;
    }
    //checkout
    document.getElementById("checkoutForm").addEventListener("submit", function (e) {

      if (cart.length === 0) {
        alert("Cart is empty!");
        e.preventDefault(); // stop submit
        return;
      }

      document.getElementById("cartInput").value = JSON.stringify(cart);
    });
    // Close Cart
    document.getElementById("closeCart").addEventListener("click", function () {
      document.getElementById("cartSidebar").classList.remove("open");
    });

    // Initial Render
    renderCart();


    /* ---------------- USER DROPDOWN ---------------- */

    document.addEventListener('DOMContentLoaded', function () {
      const avatar = document.getElementById('userMenuBtn');
      const dropdown = document.getElementById('userDropdown');

      if (avatar) {
        avatar.addEventListener('click', function (e) {
          e.stopPropagation();
          dropdown.style.display =
            dropdown.style.display === 'block' ? 'none' : 'block';
        });
      }

      document.addEventListener('click', function () {
        if (dropdown) dropdown.style.display = 'none';
      });
    });


    /* ---------------- SLIDESHOW ---------------- */

    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const counter = document.getElementById('currentSlide');

    function goToSlide(n) {
      slides[currentSlide].classList.remove('active');
      dots[currentSlide].classList.remove('active');

      currentSlide = n;

      slides[currentSlide].classList.add('active');
      dots[currentSlide].classList.add('active');
      counter.textContent = String(currentSlide + 1).padStart(2, '0');
    }

    dots.forEach(d =>
      d.addEventListener('click', () => goToSlide(+d.dataset.slide))
    );

    setInterval(() => {
      goToSlide((currentSlide + 1) % slides.length);
    }, 5000);


    /* ---------------- MOBILE MENU ---------------- */

    document.getElementById('hamburger').addEventListener('click', () => {
      document.getElementById('mobileMenu').classList.add('open');
    });

    document.getElementById('closeMenu').addEventListener('click', () => {
      document.getElementById('mobileMenu').classList.remove('open');
    });


    /* ---------------- SCROLL REVEAL ---------------- */

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