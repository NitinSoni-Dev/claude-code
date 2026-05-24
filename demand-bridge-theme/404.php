<?php
/**
 * 404 Template – Demand Bridge
 *
 * @package DemandBridge
 */
get_header();
?>

<div class="error-404-section" style="padding-top:100px;">
    <div class="container text-center">
        <div class="error-number" aria-hidden="true">404</div>
        <h1 class="error-title"><?php _e( 'Page Not Found', 'demand-bridge' ); ?></h1>
        <p class="error-desc">
            <?php _e( 'Looks like this page took a wrong turn on the demand generation highway. Let\'s get you back on track.', 'demand-bridge' ); ?>
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-bottom:3rem;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg">
                <?php _e( 'Go Home', 'demand-bridge' ); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="btn btn-outline-dark btn-lg">
                <?php _e( 'Browse Articles', 'demand-bridge' ); ?>
            </a>
        </div>

        <!-- Search -->
        <div style="max-width:480px;margin:0 auto;">
            <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div style="display:flex;gap:0.5rem;">
                    <label for="error404Search" class="sr-only"><?php _e( 'Search for content', 'demand-bridge' ); ?></label>
                    <input type="search" id="error404Search" name="s"
                           style="flex:1;padding:0.875rem 1rem;border:2px solid var(--color-gray-200);border-radius:0.75rem;font-size:1rem;outline:none;transition:border-color 0.2s;"
                           placeholder="<?php esc_attr_e( 'Search for articles...', 'demand-bridge' ); ?>"
                           onfocus="this.style.borderColor='var(--color-secondary)'"
                           onblur="this.style.borderColor='var(--color-gray-200)'">
                    <button type="submit" class="btn btn-primary" style="border-radius:0.75rem;"><?php _e( 'Search', 'demand-bridge' ); ?></button>
                </div>
            </form>
        </div>

        <!-- Quick Links -->
        <div style="margin-top:3rem;display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url( home_url( '/topic/demand-generation' ) ); ?>" class="badge badge-primary" style="padding:0.5rem 1rem;font-size:0.8125rem;"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/topic/account-based-marketing' ) ); ?>" class="badge badge-primary" style="padding:0.5rem 1rem;font-size:0.8125rem;"><?php _e( 'ABM', 'demand-bridge' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" class="badge badge-primary" style="padding:0.5rem 1rem;font-size:0.8125rem;"><?php _e( 'Guides', 'demand-bridge' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>" class="badge badge-primary" style="padding:0.5rem 1rem;font-size:0.8125rem;"><?php _e( 'Case Studies', 'demand-bridge' ); ?></a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
