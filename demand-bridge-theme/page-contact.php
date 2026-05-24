<?php
/**
 * Template Name: Contact Page
 *
 * @package DemandBridge
 */
get_header();
?>

<!-- Contact Hero -->
<section class="about-hero" aria-labelledby="contact-title">
    <div class="container text-center">
        <span class="badge badge-white" style="margin-bottom:1.5rem;"><?php _e( '💬 Get In Touch', 'demand-bridge' ); ?></span>
        <h1 id="contact-title"><?php _e( 'Let\'s Talk B2B', 'demand-bridge' ); ?></h1>
        <p><?php _e( 'Have a question, partnership idea, or want to contribute to Demand Bridge? We\'d love to hear from you.', 'demand-bridge' ); ?></p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section" aria-labelledby="contact-form-title">
    <div class="contact-grid">

        <!-- Contact Info -->
        <div class="contact-info fade-in-left">
            <h2 class="contact-info-title"><?php _e( 'Get in Touch', 'demand-bridge' ); ?></h2>
            <p class="contact-info-desc">
                <?php _e( 'Whether you\'re looking to contribute, partner, or just say hello — our team responds within 24 business hours.', 'demand-bridge' ); ?>
            </p>

            <div class="contact-items">
                <div class="contact-item">
                    <div class="contact-icon" aria-hidden="true">📧</div>
                    <div>
                        <div class="contact-label"><?php _e( 'Email', 'demand-bridge' ); ?></div>
                        <a href="mailto:hello@demandbridge.com" class="contact-val" style="color:var(--color-secondary);">hello@demandbridge.com</a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon" aria-hidden="true">📝</div>
                    <div>
                        <div class="contact-label"><?php _e( 'Editorial Submissions', 'demand-bridge' ); ?></div>
                        <a href="mailto:editorial@demandbridge.com" class="contact-val" style="color:var(--color-secondary);">editorial@demandbridge.com</a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon" aria-hidden="true">🤝</div>
                    <div>
                        <div class="contact-label"><?php _e( 'Partnerships', 'demand-bridge' ); ?></div>
                        <a href="mailto:partnerships@demandbridge.com" class="contact-val" style="color:var(--color-secondary);">partnerships@demandbridge.com</a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon" aria-hidden="true">📍</div>
                    <div>
                        <div class="contact-label"><?php _e( 'Headquarters', 'demand-bridge' ); ?></div>
                        <p class="contact-val"><?php _e( 'San Francisco, CA 94105<br>United States', 'demand-bridge' ); ?></p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div style="margin-top:2rem;padding:1.5rem;background:var(--color-white);border-radius:1rem;border:1px solid var(--color-gray-200);">
                <h3 style="font-size:1rem;font-weight:700;color:var(--color-primary);margin-bottom:1rem;"><?php _e( 'Quick Links', 'demand-bridge' ); ?></h3>
                <ul style="display:flex;flex-direction:column;gap:0.625rem;" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" style="font-size:0.875rem;color:var(--color-gray-700);transition:color 0.2s;" onmouseover="this.style.color='var(--color-secondary)'" onmouseout="this.style.color='var(--color-gray-700)'">→ <?php _e( 'Learning Center', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/guides' ) ); ?>" style="font-size:0.875rem;color:var(--color-gray-700);" onmouseover="this.style.color='var(--color-secondary)'" onmouseout="this.style.color='var(--color-gray-700)'">→ <?php _e( 'Free Guides & Playbooks', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" style="font-size:0.875rem;color:var(--color-gray-700);" onmouseover="this.style.color='var(--color-secondary)'" onmouseout="this.style.color='var(--color-gray-700)'">→ <?php _e( 'About Demand Bridge', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/careers' ) ); ?>" style="font-size:0.875rem;color:var(--color-gray-700);" onmouseover="this.style.color='var(--color-secondary)'" onmouseout="this.style.color='var(--color-gray-700)'">→ <?php _e( 'Careers', 'demand-bridge' ); ?></a></li>
                </ul>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrap fade-in-right">
            <h2 class="form-title" id="contact-form-title"><?php _e( 'Send Us a Message', 'demand-bridge' ); ?></h2>
            <p class="form-subtitle"><?php _e( 'We\'ll get back to you within one business day.', 'demand-bridge' ); ?></p>

            <form id="contactForm" novalidate aria-label="<?php esc_attr_e( 'Contact form', 'demand-bridge' ); ?>">
                <?php wp_nonce_field( 'demandbridge_nonce', 'contact_nonce' ); ?>

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label"><?php _e( 'First Name', 'demand-bridge' ); ?> *</label>
                        <input type="text" id="firstName" name="first_name" class="form-input" required autocomplete="given-name" placeholder="<?php esc_attr_e( 'Sarah', 'demand-bridge' ); ?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="form-label"><?php _e( 'Last Name', 'demand-bridge' ); ?> *</label>
                        <input type="text" id="lastName" name="last_name" class="form-input" required autocomplete="family-name" placeholder="<?php esc_attr_e( 'Chen', 'demand-bridge' ); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contactEmail" class="form-label"><?php _e( 'Work Email', 'demand-bridge' ); ?> *</label>
                    <input type="email" id="contactEmail" name="email" class="form-input" required autocomplete="email" placeholder="<?php esc_attr_e( 'sarah@company.com', 'demand-bridge' ); ?>">
                </div>

                <div class="form-group">
                    <label for="company" class="form-label"><?php _e( 'Company', 'demand-bridge' ); ?></label>
                    <input type="text" id="company" name="company" class="form-input" autocomplete="organization" placeholder="<?php esc_attr_e( 'Your Company', 'demand-bridge' ); ?>">
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label"><?php _e( 'Topic', 'demand-bridge' ); ?></label>
                    <select id="subject" name="subject" class="form-select">
                        <option value=""><?php _e( 'Select a topic', 'demand-bridge' ); ?></option>
                        <option value="editorial"><?php _e( 'Editorial / Article Submission', 'demand-bridge' ); ?></option>
                        <option value="partnership"><?php _e( 'Partnership Opportunity', 'demand-bridge' ); ?></option>
                        <option value="sponsorship"><?php _e( 'Sponsorship', 'demand-bridge' ); ?></option>
                        <option value="speaking"><?php _e( 'Speaking / Webinar', 'demand-bridge' ); ?></option>
                        <option value="feedback"><?php _e( 'Content Feedback', 'demand-bridge' ); ?></option>
                        <option value="other"><?php _e( 'Other', 'demand-bridge' ); ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label"><?php _e( 'Message', 'demand-bridge' ); ?> *</label>
                    <textarea id="message" name="message" class="form-textarea" required rows="5" placeholder="<?php esc_attr_e( 'Tell us about your inquiry...', 'demand-bridge' ); ?>"></textarea>
                </div>

                <!-- Success / Error Messages -->
                <div id="contactSuccess" style="display:none;padding:1rem 1.25rem;background:rgba(56,161,105,0.1);border:1px solid rgba(56,161,105,0.3);border-radius:0.75rem;font-size:0.875rem;color:#276749;margin-bottom:1rem;" role="alert">
                    ✅ <?php _e( 'Thank you! We\'ll be in touch within 24 hours.', 'demand-bridge' ); ?>
                </div>
                <div id="contactError" style="display:none;padding:1rem 1.25rem;background:rgba(229,62,62,0.1);border:1px solid rgba(229,62,62,0.3);border-radius:0.75rem;font-size:0.875rem;color:#9b2c2c;margin-bottom:1rem;" role="alert">
                </div>

                <button type="submit" class="form-submit" id="contactSubmit">
                    <?php _e( 'Send Message', 'demand-bridge' ); ?>
                </button>

                <p style="font-size:0.75rem;color:var(--color-gray-500);text-align:center;margin-top:1rem;">
                    <?php _e( 'By submitting this form you agree to our', 'demand-bridge' ); ?>
                    <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>" style="color:var(--color-secondary);"><?php _e( 'Privacy Policy', 'demand-bridge' ); ?></a>.
                </p>
            </form>
        </div>

    </div><!-- .contact-grid -->
</section>

<!-- FAQ Section -->
<section class="section" style="background:var(--color-white);" aria-labelledby="faq-title">
    <div class="container" style="max-width:800px;">
        <div class="section-header--center fade-in">
            <span class="section-label"><?php _e( 'Common Questions', 'demand-bridge' ); ?></span>
            <h2 class="section-title" id="faq-title"><?php _e( 'Frequently Asked Questions', 'demand-bridge' ); ?></h2>
        </div>

        <div class="faq-list" id="faqList">
            <?php
            $faqs = [
                [
                    'q' => __( 'Can I submit an article to Demand Bridge?', 'demand-bridge' ),
                    'a' => __( 'Yes! We welcome contributions from B2B marketing practitioners. We look for original, data-backed, practitioner-led content that provides real value. Send your pitch to editorial@demandbridge.com with a brief outline and relevant credentials.', 'demand-bridge' ),
                ],
                [
                    'q' => __( 'Is Demand Bridge content free?', 'demand-bridge' ),
                    'a' => __( 'Our core articles, guides, and resources are 100% free. We believe great B2B knowledge should be accessible to everyone. Some premium resources may require newsletter subscription for access.', 'demand-bridge' ),
                ],
                [
                    'q' => __( 'How often do you publish new content?', 'demand-bridge' ),
                    'a' => __( 'We publish 3-5 new articles per week, plus a weekly newsletter every Tuesday. We also regularly update existing content to keep it accurate and current.', 'demand-bridge' ),
                ],
                [
                    'q' => __( 'Do you offer sponsorship opportunities?', 'demand-bridge' ),
                    'a' => __( 'We have limited sponsorship slots for vendors who want to reach our B2B marketing audience. Our editorial independence is non-negotiable — sponsors cannot influence our content. Email partnerships@demandbridge.com for details.', 'demand-bridge' ),
                ],
                [
                    'q' => __( 'Can I use Demand Bridge content in my presentations?', 'demand-bridge' ),
                    'a' => __( 'You may cite and quote our content with proper attribution. For bulk usage or republishing, please contact us at hello@demandbridge.com to discuss permissions.', 'demand-bridge' ),
                ],
            ];
            foreach ( $faqs as $i => $faq ) :
            ?>
                <div class="faq-item fade-in" style="border:1px solid var(--color-gray-200);border-radius:0.75rem;margin-bottom:0.75rem;overflow:hidden;">
                    <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-<?php echo $i; ?>"
                            style="width:100%;text-align:left;padding:1.25rem 1.5rem;font-size:1rem;font-weight:600;color:var(--color-primary);display:flex;justify-content:space-between;align-items:center;background:white;cursor:pointer;border:none;">
                        <?php echo esc_html( $faq['q'] ); ?>
                        <span class="faq-icon" aria-hidden="true" style="font-size:1.25rem;color:var(--color-secondary);transition:transform 0.3s;flex-shrink:0;margin-left:1rem;">+</span>
                    </button>
                    <div class="faq-answer" id="faq-answer-<?php echo $i; ?>" style="display:none;padding:0 1.5rem 1.25rem;font-size:0.9375rem;color:var(--color-gray-600);line-height:1.7;" aria-hidden="true">
                        <?php echo esc_html( $faq['a'] ); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
// FAQ Accordion
document.addEventListener('DOMContentLoaded', function() {
    const faqBtns = document.querySelectorAll('.faq-question');
    faqBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            // Close all
            faqBtns.forEach(function(b) {
                b.setAttribute('aria-expanded', 'false');
                const answer = document.getElementById(b.getAttribute('aria-controls'));
                if (answer) { answer.style.display = 'none'; answer.setAttribute('aria-hidden', 'true'); }
                const icon = b.querySelector('.faq-icon');
                if (icon) { icon.textContent = '+'; icon.style.transform = 'rotate(0deg)'; }
            });
            // Open this one if it was closed
            if (!expanded) {
                this.setAttribute('aria-expanded', 'true');
                const answerId = this.getAttribute('aria-controls');
                const answer = document.getElementById(answerId);
                if (answer) { answer.style.display = 'block'; answer.setAttribute('aria-hidden', 'false'); }
                const icon = this.querySelector('.faq-icon');
                if (icon) { icon.textContent = '×'; icon.style.transform = 'rotate(45deg)'; }
            }
        });
    });
});
</script>

<?php get_footer(); ?>
