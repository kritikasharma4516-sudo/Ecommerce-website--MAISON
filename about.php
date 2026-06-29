<?php session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MAISON — Our Story</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Jost:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="shared.css">
<link rel="stylesheet" href="style.css">
<style>

/* ══════════════════════════════════════
   TOKENS
══════════════════════════════════════ */
:root{
  --cream:#F5EFE6; --warm-white:#FAF7F2; --sand:#E8D5B7;
  --caramel:#C9935A; --terracotta:#B5603B; --espresso:#3D2B1F;
  --mocha:#6B4226; --gold:#C8A96E; --text-dark:#2C1810;
  --text-mid:#6B4A35; --T:.42s cubic-bezier(.25,.46,.45,.94);
}
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font-family:'Jost',sans-serif;background:var(--warm-white);color:var(--text-dark);overflow-x:hidden}

/* ══════════════════════════════════════
   NAV
══════════════════════════════════════ */
nav{
  position:fixed;top:0;width:100%;z-index:200;
  padding:18px 60px;display:flex;align-items:center;justify-content:space-between;
  background:rgba(250,247,242,.94);backdrop-filter:blur(14px);
  border-bottom:1px solid rgba(200,169,110,.2);transition:var(--T)
}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:26px;font-weight:300;letter-spacing:6px;color:var(--espresso);text-decoration:none}
.nav-links{display:flex;gap:34px;list-style:none;align-items:center}
.nav-links a{text-decoration:none;color:var(--text-mid);font-size:11px;letter-spacing:3px;text-transform:uppercase;font-weight:400;transition:var(--T);position:relative}
.nav-links a::after{content:'';position:absolute;bottom:-3px;left:0;width:0;height:1px;background:var(--caramel);transition:var(--T)}
.nav-links a:hover,.nav-links a.active{color:var(--caramel)}
.nav-links a:hover::after,.nav-links a.active::after{width:100%}
.nav-cta{background:var(--espresso)!important;color:var(--cream)!important;padding:9px 22px;border-radius:1px}
.nav-cta:hover{background:var(--caramel)!important}
.nav-cta::after{display:none!important}
.hamburger{display:none;flex-direction:column;gap:5px;cursor:pointer;background:none;border:none}
.hamburger span{width:24px;height:1px;background:var(--espresso);display:block;transition:var(--T)}
.mobile-menu{display:none;position:fixed;inset:0;background:var(--warm-white);z-index:300;flex-direction:column;align-items:center;justify-content:center;gap:28px}
.mobile-menu.open{display:flex}
.mobile-menu a{font-family:'Cormorant Garamond',serif;font-size:34px;font-weight:300;color:var(--espresso);text-decoration:none;transition:var(--T)}
.mobile-menu a:hover{color:var(--caramel)}
.close-menu{position:absolute;top:22px;right:28px;font-size:28px;cursor:pointer;background:none;border:none;color:var(--espresso)}

/* ══════════════════════════════════════
   HERO — Split layout, large editorial
══════════════════════════════════════ */
.hero{
  min-height:100vh;display:grid;grid-template-columns:1fr 1fr;
  padding-top:57px;
}
.hero-left{
  background:var(--espresso);
  display:flex;flex-direction:column;justify-content:center;
  padding:80px 70px;position:relative;overflow:hidden;
}
.hero-left::before{
  content:'';position:absolute;top:-120px;right:-120px;
  width:400px;height:400px;border-radius:50%;
  border:1px solid rgba(200,169,110,.12);
}
.hero-left::after{
  content:'';position:absolute;bottom:-80px;left:-80px;
  width:300px;height:300px;border-radius:50%;
  border:1px solid rgba(200,169,110,.08);
}
.hero-eyebrow{font-size:10px;letter-spacing:6px;text-transform:uppercase;color:var(--gold);margin-bottom:24px}
.hero-h1{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(52px,6vw,88px);font-weight:300;line-height:1.05;
  color:var(--cream);
}
.hero-h1 em{font-style:italic;color:var(--sand)}
.hero-rule{width:64px;height:1px;background:var(--gold);margin:32px 0}
.hero-tagline{
  font-size:15px;font-weight:300;color:rgba(245,239,230,.72);
  line-height:1.8;max-width:380px;
}
.hero-founded{
  margin-top:48px;display:flex;gap:40px;
}
.hero-stat strong{
  font-family:'Cormorant Garamond',serif;font-size:40px;font-weight:300;
  color:var(--gold);display:block;line-height:1
}
.hero-stat span{font-size:10px;letter-spacing:3px;text-transform:uppercase;color:rgba(245,239,230,.5);margin-top:5px;display:block}

.hero-right{
  position:relative;overflow:hidden;
}
.hero-right img{
  width:100%;height:100%;object-fit:cover;
  transform:scale(1.06);transition:transform 9s ease;
}
.hero-right img.loaded{transform:scale(1)}
.hero-right::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(to right,rgba(61,43,31,.4) 0%,transparent 60%);
}
.hero-year-tag{
  position:absolute;bottom:40px;right:40px;z-index:2;
  font-family:'Cormorant Garamond',serif;font-size:100px;font-weight:300;
  color:rgba(245,239,230,.12);line-height:1;letter-spacing:-2px;
  pointer-events:none;
}

/* ══════════════════════════════════════
   MARQUEE
══════════════════════════════════════ */
.marquee-bar{background:var(--espresso);color:var(--gold);padding:12px 0;overflow:hidden;font-size:11px;letter-spacing:4px;text-transform:uppercase}
.marquee-track{display:flex;gap:70px;width:max-content;animation:marquee 24s linear infinite}
.marquee-track span{white-space:nowrap}
.marquee-sep{color:var(--caramel)}
@keyframes marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}

/* ══════════════════════════════════════
   SECTION UTILITY
══════════════════════════════════════ */
.section-head{text-align:center;padding:80px 20px 50px}
.s-tag{font-size:10px;letter-spacing:5px;text-transform:uppercase;color:var(--caramel);margin-bottom:14px}
.s-title{font-family:'Cormorant Garamond',serif;font-size:clamp(34px,4.5vw,56px);font-weight:300;color:var(--espresso);line-height:1.2}
.s-title em{font-style:italic;color:var(--mocha)}
.s-line{width:60px;height:1px;background:var(--gold);margin:20px auto 0}

/* ══════════════════════════════════════
   STORY — Alternating image + text
══════════════════════════════════════ */
.story-block{
  display:grid;grid-template-columns:1fr 1fr;
  min-height:500px;max-width:100%;overflow:hidden;
}
.story-block.reverse{direction:rtl}
.story-block.reverse > *{direction:ltr}

.story-img{overflow:hidden;position:relative}
.story-img img{width:100%;height:100%;object-fit:cover;transition:transform .8s ease;display:block}
.story-img:hover img{transform:scale(1.04)}
.story-img::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,rgba(61,43,31,.18),transparent);
}

.story-text{
  background:var(--warm-white);
  display:flex;flex-direction:column;justify-content:center;
  padding:70px 70px;
}
.story-block:nth-child(even) .story-text{background:var(--sand)}
.story-num{
  font-family:'Cormorant Garamond',serif;
  font-size:80px;font-weight:300;color:rgba(200,169,110,.2);
  line-height:1;margin-bottom:8px;letter-spacing:-2px;
}
.story-label{font-size:10px;letter-spacing:5px;text-transform:uppercase;color:var(--caramel);margin-bottom:16px}
.story-heading{
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(28px,3.2vw,44px);font-weight:300;
  color:var(--espresso);line-height:1.2;margin-bottom:20px;
}
.story-heading em{font-style:italic}
.story-body{font-size:14px;line-height:1.9;color:var(--text-mid);max-width:440px}
.story-body + .story-body{margin-top:14px}

/* ══════════════════════════════════════
   VALUES — 3-col cards
══════════════════════════════════════ */
.values{background:var(--espresso);padding:90px 60px}
.values-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2px;max-width:1200px;margin:0 auto}
.value-card{
  background:rgba(245,239,230,.04);
  padding:50px 40px;
  border:1px solid rgba(200,169,110,.1);
  transition:background var(--T),border-color var(--T);
  position:relative;overflow:hidden;
}
.value-card::before{
  content:'';position:absolute;bottom:0;left:0;
  width:0;height:2px;background:var(--gold);
  transition:width .5s ease;
}
.value-card:hover{background:rgba(245,239,230,.07);border-color:rgba(200,169,110,.25)}
.value-card:hover::before{width:100%}
.value-icon{font-size:36px;margin-bottom:22px;display:block}
.value-title{
  font-family:'Cormorant Garamond',serif;
  font-size:26px;font-weight:300;color:var(--cream);margin-bottom:14px;
}
.value-desc{font-size:13px;line-height:1.8;color:rgba(245,239,230,.6)}

/* values section head override */
.values .section-head{padding:0 0 60px}
.values .s-title{color:var(--cream)}
.values .s-title em{color:var(--sand)}

/* ══════════════════════════════════════
   TIMELINE
══════════════════════════════════════ */
.timeline-section{padding:90px 60px;background:var(--warm-white)}
.timeline{position:relative;max-width:900px;margin:0 auto}
.timeline::before{
  content:'';position:absolute;left:50%;top:0;bottom:0;
  width:1px;background:var(--sand);transform:translateX(-50%);
}
.tl-item{
  display:grid;grid-template-columns:1fr 60px 1fr;
  align-items:center;margin-bottom:60px;position:relative;
}
.tl-left{text-align:right;padding-right:40px}
.tl-right{padding-left:40px}
.tl-item:nth-child(even) .tl-left{order:3;text-align:left;padding-left:40px;padding-right:0}
.tl-item:nth-child(even) .tl-dot{order:2}
.tl-item:nth-child(even) .tl-right{order:1;text-align:right;padding-right:40px;padding-left:0}

.tl-year{
  font-family:'Cormorant Garamond',serif;
  font-size:36px;font-weight:300;color:var(--gold);display:block;
}
.tl-event-title{
  font-family:'Cormorant Garamond',serif;
  font-size:22px;font-weight:400;color:var(--espresso);margin:4px 0 8px;
}
.tl-event-desc{font-size:13px;line-height:1.7;color:var(--text-mid)}
.tl-dot{
  width:14px;height:14px;border-radius:50%;
  background:var(--caramel);border:3px solid var(--warm-white);
  box-shadow:0 0 0 2px var(--caramel);
  justify-self:center;flex-shrink:0;
}

/* ══════════════════════════════════════
   TEAM
══════════════════════════════════════ */
.team-section{background:var(--sand);padding:90px 60px}
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;max-width:1200px;margin:0 auto}
.team-card{background:var(--warm-white);overflow:hidden;border-radius:2px;transition:transform var(--T),box-shadow var(--T)}
.team-card:hover{transform:translateY(-6px);box-shadow:0 16px 44px rgba(61,43,31,.14)}
.team-img-wrap{height:300px;overflow:hidden;position:relative}
.team-img-wrap img{width:100%;height:100%;object-fit:cover;object-position:top;transition:transform .6s ease;display:block}
.team-card:hover .team-img-wrap img{transform:scale(1.06)}
.team-info{padding:22px 24px 26px}
.team-name{font-family:'Cormorant Garamond',serif;font-size:22px;font-weight:400;color:var(--espresso)}
.team-role{font-size:10px;letter-spacing:3px;text-transform:uppercase;color:var(--caramel);margin:4px 0 10px}
.team-bio{font-size:12px;line-height:1.7;color:var(--text-mid)}

.team-section .section-head{padding:0 0 60px}

/* ══════════════════════════════════════
   AWARDS / PRESS STRIP
══════════════════════════════════════ */
.awards{background:var(--espresso);padding:50px 60px}
.awards-inner{display:flex;justify-content:space-around;align-items:center;flex-wrap:wrap;gap:30px;max-width:1100px;margin:0 auto}
.award-item{text-align:center;opacity:.55;transition:var(--T)}
.award-item:hover{opacity:1}
.award-name{font-family:'Cormorant Garamond',serif;font-size:18px;color:var(--cream);letter-spacing:1px;display:block}
.award-year{font-size:10px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);margin-top:4px;display:block}

/* ══════════════════════════════════════
   FEEDBACK FORM
══════════════════════════════════════ */
.feedback{padding:100px 60px;background:var(--warm-white);position:relative;overflow:hidden}
.feedback::before{
  content:'FEEDBACK';
  position:absolute;top:40px;right:-40px;
  font-family:'Cormorant Garamond',serif;font-size:140px;font-weight:300;
  color:rgba(200,169,110,.07);letter-spacing:10px;
  transform:rotate(90deg) translateX(-50%);
  transform-origin:right center;pointer-events:none;white-space:nowrap;
}
.feedback-inner{
  display:grid;grid-template-columns:1fr 1.2fr;
  gap:90px;max-width:1100px;margin:0 auto;align-items:start;
}
.feedback-left{}
.feedback-left .s-tag{text-align:left}
.feedback-left .s-title{text-align:left;font-size:clamp(32px,4vw,50px)}
.feedback-left .s-line{margin:20px 0 0}
.fb-intro{font-size:14px;line-height:1.9;color:var(--text-mid);margin-top:28px;max-width:360px}

.fb-info-list{margin-top:40px;display:flex;flex-direction:column;gap:18px}
.fb-info-item{display:flex;gap:14px;align-items:flex-start}
.fb-icon{
  width:38px;height:38px;border-radius:50%;
  background:rgba(200,169,110,.15);
  display:flex;align-items:center;justify-content:center;
  font-size:16px;flex-shrink:0;color:var(--caramel);
}
.fb-info-text strong{font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--espresso);display:block;margin-bottom:2px}
.fb-info-text span{font-size:13px;color:var(--text-mid)}

/* FORM */
.form-card{
  background:white;border-radius:2px;
  padding:48px 44px;
  box-shadow:0 4px 40px rgba(61,43,31,.08);
  position:relative;
}
.form-card::before{
  content:'';position:absolute;top:0;left:0;right:0;
  height:3px;
  background:linear-gradient(90deg,var(--caramel),var(--gold),var(--terracotta));
}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:18px}
.form-group{margin-bottom:20px}
.form-group.full{grid-column:1/-1}
label{
  display:block;font-size:10px;letter-spacing:3px;
  text-transform:uppercase;color:var(--text-mid);
  margin-bottom:8px;font-weight:500;
}
input[type=text],input[type=email],input[type=tel],select,textarea{
  width:100%;
  background:var(--warm-white);
  border:1px solid var(--sand);
  padding:13px 16px;
  font-family:'Jost',sans-serif;font-size:13px;color:var(--text-dark);
  border-radius:1px;outline:none;
  transition:border-color var(--T),background var(--T),box-shadow var(--T);
  -webkit-appearance:none;
}
input:focus,select:focus,textarea:focus{
  border-color:var(--caramel);
  background:#fff;
  box-shadow:0 0 0 3px rgba(201,147,90,.1);
}
input::placeholder,textarea::placeholder{color:rgba(107,66,38,.35)}
textarea{resize:vertical;min-height:130px;line-height:1.6}
select{cursor:pointer;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%236B4226' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 14px center;padding-right:36px}

/* Star rating */
.star-group{display:flex;flex-direction:row-reverse;justify-content:flex-end;gap:4px;margin-top:4px}
.star-group input{display:none}
.star-group label{
  font-size:26px;cursor:pointer;color:var(--sand);
  padding:0;margin:0;
  transition:color .15s;letter-spacing:0;text-transform:none;
  line-height:1;
}
.star-group label:hover,
.star-group label:hover ~ label,
.star-group input:checked ~ label{color:var(--gold)}

/* Checkboxes */
.check-group{display:flex;flex-direction:column;gap:10px;margin-top:4px}
.check-item{display:flex;align-items:center;gap:10px;cursor:pointer}
.check-item input[type=checkbox]{
  width:16px;height:16px;border:1px solid var(--sand);
  border-radius:1px;cursor:pointer;accent-color:var(--caramel);
  flex-shrink:0;
}
.check-item span{font-size:13px;color:var(--text-mid);letter-spacing:0;text-transform:none;font-weight:300}

.btn-submit{
  width:100%;background:var(--espresso);color:var(--cream);
  border:none;padding:16px;
  font-family:'Jost',sans-serif;font-size:12px;letter-spacing:3px;text-transform:uppercase;
  cursor:pointer;transition:var(--T);border-radius:1px;
  margin-top:6px;position:relative;overflow:hidden;
}
.btn-submit::after{
  content:'';position:absolute;inset:0;
  background:var(--caramel);transform:translateX(-100%);
  transition:transform .4s ease;
}
.btn-submit:hover::after{transform:translateX(0)}
.btn-submit span{position:relative;z-index:1}

/* SUCCESS MESSAGE */
.form-success{
  display:none;text-align:center;padding:60px 20px;
}
.form-success.show{display:block}
.success-icon{font-size:52px;margin-bottom:20px;display:block}
.success-title{font-family:'Cormorant Garamond',serif;font-size:34px;font-weight:300;color:var(--espresso);margin-bottom:12px}
.success-msg{font-size:13px;color:var(--text-mid);line-height:1.7}

/* CHAR COUNTER */
.char-count{text-align:right;font-size:11px;color:var(--caramel);margin-top:4px;letter-spacing:1px}

/* ══════════════════════════════════════
   FOOTER
══════════════════════════════════════ */
footer{background:var(--text-dark);color:var(--sand);padding:58px 60px 28px}
.footer-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:58px;margin-bottom:48px}
.footer-logo{font-family:'Cormorant Garamond',serif;font-size:30px;font-weight:300;letter-spacing:6px;color:var(--cream);margin-bottom:14px}
.footer-desc{font-size:13px;line-height:1.8;color:rgba(232,213,183,.6);max-width:250px}
.footer-col h4{font-size:10px;letter-spacing:4px;text-transform:uppercase;color:var(--gold);margin-bottom:18px}
.footer-col ul{list-style:none}
.footer-col ul li{margin-bottom:11px}
.footer-col ul li a{color:rgba(232,213,183,.6);text-decoration:none;font-size:13px;transition:var(--T)}
.footer-col ul li a:hover{color:var(--gold)}
.footer-bottom{border-top:1px solid rgba(200,169,110,.15);padding-top:22px;display:flex;justify-content:space-between;align-items:center}
.footer-bottom p{font-size:12px;color:rgba(232,213,183,.4)}
.social-links{display:flex;gap:18px}
.social-links a{color:rgba(232,213,183,.5);text-decoration:none;font-size:12px;letter-spacing:1px;transition:var(--T)}
.social-links a:hover{color:var(--gold)}

/* ══════════════════════════════════════
   TOAST
══════════════════════════════════════ */
.toast{position:fixed;bottom:28px;left:50%;transform:translateX(-50%) translateY(16px);background:var(--espresso);color:var(--cream);padding:11px 24px;border-radius:2px;font-size:12px;letter-spacing:1.5px;text-transform:uppercase;z-index:600;opacity:0;transition:all .32s ease;pointer-events:none;white-space:nowrap;box-shadow:0 6px 24px rgba(61,43,31,.25)}
.toast.show{opacity:1;transform:translateX(-50%) translateY(0)}

/* ══════════════════════════════════════
   REVEAL
══════════════════════════════════════ */
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease}
.reveal.visible{opacity:1;transform:none}
.reveal-left{opacity:0;transform:translateX(-30px);transition:opacity .7s ease,transform .7s ease}
.reveal-left.visible{opacity:1;transform:none}
.reveal-right{opacity:0;transform:translateX(30px);transition:opacity .7s ease,transform .7s ease}
.reveal-right.visible{opacity:1;transform:none}

/* ══════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════ */
@media(max-width:1100px){
  .hero{grid-template-columns:1fr}
  .hero-right{height:50vh}
  .hero-left{padding:70px 50px}
  .story-block{grid-template-columns:1fr}
  .story-block.reverse{direction:ltr}
  .story-img{height:340px}
  .values-grid{grid-template-columns:1fr 1fr}
  .team-grid{grid-template-columns:repeat(2,1fr)}
  .feedback-inner{grid-template-columns:1fr;gap:50px}
  .feedback::before{display:none}
  .footer-grid{grid-template-columns:1fr 1fr;gap:36px}
}
@media(max-width:768px){
  nav{padding:14px 20px}.nav-links{display:none}.hamburger{display:flex}
  .hero-left{padding:50px 24px}
  .story-text{padding:50px 24px}
  .values{padding:60px 20px}
  .values-grid{grid-template-columns:1fr}
  .timeline-section{padding:60px 20px}
  .timeline::before{left:20px}
  .tl-item{grid-template-columns:30px 1fr;grid-template-rows:auto auto}
  .tl-left,.tl-right{grid-column:2;text-align:left;padding:0 0 0 20px}
  .tl-dot{grid-column:1;grid-row:1;justify-self:center}
  .tl-item:nth-child(even) .tl-left,.tl-item:nth-child(even) .tl-right{order:unset;text-align:left;padding:0 0 0 20px}
  .team-section{padding:60px 20px}
  .team-grid{grid-template-columns:1fr 1fr}
  .feedback{padding:60px 20px}
  .form-card{padding:32px 24px}
  .form-row{grid-template-columns:1fr}
  footer{padding:36px 20px 18px}
  .footer-grid{grid-template-columns:1fr}
  .footer-bottom{flex-direction:column;gap:14px;text-align:center}
  .awards{padding:36px 20px}
}
@media(max-width:480px){
  .team-grid{grid-template-columns:1fr}
  .hero-founded{flex-wrap:wrap;gap:24px}
}
</style>
</head>
<body>

<!-- NAV -->
 <?php include "navbar.php"; ?>

<!-- ══ HERO ══ -->
<section class="hero">
  <div class="hero-left">
    <p class="hero-eyebrow">Est. 2009 · Ludhiana, Punjab</p>
    <h1 class="hero-h1">We Make<br><em>Furniture</em><br>That Lasts</h1>
    <div class="hero-rule"></div>
    <p class="hero-tagline">MAISON was founded on a single belief — that the objects we surround ourselves with should be beautiful, honest, and built to outlive us. Every joint is hand-fitted. Every surface is hand-finished. Every piece carries the mark of the craftsperson who made it.</p>
    <div class="hero-founded">
      <div class="hero-stat"><strong>2009</strong><span>Year Founded</span></div>
      <div class="hero-stat"><strong>47</strong><span>Master Craftspeople</span></div>
      <div class="hero-stat"><strong>12,000+</strong><span>Homes Furnished</span></div>
      <div class="hero-stat"><strong>5</strong><span>Design Awards</span></div>
    </div>
  </div>
  <div class="hero-right">
    <img src="https://images.unsplash.com/photo-1581539250439-c96689b516dd?w=1200&q=85" alt="MAISON Workshop" id="heroImg" loading="eager">
    <div class="hero-year-tag">2009</div>
  </div>
</section>

<!-- MARQUEE -->
<div class="marquee-bar">
  <div class="marquee-track">
    <span>Handcrafted in India</span><span class="marquee-sep">✦</span>
    <span>Sustainably Sourced</span><span class="marquee-sep">✦</span>
    <span>5-Year Warranty</span><span class="marquee-sep">✦</span>
    <span>47 Master Artisans</span><span class="marquee-sep">✦</span>
    <span>12,000+ Homes</span><span class="marquee-sep">✦</span>
    <span>Est. 2009 · Ludhiana</span><span class="marquee-sep">✦</span>
    <span>Handcrafted in India</span><span class="marquee-sep">✦</span>
    <span>Sustainably Sourced</span><span class="marquee-sep">✦</span>
    <span>5-Year Warranty</span><span class="marquee-sep">✦</span>
    <span>47 Master Artisans</span><span class="marquee-sep">✦</span>
    <span>12,000+ Homes</span><span class="marquee-sep">✦</span>
    <span>Est. 2009 · Ludhiana</span><span class="marquee-sep">✦</span>
  </div>
</div>

<!-- ══ STORY BLOCKS ══ -->
<section>
  <!-- Block 1 -->
  <div class="story-block">
    <div class="story-img reveal-left">
      <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?w=900&q=80" alt="The Workshop" loading="lazy">
    </div>
    <div class="story-text reveal-right">
      <div class="story-num">01</div>
      <p class="story-label">The Beginning</p>
      <h2 class="story-heading">Born in a <em>Workshop,</em><br>Not a Factory</h2>
      <p class="story-body">In 2009, founder Arjun Mehta converted a 1,200 sq ft warehouse on the outskirts of Ludhiana into a woodworking studio. Armed with hand tools, a love for mid-century form, and a conviction that Indian craftsmanship deserved a global stage, he made his first dining table on a Tuesday afternoon.</p>
      <p class="story-body">That table — a 10-seater in sheesham wood with hand-carved apron detailing — still sits in the Mehta family home. It was the prototype for everything MAISON would become.</p>
    </div>
  </div>

  <!-- Block 2 -->
  <div class="story-block reverse">
    <div class="story-img reveal-right">
      <img src="https://images.unsplash.com/photo-1565034946487-077786996e27?w=900&q=80" alt="Craftspeople at work" loading="lazy">
    </div>
    <div class="story-text reveal-left">
      <div class="story-num">02</div>
      <p class="story-label">Our People</p>
      <h2 class="story-heading">Forty-Seven Hands<br>Behind Every <em>Piece</em></h2>
      <p class="story-body">Today, our studio employs 47 full-time craftspeople — joinery masters, upholsterers, finishers, and carvers. Many are third-generation artisans whose families have worked in wood for over a century. We offer living wages, healthcare, and a lifelong learning programme.</p>
      <p class="story-body">When you bring a MAISON piece home, you are bringing someone's livelihood, history, and pride into your space. We never forget that.</p>
    </div>
  </div>

  <!-- Block 3 -->
  <div class="story-block">
    <div class="story-img reveal-left">
      <img src="https://images.unsplash.com/photo-1542621334-a254cf47733d?w=900&q=80" alt="Materials and wood" loading="lazy">
    </div>
    <div class="story-text reveal-right">
      <div class="story-num">03</div>
      <p class="story-label">Our Materials</p>
      <h2 class="story-heading">Wood Chosen<br>With <em>Conscience</em></h2>
      <p class="story-body">We source only FSC-certified hardwoods — primarily teak, walnut, and sheesham — from responsibly managed forests in Rajasthan and Madhya Pradesh. Every plank is air-dried for a minimum of 18 months before it enters our studio.</p>
      <p class="story-body">Our finishing oils, lacquers, and fabrics are low-VOC and non-toxic. We believe beautiful furniture should not come at the cost of the planet that provides the timber.</p>
    </div>
  </div>
</section>

<!-- ══ VALUES ══ -->
<section class="values">
  <div class="section-head">
    <p class="s-tag">What We Stand For</p>
    <h2 class="s-title">Our <em>Core Values</em></h2>
    <div class="s-line"></div>
  </div>
  <div class="values-grid">
    <div class="value-card reveal">
      <span class="value-icon">🌿</span>
      <div class="value-title">Sustainability First</div>
      <p class="value-desc">Every material decision considers the forest it came from and the landfill it won't reach. We build to last generations, not seasons.</p>
    </div>
    <div class="value-card reveal" style="transition-delay:.1s">
      <span class="value-icon">🪵</span>
      <div class="value-title">Honest Craft</div>
      <p class="value-desc">No veneers masquerading as solid wood. No MDF hiding behind walnut stain. What you see is exactly what you get — every time.</p>
    </div>
    <div class="value-card reveal" style="transition-delay:.2s">
      <span class="value-icon">🤝</span>
      <div class="value-title">Fair Livelihoods</div>
      <p class="value-desc">Our craftspeople earn 35% above the industry average. Profit is shared quarterly. We believe the people who build should benefit from what they build.</p>
    </div>
    <div class="value-card reveal" style="transition-delay:.3s">
      <span class="value-icon">✦</span>
      <div class="value-title">Timeless Design</div>
      <p class="value-desc">We don't follow trend cycles. Our design language draws from mid-century modernism, Indian joinery traditions, and the quiet authority of natural form.</p>
    </div>
    <div class="value-card reveal" style="transition-delay:.4s">
      <span class="value-icon">🏠</span>
      <div class="value-title">Lifetime Partnership</div>
      <p class="value-desc">Every piece comes with a 5-year warranty and a lifetime repair promise. We'll send a craftsperson to your home to fix, refinish, or restore — no questions asked.</p>
    </div>
    <div class="value-card reveal" style="transition-delay:.5s">
      <span class="value-icon">🎨</span>
      <div class="value-title">Bespoke Soul</div>
      <p class="value-desc">Every client who wants something uniquely theirs gets it. Our custom programme lets you choose wood species, dimensions, finish, and hardware — down to the last joint.</p>
    </div>
  </div>
</section>

<!-- ══ TIMELINE ══ -->
<section class="timeline-section">
  <div class="section-head reveal">
    <p class="s-tag">Fifteen Years of Making</p>
    <h2 class="s-title">Our <em>Journey</em></h2>
    <div class="s-line"></div>
  </div>
  <div class="timeline">

    <div class="tl-item reveal">
      <div class="tl-left">
        <span class="tl-year">2009</span>
        <div class="tl-event-title">The First Table</div>
        <p class="tl-event-desc">Arjun Mehta builds MAISON's first piece in a rented Ludhiana workshop. One table. One craftsperson. One vision.</p>
      </div>
      <div class="tl-dot"></div>
      <div class="tl-right"></div>
    </div>

    <div class="tl-item reveal" style="transition-delay:.1s">
      <div class="tl-left"></div>
      <div class="tl-dot"></div>
      <div class="tl-right">
        <span class="tl-year">2012</span>
        <div class="tl-event-title">The Studio Expands</div>
        <p class="tl-event-desc">Studio grows to 8,000 sq ft. First team of 12 craftspeople hired. Launch of the signature Harvest Dining Table — still a bestseller today.</p>
      </div>
    </div>

    <div class="tl-item reveal" style="transition-delay:.2s">
      <div class="tl-left">
        <span class="tl-year">2015</span>
        <div class="tl-event-title">National Recognition</div>
        <p class="tl-event-desc">Winner of the Indian Design Council Award for Furniture. First stockist in Mumbai and Delhi. Profile in Architectural Digest India.</p>
      </div>
      <div class="tl-dot"></div>
      <div class="tl-right"></div>
    </div>

    <div class="tl-item reveal" style="transition-delay:.3s">
      <div class="tl-left"></div>
      <div class="tl-dot"></div>
      <div class="tl-right">
        <span class="tl-year">2018</span>
        <div class="tl-event-title">Bespoke Programme Launch</div>
        <p class="tl-event-desc">Custom orders open to all clients. Over 400 bespoke pieces made in the first year alone. No two identical.</p>
      </div>
    </div>

    <div class="tl-item reveal" style="transition-delay:.4s">
      <div class="tl-left">
        <span class="tl-year">2021</span>
        <div class="tl-event-title">Online Store & Nationwide Delivery</div>
        <p class="tl-event-desc">MAISON.in launches. White-glove delivery introduced across 22 Indian cities. 500 orders in the first month.</p>
      </div>
      <div class="tl-dot"></div>
      <div class="tl-right"></div>
    </div>

    <div class="tl-item reveal" style="transition-delay:.5s">
      <div class="tl-left"></div>
      <div class="tl-dot"></div>
      <div class="tl-right">
        <span class="tl-year">2024</span>
        <div class="tl-event-title">12,000 Homes & Counting</div>
        <p class="tl-event-desc">MAISON furniture now lives in over 12,000 homes across India. The workshop is bigger, the team is 47, the craft is exactly the same.</p>
      </div>
    </div>

  </div>
</section>

<!-- ══ TEAM ══ -->
<section class="team-section">
  <div class="section-head reveal">
    <p class="s-tag">The People Behind the Wood</p>
    <h2 class="s-title">Meet the <em>Team</em></h2>
    <div class="s-line"></div>
  </div>
  <div class="team-grid">
    <div class="team-card reveal">
      <div class="team-img-wrap">
        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&q=80" alt="Arjun Mehta" loading="lazy">
      </div>
      <div class="team-info">
        <div class="team-name">Arjun Mehta</div>
        <div class="team-role">Founder & Head of Design</div>
        <p class="team-bio">Studied furniture design at NID Ahmedabad. 20 years in wood. Believes every joint tells a story.</p>
      </div>
    </div>
    <div class="team-card reveal" style="transition-delay:.1s">
      <div class="team-img-wrap">
        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&q=80" alt="Priya Sharma" loading="lazy">
      </div>
      <div class="team-info">
        <div class="team-name">Priya Sharma</div>
        <div class="team-role">Creative Director</div>
        <p class="team-bio">Former architect with a love for material honesty. Leads the collection design and brand direction.</p>
      </div>
    </div>
    <div class="team-card reveal" style="transition-delay:.2s">
      <div class="team-img-wrap">
        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=500&q=80" alt="Rajan Patel" loading="lazy">
      </div>
      <div class="team-info">
        <div class="team-name">Rajan Patel</div>
        <div class="team-role">Master Joiner — 28 yrs</div>
        <p class="team-bio">Third-generation woodworker. Responsible for quality on every piece that leaves the studio floor.</p>
      </div>
    </div>
    <div class="team-card reveal" style="transition-delay:.3s">
      <div class="team-img-wrap">
        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&q=80" alt="Kavya Nair" loading="lazy">
      </div>
      <div class="team-info">
        <div class="team-name">Kavya Nair</div>
        <div class="team-role">Client Experience Lead</div>
        <p class="team-bio">The person who ensures every client's home story ends perfectly. Manages bespoke and after-care.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ AWARDS ══ -->
<div class="awards">
  <div class="awards-inner">
    <div class="award-item reveal">
      <span class="award-name">Indian Design Council</span>
      <span class="award-year">Best Furniture Brand · 2015</span>
    </div>
    <div class="award-item reveal" style="transition-delay:.1s">
      <span class="award-name">Architectural Digest</span>
      <span class="award-year">AD100 · 2018 & 2022</span>
    </div>
    <div class="award-item reveal" style="transition-delay:.2s">
      <span class="award-name">Elle Décor India</span>
      <span class="award-year">Grand Prix Winner · 2020</span>
    </div>
    <div class="award-item reveal" style="transition-delay:.3s">
      <span class="award-name">CII Design Excellence</span>
      <span class="award-year">Sustainable Design · 2023</span>
    </div>
    <div class="award-item reveal" style="transition-delay:.4s">
      <span class="award-name">Outlook Business</span>
      <span class="award-year">Most Trusted Brand · 2024</span>
    </div>
  </div>
</div>

<!-- ══════════════════════════════════════
     FEEDBACK FORM
══════════════════════════════════════ -->
<section class="feedback" id="feedback">
  <div class="feedback-inner">

    <!-- LEFT — context -->
    <div class="feedback-left reveal-left">
      <p class="s-tag">We Are Listening</p>
      <h2 class="s-title" style="text-align:left">Share Your<br><em>Thoughts</em></h2>
      <div class="s-line" style="margin:20px 0 0"></div>
      <p class="fb-intro">Whether you've just received your first MAISON piece, been a client for years, or are simply curious about who we are — we want to hear from you. Your words make us better.</p>

      <div class="fb-info-list">
        <div class="fb-info-item">
          <div class="fb-icon">📍</div>
          <div class="fb-info-text">
            <strong>Visit Our Studio</strong>
            <span>47 Craftsmen Lane, Focal Point, Ludhiana, Punjab 141010</span>
          </div>
        </div>
        <div class="fb-info-item">
          <div class="fb-icon">📞</div>
          <div class="fb-info-text">
            <strong>Call Us</strong>
            <span>+91 98765 43210 · Mon–Sat, 10am–7pm</span>
          </div>
        </div>
        <div class="fb-info-item">
          <div class="fb-icon">✉️</div>
          <div class="fb-info-text">
            <strong>Email</strong>
            <span>hello@maison.in</span>
          </div>
        </div>
        <div class="fb-info-item">
          <div class="fb-icon">🕐</div>
          <div class="fb-info-text">
            <strong>Response Time</strong>
            <span>We reply to every message within 24 hours</span>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT — form -->
    <div class="reveal-right">
      <div class="form-card">
        <form id="feedbackForm" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="fname">First Name *</label>
              <input type="text" id="fname" placeholder="Arjun" required>
            </div>
            <div class="form-group">
              <label for="lname">Last Name *</label>
              <input type="text" id="lname" placeholder="Mehta" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input type="email" id="email" placeholder="you@email.com" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" id="phone" placeholder="+91 98765 43210">
            </div>
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" placeholder="Ludhiana, Mumbai, Delhi…">
          </div>

          <div class="form-group">
            <label for="subject">Feedback Category *</label>
            <select id="subject" required>
              <option value="" disabled selected>Select a category</option>
              <option>Product Quality</option>
              <option>Delivery Experience</option>
              <option>Customer Service</option>
              <option>Design Suggestion</option>
              <option>Website / Online Experience</option>
              <option>Bespoke / Custom Order</option>
              <option>General Enquiry</option>
              <option>Compliment</option>
            </select>
          </div>

          <!-- Star Rating -->
          <div class="form-group">
            <label>Overall Experience</label>
            <div class="star-group">
              <input type="radio" name="rating" id="s5" value="5"><label for="s5" title="5 stars">★</label>
              <input type="radio" name="rating" id="s4" value="4"><label for="s4" title="4 stars">★</label>
              <input type="radio" name="rating" id="s3" value="3"><label for="s3" title="3 stars">★</label>
              <input type="radio" name="rating" id="s2" value="2"><label for="s2" title="2 stars">★</label>
              <input type="radio" name="rating" id="s1" value="1"><label for="s1" title="1 star">★</label>
            </div>
          </div>

          <!-- Checkboxes -->
          <div class="form-group">
            <label>Which collections have you experienced?</label>
            <div class="check-group">
              <label class="check-item"><input type="checkbox" value="living"><span>Living Room</span></label>
              <label class="check-item"><input type="checkbox" value="bedroom"><span>Bedroom</span></label>
              <label class="check-item"><input type="checkbox" value="dining"><span>Dining</span></label>
              <label class="check-item"><input type="checkbox" value="outdoor"><span>Outdoor</span></label>
              <label class="check-item"><input type="checkbox" value="storage"><span>Storage</span></label>
              <label class="check-item"><input type="checkbox" value="none"><span>Not yet a customer — exploring</span></label>
            </div>
          </div>

          <div class="form-group">
            <label for="message">Your Message *</label>
            <textarea id="message" maxlength="600" placeholder="Tell us about your experience, what you loved, what we could improve, or anything else on your mind…" required></textarea>
            <p class="char-count"><span id="charUsed">0</span> / 600</p>
          </div>

          <div class="form-group">
            <label for="heardFrom">How did you hear about MAISON?</label>
            <select id="heardFrom">
              <option value="" disabled selected>Select an option</option>
              <option>Instagram / Social Media</option>
              <option>Word of Mouth / Friend</option>
              <option>Interior Designer</option>
              <option>Online Search</option>
              <option>Magazine / Press</option>
              <option>Physical Store</option>
              <option>Other</option>
            </select>
          </div>

          <button type="submit" class="btn-submit"><span>Send Feedback →</span></button>
        </form>

        <!-- SUCCESS STATE -->
        <div class="form-success" id="formSuccess">
          <span class="success-icon">✦</span>
          <div class="success-title">Thank you, <span id="successName">friend</span>.</div>
          <p class="success-msg">Your feedback has been received and will be read by our team within 24 hours.<br>We are grateful for every word — it helps us make MAISON a little better each day.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- FOOTER -->
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
        <li><a href="about.html">Our Story</a></li>
        <li><a href="about.html">Sustainability</a></li>
        <li><a href="about.html">Craftsmanship</a></li>
        <li><a href="about.html">Careers</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Support</h4>
      <ul>
        <li><a href="#">Delivery &amp; Returns</a></li>
        <li><a href="#">Care Guide</a></li>
        <li><a href="#">Custom Orders</a></li>
        <li><a href="about.html#feedback">Contact Us</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2026 MAISON. All rights reserved. Crafted with intention in Ludhiana, India.</p>
    <div class="social-links">
      <a href="#">Instagram</a><a href="#">Pinterest</a><a href="#">Facebook</a>
    </div>
  </div>
</footer>

<div class="toast" id="toast"></div>

<script>
/* ── NAV ── */const hamburger = document.getElementById('hamburger');
const closeMenu = document.getElementById('closeMenu');
const mobileMenu = document.getElementById('mobileMenu');

if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', () => {
        mobileMenu.classList.add('open');
    });
}

if (closeMenu && mobileMenu) {
    closeMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('open');
    });
}

/* ── HERO IMAGE ── */
setTimeout(()=>document.getElementById('heroImg').classList.add('loaded'),100);

/* ── SCROLL REVEAL ── */
const revealClasses=['.reveal','.reveal-left','.reveal-right'];
const allReveal=document.querySelectorAll(revealClasses.join(','));
const obs=new IntersectionObserver(entries=>entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('visible')}),{threshold:.1});
allReveal.forEach(el=>obs.observe(el));

/* ── CHAR COUNTER ── */
const msgArea=document.getElementById('message');
const charUsed=document.getElementById('charUsed');
msgArea.addEventListener('input',()=>charUsed.textContent=msgArea.value.length);

/* ── TOAST ── */
function toast(msg){
  const t=document.getElementById('toast');
  t.textContent=msg; t.classList.add('show');
  setTimeout(()=>t.classList.remove('show'),2400);
}

/* ── FORM SUBMIT ── */
document.getElementById('feedbackForm').addEventListener('submit',function(e){
  e.preventDefault();
  const fname=document.getElementById('fname').value.trim();
  const email=document.getElementById('email').value.trim();
  const subject=document.getElementById('subject').value;
  const message=document.getElementById('message').value.trim();

  if(!fname){toast('Please enter your first name'); return;}
  if(!email||!/\S+@\S+\.\S+/.test(email)){toast('Please enter a valid email'); return;}
  if(!subject){toast('Please select a feedback category'); return;}
  if(!message){toast('Please write your message'); return;}

  // Simulate submission
  document.getElementById('successName').textContent=fname;
  document.getElementById('feedbackForm').style.display='none';
  const success=document.getElementById('formSuccess');
  success.classList.add('show');

  // Confetti-like burst (CSS only — dots)
  toast('Message sent! Thank you, '+fname+' 🌿');
});

/* ── SMOOTH ANCHOR ── */
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const target=document.querySelector(a.getAttribute('href'));
    if(target){ e.preventDefault(); target.scrollIntoView({behavior:'smooth',block:'start'}); }
  });
});
</script>
</body>
</html>
