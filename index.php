<?php
/**
 * index.php
 * Renders the one-page site. All text/content comes from config/content.php —
 * this file only contains layout/markup, never the words themselves.
 *
 * It runs two ways:
 *  - Live PHP (AwardSpace / XAMPP): Arabic at "/", English at "/?lang=en".
 *  - Static build (build.php → docs/ for GitHub Pages): Arabic at "/", English at "/en/".
 */

require_once __DIR__ . '/includes/functions.php';
$data = require __DIR__ . '/config/content.php';

$site = $data['site'];

// ---- Language handling -----------------------------------------------
$lang    = (isset($_GET['lang']) && $_GET['lang'] === 'en') ? 'en' : 'ar';
$altLang = $lang === 'ar' ? 'en' : 'ar';
$dir     = $lang === 'ar' ? 'rtl' : 'ltr';

$t = $data[$lang];

// ---- URLs (differ between live PHP and the static build) ---------------
$isStatic = defined('STATIC_BUILD');
$base     = $isStatic ? '/' : '';                 // prefix for assets
$homeAr   = $isStatic ? '/' : './';
$homeEn   = $isStatic ? '/en/' : '?lang=en';
$absAr    = $site['domain'] . '/';
$absEn    = $site['domain'] . ($isStatic ? '/en/' : '/?lang=en');

$home         = $lang === 'ar' ? $homeAr : $homeEn;
$altUrl       = $lang === 'ar' ? $homeEn : $homeAr;
$canonicalUrl = $lang === 'ar' ? $absAr : $absEn;

$waLink  = whatsapp_link($site['whatsapp_raw'], $t['contact']['whatsapp_message']);
$telLink = tel_link($site['phone_raw']);

require __DIR__ . '/includes/header.php';
?>

<!-- ============================== HERO ============================== -->
<section class="hero" id="hero">
  <div class="hero__bg" aria-hidden="true">
    <span class="hero__glow hero__glow--a"></span>
    <span class="hero__glow hero__glow--b"></span>
    <span class="hero__grid"></span>
  </div>

  <div class="container hero__inner">
    <div class="hero__copy">
      <p class="pill"><span class="pill__dot"></span><?= h($t['hero']['eyebrow']) ?></p>
      <h1 class="hero__title"><?= h($t['hero']['title']) ?></h1>
      <p class="hero__subtitle"><?= h($t['hero']['subtitle']) ?></p>

      <div class="hero__actions">
        <a class="btn btn--primary btn--lg" href="<?= h($telLink) ?>">
          <?= icon('phone', 'icon icon--sm') ?>
          <span><?= h($t['hero']['cta_primary']) ?></span>
        </a>
        <a class="btn btn--glass btn--lg" href="<?= h($waLink) ?>" target="_blank" rel="noopener">
          <?= icon('chat', 'icon icon--sm') ?>
          <span><?= h($t['hero']['cta_secondary']) ?></span>
        </a>
      </div>

      <div class="hero__trust">
        <span class="hero__trust-label"><?= h($t['hero']['trust_label']) ?></span>
        <ul class="hero__carriers">
          <?php foreach ($t['partners']['list'] as $partner): ?>
            <li><?= h($partner) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="hero__graphic" aria-hidden="true">
      <div class="globe">
        <svg viewBox="0 0 480 480" class="route-svg">
          <defs>
            <radialGradient id="globeFill" cx="40%" cy="35%" r="70%">
              <stop offset="0%" stop-color="#2a4592" stop-opacity=".55"/>
              <stop offset="100%" stop-color="#0b1633" stop-opacity="0"/>
            </radialGradient>
            <linearGradient id="routeGrad" x1="0" x2="1">
              <stop offset="0%" stop-color="#F2B66B"/>
              <stop offset="100%" stop-color="#E08A2E"/>
            </linearGradient>
          </defs>

          <circle cx="240" cy="240" r="200" fill="url(#globeFill)"/>
          <g class="globe-lines">
            <circle cx="240" cy="240" r="200"/>
            <ellipse cx="240" cy="240" rx="200" ry="70"/>
            <ellipse cx="240" cy="240" rx="200" ry="140"/>
            <ellipse cx="240" cy="240" rx="70" ry="200"/>
            <ellipse cx="240" cy="240" rx="140" ry="200"/>
            <line x1="40" y1="240" x2="440" y2="240"/>
            <line x1="240" y1="40" x2="240" y2="440"/>
          </g>

          <g class="route-dots">
            <?php
              // deterministic dot scatter inside the globe
              $seed = 0;
              for ($ring = 1; $ring <= 7; $ring++) {
                  $count  = $ring * 6;
                  $radius = $ring * 27;
                  for ($i = 0; $i < $count; $i++) {
                      $seed++;
                      if ($seed % 3 === 0) continue;
                      $angle = (2 * M_PI / $count) * $i + ($ring * 0.35);
                      $cx = 240 + cos($angle) * $radius;
                      $cy = 240 + sin($angle) * $radius;
                      if (hypot($cx - 240, $cy - 240) > 192) continue;
                      printf('<circle cx="%.1f" cy="%.1f" r="1.5"/>', $cx, $cy);
                  }
              }
            ?>
          </g>

          <g class="route-lines">
            <path id="r1" class="route-line" d="M240,240 C 200,160 150,130 96,104" />
            <path id="r2" class="route-line" d="M240,240 C 300,170 360,150 404,112" />
            <path id="r3" class="route-line" d="M240,240 C 280,310 330,340 398,362" />
            <path id="r4" class="route-line" d="M240,240 C 190,310 140,330 84,366" />
          </g>

          <g class="route-runners">
            <circle r="4"><animateMotion dur="3.2s" repeatCount="indefinite"><mpath href="#r1"/></animateMotion></circle>
            <circle r="4"><animateMotion dur="3.8s" begin=".6s" repeatCount="indefinite"><mpath href="#r2"/></animateMotion></circle>
            <circle r="4"><animateMotion dur="3.5s" begin="1.2s" repeatCount="indefinite"><mpath href="#r3"/></animateMotion></circle>
            <circle r="4"><animateMotion dur="4.1s" begin=".3s" repeatCount="indefinite"><mpath href="#r4"/></animateMotion></circle>
          </g>

          <g class="route-nodes">
            <circle cx="96" cy="104" r="5"/>
            <circle cx="404" cy="112" r="5"/>
            <circle cx="398" cy="362" r="5"/>
            <circle cx="84" cy="366" r="5"/>
          </g>

          <g class="route-hub">
            <circle cx="240" cy="240" r="30" class="route-hub__pulse"/>
            <circle cx="240" cy="240" r="18" class="route-hub__ring"/>
            <circle cx="240" cy="240" r="7" class="route-hub__dot"/>
          </g>
        </svg>

        <span class="route-badge route-badge--from"><?= icon('pin', 'icon icon--xs') ?><?= h($t['hero']['badge_route_from']) ?></span>
        <span class="route-badge route-badge--to"><?= icon('globe', 'icon icon--xs') ?><?= h($t['hero']['badge_route_to']) ?></span>
        <span class="float-card">
          <span class="float-card__icon"><?= icon('plane', 'icon icon--sm') ?></span>
          <span>
            <strong><?= h($t['hero']['float_title']) ?></strong>
            <small><?= h($t['hero']['float_text']) ?></small>
          </span>
        </span>
      </div>
    </div>
  </div>

  <!-- stats strip -->
  <div class="container">
    <ul class="stats" data-reveal>
      <?php foreach ($t['stats'] as $stat): ?>
        <li class="stat">
          <span class="stat__value"><?= h($stat['value']) ?></span>
          <span class="stat__label"><?= h($stat['label']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ============================ SERVICES ============================ -->
<section class="section services" id="services">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow"><?= h($t['services']['eyebrow']) ?></p>
      <h2><?= h($t['services']['title']) ?></h2>
      <p class="section-head__subtitle"><?= h($t['services']['subtitle']) ?></p>
    </div>

    <div class="service-grid">
      <?php foreach ($t['services']['list'] as $i => $service): ?>
        <article class="service-card" data-reveal style="--delay: <?= $i * 80 ?>ms">
          <span class="service-card__num"><?= sprintf('%02d', $i + 1) ?></span>
          <div class="service-card__icon"><?= icon($service['icon'], 'icon icon--lg') ?></div>
          <h3><?= h($service['title']) ?></h3>
          <p><?= h($service['desc']) ?></p>
          <ul class="service-card__tags">
            <?php foreach ($service['items'] as $item): ?>
              <li><?= icon('check', 'icon icon--xs') ?><span><?= h($item) ?></span></li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============================= PROCESS ============================= -->
<section class="section process" id="process">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow"><?= h($t['process']['eyebrow']) ?></p>
      <h2><?= h($t['process']['title']) ?></h2>
      <p class="section-head__subtitle"><?= h($t['process']['subtitle']) ?></p>
    </div>

    <ol class="steps">
      <?php foreach ($t['process']['steps'] as $i => $step): ?>
        <li class="step" data-reveal style="--delay: <?= $i * 90 ?>ms">
          <span class="step__num"><?= $i + 1 ?></span>
          <div class="step__icon"><?= icon($step['icon'], 'icon') ?></div>
          <h3><?= h($step['title']) ?></h3>
          <p><?= h($step['desc']) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ============================ PARTNERS ============================= -->
<section class="section partners" id="partners">
  <div class="container partners__inner">
    <div class="section-head" data-reveal>
      <p class="eyebrow"><?= h($t['partners']['eyebrow']) ?></p>
      <h2><?= h($t['partners']['title']) ?></h2>
      <p class="section-head__subtitle"><?= h($t['partners']['subtitle']) ?></p>
    </div>

    <ul class="partner-strip" data-reveal style="--delay: 90ms">
      <?php foreach ($t['partners']['list'] as $partner): ?>
        <li class="partner-badge">
          <span class="partner-badge__icon"><?= icon('plane', 'icon icon--sm') ?></span>
          <span class="partner-badge__name"><?= h($partner) ?></span>
          <span class="partner-badge__meta"><?= h($t['partners']['badge_meta']) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ============================== ABOUT ============================== -->
<section class="section about" id="about">
  <div class="container about__grid">
    <div class="about__visual" data-reveal>
      <div class="about__card">
        <img src="<?= h($base . $site['logo_path']) ?>" alt="<?= h($t['site_name']) ?>" class="about__logo" width="320" height="110" loading="lazy">
        <p class="about__card-name"><?= h($t['site_name']) ?> <span><?= h($t['company_suffix']) ?></span></p>
      </div>
      <div class="about__location">
        <span class="about__location-icon"><?= icon('pin', 'icon icon--sm') ?></span>
        <span>
          <small><?= h($t['about']['location_label']) ?></small>
          <strong><?= h($t['contact']['address']) ?></strong>
        </span>
      </div>
    </div>

    <div class="about__copy" data-reveal style="--delay: 90ms">
      <p class="eyebrow"><?= h($t['about']['eyebrow']) ?></p>
      <h2><?= h($t['about']['title']) ?></h2>
      <p class="about__body"><?= h($t['about']['body']) ?></p>
      <ul class="about__points">
        <?php foreach ($t['about']['points'] as $point): ?>
          <li><span class="about__check"><?= icon('check', 'icon icon--xs') ?></span><span><?= h($point) ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<!-- ============================ CTA BAND ============================= -->
<section class="cta-band-wrap">
  <div class="container">
    <div class="cta-band" data-reveal>
      <div class="cta-band__copy">
        <h2><?= h($t['cta']['title']) ?></h2>
        <p><?= h($t['cta']['text']) ?></p>
      </div>
      <div class="cta-band__actions">
        <a class="btn btn--primary btn--lg" href="<?= h($waLink) ?>" target="_blank" rel="noopener">
          <?= icon('chat', 'icon icon--sm') ?><span><?= h($t['contact']['cta_whatsapp']) ?></span>
        </a>
        <a class="btn btn--glass btn--lg" href="<?= h($telLink) ?>">
          <?= icon('phone', 'icon icon--sm') ?><span dir="ltr"><?= h($site['phone_display']) ?></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ============================= CONTACT ============================= -->
<section class="section contact" id="contact">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow"><?= h($t['contact']['eyebrow']) ?></p>
      <h2><?= h($t['contact']['title']) ?></h2>
      <p class="section-head__subtitle"><?= h($t['contact']['subtitle']) ?></p>
    </div>

    <div class="contact__grid">
      <div class="contact__info" data-reveal>
        <a class="contact-card" href="<?= h($telLink) ?>">
          <span class="contact-card__icon"><?= icon('phone', 'icon') ?></span>
          <span class="contact-card__body">
            <span class="contact-card__label"><?= h($t['contact']['label_phone']) ?></span>
            <span class="contact-card__value" dir="ltr"><?= h($site['phone_display']) ?></span>
          </span>
          <?= icon('chevron', 'icon icon--sm contact-card__arrow') ?>
        </a>
        <a class="contact-card" href="<?= h($waLink) ?>" target="_blank" rel="noopener">
          <span class="contact-card__icon contact-card__icon--wa"><?= icon('chat', 'icon') ?></span>
          <span class="contact-card__body">
            <span class="contact-card__label"><?= h($t['contact']['label_whatsapp']) ?></span>
            <span class="contact-card__value" dir="ltr"><?= h($site['phone_display']) ?></span>
          </span>
          <?= icon('chevron', 'icon icon--sm contact-card__arrow') ?>
        </a>
        <a class="contact-card" href="mailto:<?= h($site['email']) ?>">
          <span class="contact-card__icon"><?= icon('mail', 'icon') ?></span>
          <span class="contact-card__body">
            <span class="contact-card__label"><?= h($t['contact']['label_email']) ?></span>
            <span class="contact-card__value"><?= h($site['email']) ?></span>
          </span>
          <?= icon('chevron', 'icon icon--sm contact-card__arrow') ?>
        </a>
        <div class="contact-card contact-card--static">
          <span class="contact-card__icon"><?= icon('pin', 'icon') ?></span>
          <span class="contact-card__body">
            <span class="contact-card__label"><?= h($t['contact']['label_address']) ?></span>
            <span class="contact-card__value"><?= h($t['contact']['address']) ?></span>
          </span>
        </div>
      </div>

      <div class="contact__map" data-reveal style="--delay: 90ms">
        <iframe
          src="https://www.google.com/maps?q=<?= urlencode($site['map_query']) ?>&amp;output=embed"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="<?= h($t['contact']['label_address']) ?>">
        </iframe>
        <a class="map-directions" target="_blank" rel="noopener"
           href="https://www.google.com/maps/dir/?api=1&amp;destination=<?= urlencode($site['map_query']) ?>">
          <?= icon('pin', 'icon icon--sm') ?><span><?= h($t['contact']['cta_directions']) ?></span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
