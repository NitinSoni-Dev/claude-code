<?php
/**
 * Single Post Template – Demand Bridge
 *
 * @package DemandBridge
 */
get_header();

while ( have_posts() ) :
    the_post();
    $read_time    = demandbridge_read_time();
    $key_takeaway = get_post_meta( get_the_ID(), '_db_key_takeaway', true );
    $author_id    = get_the_author_meta( 'ID' );
    $author_title = get_post_meta( get_the_ID(), '_db_author_title', true );
    $related      = demandbridge_get_related_posts( get_the_ID(), 3 );
    $cats         = get_the_terms( get_the_ID(), 'category' );
    $tags         = get_the_tags();
?>

<!-- =============================================
     BLOG POST HEADER
     ============================================= -->
<header class="blog-header" role="banner">
    <div class="container">
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="blog-cat-link">
            <span aria-hidden="true">&larr;</span> <?php _e( 'Learning Center', 'demand-bridge' ); ?>
        </a>

        <?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
            <div style="margin-bottom:1rem;">
                <?php foreach ( $cats as $cat ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>" class="badge badge-secondary">
                        <?php echo esc_html( $cat->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h1 class="blog-header-title"><?php the_title(); ?></h1>

        <div class="blog-header-meta">
            <div class="blog-author-info">
                <div class="blog-author-avatar" aria-hidden="true">
                    <?php echo get_avatar( $author_id, 44, '', '', [ 'class' => 'blog-author-avatar-img' ] ); ?>
                </div>
                <div>
                    <div class="blog-author-name"><?php the_author(); ?></div>
                    <?php if ( $author_title ) : ?>
                        <div class="blog-author-role"><?php echo esc_html( $author_title ); ?></div>
                    <?php else : ?>
                        <div class="blog-author-role"><?php _e( 'B2B Marketing Expert', 'demand-bridge' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="blog-meta-divider" aria-hidden="true"></div>

            <span class="blog-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php the_date(); ?></time>
            </span>

            <div class="blog-meta-divider" aria-hidden="true"></div>

            <span class="blog-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <?php echo esc_html( $read_time ); ?>
            </span>
        </div>
    </div>
</header>

<!-- =============================================
     POST BODY
     ============================================= -->
<div style="background:var(--color-light);">
    <div class="post-layout">

        <!-- Main Content -->
        <article class="post-content" id="postContent">

            <!-- Featured Image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <figure class="post-featured-img">
                    <?php the_post_thumbnail( 'db-featured', [
                        'alt'   => esc_attr( get_the_title() ),
                        'class' => 'post-featured-image',
                    ] ); ?>
                </figure>
            <?php endif; ?>

            <!-- Key Takeaway -->
            <?php if ( $key_takeaway ) : ?>
                <div class="key-takeaway">
                    <div class="key-takeaway-label">💡 <?php _e( 'Key Takeaway', 'demand-bridge' ); ?></div>
                    <p><?php echo esc_html( $key_takeaway ); ?></p>
                </div>
            <?php endif; ?>

            <!-- Post Content -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <!-- Tags -->
            <?php if ( $tags ) : ?>
                <div class="post-tags" role="list" aria-label="<?php esc_attr_e( 'Article tags', 'demand-bridge' ); ?>">
                    <span style="font-size:0.875rem;font-weight:700;color:var(--color-gray-600);margin-right:0.5rem;"><?php _e( 'Topics:', 'demand-bridge' ); ?></span>
                    <?php foreach ( $tags as $tag ) : ?>
                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag" role="listitem">
                            <?php echo esc_html( $tag->name ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Share Buttons -->
            <div style="margin:2rem 0;padding:1.5rem;background:white;border-radius:1rem;border:1px solid var(--color-gray-200);">
                <p style="font-size:0.875rem;font-weight:700;color:var(--color-primary);margin-bottom:1rem;"><?php _e( 'Found this helpful? Share it!', 'demand-bridge' ); ?></p>
                <div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode( get_permalink() ); ?>"
                       target="_blank" rel="noopener"
                       class="btn btn-outline-dark btn-sm"
                       aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'demand-bridge' ); ?>">
                        LinkedIn
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>"
                       target="_blank" rel="noopener"
                       class="btn btn-outline-dark btn-sm"
                       aria-label="<?php esc_attr_e( 'Share on Twitter/X', 'demand-bridge' ); ?>">
                        Twitter / X
                    </a>
                    <button class="btn btn-outline-dark btn-sm" id="copyLinkBtn" aria-label="<?php esc_attr_e( 'Copy link', 'demand-bridge' ); ?>">
                        <?php _e( 'Copy Link', 'demand-bridge' ); ?>
                    </button>
                </div>
            </div>

            <!-- Author Box -->
            <div class="author-box">
                <div class="author-box-avatar" aria-hidden="true">
                    <?php echo get_avatar( $author_id, 80, '', '', [ 'class' => 'author-avatar-img' ] ); ?>
                </div>
                <div class="author-box-content">
                    <div class="author-box-name"><?php the_author(); ?></div>
                    <div class="author-box-role">
                        <?php echo esc_html( $author_title ?: __( 'B2B Marketing Expert & Demand Bridge Contributor', 'demand-bridge' ) ); ?>
                    </div>
                    <p class="author-box-bio"><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>

            <!-- Comments -->
            <?php
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
            ?>

        </article><!-- .post-content -->

        <!-- Sidebar -->
        <aside class="post-sidebar" aria-label="<?php esc_attr_e( 'Article sidebar', 'demand-bridge' ); ?>">

            <!-- Table of Contents -->
            <div class="sidebar-widget" id="tocWidget">
                <h2 class="widget-title"><?php _e( 'In This Article', 'demand-bridge' ); ?></h2>
                <nav class="toc-list" id="tocList" aria-label="<?php esc_attr_e( 'Table of contents', 'demand-bridge' ); ?>">
                    <!-- JS will populate this from h2/h3 in the content -->
                    <span style="font-size:0.875rem;color:var(--color-gray-500);"><?php _e( 'Loading...', 'demand-bridge' ); ?></span>
                </nav>
            </div>

            <!-- Newsletter CTA -->
            <div class="sidebar-widget" style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));border-color:transparent;">
                <h2 class="widget-title" style="color:white;border-color:rgba(255,255,255,0.2);"><?php _e( 'Get Weekly Insights', 'demand-bridge' ); ?></h2>
                <p style="font-size:0.875rem;color:rgba(255,255,255,0.8);margin-bottom:1rem;line-height:1.6;">
                    <?php _e( 'Join 50K+ B2B pros. Get the best demand gen strategies every Tuesday.', 'demand-bridge' ); ?>
                </p>
                <form id="sidebarNewsletterForm" style="display:flex;flex-direction:column;gap:0.75rem;">
                    <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>"
                           style="padding:0.75rem 1rem;border-radius:0.5rem;border:2px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:white;font-size:0.875rem;outline:none;transition:border-color 0.2s;"
                           required>
                    <button type="submit" class="btn btn-primary btn-sm" style="border-radius:0.5rem;">
                        <?php _e( 'Subscribe Free', 'demand-bridge' ); ?>
                    </button>
                </form>
            </div>

            <!-- Recent Posts -->
            <div class="sidebar-widget">
                <h2 class="widget-title"><?php _e( 'Popular Articles', 'demand-bridge' ); ?></h2>
                <?php
                $recent_posts = get_posts( [
                    'posts_per_page' => 4,
                    'post__not_in'   => [ get_the_ID() ],
                    'orderby'        => 'comment_count',
                    'order'          => 'DESC',
                ] );

                if ( $recent_posts ) :
                    foreach ( $recent_posts as $rp ) :
                        setup_postdata( $rp );
                        $rp_cats = get_the_terms( $rp->ID, 'category' );
                ?>
                    <div class="recent-post">
                        <a href="<?php echo esc_url( get_permalink( $rp ) ); ?>" class="recent-post-img" aria-hidden="true" tabindex="-1">
                            <?php if ( has_post_thumbnail( $rp ) ) : ?>
                                <?php echo get_the_post_thumbnail( $rp, 'db-thumb', [ 'alt' => '' ] ); ?>
                            <?php else : ?>
                                <span style="font-size:1.5rem;">📚</span>
                            <?php endif; ?>
                        </a>
                        <div>
                            <a href="<?php echo esc_url( get_permalink( $rp ) ); ?>">
                                <div class="recent-post-title"><?php echo esc_html( get_the_title( $rp ) ); ?></div>
                            </a>
                            <div class="recent-post-date"><?php echo esc_html( get_the_date( '', $rp ) ); ?></div>
                        </div>
                    </div>
                <?php
                    endforeach;
                    wp_reset_postdata();
                else :
                    // Placeholder popular posts
                    $popular_placeholders = [
                        [ 'icon' => '🎯', 'title' => 'Demand Gen Strategies for 2025', 'date' => 'May 18, 2025' ],
                        [ 'icon' => '🏢', 'title' => 'The Complete ABM Playbook', 'date' => 'May 15, 2025' ],
                        [ 'icon' => '📊', 'title' => 'RevOps Metrics That Matter', 'date' => 'May 12, 2025' ],
                        [ 'icon' => '✍️', 'title' => 'B2B Content That Converts', 'date' => 'May 10, 2025' ],
                    ];
                    foreach ( $popular_placeholders as $pp ) :
                ?>
                    <div class="recent-post">
                        <div class="recent-post-img">
                            <span><?php echo $pp['icon']; ?></span>
                        </div>
                        <div>
                            <div class="recent-post-title"><?php echo esc_html( $pp['title'] ); ?></div>
                            <div class="recent-post-date"><?php echo esc_html( $pp['date'] ); ?></div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>

        </aside><!-- .post-sidebar -->

    </div><!-- .post-layout -->
</div>

<!-- =============================================
     RELATED POSTS
     ============================================= -->
<?php if ( $related ) : ?>
<section class="related-posts" aria-labelledby="related-posts-title">
    <div class="container">
        <div class="section-header--center">
            <span class="section-label"><?php _e( 'Keep Learning', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="related-posts-title"><?php _e( 'Related Articles', 'demand-bridge' ); ?></h2>
        </div>
        <div class="blog-grid" style="grid-template-columns:repeat(3,1fr);">
            <?php foreach ( $related as $rel ) :
                setup_postdata( $rel );
                $rel_cats     = get_the_terms( $rel->ID, 'category' );
                $rel_cat_name = $rel_cats ? $rel_cats[0]->name : '';
                $rel_read     = demandbridge_read_time( $rel->ID );
            ?>
                <article class="card fade-in">
                    <a href="<?php echo esc_url( get_permalink( $rel ) ); ?>" class="card-img" tabindex="-1" aria-hidden="true">
                        <?php if ( has_post_thumbnail( $rel ) ) : ?>
                            <?php echo get_the_post_thumbnail( $rel, 'db-card', [ 'alt' => '' ] ); ?>
                        <?php else : ?>
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:2.5rem;">📚</div>
                        <?php endif; ?>
                    </a>
                    <div class="card-body">
                        <div class="card-meta">
                            <?php if ( $rel_cat_name ) : ?>
                                <span class="badge badge-secondary"><?php echo esc_html( $rel_cat_name ); ?></span>
                                <span class="card-meta-dot" aria-hidden="true"></span>
                            <?php endif; ?>
                            <span><?php echo esc_html( $rel_read ); ?></span>
                        </div>
                        <h3 class="card-title">
                            <a href="<?php echo esc_url( get_permalink( $rel ) ); ?>"><?php echo esc_html( get_the_title( $rel ) ); ?></a>
                        </h3>
                        <p class="card-excerpt"><?php echo esc_html( get_the_excerpt( $rel ) ); ?></p>
                    </div>
                </article>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- =============================================
     MINI NEWSLETTER CTA
     ============================================= -->
<section class="newsletter-section" aria-labelledby="post-newsletter-title">
    <div class="newsletter-content">
        <h2 class="newsletter-title" id="post-newsletter-title"><?php _e( 'Get the Best B2B Content Weekly', 'demand-bridge' ); ?></h2>
        <p class="newsletter-desc"><?php _e( 'Join 50,000+ B2B marketers. No spam. Just actionable insights.', 'demand-bridge' ); ?></p>
        <form class="newsletter-form" id="bottomNewsletterForm">
            <label for="bottomEmailInput" class="sr-only"><?php _e( 'Email address', 'demand-bridge' ); ?></label>
            <input type="email" id="bottomEmailInput" name="email" class="newsletter-input" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>" required>
            <button type="submit" class="newsletter-btn"><?php _e( 'Subscribe', 'demand-bridge' ); ?></button>
        </form>
    </div>
</section>

<?php endwhile; ?>

<!-- Copy link script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const copyBtn = document.getElementById('copyLinkBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                copyBtn.textContent = '<?php echo esc_js( __( 'Copied!', 'demand-bridge' ) ); ?>';
                setTimeout(function() {
                    copyBtn.textContent = '<?php echo esc_js( __( 'Copy Link', 'demand-bridge' ) ); ?>';
                }, 2000);
            });
        });
    }
});
</script>

<?php get_footer(); ?>
