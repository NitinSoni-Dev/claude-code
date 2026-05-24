<?php
/**
 * Default Page Template – Demand Bridge
 *
 * @package DemandBridge
 */
get_header();
?>

<section class="about-hero" style="padding:120px 0 3rem;">
    <div class="container text-center">
        <h1 style="color:white;font-size:clamp(2rem,5vw,3rem);margin-bottom:1rem;"><?php the_title(); ?></h1>
    </div>
</section>

<div style="background:var(--color-light);padding:4rem 0;">
    <div class="container container--narrow">
        <div class="entry-content" style="background:white;padding:3rem;border-radius:1.5rem;box-shadow:var(--shadow-md);">
            <?php
            while ( have_posts() ) :
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
