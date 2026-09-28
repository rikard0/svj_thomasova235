---
name: site-overview
description: Inventory of the SVJ Thomasova 235 static site files and what each one is for
metadata:
  node_type: memory
  type: project
  originSessionId: 3b38859e-b447-4018-9d0a-fcb90d16c3a5
  modified: 2026-09-28T16:23:12.514Z
---

Static export of the SVJ (homeowners association) website for "Společenství vlastníků domu Thomasova č.p. 235" (Prague), originally built with a CMS pagebuilder (FINEP) and downloaded as static HTML.

Files at repo root:
- `index.html` — homepage: administrator (Prague Property Management), basic SVJ info (IČ, sídlo, statutory body), developer (FINEP) section with link to user manual PDF.
- `dulezite-informace.html` — "Důležité informace" (Important info), the main content-rich page: hero banner + anchor guidepost nav, sections for Základní informace, Důležité kontakty (long list of contacts/phones/emails), Stěhovací checklist (moving-in checklist), Nejčastější otázky (FAQ).
- `spolecnosti-finep-holding.html` — FINEP holding companies page.
- `zasady-zpracovani-osobnich-udaju.html` — GDPR/privacy policy page, minified single-line HTML.
- `info.php` — PHP proxy (see [[info_php]]) that live-fetches the "Nástěnka" (notice board) page from an external CMS (klub-sousedu.cz) and rewrites its menu links to local paths.
- `user_manual.pdf`, `files/stanovy/*.pdf`, `files/Predpis_prvku_vnejsiho_stineni/*.pdf`, `files/penb/*.pdf` — downloadable documents linked from dulezite-informace.html.
- `app/www/` — static assets: css/min (single minified CSS bundle), js/min (single minified JS bundle), fnt (Gordita + icon webfonts), img, gfx.
- `files/images/` — CMS-exported images: pagebuilder_section, pagebuilder_component, news, icon/default (SVG icons used in guidepost nav), company/custom.

Navigation menu (same on every page) is 3 items: Úvod (`/index.html`), Důležité info(rmace) (`/dulezite-informace.html`), Nástěnka (`/info.php`).

See [[page_structure]] for the CMS markup conventions used within sections, and [[editing_playbook]] for how to make changes safely.
