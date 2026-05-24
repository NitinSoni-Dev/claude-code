<?php
/**
 * Front Page Template – Demand Bridge Homepage
 *
 * @package DemandBridge
 */
get_header();
?>

<!-- =============================================
     HERO SECTION
     ============================================= -->
<section class="hero" aria-labelledby="hero-title">
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-bg-grid"></div>
        <div class="hero-bg-glow glow-1"></div>
        <div class="hero-bg-glow glow-2"></div>
    </div>

    <div class="hero-wrapper">
        <!-- Hero Content -->
        <div class="hero-content">
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                <?php _e( 'B2B Marketing Intelligence Platform', 'demand-bridge' ); ?>
            </div>

            <h1 class="hero-title" id="hero-title">
                <?php _e( 'Bridge the Gap Between', 'demand-bridge' ); ?>
                <span class="highlight"><?php _e( 'Demand &amp; Revenue', 'demand-bridge' ); ?></span>
            </h1>

            <p class="hero-subtitle">
                <?php _e( 'Access expert-crafted B2B marketing playbooks, demand generation strategies, and actionable insights — built to help modern revenue teams grow smarter.', 'demand-bridge' ); ?>
            </p>

            <div class="hero-actions">
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary btn-lg">
                    <?php _e( 'Explore Learning Center', 'demand-bridge' ); ?>
                    <span class="arrow" aria-hidden="true">&rarr;</span>
                </a>
                <a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" class="btn btn-outline btn-lg">
                    <?php _e( 'Free Guides', 'demand-bridge' ); ?>
                </a>
            </div>

            <div class="hero-stats" role="list" aria-label="<?php esc_attr_e( 'Key statistics', 'demand-bridge' ); ?>">
                <div class="hero-stat" role="listitem">
                    <div class="hero-stat-value" data-count="500" data-suffix="+">0</div>
                    <div class="hero-stat-label"><?php _e( 'Articles Published', 'demand-bridge' ); ?></div>
                </div>
                <div class="hero-stat" role="listitem">
                    <div class="hero-stat-value" data-count="50" data-suffix="K+">0</div>
                    <div class="hero-stat-label"><?php _e( 'Monthly Readers', 'demand-bridge' ); ?></div>
                </div>
                <div class="hero-stat" role="listitem">
                    <div class="hero-stat-value" data-count="120" data-suffix="+">0</div>
                    <div class="hero-stat-label"><?php _e( 'B2B Experts', 'demand-bridge' ); ?></div>
                </div>
            </div>
        </div>

        <!-- Hero Visual (Desktop) -->
        <div class="hero-visual" aria-hidden="true">
            <div class="hero-card-stack">
                <!-- Main card -->
                <div class="hero-card hero-card-main">
                    <div class="hero-card-header">
                        <div class="hero-card-icon">🎯</div>
                        <div>
                            <div class="hero-card-tag"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></div>
                        </div>
                    </div>
                    <h3 class="hero-card-title"><?php _e( 'Q4 Pipeline Acceleration Playbook', 'demand-bridge' ); ?></h3>
                    <p class="hero-card-desc"><?php _e( '12-step framework used by 200+ B2B companies to 3x their qualified pipeline.', 'demand-bridge' ); ?></p>
                    <div class="hero-card-metrics">
                        <div class="metric">
                            <div class="metric-value">3×</div>
                            <div class="metric-label"><?php _e( 'Pipeline', 'demand-bridge' ); ?></div>
                        </div>
                        <div class="metric">
                            <div class="metric-value">42%</div>
                            <div class="metric-label"><?php _e( 'Win Rate', 'demand-bridge' ); ?></div>
                        </div>
                        <div class="metric">
                            <div class="metric-value">18d</div>
                            <div class="metric-label"><?php _e( 'Faster Close', 'demand-bridge' ); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Mini cards -->
                <div class="hero-card-small">
                    <div class="hero-mini-card">
                        <div class="mini-card-icon">📈</div>
                        <div class="mini-card-val">+68%</div>
                        <div class="mini-card-label"><?php _e( 'MQL Growth', 'demand-bridge' ); ?></div>
                    </div>
                    <div class="hero-mini-card">
                        <div class="mini-card-icon">🏆</div>
                        <div class="mini-card-val">Top 1%</div>
                        <div class="mini-card-label"><?php _e( 'B2B Content', 'demand-bridge' ); ?></div>
                    </div>
                    <div class="hero-mini-card">
                        <div class="mini-card-icon">🤝</div>
                        <div class="mini-card-val">500+</div>
                        <div class="mini-card-label"><?php _e( 'Companies', 'demand-bridge' ); ?></div>
                    </div>
                </div>

                <!-- Floating notification -->
                <div class="hero-notification">
                    <div class="notif-icon">✅</div>
                    <div class="notif-text">
                        <div class="notif-title"><?php _e( 'New Guide Published', 'demand-bridge' ); ?></div>
                        <div class="notif-sub"><?php _e( 'ABM Strategy 2025 — Free Download', 'demand-bridge' ); ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- .hero-wrapper -->
</section>

<!-- =============================================
     TRUST BAR
     ============================================= -->
<div class="trust-bar">
    <div class="container">
        <div class="trust-bar-inner">
            <span class="trust-label"><?php _e( 'Trusted by leading B2B teams at:', 'demand-bridge' ); ?></span>
            <div class="trust-logos" role="list" aria-label="<?php esc_attr_e( 'Client logos', 'demand-bridge' ); ?>">
                <span class="trust-logo" role="listitem">Salesforce</span>
                <span class="trust-logo" role="listitem">HubSpot</span>
                <span class="trust-logo" role="listitem">Gartner</span>
                <span class="trust-logo" role="listitem">Forrester</span>
                <span class="trust-logo" role="listitem">G2</span>
                <span class="trust-logo" role="listitem">Drift</span>
                <span class="trust-logo" role="listitem">Outreach</span>
            </div>
        </div>
    </div>
</div>

<!-- =============================================
     FEATURES / SOLUTIONS SECTION
     ============================================= -->
<section class="section features-section" aria-labelledby="features-title">
    <div class="container">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'What We Cover', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="features-title"><?php _e( 'Everything You Need to Win in B2B', 'demand-bridge' ); ?></h2>
            <p class="section-desc"><?php _e( 'From demand generation fundamentals to advanced ABM playbooks — our learning center covers every stage of the modern B2B revenue journey.', 'demand-bridge' ); ?></p>
        </div>

        <div class="features-grid stagger">

            <article class="feature-card fade-in">
                <div class="feature-icon orange" aria-hidden="true">🎯</div>
                <h3 class="feature-title"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Master the art of creating awareness and interest in your B2B product. Learn proven frameworks, channel strategies, and measurement models.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/topic/demand-generation' ) ); ?>" class="feature-link">
                    <?php _e( 'Explore articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="feature-card fade-in">
                <div class="feature-icon blue" aria-hidden="true">🏢</div>
                <h3 class="feature-title"><?php _e( 'Account-Based Marketing', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Deep-dive into ABM strategy, target account selection, personalization at scale, and measuring account engagement.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/topic/account-based-marketing' ) ); ?>" class="feature-link">
                    <?php _e( 'Explore articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="feature-card fade-in">
                <div class="feature-icon green" aria-hidden="true">💼</div>
                <h3 class="feature-title"><?php _e( 'Sales Enablement', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Align sales and marketing, build winning battle cards, create effective discovery call frameworks, and shorten your sales cycle.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/topic/sales-enablement' ) ); ?>" class="feature-link">
                    <?php _e( 'Explore articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="feature-card fade-in">
                <div class="feature-icon purple" aria-hidden="true">✍️</div>
                <h3 class="feature-title"><?php _e( 'Content Strategy', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Build content that converts at every stage. Learn SEO for B2B, thought leadership, gated content strategy, and distribution.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/topic/content-strategy' ) ); ?>" class="feature-link">
                    <?php _e( 'Explore articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="feature-card fade-in">
                <div class="feature-icon red" aria-hidden="true">📊</div>
                <h3 class="feature-title"><?php _e( 'Revenue Operations', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Unify your go-to-market teams, optimize your tech stack, improve data quality, and build a scalable revenue engine.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/topic/revenue-operations' ) ); ?>" class="feature-link">
                    <?php _e( 'Explore articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

            <article class="feature-card fade-in">
                <div class="feature-icon orange" aria-hidden="true">🔬</div>
                <h3 class="feature-title"><?php _e( 'B2B Research &amp; Reports', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Access original research, benchmark studies, and industry reports — data-driven insights to inform your B2B strategy.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/reports' ) ); ?>" class="feature-link">
                    <?php _e( 'View reports', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                </a>
            </article>

        </div>
    </div>
</section>

<!-- =============================================
     STATS SECTION
     ============================================= -->
<section class="stats-section" aria-labelledby="stats-title">
    <div class="container">
        <div class="text-center" style="margin-bottom:3rem;">
            <span class="section-label" style="color:#ff8c60;"><?php _e( 'Our Impact', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="stats-title" style="color:white;"><?php _e( 'Numbers That Speak for Themselves', 'demand-bridge' ); ?></h2>
        </div>
        <div class="stats-grid stagger" role="list">
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="500" data-suffix="+">0</div>
                <div class="stat-label"><?php _e( 'Expert Articles', 'demand-bridge' ); ?></div>
                <div class="stat-sublabel"><?php _e( 'Peer-reviewed & updated', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="50" data-suffix="K+">0</div>
                <div class="stat-label"><?php _e( 'Monthly Readers', 'demand-bridge' ); ?></div>
                <div class="stat-sublabel"><?php _e( 'B2B professionals', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="98" data-suffix="%">0</div>
                <div class="stat-label"><?php _e( 'Satisfaction Rate', 'demand-bridge' ); ?></div>
                <div class="stat-sublabel"><?php _e( 'Reader satisfaction score', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="120" data-suffix="+">0</div>
                <div class="stat-label"><?php _e( 'Expert Contributors', 'demand-bridge' ); ?></div>
                <div class="stat-sublabel"><?php _e( 'Industry practitioners', 'demand-bridge' ); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     LEARNING CATEGORIES
     ============================================= -->
<section class="section categories-section" aria-labelledby="categories-title">
    <div class="container">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'Browse by Topic', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="categories-title"><?php _e( 'Find Your Learning Path', 'demand-bridge' ); ?></h2>
            <p class="section-desc"><?php _e( 'Structured learning paths for every B2B role — from marketing managers to CROs.', 'demand-bridge' ); ?></p>
        </div>

        <div class="categories-grid stagger">
            <a href="<?php echo esc_url( home_url( '/topic/demand-generation' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">🎯</span>
                <div class="category-name"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '85+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/topic/account-based-marketing' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">🏢</span>
                <div class="category-name"><?php _e( 'ABM', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '70+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/topic/sales-enablement' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">💼</span>
                <div class="category-name"><?php _e( 'Sales Enablement', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '60+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/topic/content-strategy' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">✍️</span>
                <div class="category-name"><?php _e( 'Content Strategy', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '90+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/topic/revenue-operations' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">📊</span>
                <div class="category-name"><?php _e( 'Revenue Ops', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '45+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/topic/b2b-marketing' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">🚀</span>
                <div class="category-name"><?php _e( 'B2B Marketing', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '110+ articles', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/reports' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">📑</span>
                <div class="category-name"><?php _e( 'Research &amp; Reports', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '30+ reports', 'demand-bridge' ); ?></div>
            </a>
            <a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" class="category-card fade-in">
                <span class="category-emoji" aria-hidden="true">🗺️</span>
                <div class="category-name"><?php _e( 'Playbooks', 'demand-bridge' ); ?></div>
                <div class="category-count"><?php _e( '25+ playbooks', 'demand-bridge' ); ?></div>
            </a>
        </div>
    </div>
</section>

<!-- =============================================
     LATEST BLOG POSTS
     ============================================= -->
<section class="section blog-section" aria-labelledby="blog-section-title">
    <div class="container">
        <div class="flex-between" style="margin-bottom:2.5rem;flex-wrap:wrap;gap:1rem;">
            <div>
                <span class="section-label"><?php _e( 'Learning Center', 'demand-bridge' ); ?></span>
                <h2 class="section-title" id="blog-section-title"><?php _e( 'Latest Insights &amp; Articles', 'demand-bridge' ); ?></h2>
            </div>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-outline-dark">
                <?php _e( 'View All Articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <!-- Filter Buttons -->
        <div class="blog-filters" role="tablist" aria-label="<?php esc_attr_e( 'Filter articles', 'demand-bridge' ); ?>">
            <button class="filter-btn active" data-filter="all" role="tab" aria-selected="true"><?php _e( 'All', 'demand-bridge' ); ?></button>
            <button class="filter-btn" data-filter="demand-generation" role="tab" aria-selected="false"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></button>
            <button class="filter-btn" data-filter="account-based-marketing" role="tab" aria-selected="false"><?php _e( 'ABM', 'demand-bridge' ); ?></button>
            <button class="filter-btn" data-filter="sales-enablement" role="tab" aria-selected="false"><?php _e( 'Sales', 'demand-bridge' ); ?></button>
            <button class="filter-btn" data-filter="content-strategy" role="tab" aria-selected="false"><?php _e( 'Content', 'demand-bridge' ); ?></button>
            <button class="filter-btn" data-filter="revenue-operations" role="tab" aria-selected="false"><?php _e( 'RevOps', 'demand-bridge' ); ?></button>
        </div>

        <div class="blog-grid" id="blogGrid">
            <?php
            $blog_posts = new WP_Query( [
                'post_type'      => 'post',
                'posts_per_page' => 7,
                'post_status'    => 'publish',
            ] );

            if ( $blog_posts->have_posts() ) :
                $index = 0;
                while ( $blog_posts->have_posts() ) :
                    $blog_posts->the_post();
                    $is_featured = ( $index === 0 );
                    $cats        = get_the_terms( get_the_ID(), 'category' );
                    $cat_slug    = $cats ? $cats[0]->slug : '';
                    $cat_name    = $cats ? $cats[0]->name : 'Blog';
                    $read_time   = demandbridge_read_time();
                    ?>
                    <article class="card fade-in <?php echo $is_featured ? 'featured' : ''; ?>" data-category="<?php echo esc_attr( $cat_slug ); ?>">
                        <a href="<?php the_permalink(); ?>" class="card-img" aria-hidden="true" tabindex="-1">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'db-card', [ 'alt' => esc_attr( get_the_title() ) ] ); ?>
                            <?php else : ?>
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:3rem;">
                                    <?php echo $is_featured ? '🎯' : '📚'; ?>
                                </div>
                            <?php endif; ?>
                        </a>

                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge badge-secondary"><?php echo esc_html( $cat_name ); ?></span>
                                <span class="card-meta-dot" aria-hidden="true"></span>
                                <span><?php echo esc_html( $read_time ); ?></span>
                            </div>

                            <h3 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="card-excerpt"><?php the_excerpt(); ?></p>

                            <div class="card-footer">
                                <div class="card-author">
                                    <div class="card-author-avatar">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 36, '', '', [ 'class' => 'card-author-avatar-img' ] ); ?>
                                    </div>
                                    <div>
                                        <div class="card-author-name"><?php the_author(); ?></div>
                                        <div class="card-read-time"><?php echo get_the_date(); ?></div>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-ghost btn-sm" aria-label="<?php echo esc_attr( sprintf( __( 'Read: %s', 'demand-bridge' ), get_the_title() ) ); ?>">
                                    <?php _e( 'Read', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
            else :
                // Placeholder cards when no posts exist
                $sample_posts = [
                    [ 'icon' => '🎯', 'cat' => 'Demand Generation', 'cat_slug' => 'demand-generation', 'title' => '10 Demand Generation Strategies That Actually Drive Revenue in 2025', 'excerpt' => 'Discover the demand generation tactics that top B2B companies are using to consistently fill their pipeline with high-quality leads — backed by real data.', 'author' => 'Sarah Chen', 'date' => 'May 18, 2025', 'read' => '8 min read', 'featured' => true ],
                    [ 'icon' => '🏢', 'cat' => 'ABM', 'cat_slug' => 'account-based-marketing', 'title' => 'The Complete ABM Playbook for Enterprise B2B Teams', 'excerpt' => 'A step-by-step guide to running account-based marketing campaigns that actually land with your top-tier target accounts.', 'author' => 'Marcus Webb', 'date' => 'May 15, 2025', 'read' => '12 min read', 'featured' => false ],
                    [ 'icon' => '📊', 'cat' => 'Revenue Operations', 'cat_slug' => 'revenue-operations', 'title' => 'RevOps Metrics Every CRO Should Track in 2025', 'excerpt' => 'From pipeline velocity to win rate by source — the key revenue operations metrics that power data-driven growth decisions.', 'author' => 'James Okafor', 'date' => 'May 12, 2025', 'read' => '6 min read', 'featured' => false ],
                    [ 'icon' => '✍️', 'cat' => 'Content Strategy', 'cat_slug' => 'content-strategy', 'title' => 'How to Build a B2B Content Engine That Converts', 'excerpt' => 'Stop creating content that nobody reads. Here\'s how top B2B brands build systematic content operations that drive real pipeline.', 'author' => 'Priya Sharma', 'date' => 'May 10, 2025', 'read' => '9 min read', 'featured' => false ],
                    [ 'icon' => '💼', 'cat' => 'Sales Enablement', 'cat_slug' => 'sales-enablement', 'title' => 'Sales Enablement 2.0: Closing the Loop Between Marketing and Revenue', 'excerpt' => 'Modern sales enablement goes far beyond battle cards. Learn how to build a true feedback loop that accelerates deals.', 'author' => 'David Park', 'date' => 'May 8, 2025', 'read' => '7 min read', 'featured' => false ],
                    [ 'icon' => '🚀', 'cat' => 'B2B Marketing', 'cat_slug' => 'b2b-marketing', 'title' => 'The B2B Buyer Journey Has Changed — Here\'s Your New Playbook', 'excerpt' => '68% of B2B buyers prefer to self-educate before talking to sales. Discover how to show up at every touchpoint of the modern buyer journey.', 'author' => 'Emily Ross', 'date' => 'May 5, 2025', 'read' => '10 min read', 'featured' => false ],
                    [ 'icon' => '📑', 'cat' => 'Research', 'cat_slug' => 'research', 'title' => 'State of B2B Demand Gen 2025: Key Findings & Trends', 'excerpt' => 'We surveyed 800+ B2B marketing leaders on their demand generation investments, challenges, and what\'s actually working.', 'author' => 'Demand Bridge Research', 'date' => 'May 2, 2025', 'read' => '15 min read', 'featured' => false ],
                ];

                foreach ( $sample_posts as $i => $p ) :
                ?>
                    <article class="card fade-in <?php echo $p['featured'] ? 'featured' : ''; ?>" data-category="<?php echo esc_attr( $p['cat_slug'] ); ?>">
                        <a href="#" class="card-img" aria-hidden="true" tabindex="-1">
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:<?php echo $p['featured'] ? '5rem' : '3rem'; ?>;">
                                <?php echo $p['icon']; ?>
                            </div>
                        </a>
                        <div class="card-body">
                            <div class="card-meta">
                                <span class="badge badge-secondary"><?php echo esc_html( $p['cat'] ); ?></span>
                                <span class="card-meta-dot" aria-hidden="true"></span>
                                <span><?php echo esc_html( $p['read'] ); ?></span>
                            </div>
                            <h3 class="card-title"><a href="#"><?php echo esc_html( $p['title'] ); ?></a></h3>
                            <p class="card-excerpt"><?php echo esc_html( $p['excerpt'] ); ?></p>
                            <div class="card-footer">
                                <div class="card-author">
                                    <div class="card-author-avatar" style="display:flex;align-items:center;justify-content:center;background:var(--color-primary);color:white;font-weight:700;font-size:0.75rem;">
                                        <?php echo esc_html( substr( $p['author'], 0, 2 ) ); ?>
                                    </div>
                                    <div>
                                        <div class="card-author-name"><?php echo esc_html( $p['author'] ); ?></div>
                                        <div class="card-read-time"><?php echo esc_html( $p['date'] ); ?></div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-ghost btn-sm"><?php _e( 'Read', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div><!-- #blogGrid -->

        <div class="blog-cta-wrap fade-in">
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary btn-lg">
                <?php _e( 'Browse All Articles', 'demand-bridge' ); ?> <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</section>

<!-- =============================================
     TESTIMONIALS
     ============================================= -->
<section class="section testimonials-section" aria-labelledby="testimonials-title">
    <div class="container">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'What Our Readers Say', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="testimonials-title"><?php _e( 'Trusted by B2B Revenue Leaders', 'demand-bridge' ); ?></h2>
        </div>

        <div class="testimonials-grid stagger">

            <article class="testimonial-card fade-in">
                <div class="testimonial-quote" aria-hidden="true">&ldquo;</div>
                <div class="testimonial-stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'demand-bridge' ); ?>">★★★★★</div>
                <blockquote class="testimonial-text">
                    <?php _e( '"Demand Bridge\'s ABM playbook completely transformed how our team approaches enterprise accounts. We went from 12% to 38% win rate on strategic accounts in just one quarter. The depth of content here is unlike anything else in the market."', 'demand-bridge' ); ?>
                </blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">👩</div>
                    <div>
                        <div class="testimonial-name"><?php _e( 'Jennifer Walsh', 'demand-bridge' ); ?></div>
                        <div class="testimonial-role"><?php _e( 'VP of Demand Generation, TechCorp Inc.', 'demand-bridge' ); ?></div>
                    </div>
                </div>
            </article>

            <article class="testimonial-card fade-in">
                <div class="testimonial-quote" aria-hidden="true">&ldquo;</div>
                <div class="testimonial-stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'demand-bridge' ); ?>">★★★★★</div>
                <blockquote class="testimonial-text">
                    <?php _e( '"I recommend Demand Bridge to every B2B marketer I mentor. The content is practitioner-written, immediately applicable, and constantly updated. It\'s become our team\'s primary learning resource for all things revenue marketing."', 'demand-bridge' ); ?>
                </blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">👨</div>
                    <div>
                        <div class="testimonial-name"><?php _e( 'Marcus Osei', 'demand-bridge' ); ?></div>
                        <div class="testimonial-role"><?php _e( 'Chief Revenue Officer, Scale Ventures', 'demand-bridge' ); ?></div>
                    </div>
                </div>
            </article>

            <article class="testimonial-card fade-in">
                <div class="testimonial-quote" aria-hidden="true">&ldquo;</div>
                <div class="testimonial-stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'demand-bridge' ); ?>">★★★★★</div>
                <blockquote class="testimonial-text">
                    <?php _e( '"The RevOps content on Demand Bridge helped us build our entire go-to-market infrastructure. Their frameworks for pipeline visibility and forecast accuracy are now company-wide standards. Exceptional resource."', 'demand-bridge' ); ?>
                </blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" aria-hidden="true">👩</div>
                    <div>
                        <div class="testimonial-name"><?php _e( 'Priya Agarwal', 'demand-bridge' ); ?></div>
                        <div class="testimonial-role"><?php _e( 'Head of RevOps, SaaS Global Ltd.', 'demand-bridge' ); ?></div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- =============================================
     NEWSLETTER CTA SECTION
     ============================================= -->
<section class="newsletter-section" aria-labelledby="newsletter-title">
    <div class="newsletter-content">
        <span class="badge badge-white" style="margin-bottom:1.5rem;"><?php _e( '📬 Weekly Newsletter', 'demand-bridge' ); ?></span>
        <h2 class="newsletter-title" id="newsletter-title">
            <?php _e( 'Stay Ahead of the B2B Curve', 'demand-bridge' ); ?>
        </h2>
        <p class="newsletter-desc">
            <?php _e( 'Join 50,000+ B2B professionals. Get the week\'s best demand gen insights, ABM strategies, and industry news — delivered every Tuesday.', 'demand-bridge' ); ?>
        </p>

        <form class="newsletter-form" id="newsletterForm" novalidate aria-label="<?php esc_attr_e( 'Newsletter signup form', 'demand-bridge' ); ?>">
            <?php wp_nonce_field( 'demandbridge_nonce', 'newsletter_nonce' ); ?>
            <label for="newsletterEmail" class="sr-only"><?php _e( 'Email address', 'demand-bridge' ); ?></label>
            <input
                type="email"
                id="newsletterEmail"
                name="email"
                class="newsletter-input"
                placeholder="<?php esc_attr_e( 'Enter your work email', 'demand-bridge' ); ?>"
                required
                autocomplete="email"
                aria-describedby="newsletter-privacy"
            >
            <button type="submit" class="newsletter-btn">
                <?php _e( 'Subscribe Free', 'demand-bridge' ); ?>
            </button>
        </form>

        <p class="newsletter-privacy" id="newsletter-privacy">
            <?php _e( 'No spam, ever. Unsubscribe anytime. We respect your privacy.', 'demand-bridge' ); ?>
        </p>
    </div>
</section>

<?php get_footer(); ?>
