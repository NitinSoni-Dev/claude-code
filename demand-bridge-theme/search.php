<?php
/**
 * Search Results Template – Demand Bridge
 *
 * @package DemandBridge
 */
get_header();
?>

<header class="archive-header">
    <div class="container text-center">
        <h1 class="archive-title">
            <?php printf( __( 'Search: &ldquo;%s&rdquo;', 'demand-bridge' ), '<em>' . get_search_query() . '</em>' ); ?>
        </h1>
        <p class="archive-desc">
            <?php
            global $wp_query;
            printf(
                _n( 'Found %s result', 'Found %s results', $wp_query->found_posts, 'demand-bridge' ),
                number_format_i18n( $wp_query->found_posts )
            );
            ?>
        </p>
        <div class="archive-search" style="margin-top:1.5rem;">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label for="searchResultsInput" class="sr-only"><?php _e( 'Search again', 'demand-bridge' ); ?></label>
                <input type="search" id="searchResultsInput" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search articles...', 'demand-bridge' ); ?>">
                <button type="submit"><?php _e( 'Search', 'demand-bridge' ); ?></button>
            </form>
        </div>
    </div>
</header>

<div class="archive-content">
    <div class="archive-layout">
        <div class="archive-posts-grid">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="card fade-in">
                        <a href="<?php the_permalink(); ?>" class="card-img" tabindex="-1" aria-hidden="true">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'db-card', [ 'alt' => '' ] ); ?>
                            <?php else : ?>
                                <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));display:flex;align-items:center;justify-content:center;font-size:2.5rem;">🔍</div>
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <div class="card-meta">
                                <?php
                                $cats = get_the_terms( get_the_ID(), 'category' );
                                if ( $cats && ! is_wp_error( $cats ) ) :
                                ?>
                                    <span class="badge badge-secondary"><?php echo esc_html( $cats[0]->name ); ?></span>
                                    <span class="card-meta-dot"></span>
                                <?php endif; ?>
                                <span><?php echo demandbridge_read_time(); ?></span>
                            </div>
                            <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="card-excerpt"><?php the_excerpt(); ?></p>
                            <div class="card-footer">
                                <div class="card-author">
                                    <div class="card-author-name"><?php the_author(); ?></div>
                                    <time class="card-read-time" datetime="<?php the_date( 'Y-m-d' ); ?>"><?php the_date(); ?></time>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="btn btn-ghost btn-sm"><?php _e( 'Read', 'demand-bridge' ); ?> &rarr;</a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <div style="grid-column:1/-1;text-align:center;padding:4rem 2rem;">
                    <div style="font-size:4rem;margin-bottom:1rem;" aria-hidden="true">🔍</div>
                    <h2 style="color:var(--color-primary);margin-bottom:1rem;"><?php _e( 'No results found', 'demand-bridge' ); ?></h2>
                    <p style="color:var(--color-gray-600);margin-bottom:2rem;"><?php _e( 'Try different keywords or browse our categories.', 'demand-bridge' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-primary"><?php _e( 'Browse All Articles', 'demand-bridge' ); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <?php demandbridge_pagination(); ?>

        <aside class="post-sidebar">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
