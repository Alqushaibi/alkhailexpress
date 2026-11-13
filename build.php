<?php
/**
 * build.php — generates the static version of the site into /docs
 * (used by GitHub Pages, which can't run PHP).
 *
 * Run from the project folder after editing config/content.php:
 *     php build.php
 * then commit and push. Output:
 *     docs/index.html      Arabic   →  https://alkhailexpress.com/
 *     docs/en/index.html   English  →  https://alkhailexpress.com/en/
 */

define('STATIC_BUILD', true);
$root = __DIR__;
$out  = $root . '/docs';
$data = require $root . '/config/content.php';
$domain = rtrim($data['site']['domain'], '/');

function rrmdir($dir) {
    if (!is_dir($dir)) return;
    foreach (scandir($dir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $p = "$dir/$f";
        is_dir($p) ? rrmdir($p) : unlink($p);
    }
    rmdir($dir);
}

function rcopy($src, $dst) {
    @mkdir($dst, 0777, true);
    foreach (scandir($src) as $f) {
        if ($f === '.' || $f === '..') continue;
        is_dir("$src/$f") ? rcopy("$src/$f", "$dst/$f") : copy("$src/$f", "$dst/$f");
    }
}

function render($lang) {
    $_GET = ['lang' => $lang];
    ob_start();
    (function () { require __DIR__ . '/index.php'; })();
    return ob_get_clean();
}

rrmdir($out);
mkdir($out . '/en', 0777, true);

file_put_contents("$out/index.html", render('ar'));
file_put_contents("$out/en/index.html", render('en'));

rcopy("$root/assets", "$out/assets");
copy("$root/favicon.ico", "$out/favicon.ico");

// GitHub Pages extras
file_put_contents("$out/CNAME", preg_replace('#^https?://#', '', $domain) . "\n");
file_put_contents("$out/.nojekyll", '');
file_put_contents("$out/robots.txt", "User-agent: *\nAllow: /\n\nSitemap: $domain/sitemap.xml\n");

$today = date('Y-m-d');
$sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
  . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
foreach (['/' => '1.0', '/en/' => '0.9'] as $path => $prio) {
    $sitemap .= "  <url>\n    <loc>$domain$path</loc>\n"
      . "    <xhtml:link rel=\"alternate\" hreflang=\"ar\" href=\"$domain/\"/>\n"
      . "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"$domain/en/\"/>\n"
      . "    <lastmod>$today</lastmod>\n    <changefreq>monthly</changefreq>\n    <priority>$prio</priority>\n  </url>\n";
}
$sitemap .= "</urlset>\n";
file_put_contents("$out/sitemap.xml", $sitemap);

// 404 → send visitors back home
file_put_contents("$out/404.html", '<!DOCTYPE html><html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta http-equiv="refresh" content="0; url=/"><title>404</title></head><body><a href="/">الخيل للتجارة والتصدير</a></body></html>');

echo "Built static site into docs/\n";
