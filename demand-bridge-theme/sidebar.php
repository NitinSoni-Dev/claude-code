<?php
/**
 * Sidebar Template – Demand Bridge
 *
 * @package DemandBridge
 */

if ( is_active_sidebar( 'blog-sidebar' ) ) :
    dynamic_sidebar( 'blog-sidebar' );
else :
?>

<!-- Newsletter Widget (default) -->
<div class="sidebar-widget" style="background:linear-gradient(135deg,var(--color-primary),var(--color-primary-light));border:none;">
    <h2 class="widget-title" style="color:white;border-color:rgba(255,255,255,0.2);"><?php _e( '📬 Weekly Newsletter', 'demand-bridge' ); ?></h2>
    <p style="color:rgba(255,255,255,0.8);font-size:0.875rem;margin-bottom:1rem;line-height:1.6;"><?php _e( 'Join 50K+ B2B pros. The week\'s best demand gen content, delivered Tuesday.', 'demand-bridge' ); ?></p>
    <form style="display:flex;flex-direction:column;gap:0.75rem;">
        <input type="email" placeholder="<?php esc_attr_e( 'Your work email', 'demand-bridge' ); ?>"
               style="padding:0.75rem 1rem;border-radius:0.5rem;border:2px solid rgba(255,255,255,0.3);background:rgba(255,255,255,0.1);color:white;font-size:0.875rem;outline:none;">
        <button type="submit" class="btn btn-primary btn-sm" style="border-radius:0.5rem;"><?php _e( 'Subscribe Free', 'demand-bridge' ); ?></button>
    </form>
</div>

<!-- Categories -->
<div class="sidebar-widget">
    <h2 class="widget-title"><?php _e( 'Browse Topics', 'demand-bridge' ); ?></h2>
    <?php
    wp_list_categories( [
        'show_count'   => true,
        'title_li'     => '',
        'hide_empty'   => true,
    ] );
    ?>
</div>

<!-- Recent Posts -->
<div class="sidebar-widget">
    <h2 class="widget-title"><?php _e( 'Popular Articles', 'demand-bridge' ); ?></h2>
    <?php
    $recent = get_posts( [ 'posts_per_page' => 4, 'orderby' => 'comment_count', 'order' => 'DESC' ] );
    if ( $recent ) :
        foreach ( $recent as $rp ) :
    ?>
        <div class="recent-post">
            <div class="recent-post-img" style="font-size:1.5rem;display:flex;align-items:center;justify-content:center;background:var(--color-gray-100);width:60px;height:60px;border-radius:0.5rem;flex-shrink:0;">
                <?php echo has_post_thumbnail( $rp ) ? get_the_post_thumbnail( $rp, 'db-thumb' ) : '📚'; ?>
            </div>
            <div>
                <a href="<?php echo esc_url( get_permalink( $rp ) ); ?>">
                    <div class="recent-post-title"><?php echo esc_html( get_the_title( $rp ) ); ?></div>
                </a>
                <div class="recent-post-date"><?php echo get_the_date( '', $rp ); ?></div>
            </div>
        </div>
    <?php endforeach; endif; ?>
</div>

<!-- Tags Cloud -->
<div class="sidebar-widget">
    <h2 class="widget-title"><?php _e( 'Popular Tags', 'demand-bridge' ); ?></h2>
    <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
        <?php
        $tags = get_tags( [ 'orderby' => 'count', 'order' => 'DESC', 'number' => 15 ] );
        if ( $tags ) :
            foreach ( $tags as $tag ) :
        ?>
            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag">
                <?php echo esc_html( $tag->name ); ?>
            </a>
        <?php endforeach; endif; ?>
    </div>
</div>

<?php endif; ?>
