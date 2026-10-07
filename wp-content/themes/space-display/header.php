<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <title>Space Display - Exhibition Design & Build Worldwide | Global Exhibition Partner</title>
  <meta name="description"
    content="Space Display is a full-service exhibit and event marketing company providing premium stand design, build, and management services across Tokyo, Europe, India, Asia, and the USA.">
  <link rel="canonical" href="https://www.spacedisplay.com/">

  <!-- Open Graph / Meta -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Space Display - Global Exhibition Design & Build">
  <meta property="og:description"
    content="Exhibition stand design, production, installation, and event management worldwide. Headquartered in Tokyo with global hubs.">
  <meta property="og:url" content="https://www.spacedisplay.com/">
  <meta property="og:site_name" content="Space Display">

  <!-- Favicon -->
  <link rel="icon" href="assets/images/logo/img_1.png" type="image/png">

  <!-- CSS Dependencies -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Custom Design System CSS -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
</head>

<body>

  <!-- Custom Floating Cursor (Desktop Only) -->
  <div class="custom-cursor">
    <span class="cursor-text">VIEW</span>
  </div>
  <div class="custom-cursor-follower"></div>


  <!-- ==========================================
       HEADER / NAVIGATION — RESPONSIVE NAVBAR
  ========================================== -->
  <header class="navbar-space d-flex align-items-center">
    <div class="container-fluid px-md-5 w-100 d-flex justify-content-between align-items-center">

      <!-- Brand Logo -->
      <a href="<?php echo home_url(); ?>" class="navbar-brand-logo" data-cursor="SPACE DISPLAY">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.png" alt="Space Display" class="hero-logo-img">
      </a>

      <!-- Desktop Navigation Menu (Right Aligned, Desktop Only) -->
      <nav class="desktop-nav-menu d-none d-lg-flex align-items-center gap-1 gap-xl-3 ms-auto" aria-label="Desktop Navigation">
        <a href="<?php echo home_url(); ?>" class="nav-link-item active" style="color: var(--space-brand);">HOME</a>
        <a href="<?php echo home_url('/about-us'); ?>" class="nav-link-item">ABOUT US</a>
        <a href="<?php echo home_url('/what-we-do'); ?>" class="nav-link-item">WHAT WE DO</a>
        <a href="<?php echo home_url('/worldwide'); ?>" class="nav-link-item">WORLDWIDE</a>
        <a href="<?php echo home_url('/portfolios'); ?>" class="nav-link-item">PORTFOLIO</a>
        <a href="<?php echo home_url('/insights'); ?>" class="nav-link-item">INSIGHTS</a>
        <a href="<?php echo home_url('/start-a-project'); ?>" class="btn btn-editorial btn-hero-cta ms-2">START A PROJECT</a>
      </nav>

      <!-- Minimal Hamburger Button (Mobile / Tablet Only) -->
      <button class="hamburger-btn d-lg-none" id="hamburgerBtn" aria-label="Toggle Navigation" data-cursor="MENU">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div>
  </header>

  <!-- Full-Height Navigation Sidebar / Offcanvas -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <aside class="sidebar-menu" id="sidebarMenu" aria-label="Main Navigation">
    <div class="sidebar-header d-flex justify-content-between align-items-center">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo2.png" alt="Space Display" class="sidebar-logo-img">
      <button class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close Menu">
        <i class="bi bi-x-lg"></i>
      </button>
    </div>

    <div class="sidebar-body d-flex flex-column justify-content-between">
      <nav class="sidebar-nav-list">
        <a href="<?php echo home_url(); ?>" class="sidebar-nav-link" style="color: var(--space-brand);"><span class="nav-num">01</span> HOME</a>
        <a href="about-us.html" class="sidebar-nav-link"><span class="nav-num">02</span> ABOUT US</a>
        <a href="what-we-do.html" class="sidebar-nav-link"><span class="nav-num">03</span> WHAT WE DO</a>
        <a href="worldwide.html" class="sidebar-nav-link"><span class="nav-num">04</span> WORLDWIDE</a>
        <a href="portfolio.html" class="sidebar-nav-link"><span class="nav-num">05</span> PORTFOLIO</a>
        <a href="insights.html" class="sidebar-nav-link"><span class="nav-num">06</span> INSIGHTS</a>
        <a href="contact-us.html" class="sidebar-nav-link"><span class="nav-num">07</span> START A PROJECT</a>
      </nav>

      <div class="sidebar-footer">
        <a href="contact-us.html" class="btn btn-sidebar-cta mb-3" id="sidebarCta">START A PROJECT →</a>
        <div class="sidebar-contact-info">
          <p class="mb-1"><i class="bi bi-envelope me-2"></i> info@spacedisplay.com</p>
          <p class="mb-2"><i class="bi bi-telephone me-2"></i> +81 3 5875 7455</p>
          <span class="sidebar-footprint-tag">JAPAN · EUROPE · INDIA · USA · ASIA</span>
        </div>
      </div>
    </div>
  </aside>

  <main>