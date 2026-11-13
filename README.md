# Al Khail Trading & Export — Website

A bilingual (Arabic/English) one-page website for **شركة الخيل للتجارة والتصدير**.

---

## 1. How the site is built (quick overview)

- It's plain PHP — no database, no installer, no framework. Upload the files and it works.
- **Every word of text, the phone number, email, address, and the list of services live in one file: `config/content.php`.**
  You almost never need to touch any other file to update the site.
- Arabic is the default language (`/`). English is `/?lang=en`.
- It's one page with sections (`#services`, `#partners`, `#about`, `#contact`) — the navigation menu just scrolls to them.

```
/
├── index.php                 ← page layout (rarely needs editing)
├── config/
│   └── content.php           ← ★ EDIT THIS to change any text, phone, email, services
├── includes/
│   ├── header.php            ← <head>, meta tags, top nav
│   ├── footer.php            ← footer + WhatsApp button
│   └── functions.php         ← small helpers + icon set
├── assets/
│   ├── css/style.css         ← all styling/colors/fonts
│   ├── js/main.js            ← mobile menu + scroll animation (site works fine without it)
│   └── images/               ← logo, favicons
├── robots.txt
├── sitemap.xml
└── .htaccess
```

---

## 2. Hosting on GitHub Pages (alkhailexpress.com)

GitHub Pages can't run PHP, so a static copy of the site is generated into `docs/`:

```
php build.php        # (on XAMPP: C:\xampp\php\php.exe build.php)
git add -A && git commit -m "Update content" && git push
```

- `docs/index.html` → Arabic at `https://alkhailexpress.com/`
- `docs/en/index.html` → English at `https://alkhailexpress.com/en/`
- `docs/CNAME` holds the custom domain (taken from `'domain'` in `config/content.php`).

**Always run `php build.php` after editing `config/content.php`**, otherwise the live site won't change.

One-time setup:
1. GitHub repo → **Settings → Pages** → Source: *Deploy from a branch* → Branch: `main`, folder: `/docs` → Save.
   The custom domain `alkhailexpress.com` is picked up from `docs/CNAME`.
2. At your domain registrar, set DNS:
   - `A` records for `@` → `185.199.108.153`, `185.199.109.153`, `185.199.110.153`, `185.199.111.153`
   - `CNAME` record for `www` → `alqushaibi.github.io`
3. Once GitHub shows the domain as verified, tick **Enforce HTTPS**.

---

## 2b. Uploading to AwardSpace (alternative PHP hosting)

1. Log into your AwardSpace control panel and open **File Manager** (or use an FTP client like FileZilla with the FTP details AwardSpace gives you).
2. Upload **everything inside this folder** into your account's web root — usually a folder named `htdocs`, `public_html`, or `www` (AwardSpace shows you the exact name in the control panel).
3. Make sure `index.php` ends up directly inside that root folder (not inside an extra subfolder).
4. Visit **http://alkhailexpress.com/** — the Arabic site should load. Add `?lang=en` for English.
5. In your AwardSpace panel, double-check the domain `alkhailexpress.com` is pointed/parked to this hosting account (this is usually done once when you set up hosting).

That's it — no database setup, no install wizard.

---

## 3. Updating content (the part you'll do most often)

Open **`config/content.php`** in any text editor (even Notepad works, but a code editor like
[VS Code](https://code.visualstudio.com) makes it easier to avoid mistakes).

The file is split into three parts:
- `'site'` — things that are the same in both languages: **phone number, WhatsApp number, email, address used for the map**.
- `'ar'` — every piece of Arabic text.
- `'en'` — every piece of English text.

### To change the phone number, email, or address
Edit the values inside `'site' => [ ... ]` near the top of the file. Update the matching
Arabic/English address text further down too (`'contact' => ['address' => '...']` in both
the `'ar'` and `'en'` sections) so they stay in sync.

### To edit any sentence on the site
Find the matching line (the comments above each section explain what's what) and edit the
text between the quotes. **Don't delete the quote marks or the comma at the end of the line.**

### To add a new service card
Find `'services' => [ 'list' => [ ... ] ]` in the `'ar'` section. Copy one whole block:

```php
[
    'icon'  => 'briefcase',
    'title' => 'عنوان الخدمة',
    'desc'  => 'وصف قصير للخدمة.',
    'items' => ['بند أول', 'بند ثاني'],
],
```

Paste it as a new entry, edit the text, and do the same in the `'en'` section so both
languages match. Available icon names: `briefcase`, `plane`, `sitemap`, `exchange`, `globe`,
`phone`, `mail`, `pin`, `chat`, `check`.

### To remove a service
Delete its whole block (from the opening `[` to the closing `],`) in both `'ar'` and `'en'`.

### After editing
Save the file and re-upload just `config/content.php` to AwardSpace. That's the only file
that needs replacing for a content update.

---

## 4. Getting found on Google

The site already includes the technical basics:
- A `sitemap.xml` and `robots.txt` at the root.
- Unique page titles/descriptions per language, Arabic/English `hreflang` tags.
- Structured data (`LocalBusiness`) so Google can show your phone, address, etc. directly in search results.

To actually get indexed, do this once the site is live:
1. Go to [Google Search Console](https://search.google.com/search-console) and add the property `alkhailexpress.com`.
2. Verify ownership (Search Console will give you a few options — the HTML file or meta tag method both work fine on AwardSpace).
3. Submit your sitemap: `https://alkhailexpress.com/sitemap.xml`.
4. Also add the business on [Google Business Profile](https://business.google.com) — for a local trading/shipping company this often matters more for local search than the website alone.

Indexing isn't instant — it usually takes anywhere from a few days to a few weeks.

---

## 5. Notes & things you can add later

- **Contact form:** the site currently sends people straight to phone/WhatsApp/email links instead of an on-page form. This is the most reliable option on basic shared hosting, where outgoing email (PHP `mail()`) is often unreliable or lands in spam. If you'd like a real contact form later, it's best paired with an SMTP mailbox.
- **More languages / pages:** the current site is intentionally a single page. If you later want separate pages (e.g. a dedicated page per service), that's a bigger structural change — happy to help when you're ready.
- **Social links:** there's a ready-made spot for Facebook/Instagram/LinkedIn links in `config/content.php` under `'site' => ['social' => [...]]` — just paste a URL into any of them and the icon will appear in the footer automatically. Leave blank to keep it hidden.
- **Logo:** the logo used on the site (`assets/images/logo-mark.png`) was extracted from your flyer artwork. If you get a clean, high-resolution logo file later (PNG with transparent background), just replace that file with the same name and it'll update everywhere on the site automatically.
