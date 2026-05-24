<?php
/**
 * Template Name: About Page
 *
 * @package DemandBridge
 */
get_header();
?>

<!-- About Hero -->
<section class="about-hero" aria-labelledby="about-title">
    <div class="container">
        <span class="badge badge-white" style="margin-bottom:1.5rem;"><?php _e( '👥 Our Story', 'demand-bridge' ); ?></span>
        <h1 id="about-title"><?php _e( 'We\'re Building the World\'s Best B2B Marketing Resource', 'demand-bridge' ); ?></h1>
        <p><?php _e( 'Demand Bridge was founded by a group of B2B marketing practitioners who were tired of generic, surface-level content. We build actionable, expert-driven resources for revenue teams who want to win.', 'demand-bridge' ); ?></p>
    </div>
</section>

<!-- Mission Section -->
<section class="about-mission section">
    <div class="container">
        <div class="about-mission-grid">
            <div class="about-mission-content fade-in-left">
                <span class="section-label"><?php _e( 'Our Mission', 'demand-bridge' ); ?></span>
                <h2 class="section-title"><?php _e( 'Bridging the Knowledge Gap in B2B', 'demand-bridge' ); ?></h2>
                <p class="about-mission-desc">
                    <?php _e( 'Too many B2B marketers are making decisions based on outdated tactics, vendor-biased content, or generic "best practices" that don\'t account for their specific context.', 'demand-bridge' ); ?>
                </p>
                <p class="about-mission-desc">
                    <?php _e( 'We believe every revenue professional deserves access to practitioner-led, data-driven insights. Demand Bridge is our commitment to that belief — free, expert content for the modern B2B go-to-market team.', 'demand-bridge' ); ?>
                </p>
                <div style="display:flex;gap:1rem;flex-wrap:wrap;margin-top:2rem;">
                    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary">
                        <?php _e( 'Explore Our Content', 'demand-bridge' ); ?> &rarr;
                    </a>
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-outline-dark">
                        <?php _e( 'Work With Us', 'demand-bridge' ); ?>
                    </a>
                </div>
            </div>

            <div class="about-mission-visual fade-in-right">
                <div class="about-img-wrap">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'db-featured', [ 'alt' => __( 'The Demand Bridge team', 'demand-bridge' ) ] ); ?>
                    <?php else : ?>
                        <span aria-hidden="true">🌉</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section" style="background:var(--color-light);" aria-labelledby="values-title">
    <div class="container">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'What We Stand For', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="values-title"><?php _e( 'Our Core Values', 'demand-bridge' ); ?></h2>
        </div>

        <div class="features-grid stagger">
            <div class="feature-card fade-in">
                <div class="feature-icon orange" aria-hidden="true">🎯</div>
                <h3 class="feature-title"><?php _e( 'Practitioner-First', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Every article is written or reviewed by active B2B practitioners — people who are doing the work right now, not theorizing about it.', 'demand-bridge' ); ?></p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon blue" aria-hidden="true">📊</div>
                <h3 class="feature-title"><?php _e( 'Data-Driven', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Opinions need to be backed by evidence. We cite real data, real results, and real case studies — not just "what seems to work."', 'demand-bridge' ); ?></p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon green" aria-hidden="true">🔓</div>
                <h3 class="feature-title"><?php _e( 'Always Free', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'Great B2B knowledge shouldn\'t be locked behind a paywall. Our core content will always be free, forever. That\'s our promise.', 'demand-bridge' ); ?></p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon purple" aria-hidden="true">🔄</div>
                <h3 class="feature-title"><?php _e( 'Always Current', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'B2B marketing evolves fast. We update our content regularly and clearly mark when articles were last reviewed to keep you ahead.', 'demand-bridge' ); ?></p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon red" aria-hidden="true">🤝</div>
                <h3 class="feature-title"><?php _e( 'Vendor-Neutral', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'We don\'t take money from software vendors to influence our editorial. Our content recommendations are based on what actually works.', 'demand-bridge' ); ?></p>
            </div>
            <div class="feature-card fade-in">
                <div class="feature-icon orange" aria-hidden="true">🌍</div>
                <h3 class="feature-title"><?php _e( 'Global Perspective', 'demand-bridge' ); ?></h3>
                <p class="feature-desc"><?php _e( 'B2B isn\'t just a US phenomenon. We feature perspectives and case studies from B2B teams worldwide.', 'demand-bridge' ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section" aria-labelledby="team-title">
    <div class="container">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'The Team', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="team-title"><?php _e( 'Meet the Demand Bridge Crew', 'demand-bridge' ); ?></h2>
            <p class="section-desc"><?php _e( 'Former CMOs, demand gen leaders, RevOps experts, and content strategists who\'ve been in the trenches.', 'demand-bridge' ); ?></p>
        </div>

        <div class="team-grid stagger">
            <?php
            $team = [
                [ 'emoji' => '👩‍💼', 'name' => 'Sarah Chen', 'role' => 'Co-Founder & Editor-in-Chief', 'bio' => 'Former VP of Demand Generation at Series B SaaS companies. 12 years in B2B marketing. ABM and pipeline obsessive.' ],
                [ 'emoji' => '👨‍💻', 'name' => 'Marcus Webb', 'role' => 'Head of Content & Strategy', 'bio' => 'Ex-Forrester analyst and B2B growth consultant. Authored 3 books on account-based marketing and revenue strategy.' ],
                [ 'emoji' => '👩‍🔬', 'name' => 'Priya Sharma', 'role' => 'Research Director', 'bio' => '8 years running B2B market research. Leads our annual State of Demand Gen report and benchmark studies.' ],
                [ 'emoji' => '👨‍📊', 'name' => 'James Okafor', 'role' => 'RevOps Lead', 'bio' => 'Built RevOps functions at 4 B2B companies. Expert in GTM alignment, CRM strategy, and pipeline analytics.' ],
                [ 'emoji' => '👩‍🎨', 'name' => 'Emily Ross', 'role' => 'Content Strategist', 'bio' => 'Former agency creative director turned B2B content specialist. Helps brands turn complex topics into clear narratives.' ],
                [ 'emoji' => '👨‍🏫', 'name' => 'David Park', 'role' => 'Sales Enablement Editor', 'bio' => 'Spent 10 years in enterprise sales before switching to enablement. Bridges the gap between sales and marketing thinking.' ],
                [ 'emoji' => '👩‍🚀', 'name' => 'Lisa Torres', 'role' => 'Community Manager', 'bio' => 'Builds and nurtures the Demand Bridge community of 50K+ B2B professionals. Former customer success leader.' ],
                [ 'emoji' => '👨‍🔧', 'name' => 'Alex Kim', 'role' => 'Head of Product', 'bio' => 'Product and growth specialist focused on making Demand Bridge the most useful B2B learning platform on the web.' ],
            ];
            foreach ( $team as $member ) :
            ?>
                <article class="team-card fade-in">
                    <div class="team-card-avatar" aria-hidden="true">
                        <?php echo $member['emoji']; ?>
                    </div>
                    <div class="team-card-body">
                        <h3 class="team-card-name"><?php echo esc_html( $member['name'] ); ?></h3>
                        <div class="team-card-role"><?php echo esc_html( $member['role'] ); ?></div>
                        <p class="team-card-bio"><?php echo esc_html( $member['bio'] ); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats Banner -->
<section class="stats-section" aria-labelledby="about-stats-title">
    <div class="container">
        <div class="text-center" style="margin-bottom:3rem;">
            <h2 class="section-title" id="about-stats-title" style="color:white;"><?php _e( 'Demand Bridge by the Numbers', 'demand-bridge' ); ?></h2>
        </div>
        <div class="stats-grid stagger" role="list">
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="500" data-suffix="+">500+</div>
                <div class="stat-label"><?php _e( 'Articles & Guides', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="120" data-suffix="+">120+</div>
                <div class="stat-label"><?php _e( 'Expert Contributors', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="50" data-suffix="K+">50K+</div>
                <div class="stat-label"><?php _e( 'Newsletter Subscribers', 'demand-bridge' ); ?></div>
            </div>
            <div class="stat-item fade-in" role="listitem">
                <div class="stat-number" data-count="3" data-suffix=" yrs">3 yrs</div>
                <div class="stat-label"><?php _e( 'Of Publishing Excellence', 'demand-bridge' ); ?></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="newsletter-section" aria-labelledby="about-cta-title">
    <div class="newsletter-content">
        <h2 class="newsletter-title" id="about-cta-title"><?php _e( 'Join the Demand Bridge Community', 'demand-bridge' ); ?></h2>
        <p class="newsletter-desc"><?php _e( 'Get weekly B2B insights delivered to your inbox. Join 50,000+ revenue professionals.', 'demand-bridge' ); ?></p>
        <form class="newsletter-form" id="aboutNewsletterForm">
            <label for="aboutEmailInput" class="sr-only"><?php _e( 'Email address', 'demand-bridge' ); ?></label>
            <input type="email" id="aboutEmailInput" name="email" class="newsletter-input" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>" required>
            <button type="submit" class="newsletter-btn"><?php _e( 'Subscribe Free', 'demand-bridge' ); ?></button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
