# Demand Bridge — WordPress Theme

**Version:** 1.0.0  
**Author:** Demand Bridge Team  
**Domain:** demandbridge.com  
**Type:** B2B Marketing Learning Platform

---

## Overview

Demand Bridge is a professional, fully-featured WordPress theme purpose-built for a B2B marketing intelligence and learning platform. It prioritizes:

- 📚 **Informative/Learning Blog** — rich article templates with TOC, reading progress, author boxes, and related posts
- 📱 **Mobile-First Responsive** — fluid grid, hamburger menu, touch-friendly interactions
- ⚡ **Performance Optimized** — minimal dependencies, lazy images, passive scroll listeners, Intersection Observer
- ♿ **Accessible** — ARIA labels, keyboard navigation, focus management, skip links
- 🔍 **SEO Ready** — JSON-LD schema, Open Graph tags, semantic HTML, structured data
- 🎨 **Interactive** — scroll animations, counter effects, category filtering, sticky header, search overlay

---

## File Structure

```
demand-bridge-theme/
├── style.css              ← Theme metadata + all CSS (3,000+ lines)
├── functions.php          ← Theme setup, CPTs, meta boxes, AJAX handlers
├── header.php             ← Site header, navigation, mobile menu, search overlay
├── footer.php             ← Site footer, cookie notice, scroll-to-top
├── front-page.php         ← Homepage: Hero, Features, Stats, Blog Preview, Testimonials, Newsletter
├── single.php             ← Blog post: header, TOC sidebar, author box, related posts
├── archive.php            ← Blog listing: filters, grid, sidebar, pagination
├── page.php               ← Default page template
├── page-about.php         ← About page: mission, team, values, stats
├── page-contact.php       ← Contact page: form, FAQ accordion, info
├── search.php             ← Search results template
├── sidebar.php            ← Blog sidebar fallback
├── index.php              ← WordPress fallback template
├── 404.php                ← 404 error page
├── assets/
│   ├── css/               ← Additional CSS (editor styles etc.)
│   ├── js/
│   │   └── main.js        ← All JavaScript (no jQuery dependency)
│   └── images/            ← Static assets (logo, og-image, etc.)
└── inc/                   ← Additional PHP modules (optional)
```

---

## Installation

### Quick Install (WordPress Admin)
1. Zip the `demand-bridge-theme/` folder
2. WordPress Admin → Appearance → Themes → Add New → Upload Theme
3. Activate **Demand Bridge**
4. Go to Settings → Reading → set "Your homepage displays" to "A static page" → select your front page

### Manual Install
1. Copy `demand-bridge-theme/` to `wp-content/themes/demand-bridge/`
2. Activate via WordPress Admin

---

## Initial Setup Checklist

### Recommended Plugins
- **Yoast SEO** — Enhanced meta management
- **WP Rocket / LiteSpeed Cache** — Performance caching
- **Cloudinary / Smush** — Image optimization
- **WP Mail SMTP** — Reliable contact form email delivery
- **MailChimp for WordPress** — Newsletter integration

### Pages to Create
| Page Title        | Template          | Slug            |
|-------------------|-------------------|-----------------|
| Home              | Default           | `/`             |
| Blog              | Archive (auto)    | `/blog`         |
| About Us          | About Page        | `/about`        |
| Contact           | Contact Page      | `/contact`      |
| Privacy Policy    | Default           | `/privacy-policy` |
| Terms of Service  | Default           | `/terms-of-service` |

### Categories to Create (Blog)
- Demand Generation
- Account-Based Marketing (ABM)
- Sales Enablement
- Content Strategy
- Revenue Operations
- B2B Marketing
- Research & Reports
- Case Studies

### Menus
Assign **Primary Navigation** to the header menu.

---

## Customization

### Brand Colors
Edit CSS custom properties at the top of `style.css`:
```css
:root {
  --color-primary: #1a2b5e;     /* Deep navy */
  --color-secondary: #f15a24;   /* Orange CTA */
  --color-accent: #00b4d8;      /* Bright blue */
}
```

### Newsletter Integration
In `functions.php`, update `demandbridge_newsletter_signup()` to connect your ESP:
- **Mailchimp:** Use [Mailchimp API](https://mailchimp.com/developer/)
- **ConvertKit:** Replace with CK API call
- **HubSpot:** Use HubSpot Forms API

### Contact Form
Edit the `demandbridge_contact_form()` function in `functions.php` to route to your CRM or email.

---

## Features

### Homepage Sections
1. **Hero** — Animated, full-screen with stats & visual card stack
2. **Trust Bar** — Client logo marquee
3. **Solutions/Features** — 6-column feature grid with hover effects
4. **Stats Counter** — Animated number counters with Intersection Observer
5. **Learning Categories** — 8 topic cards with emoji icons
6. **Blog Preview** — Filterable 7-post grid with featured card
7. **Testimonials** — 3-column social proof
8. **Newsletter CTA** — Email capture with privacy note

### Blog/Learning Center
- Category filter tabs
- Estimated read time (auto-calculated from word count)
- Featured image with hover zoom
- Author avatar, name, date, category badge
- Responsive 2-column grid

### Single Post Features
- Reading progress bar (sticky top)
- Auto-generated Table of Contents (from H2/H3)
- Active TOC highlight on scroll
- Key Takeaway callout box (custom meta)
- Social share buttons (LinkedIn, Twitter, Copy Link)
- Author box with role and bio
- Related posts by category
- Post tags
- Sidebar: TOC widget, newsletter signup, popular articles

### Navigation
- Transparent header → white on scroll
- Mega dropdown menu with icons
- Mobile hamburger menu (full-screen overlay)
- Search modal overlay (keyboard accessible)
- ARIA expanded/hidden states throughout

### Performance
- Google Fonts loaded asynchronously
- Passive scroll listeners
- Intersection Observer for animations & lazy loading
- requestAnimationFrame for counter animations
- CSS custom properties for fast theming
- No jQuery required (vanilla JS)

---

## SEO

The theme outputs:
- **JSON-LD** structured data (Organization + Article schemas)
- **Open Graph** meta tags for social sharing
- **Semantic HTML** (article, section, nav, main, aside, header, footer)
- **Breadcrumbs** on inner pages
- **Canonical** URLs (via WordPress core)

---

## Accessibility

- Skip to content link
- ARIA labels on all interactive elements
- Focus-visible outlines
- Keyboard navigation for dropdowns
- sr-only class for screen reader text
- prefers-reduced-motion support
- Semantic HTML throughout
- Color contrast ratio ≥ 4.5:1

---

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile Safari / Chrome (iOS/Android)

---

## Contributing

To add a new editorial contributor, create a WordPress user with the **Author** role and fill in:
- **Bio** (Description field in User Profile)
- **LinkedIn URL** (custom field: `linkedin`)
- **Twitter handle** (custom field: `twitter`)
- **Role/Title** (set per-post via "Post Settings" meta box)

---

## License

GNU General Public License v2 or later — https://www.gnu.org/licenses/gpl-2.0.html

---

*Built with care for the B2B marketing community. 🌉*
