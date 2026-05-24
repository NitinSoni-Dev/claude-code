<?php
/**
 * Demand Bridge Theme Functions
 *
 * @package DemandBridge
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// =========================================================================
// THEME SETUP
// =========================================================================

function demandbridge_setup() {
    // Translations
    load_theme_textdomain( 'demand-bridge', get_template_directory() . '/languages' );

    // Title tag
    add_theme_support( 'title-tag' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'db-card',     800,  450, true );
    add_image_size( 'db-featured', 1200, 675, true );
    add_image_size( 'db-hero',     1600, 900, true );
    add_image_size( 'db-thumb',    120,  120, true );
    add_image_size( 'db-author',   100,  100, true );

    // HTML5 support
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
    ] );

    // Custom logo
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Post formats
    add_theme_support( 'post-formats', [ 'video', 'quote', 'link', 'gallery' ] );

    // Selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Block editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor.css' );

    // Wide/full alignment in blocks
    add_theme_support( 'align-wide' );

    // Responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Register nav menus
    register_nav_menus( [
        'primary'   => __( 'Primary Navigation', 'demand-bridge' ),
        'footer-1'  => __( 'Footer – Company', 'demand-bridge' ),
        'footer-2'  => __( 'Footer – Resources', 'demand-bridge' ),
        'footer-3'  => __( 'Footer – Legal', 'demand-bridge' ),
    ] );
}
add_action( 'after_setup_theme', 'demandbridge_setup' );

// =========================================================================
// CONTENT WIDTH
// =========================================================================
function demandbridge_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'demandbridge_content_width', 1200 );
}
add_action( 'after_setup_theme', 'demandbridge_content_width', 0 );

// =========================================================================
// SCRIPTS & STYLES
// =========================================================================
function demandbridge_enqueue_assets() {
    $theme_version = wp_get_theme()->get( 'Version' );
    $theme_uri     = get_template_directory_uri();

    // Google Fonts
    wp_enqueue_style(
        'demandbridge-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style( 'demandbridge-style', get_stylesheet_uri(), [ 'demandbridge-fonts' ], $theme_version );

    // Main JS
    wp_enqueue_script(
        'demandbridge-main',
        $theme_uri . '/assets/js/main.js',
        [],
        $theme_version,
        true
    );

    // Localize script
    wp_localize_script( 'demandbridge-main', 'dbVars', [
        'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
        'nonce'     => wp_create_nonce( 'demandbridge_nonce' ),
        'siteUrl'   => get_site_url(),
        'themeUrl'  => $theme_uri,
        'isRTL'     => is_rtl() ? 'true' : 'false',
    ] );

    // Comments script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'demandbridge_enqueue_assets' );

// =========================================================================
// WIDGET AREAS
// =========================================================================
function demandbridge_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Blog Sidebar', 'demand-bridge' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets appear in the blog sidebar.', 'demand-bridge' ),
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Widget Area', 'demand-bridge' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Footer widget area.', 'demand-bridge' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'demandbridge_widgets_init' );

// =========================================================================
// CUSTOM POST TYPES
// =========================================================================

// Case Studies
function demandbridge_register_post_types() {
    // Case Studies
    register_post_type( 'case-study', [
        'labels' => [
            'name'               => __( 'Case Studies', 'demand-bridge' ),
            'singular_name'      => __( 'Case Study', 'demand-bridge' ),
            'add_new_item'       => __( 'Add New Case Study', 'demand-bridge' ),
            'edit_item'          => __( 'Edit Case Study', 'demand-bridge' ),
            'view_item'          => __( 'View Case Study', 'demand-bridge' ),
            'search_items'       => __( 'Search Case Studies', 'demand-bridge' ),
        ],
        'public'             => true,
        'has_archive'        => true,
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'       => true,
        'rewrite'            => [ 'slug' => 'case-studies' ],
        'menu_icon'          => 'dashicons-portfolio',
        'menu_position'      => 6,
    ] );

    // Guides / Learning Resources
    register_post_type( 'guide', [
        'labels' => [
            'name'          => __( 'Guides', 'demand-bridge' ),
            'singular_name' => __( 'Guide', 'demand-bridge' ),
            'add_new_item'  => __( 'Add New Guide', 'demand-bridge' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'supports'     => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'guides' ],
        'menu_icon'    => 'dashicons-book-alt',
        'menu_position' => 7,
    ] );
}
add_action( 'init', 'demandbridge_register_post_types' );

// =========================================================================
// CUSTOM TAXONOMIES
// =========================================================================
function demandbridge_register_taxonomies() {
    // Blog Topics
    register_taxonomy( 'topic', [ 'post' ], [
        'labels' => [
            'name'          => __( 'Topics', 'demand-bridge' ),
            'singular_name' => __( 'Topic', 'demand-bridge' ),
            'add_new_item'  => __( 'Add New Topic', 'demand-bridge' ),
        ],
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'topic' ],
    ] );

    // Content Types (guide, report, webinar recap, etc.)
    register_taxonomy( 'content-type', [ 'post', 'guide' ], [
        'labels' => [
            'name'          => __( 'Content Types', 'demand-bridge' ),
            'singular_name' => __( 'Content Type', 'demand-bridge' ),
        ],
        'public'       => true,
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'content-type' ],
    ] );

    // Industry
    register_taxonomy( 'industry', [ 'post', 'case-study' ], [
        'labels' => [
            'name'          => __( 'Industries', 'demand-bridge' ),
            'singular_name' => __( 'Industry', 'demand-bridge' ),
        ],
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'industry' ],
    ] );
}
add_action( 'init', 'demandbridge_register_taxonomies' );

// =========================================================================
// CUSTOM META BOXES
// =========================================================================
function demandbridge_add_meta_boxes() {
    // Post meta (read time, author subtitle, etc.)
    add_meta_box(
        'demandbridge_post_meta',
        __( 'Post Settings', 'demand-bridge' ),
        'demandbridge_post_meta_cb',
        [ 'post', 'guide', 'case-study' ],
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'demandbridge_add_meta_boxes' );

function demandbridge_post_meta_cb( $post ) {
    wp_nonce_field( 'demandbridge_save_meta', 'demandbridge_meta_nonce' );
    $read_time     = get_post_meta( $post->ID, '_db_read_time', true );
    $author_title  = get_post_meta( $post->ID, '_db_author_title', true );
    $is_featured   = get_post_meta( $post->ID, '_db_is_featured', true );
    $key_takeaway  = get_post_meta( $post->ID, '_db_key_takeaway', true );
    ?>
    <p>
        <label for="db_read_time"><strong><?php _e( 'Read Time (minutes)', 'demand-bridge' ); ?></strong></label><br>
        <input type="number" id="db_read_time" name="db_read_time" value="<?php echo esc_attr( $read_time ); ?>" min="1" max="120" style="width:100%">
    </p>
    <p>
        <label for="db_author_title"><strong><?php _e( 'Author Title/Role', 'demand-bridge' ); ?></strong></label><br>
        <input type="text" id="db_author_title" name="db_author_title" value="<?php echo esc_attr( $author_title ); ?>" style="width:100%">
    </p>
    <p>
        <label for="db_key_takeaway"><strong><?php _e( 'Key Takeaway', 'demand-bridge' ); ?></strong></label><br>
        <textarea id="db_key_takeaway" name="db_key_takeaway" rows="3" style="width:100%"><?php echo esc_textarea( $key_takeaway ); ?></textarea>
    </p>
    <p>
        <label>
            <input type="checkbox" name="db_is_featured" value="1" <?php checked( $is_featured, '1' ); ?>>
            <?php _e( 'Feature on homepage', 'demand-bridge' ); ?>
        </label>
    </p>
    <?php
}

function demandbridge_save_meta( $post_id ) {
    if ( ! isset( $_POST['demandbridge_meta_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['demandbridge_meta_nonce'], 'demandbridge_save_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [
        'db_read_time'    => '_db_read_time',
        'db_author_title' => '_db_author_title',
        'db_key_takeaway' => '_db_key_takeaway',
    ];

    foreach ( $fields as $key => $meta_key ) {
        if ( isset( $_POST[ $key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $key ] ) );
        }
    }

    // Featured checkbox
    $is_featured = isset( $_POST['db_is_featured'] ) ? '1' : '0';
    update_post_meta( $post_id, '_db_is_featured', $is_featured );
}
add_action( 'save_post', 'demandbridge_save_meta' );

// =========================================================================
// HELPER FUNCTIONS
// =========================================================================

/**
 * Get estimated read time for a post.
 */
function demandbridge_read_time( $post_id = null ) {
    if ( ! $post_id ) $post_id = get_the_ID();
    $saved = get_post_meta( $post_id, '_db_read_time', true );
    if ( $saved ) return $saved . ' ' . __( 'min read', 'demand-bridge' );

    $content   = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes   = max( 1, round( $word_count / 230 ) );
    return $minutes . ' ' . __( 'min read', 'demand-bridge' );
}

/**
 * Get category color class for a post.
 */
function demandbridge_cat_color( $post_id = null ) {
    if ( ! $post_id ) $post_id = get_the_ID();
    $cats = get_the_terms( $post_id, 'category' );
    if ( ! $cats ) return 'default';

    $colors = [ 'demand-generation' => 'orange', 'account-based-marketing' => 'blue',
                'sales-enablement' => 'green', 'content-strategy' => 'purple',
                'revenue-operations' => 'red', 'b2b-marketing' => 'accent' ];

    $slug = $cats[0]->slug;
    return isset( $colors[ $slug ] ) ? $colors[ $slug ] : 'default';
}

/**
 * Get post author social meta.
 */
function demandbridge_author_social( $user_id ) {
    return [
        'linkedin' => get_user_meta( $user_id, 'linkedin', true ),
        'twitter'  => get_user_meta( $user_id, 'twitter', true ),
    ];
}

/**
 * Get related posts.
 */
function demandbridge_get_related_posts( $post_id, $count = 3 ) {
    $terms = get_the_terms( $post_id, 'category' );
    if ( ! $terms ) return [];

    $term_ids = wp_list_pluck( $terms, 'term_id' );

    return get_posts( [
        'post__not_in'   => [ $post_id ],
        'category__in'   => $term_ids,
        'posts_per_page' => $count,
        'orderby'        => 'rand',
        'post_status'    => 'publish',
    ] );
}

/**
 * Breadcrumbs.
 */
function demandbridge_breadcrumbs() {
    if ( is_home() || is_front_page() ) return;
    echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'demand-bridge' ) . '">';
    echo '<a href="' . esc_url( home_url() ) . '">' . __( 'Home', 'demand-bridge' ) . '</a>';
    echo '<span class="breadcrumbs-sep"> / </span>';

    if ( is_category() || is_single() ) {
        the_category( ' / ' );
        if ( is_single() ) {
            echo ' <span class="breadcrumbs-sep">/</span> ';
            the_title();
        }
    } elseif ( is_page() ) {
        echo '<span>' . get_the_title() . '</span>';
    } elseif ( is_archive() ) {
        echo '<span>' . get_the_archive_title() . '</span>';
    } elseif ( is_search() ) {
        echo '<span>' . sprintf( __( 'Search results for: %s', 'demand-bridge' ), get_search_query() ) . '</span>';
    }
    echo '</nav>';
}

/**
 * Category badge HTML.
 */
function demandbridge_cat_badge( $post_id = null ) {
    if ( ! $post_id ) $post_id = get_the_ID();
    $cats = get_the_terms( $post_id, 'category' );
    if ( ! $cats || is_wp_error( $cats ) ) return '';
    $cat  = $cats[0];
    return '<a href="' . esc_url( get_term_link( $cat ) ) . '" class="badge badge-secondary">' . esc_html( $cat->name ) . '</a>';
}

// =========================================================================
// AJAX: Newsletter Signup
// =========================================================================
function demandbridge_newsletter_signup() {
    check_ajax_referer( 'demandbridge_nonce', 'nonce' );

    $email = sanitize_email( $_POST['email'] ?? '' );
    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Please enter a valid email address.', 'demand-bridge' ) ] );
    }

    // Here you would integrate with Mailchimp, ConvertKit, HubSpot, etc.
    // For now we'll store subscribers in a custom table or option.
    $subscribers   = get_option( 'demandbridge_subscribers', [] );
    if ( in_array( $email, $subscribers, true ) ) {
        wp_send_json_error( [ 'message' => __( 'You\'re already subscribed!', 'demand-bridge' ) ] );
    }

    $subscribers[] = $email;
    update_option( 'demandbridge_subscribers', $subscribers );

    wp_send_json_success( [ 'message' => __( 'Thank you for subscribing! Check your inbox.', 'demand-bridge' ) ] );
}
add_action( 'wp_ajax_demandbridge_newsletter', 'demandbridge_newsletter_signup' );
add_action( 'wp_ajax_nopriv_demandbridge_newsletter', 'demandbridge_newsletter_signup' );

// =========================================================================
// AJAX: Contact Form
// =========================================================================
function demandbridge_contact_form() {
    check_ajax_referer( 'demandbridge_nonce', 'nonce' );

    $first_name = sanitize_text_field( $_POST['first_name'] ?? '' );
    $last_name  = sanitize_text_field( $_POST['last_name'] ?? '' );
    $email      = sanitize_email( $_POST['email'] ?? '' );
    $company    = sanitize_text_field( $_POST['company'] ?? '' );
    $subject    = sanitize_text_field( $_POST['subject'] ?? '' );
    $message    = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( ! $first_name || ! $email || ! $message ) {
        wp_send_json_error( [ 'message' => __( 'Please fill in all required fields.', 'demand-bridge' ) ] );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Invalid email address.', 'demand-bridge' ) ] );
    }

    $to      = get_option( 'admin_email' );
    $subj    = sprintf( __( '[Demand Bridge] Contact: %s', 'demand-bridge' ), $subject ?: 'General Inquiry' );
    $body    = "From: {$first_name} {$last_name} ({$email})\n";
    $body   .= "Company: {$company}\n\n";
    $body   .= "Message:\n{$message}";
    $headers = [ 'From: Demand Bridge <noreply@demandbridge.com>', "Reply-To: {$email}" ];

    $sent = wp_mail( $to, $subj, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( 'Thank you! We\'ll be in touch within 24 hours.', 'demand-bridge' ) ] );
    } else {
        wp_send_json_error( [ 'message' => __( 'Sorry, there was an error sending your message. Please try again.', 'demand-bridge' ) ] );
    }
}
add_action( 'wp_ajax_demandbridge_contact', 'demandbridge_contact_form' );
add_action( 'wp_ajax_nopriv_demandbridge_contact', 'demandbridge_contact_form' );

// =========================================================================
// EXCERPT CUSTOMIZATION
// =========================================================================
function demandbridge_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 25;
}
add_filter( 'excerpt_length', 'demandbridge_excerpt_length' );

function demandbridge_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'demandbridge_excerpt_more' );

// =========================================================================
// REMOVE EMOJI (performance)
// =========================================================================
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// =========================================================================
// CLEAN UP WORDPRESS HEAD
// =========================================================================
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

// =========================================================================
// BODY CLASSES
// =========================================================================
function demandbridge_body_classes( $classes ) {
    if ( is_singular() ) {
        $classes[] = 'singular-post';
    }
    if ( is_archive() ) {
        $classes[] = 'archive-page';
    }
    if ( has_post_thumbnail() ) {
        $classes[] = 'has-featured-image';
    }
    return $classes;
}
add_filter( 'body_class', 'demandbridge_body_classes' );

// =========================================================================
// STRUCTURED DATA (JSON-LD)
// =========================================================================
function demandbridge_schema_output() {
    $schema = [];

    if ( is_front_page() ) {
        $schema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'Organization',
            'name'            => 'Demand Bridge',
            'url'             => home_url(),
            'logo'            => get_template_directory_uri() . '/assets/images/logo.png',
            'description'     => 'Demand Bridge – B2B marketing insights, demand generation strategies, and learning resources for B2B professionals.',
            'sameAs'          => [
                'https://linkedin.com/company/demandbridge',
                'https://twitter.com/demandbridge',
            ],
        ];
    } elseif ( is_singular( 'post' ) ) {
        global $post;
        $author  = get_userdata( $post->post_author );
        $schema  = [
            '@context'        => 'https://schema.org',
            '@type'           => 'Article',
            'headline'        => get_the_title(),
            'description'     => get_the_excerpt(),
            'datePublished'   => get_the_date( 'c' ),
            'dateModified'    => get_the_modified_date( 'c' ),
            'author'          => [
                '@type' => 'Person',
                'name'  => $author ? $author->display_name : 'Demand Bridge Team',
            ],
            'publisher'       => [
                '@type' => 'Organization',
                'name'  => 'Demand Bridge',
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => get_template_directory_uri() . '/assets/images/logo.png',
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => get_permalink(),
            ],
        ];

        if ( has_post_thumbnail() ) {
            $schema['image'] = get_the_post_thumbnail_url( null, 'db-featured' );
        }
    }

    if ( ! empty( $schema ) ) {
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
    }
}
add_action( 'wp_head', 'demandbridge_schema_output' );

// =========================================================================
// OPEN GRAPH META
// =========================================================================
function demandbridge_og_meta() {
    global $post;
    ?>
    <meta property="og:site_name" content="Demand Bridge" />
    <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>" />
    <meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>" />
    <meta property="og:title" content="<?php echo esc_attr( is_singular() ? get_the_title() : get_bloginfo( 'name' ) ); ?>" />
    <meta property="og:description" content="<?php echo esc_attr( is_singular() && $post ? get_the_excerpt() : get_bloginfo( 'description' ) ); ?>" />
    <?php if ( is_singular() && has_post_thumbnail() ) : ?>
    <meta property="og:image" content="<?php echo esc_url( get_the_post_thumbnail_url( null, 'db-featured' ) ); ?>" />
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@demandbridge" />
    <?php
}
add_action( 'wp_head', 'demandbridge_og_meta' );

// =========================================================================
// CUSTOM GUTENBERG COLORS
// =========================================================================
function demandbridge_editor_settings() {
    add_theme_support( 'editor-color-palette', [
        [ 'name' => 'Primary Navy',    'slug' => 'primary',   'color' => '#1a2b5e' ],
        [ 'name' => 'Orange',          'slug' => 'secondary', 'color' => '#f15a24' ],
        [ 'name' => 'Accent Blue',     'slug' => 'accent',    'color' => '#00b4d8' ],
        [ 'name' => 'Dark',            'slug' => 'dark',      'color' => '#0d1b2a' ],
        [ 'name' => 'Light Gray',      'slug' => 'light',     'color' => '#f8f9fb' ],
        [ 'name' => 'White',           'slug' => 'white',     'color' => '#ffffff' ],
    ] );
}
add_action( 'after_setup_theme', 'demandbridge_editor_settings' );

// =========================================================================
// PAGINATION
// =========================================================================
function demandbridge_pagination() {
    global $wp_query;
    $total = $wp_query->max_num_pages;
    if ( $total <= 1 ) return;

    $current = max( 1, get_query_var( 'paged' ) );
    $pages   = paginate_links( [
        'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'format'    => '?paged=%#%',
        'current'   => $current,
        'total'     => $total,
        'type'      => 'array',
        'prev_text' => '&#8592;',
        'next_text' => '&#8594;',
    ] );

    if ( $pages ) {
        echo '<div class="pagination">';
        foreach ( $pages as $page ) {
            echo '<span class="page-link">' . $page . '</span>';
        }
        echo '</div>';
    }
}

// =========================================================================
// CUSTOM COMMENT STRUCTURE
// =========================================================================
function demandbridge_comment_template( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'db-comment' ); ?>>
        <div class="comment-wrap">
            <div class="comment-avatar">
                <?php echo get_avatar( $comment, 48, '', '', [ 'class' => 'comment-avatar-img' ] ); ?>
            </div>
            <div class="comment-content">
                <div class="comment-header">
                    <strong class="comment-author"><?php comment_author(); ?></strong>
                    <time class="comment-time"><?php comment_date(); ?></time>
                </div>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-pending"><?php _e( 'Your comment is awaiting moderation.', 'demand-bridge' ); ?></p>
                <?php endif; ?>
                <div class="comment-body"><?php comment_text(); ?></div>
                <?php comment_reply_link( array_merge( $args, [
                    'reply_text' => __( 'Reply', 'demand-bridge' ),
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                ] ) ); ?>
            </div>
        </div>
    </li>
    <?php
}
