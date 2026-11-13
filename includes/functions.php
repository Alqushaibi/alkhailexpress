<?php
/**
 * functions.php
 * Small helper functions used across the site.
 * You should not need to edit this file to update content —
 * edit /config/content.php instead.
 */

/** Escape text safely for HTML output. */
function h($str) {
    return htmlspecialchars((string) $str, ENT_QUOTES, 'UTF-8');
}

/** Turn a phone number into a clean tel: link (digits and + only). */
function tel_link($phone) {
    $clean = preg_replace('/[^0-9+]/', '', $phone);
    return 'tel:' . $clean;
}

/** Turn a phone number into a wa.me WhatsApp link (digits only, no +). */
function whatsapp_link($phone, $message = '') {
    $clean = preg_replace('/[^0-9]/', '', $phone);
    $url = 'https://wa.me/' . $clean;
    if ($message !== '') {
        $url .= '?text=' . rawurlencode($message);
    }
    return $url;
}

/**
 * Returns an inline SVG icon by name.
 * Add new icons here once, then reference them by name anywhere
 * in content.php (e.g. 'icon' => 'briefcase').
 */
function icon($name, $class = 'icon') {
    $icons = [

        'briefcase' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="7.5" width="18" height="12" rx="2"/>
            <path d="M8.5 7.5V6a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v1.5"/>
            <line x1="3" y1="12.5" x2="21" y2="12.5"/>
            <line x1="11" y1="12.5" x2="13" y2="12.5"/>
        </svg>',

        'plane' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 3 3 10.5l7 2.5 2.5 7L21 3Z"/>
            <path d="M12.5 13.5 21 3"/>
        </svg>',

        'sitemap' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <rect x="9" y="3" width="6" height="4" rx="1"/>
            <rect x="3" y="15" width="6" height="4" rx="1"/>
            <rect x="15" y="15" width="6" height="4" rx="1"/>
            <line x1="12" y1="7" x2="12" y2="10"/>
            <line x1="6" y1="10" x2="18" y2="10"/>
            <line x1="6" y1="10" x2="6" y2="15"/>
            <line x1="18" y1="10" x2="18" y2="15"/>
        </svg>',

        'exchange' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="8" x2="18" y2="8"/>
            <polyline points="14,4 18,8 14,12"/>
            <line x1="21" y1="16" x2="6" y2="16"/>
            <polyline points="10,12 6,16 10,20"/>
        </svg>',

        'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6.5 3h3l1.5 4-2 1.5a12 12 0 0 0 5.5 5.5l1.5-2 4 1.5v3a2 2 0 0 1-2 2C10.5 19 5 13.5 4.5 5.5A2 2 0 0 1 6.5 3Z"/>
        </svg>',

        'mail' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="M3 6.5 12 13 21 6.5"/>
        </svg>',

        'pin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 21s7-7.2 7-12a7 7 0 1 0-14 0c0 4.8 7 12 7 12Z"/>
            <circle cx="12" cy="9" r="2.4"/>
        </svg>',

        'chat' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 12a8 8 0 0 1 8-8 8 8 0 0 1 8 8c0 4.4-3.6 8-8 8-1 0-2-.16-2.9-.46L4 21l1.5-3.6A7.9 7.9 0 0 1 4 12Z"/>
        </svg>',

        'chevron' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9,6 15,12 9,18"/>
        </svg>',

        'check' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="5,13 10,18 19,7"/>
        </svg>',

        'menu' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <line x1="3" y1="6" x2="21" y2="6"/>
            <line x1="3" y1="12" x2="21" y2="12"/>
            <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>',

        'close' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="5" x2="19" y2="19"/>
            <line x1="19" y1="5" x2="5" y2="19"/>
        </svg>',

        'globe' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="9"/>
            <ellipse cx="12" cy="12" rx="4" ry="9"/>
            <line x1="3" y1="12" x2="21" y2="12"/>
        </svg>',
        'clipboard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <rect x="5" y="4" width="14" height="17" rx="2"/>
            <path d="M9 4V3h6v1"/>
            <line x1="8.5" y1="10" x2="15.5" y2="10"/>
            <line x1="8.5" y1="14" x2="15.5" y2="14"/>
            <line x1="8.5" y1="18" x2="12.5" y2="18"/>
        </svg>',

        'cog' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/>
        </svg>',

        'box' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 8 12 3 3 8v8l9 5 9-5V8Z"/>
            <polyline points="3,8 12,13 21,8"/>
            <line x1="12" y1="13" x2="12" y2="21"/>
        </svg>',
    ];

    $svg = $icons[$name] ?? $icons['check'];
    return str_replace('<svg ', '<svg class="' . h($class) . '" aria-hidden="true" ', $svg);
}
