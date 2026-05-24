<?php
/**
 * Archive / Blog Listing Template – Demand Bridge
 *
 * @package DemandBridge
 */
get_header();
?>

<!-- Archive Header -->
<header class="archive-header" role="banner">
    <div class="container">
        <span class="badge badge-white" style="margin-bottom:1.5rem;"><?php _e( '📚 Learning Center', 'demand-bridge' ); ?></span>

        <?php
        if ( is_category() ) :
            $cat_desc = category_description();
        ?>
            <h1 class="archive-title"><?php single_cat_title(); ?></h1>
            <?php if ( $cat_desc ) : ?>
                <p class="archive-desc"><?php echo strip_tags( $cat_desc ); ?></p>
            <?php else : ?>
                <p class="archive-desc"><?php printf( __( 'Expert articles on %s for B2B marketing professionals.', 'demand-bridge' ), single_cat_title( '', false ) ); ?></p>
            <?php endif; ?>

        <?php elseif ( is_tag() ) : ?>
            <h1 class="archive-title"><?php printf( __( 'Articles tagged: %s', 'demand-bridge' ), single_tag_title( '', false ) ); ?></h1>

        <?php elseif ( is_author() ) : ?>
            <h1 class="archive-title"><?php printf( __( 'Articles by %s', 'demand-bridge' ), get_the_author() ); ?></h1>
            <p class="archive-desc"><?php the_author_meta( 'description' ); ?></p>

        <?php elseif ( is_search() ) : ?>
            <h1 class="archive-title"><?php printf( __( 'Search results for: &ldquo;%s&rdquo;', 'demand-bridge' ), get_search_query() ); ?></h1>
            <p class="archive-desc"><?php printf( __( 'Found %s results.', 'demand-bridge' ), $wp_query->found_posts ); ?></p>

        <?php else : ?>
            <h1 class="archive-title"><?php _e( 'B2B Insights &amp; Learning Center', 'demand-bridge' ); ?></h1>
            <p class="archive-desc"><?php _e( 'Expert-crafted articles on demand generation, ABM, sales enablement, content strategy, and revenue operations.', 'demand-bridge' ); ?></p>
        <?php endif; ?>

        <!-- Search Form in Archive -->
        <div class="archive-search">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label for="archiveSearch" class="sr-only"><?php _e( 'Search articles', 'demand-bridge' ); ?></label>
                <input type="search" id="archiveSearch" name="s" placeholder="<?php esc_attr_e( 'Search articles...', 'demand-bridge' ); ?>" value="<?php echo get_search_query(); ?>">
                <button type="submit"><?php _e( 'Search', 'demand-bridge' ); ?></button>
            </form>
        </div>
    </div>
</header>

<!-- Archive Content -->
<div class="archive-content">
    <div class="archive-layout">

        <!-- Posts Grid -->
        <div>
            <!-- Topic Filters (only on main blog) -->
            <?php if ( ! is_search() ) : ?>
            <div class="blog-filters" style="margin-bottom:2rem;" role="navigation" aria-label="<?php esc_attr_e( 'Topic filters', 'demand-bridge' ); ?>">
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="filter-btn <?php echo ! is_category() ? 'active' : ''; ?>"><?php _e( 'All', 'demand-bridge' ); ?></a>
                <?php
                $topics = get_categories( [ 'hide_empty' => true, 'number' => 8 ] );
                foreach ( $topics as $topic ) :
                ?>
                    <a href="<?php echo esc_url( get_category_link( $topic->term_id ) ); ?>"
                       class="filter-btn <?php echo is_category( $topic->term_id ) ? 'active' : ''; ?>"
                       aria-current="<?php echo is_category( $topic->term_id ) ? 'page' : 'false'; ?>">
                        <?php echo esc_html( $topic->name ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Posts -->
            <div class="archive-posts-grid" id="archiveGrid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();
                        $cats      = get_the_terms( get_the_ID(), 'category' );
                        $cat_name  = $cats && ! is_wp_error( $cats ) ? $cats[0]->name : '';
                        $read_time = demandbridge_read_time();
                    ?>
                        <article class="card fade-in" data-category="<?php echo $cats ? esc_attr( $cats[0]->slug ) : ''; ?>">
                            <a href="<?php the_permalink(); ?>" class="card-img" tabindex="-1" aria-hidden="true">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'db-card', [ 'alt' => '' ] ); ?>
                                <?php else : ?>
                                    <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:2.5rem;">📚</div>
                                <?php endif; ?>
                            </a>

                            <div class="card-body">
                                <div class="card-meta">
                                    <?php if ( $cat_name ) : ?>
                                        <span class="badge badge-secondary"><?php echo esc_html( $cat_name ); ?></span>
                                        <span class="card-meta-dot" aria-hidden="true"></span>
                                    <?php endif; ?>
                                    <span><?php echo esc_html( $read_time ); ?></span>
                                </div>

                                <h2 class="card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <p class="card-excerpt"><?php the_excerpt(); ?></p>

                                <div class="card-footer">
                                    <div class="card-author">
                                        <div class="card-author-avatar">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 36, '', '', [ 'class' => 'card-author-avatar-img' ] ); ?>
                                        </div>
                                        <div>
                                            <div class="card-author-name"><?php the_author(); ?></div>
                                            <div class="card-read-time"><time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php the_date(); ?></time></div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-ghost btn-sm" aria-label="<?php echo esc_attr( sprintf( __( 'Read: %s', 'demand-bridge' ), get_the_title() ) ); ?>">
                                        <?php _e( 'Read', 'demand-bridge' ); ?> &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>

                <?php else : ?>
                    <!-- No posts found -->
                    <div style="grid-column:1/-1;text-align:center;padding:4rem 2rem;">
                        <div style="font-size:4rem;margin-bottom:1rem;" aria-hidden="true">🔍</div>
                        <h2 style="font-size:1.5rem;color:var(--color-primary);margin-bottom:1rem;"><?php _e( 'No articles found', 'demand-bridge' ); ?></h2>
                        <p style="color:var(--color-gray-600);margin-bottom:2rem;"><?php _e( 'Try adjusting your search or browse our categories below.', 'demand-bridge' ); ?></p>
                        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary"><?php _e( 'Browse All Articles', 'demand-bridge' ); ?></a>
                    </div>
                <?php endif; ?>
            </div><!-- #archiveGrid -->

            <!-- Pagination -->
            <?php demandbridge_pagination(); ?>
        </div>

        <!-- Sidebar -->
        <aside class="post-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'demand-bridge' ); ?>">

            <!-- Newsletter Widget -->
            <div class="sidebar-widget" style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));border:none;margin-bottom:1.5rem;">
                <h2 class="widget-title" style="color:white;border-color:rgba(255,255,255,0.2);"><?php _e( '📬 Weekly Newsletter', 'demand-bridge' ); ?></h2>
                <p style="font-size:0.875rem;color:rgba(255,255,255,0.8);margin-bottom:1rem;line-height:1.6;"><?php _e( 'Join 50K+ B2B pros. The week\'s best demand gen content, delivered Tuesday.', 'demand-bridge' ); ?></p>
                <form id="archiveSidebarNewsletter" style="display:flex;flex-direction:column;gap:0.75rem;">
                    <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>"
                           style="padding:0.75rem 1rem;border-radius:0.5rem;border:2px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:white;font-size:0.875rem;outline:none;">
                    <button type="submit" class="btn btn-primary btn-sm" style="border-radius:0.5rem;"><?php _e( 'Subscribe Free', 'demand-bridge' ); ?></button>
                </form>
            </div>

            <!-- Categories Widget -->
            <div class="sidebar-widget">
                <h2 class="widget-title"><?php _e( 'Browse Topics', 'demand-bridge' ); ?></h2>
                <ul style="display:flex;flex-direction:column;gap:0.5rem;" role="list">
                    <?php
                    $cats = get_categories( [ 'hide_empty' => true ] );
                    if ( $cats ) :
                        foreach ( $cats as $cat ) :
                    ?>
                        <li>
                            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"
                               style="display:flex;align-items:center;justify-content:space-between;padding:0.5rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:var(--color-gray-700);transition:all 0.2s;"
                               onmouseover="this.style.background='var(--color-gray-100)';this.style.color='var(--color-secondary)'"
                               onmouseout="this.style.background='transparent';this.style.color='var(--color-gray-700)'">
                                <span><?php echo esc_html( $cat->name ); ?></span>
                                <span style="font-size:0.75rem;color:var(--color-gray-500);"><?php echo esc_html( $cat->count ); ?></span>
                            </a>
                        </li>
                    <?php endforeach;
                    else :
                        $placeholder_cats = [
                            [ 'Demand Generation', 85 ], [ 'Account-Based Marketing', 70 ],
                            [ 'Sales Enablement', 60 ], [ 'Content Strategy', 90 ],
                            [ 'Revenue Operations', 45 ], [ 'B2B Marketing', 110 ],
                        ];
                        foreach ( $placeholder_cats as $pc ) :
                    ?>
                        <li>
                            <a href="#" style="display:flex;align-items:center;justify-content:space-between;padding:0.5rem 0.75rem;border-radius:0.5rem;font-size:0.875rem;color:var(--color-gray-700);">
                                <span><?php echo esc_html( $pc[0] ); ?></span>
                                <span style="font-size:0.75rem;color:var(--color-gray-500);"><?php echo esc_html( $pc[1] ); ?></span>
                            </a>
                        </li>
                    <?php endforeach; endif; ?>
                </ul>
            </div>

            <!-- Popular Tags Widget -->
            <div class="sidebar-widget">
                <h2 class="widget-title"><?php _e( 'Popular Tags', 'demand-bridge' ); ?></h2>
                <div style="display:flex;flex-wrap:wrap;gap:0.5rem;" role="list">
                    <?php
                    $popular_tags = get_tags( [ 'orderby' => 'count', 'order' => 'DESC', 'number' => 15 ] );
                    if ( $popular_tags ) :
                        foreach ( $popular_tags as $tag ) :
                    ?>
                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag" role="listitem">
                            <?php echo esc_html( $tag->name ); ?>
                        </a>
                    <?php endforeach;
                    else :
                        $placeholder_tags = [ 'ABM', 'Lead Gen', 'Pipeline', 'MQLs', 'ICP', 'RevOps', 'Sales Cycle', 'Buyer Journey', 'B2B SaaS', 'GTM', 'Positioning', 'Demand Gen' ];
                        foreach ( $placeholder_tags as $pt ) :
                    ?>
                        <span class="post-tag" role="listitem"><?php echo esc_html( $pt ); ?></span>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <!-- Featured Guide CTA -->
            <div class="sidebar-widget" style="background:linear-gradient(135deg,rgba(241,90,36,0.08),rgba(241,90,36,0.03));border-color:rgba(241,90,36,0.2);">
                <div style="font-size:2.5rem;margin-bottom:0.75rem;" aria-hidden="true">🗺️</div>
                <h2 class="widget-title" style="border:none;font-size:1rem;margin-bottom:0.75rem;"><?php _e( 'Free ABM Playbook', 'demand-bridge' ); ?></h2>
                <p style="font-size:0.8125rem;color:var(--color-gray-600);margin-bottom:1rem;line-height:1.6;">
                    <?php _e( 'Download our 45-page Account-Based Marketing strategy guide — used by 500+ B2B teams.', 'demand-bridge' ); ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" class="btn btn-primary btn-sm" style="width:100%;justify-content:center;">
                    <?php _e( 'Download Free', 'demand-bridge' ); ?>
                </a>
            </div>

        </aside>

    </div><!-- .archive-layout -->
</div><!-- .archive-content -->

<!-- Newsletter Section -->
<section class="newsletter-section" aria-labelledby="archive-newsletter-title">
    <div class="newsletter-content">
        <h2 class="newsletter-title" id="archive-newsletter-title"><?php _e( 'Never Miss a B2B Insight', 'demand-bridge' ); ?></h2>
        <p class="newsletter-desc"><?php _e( 'Join 50,000+ B2B professionals. Get actionable demand gen and ABM content weekly.', 'demand-bridge' ); ?></p>
        <form class="newsletter-form" id="archiveNewsletterForm">
            <label for="archiveNewsletterEmail" class="sr-only"><?php _e( 'Email address', 'demand-bridge' ); ?></label>
            <input type="email" id="archiveNewsletterEmail" name="email" class="newsletter-input" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>" required>
            <button type="submit" class="newsletter-btn"><?php _e( 'Subscribe', 'demand-bridge' ); ?></button>
        </form>
    </div>
</section>

<?php get_footer(); ?>
