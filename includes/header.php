<?php
/**
 * header.php
 * Expects these variables to already be set by index.php:
 * $data, $site, $t, $lang, $altLang, $dir, $base, $home, $altUrl,
 * $canonicalUrl, $absAr, $absEn, $telLink
 */
$m = $t['meta'];
?>
<!DOCTYPE html>
<html lang="<?= h($lang) ?>" dir="<?= h($dir) ?>">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title><?= h($m['title']) ?></title>
<meta name="description" content="<?= h($m['description']) ?>">
<meta name="keywords" content="<?= h($m['keywords']) ?>">
<meta name="robots" content="index, follow">
<meta name="author" content="<?= h($t['site_name']) ?>">
<meta name="theme-color" content="#0B1633">

<!-- Canonical + language alternates (helps Google serve the right language) -->
<link rel="canonical" href="<?= h($canonicalUrl) ?>">
<link rel="alternate" hreflang="ar" href="<?= h($absAr) ?>">
<link rel="alternate" hreflang="en" href="<?= h($absEn) ?>">
<link rel="alternate" hreflang="x-default" href="<?= h($absAr) ?>">

<!-- Open Graph / social sharing -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= h($t['site_name']) ?>">
<meta property="og:title" content="<?= h($m['title']) ?>">
<meta property="og:description" content="<?= h($m['description']) ?>">
<meta property="og:url" content="<?= h($canonicalUrl) ?>">
<meta property="og:image" content="<?= h($site['domain']) ?>/assets/images/favicon-512.png">
<meta property="og:locale" content="<?= $lang === 'ar' ? 'ar_EG' : 'en_US' ?>">
<meta name="twitter:card" content="summary">

<!-- Favicons -->
<link rel="icon" href="<?= h($base) ?>favicon.ico" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="<?= h($base) ?>assets/images/favicon-32.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?= h($base) ?>assets/images/favicon-192.png">
<link rel="apple-touch-icon" href="<?= h($base) ?>assets/images/apple-touch-icon.png">

<!-- Font: Cairo covers Arabic and Latin -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= h($base) ?>assets/css/style.css?v=2">

<!-- Structured data: helps Google show this as a local business in search -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": <?= json_encode($t['site_name'], JSON_UNESCAPED_UNICODE) ?>,
  "image": <?= json_encode($site['domain'] . '/assets/images/favicon-512.png') ?>,
  "url": <?= json_encode($canonicalUrl) ?>,
  "telephone": <?= json_encode($site['phone_raw']) ?>,
  "email": <?= json_encode($site['email']) ?>,
  "address": {
    "@type": "PostalAddress",
    "streetAddress": <?= json_encode($t['contact']['address'], JSON_UNESCAPED_UNICODE) ?>,
    "addressLocality": "Giza",
    "addressCountry": "EG"
  },
  "areaServed": "EG",
  "priceRange": "$$"<?php if (!empty($site['founding_year'])): ?>,
  "foundingDate": <?= json_encode($site['founding_year']) ?>
  <?php endif; ?>
}
</script>
</head>
<body>
<a class="skip-link" href="#main"><?= h($t['skip_link']) ?></a>

<header class="site-header" id="top">
  <div class="container site-header__inner">
    <a href="<?= h($home) ?>#top" class="brand">
      <span class="brand__logo"><img src="<?= h($base . $site['logo_path']) ?>" alt="" width="56" height="20"></span>
      <span class="brand__name"><?= h($t['site_name_short']) ?></span>
    </a>

    <nav class="main-nav" id="main-nav" aria-label="Main">
      <ul>
        <li><a href="#top"><?= h($t['nav']['home']) ?></a></li>
        <li><a href="#services"><?= h($t['nav']['services']) ?></a></li>
        <li><a href="#process"><?= h($t['nav']['process']) ?></a></li>
        <li><a href="#partners"><?= h($t['nav']['partners']) ?></a></li>
        <li><a href="#about"><?= h($t['nav']['about']) ?></a></li>
        <li><a href="#contact"><?= h($t['nav']['contact']) ?></a></li>
      </ul>
    </nav>

    <div class="site-header__actions">
      <a class="lang-switch" href="<?= h($altUrl) ?>" hreflang="<?= h($altLang) ?>" lang="<?= h($altLang) ?>">
        <?= icon('globe', 'icon icon--xs') ?><span><?= h($t['lang_switch_label']) ?></span>
      </a>
      <a class="btn btn--small btn--primary header-call" href="<?= h($telLink) ?>">
        <?= icon('phone', 'icon icon--sm') ?>
        <span><?= h($t['nav']['call']) ?></span>
      </a>
      <button type="button" class="nav-toggle" id="nav-toggle" aria-expanded="false" aria-controls="main-nav">
        <?= icon('menu', 'icon icon--menu') ?>
        <?= icon('close', 'icon icon--close') ?>
        <span class="sr-only">Menu</span>
      </button>
    </div>
  </div>
</header>

<main id="main">
