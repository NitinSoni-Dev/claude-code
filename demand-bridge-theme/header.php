<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
    <script>document.documentElement.classList.remove('no-js');</script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Reading Progress Bar -->
<?php if ( is_singular() ) : ?>
<div class="reading-progress" id="readingProgress" aria-hidden="true"></div>
<?php endif; ?>

<!-- Skip to content (accessibility) -->
<a class="sr-only" href="#main-content"><?php _e( 'Skip to content', 'demand-bridge' ); ?></a>

<!-- =============================================
     SITE HEADER
     ============================================= -->
<header class="site-header transparent" id="siteHeader" role="banner">
    <nav class="nav-wrapper" role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'demand-bridge' ); ?>">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> – <?php _e( 'Home', 'demand-bridge' ); ?>">
            <div class="logo-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <span class="logo-text">Demand<span>Bridge</span></span>
        </a>

        <!-- Desktop Navigation -->
        <ul class="nav-menu" role="list">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'demand-bridge' ); ?></a></li>

            <li class="has-dropdown">
                <a href="#" aria-haspopup="true" aria-expanded="false"><?php _e( 'Solutions', 'demand-bridge' ); ?> &#9662;</a>
                <ul class="dropdown-menu" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/demand-generation' ) ); ?>"><?php _e( '🎯 Demand Generation', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/account-based-marketing' ) ); ?>"><?php _e( '🏢 Account-Based Marketing', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/sales-enablement' ) ); ?>"><?php _e( '💼 Sales Enablement', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/revenue-operations' ) ); ?>"><?php _e( '📊 Revenue Operations', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/content-strategy' ) ); ?>"><?php _e( '✍️ Content Strategy', 'demand-bridge' ); ?></a></li>
                </ul>
            </li>

            <li class="has-dropdown">
                <a href="<?php echo esc_url( home_url( '/learning-center' ) ); ?>" aria-haspopup="true" aria-expanded="false"><?php _e( 'Learning Center', 'demand-bridge' ); ?> &#9662;</a>
                <ul class="dropdown-menu" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php _e( '📚 All Articles', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/guides' ) ); ?>"><?php _e( '📖 Guides & Playbooks', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>"><?php _e( '💡 Case Studies', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/reports' ) ); ?>"><?php _e( '📊 Industry Reports', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/webinars' ) ); ?>"><?php _e( '🎥 Webinars', 'demand-bridge' ); ?></a></li>
                </ul>
            </li>

            <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php _e( 'About', 'demand-bridge' ); ?></a></li>
            <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php _e( 'Contact', 'demand-bridge' ); ?></a></li>
        </ul>

        <!-- Nav Actions -->
        <div class="nav-actions">
            <!-- Search Toggle -->
            <button class="nav-search-btn" id="searchToggle" aria-label="<?php esc_attr_e( 'Search', 'demand-bridge' ); ?>" aria-expanded="false">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn nav-cta btn-sm">
                <?php _e( 'Get Started', 'demand-bridge' ); ?> &rarr;
            </a>
        </div>

        <!-- Hamburger -->
        <button class="hamburger" id="menuToggle" aria-label="<?php esc_attr_e( 'Toggle menu', 'demand-bridge' ); ?>" aria-expanded="false" aria-controls="mobileNav">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </nav>
</header>

<!-- Mobile Navigation -->
<nav class="mobile-nav" id="mobileNav" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'demand-bridge' ); ?>" aria-hidden="true">
    <ul role="list">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( '🏠 Home', 'demand-bridge' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php _e( '📚 Learning Center', 'demand-bridge' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/guides' ) ); ?>"><?php _e( '📖 Guides & Playbooks', 'demand-bridge' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>"><?php _e( '💡 Case Studies', 'demand-bridge' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php _e( '👥 About Us', 'demand-bridge' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="mobile-cta"><?php _e( 'Get Started →', 'demand-bridge' ); ?></a></li>
    </ul>
</nav>

<!-- Search Overlay -->
<div class="search-overlay" id="searchOverlay" role="dialog" aria-label="<?php esc_attr_e( 'Search', 'demand-bridge' ); ?>" aria-hidden="true">
    <div class="search-box">
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="search-input-wrap">
                <span class="search-icon" aria-hidden="true">🔍</span>
                <input
                    type="search"
                    class="search-input"
                    id="searchInput"
                    name="s"
                    placeholder="<?php esc_attr_e( 'Search articles, guides, topics…', 'demand-bridge' ); ?>"
                    value="<?php echo get_search_query(); ?>"
                    autocomplete="off"
                    aria-label="<?php esc_attr_e( 'Search', 'demand-bridge' ); ?>"
                >
                <button type="button" class="search-close" id="searchClose" aria-label="<?php esc_attr_e( 'Close search', 'demand-bridge' ); ?>">✕</button>
            </div>
        </form>
        <p style="color:rgba(255,255,255,0.5);font-size:0.875rem;margin-top:1rem;text-align:center;"><?php _e( 'Press Escape to close', 'demand-bridge' ); ?></p>
    </div>
</div>

<!-- =============================================
     MAIN CONTENT BEGINS
     ============================================= -->
<main id="main-content" role="main">
