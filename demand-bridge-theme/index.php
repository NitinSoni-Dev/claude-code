<?php
/**
 * The main template file – fallback for Demand Bridge theme.
 * WordPress falls back to this when no more specific template is found.
 *
 * @package DemandBridge
 */
get_header();
?>

<div class="archive-header">
    <div class="container text-center">
        <h1 class="archive-title"><?php bloginfo( 'name' ); ?></h1>
        <p class="archive-desc"><?php bloginfo( 'description' ); ?></p>
    </div>
</div>

<div class="archive-content">
    <div class="archive-layout">
        <div>
            <div class="archive-posts-grid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article class="card fade-in">
                            <a href="<?php the_permalink(); ?>" class="card-img" tabindex="-1" aria-hidden="true">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'db-card', [ 'alt' => '' ] ); ?>
                                <?php else : ?>
                                    <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:2.5rem;">📚</div>
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <div class="card-meta">
                                    <?php the_category( ', ' ); ?>
                                    <span class="card-meta-dot"></span>
                                    <span><?php echo demandbridge_read_time(); ?></span>
                                </div>
                                <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p class="card-excerpt"><?php the_excerpt(); ?></p>
                                <div class="card-footer">
                                    <div class="card-author">
                                        <div class="card-author-name"><?php the_author(); ?></div>
                                        <div class="card-read-time"><?php the_date(); ?></div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-ghost btn-sm"><?php _e( 'Read', 'demand-bridge' ); ?> &rarr;</a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p><?php _e( 'No content found. <a href="/">Return home</a>.', 'demand-bridge' ); ?></p>
                <?php endif; ?>
            </div>
            <?php demandbridge_pagination(); ?>
        </div>

        <aside class="post-sidebar">
            <div class="sidebar-widget" style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));border:none;">
                <h2 class="widget-title" style="color:white;border-color:rgba(255,255,255,0.2);"><?php _e( 'Weekly Newsletter', 'demand-bridge' ); ?></h2>
                <p style="color:rgba(255,255,255,0.8);font-size:0.875rem;margin-bottom:1rem;"><?php _e( 'Join 50K+ B2B professionals.', 'demand-bridge' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary btn-sm" style="border-radius:0.5rem;"><?php _e( 'Browse Articles', 'demand-bridge' ); ?></a>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
