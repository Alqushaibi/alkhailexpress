<?php
/**
 * footer.php
 * Expects $data, $site, $t, $lang, $base, $home, $telLink, $waLink already set by index.php
 */
$f = $t['footer'];
$year = date('Y');
?>
</main>

<footer class="site-footer">
  <div class="container site-footer__grid">

    <div class="footer-col footer-col--brand">
      <a href="<?= h($home) ?>#top" class="brand brand--footer">
        <span class="brand__logo"><img src="<?= h($base . $site['logo_path']) ?>" alt="" width="64" height="23" loading="lazy"></span>
        <span class="brand__name"><?= h($t['site_name_short']) ?></span>
      </a>
      <p class="footer-tagline"><?= h($f['tagline']) ?></p>
      <?php
        $socials = array_filter($site['social']);
        if (!empty($socials)):
      ?>
      <ul class="social-list">
        <?php foreach ($socials as $network => $url): ?>
          <li><a href="<?= h($url) ?>" target="_blank" rel="noopener"><?= h(ucfirst($network)) ?></a></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>

    <div class="footer-col">
      <h3 class="footer-col__title"><?= h($f['nav_title']) ?></h3>
      <ul class="footer-nav">
        <li><a href="#top"><?= h($t['nav']['home']) ?></a></li>
        <li><a href="#services"><?= h($t['nav']['services']) ?></a></li>
        <li><a href="#process"><?= h($t['nav']['process']) ?></a></li>
        <li><a href="#partners"><?= h($t['nav']['partners']) ?></a></li>
        <li><a href="#about"><?= h($t['nav']['about']) ?></a></li>
        <li><a href="#contact"><?= h($t['nav']['contact']) ?></a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h3 class="footer-col__title"><?= h($f['services_title']) ?></h3>
      <ul class="footer-nav">
        <?php foreach ($t['services']['list'] as $service): ?>
          <li><a href="#services"><?= h($service['title']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="footer-col">
      <h3 class="footer-col__title"><?= h($f['contact_title']) ?></h3>
      <ul class="footer-contact">
        <li>
          <?= icon('pin', 'icon icon--sm') ?>
          <span><?= h($t['contact']['address']) ?></span>
        </li>
        <li>
          <?= icon('phone', 'icon icon--sm') ?>
          <a href="<?= h($telLink) ?>" dir="ltr"><?= h($site['phone_display']) ?></a>
        </li>
        <li>
          <?= icon('mail', 'icon icon--sm') ?>
          <a href="mailto:<?= h($site['email']) ?>"><?= h($site['email']) ?></a>
        </li>
      </ul>
    </div>

  </div>

  <div class="container site-footer__bottom">
    <p>&copy; <?= h($year) ?> <?= h($t['site_name']) ?> <?= h($t['company_suffix']) ?> — <?= h($f['rights']) ?>.</p>
    <a href="#top" class="to-top"><?= h($f['to_top']) ?> ↑</a>
  </div>
</footer>

<a class="whatsapp-fab" href="<?= h($waLink) ?>" target="_blank" rel="noopener" aria-label="<?= h($t['contact']['cta_whatsapp']) ?>">
  <?= icon('chat', 'icon') ?>
</a>

<script src="<?= h($base) ?>assets/js/main.js?v=2" defer></script>
</body>
</html>
