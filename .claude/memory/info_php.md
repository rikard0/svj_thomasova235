---
name: info-php
description: What info.php does — live proxy/rewriter for the external Nástěnka (notice board) page
metadata:
  node_type: memory
  type: reference
  originSessionId: 3b38859e-b447-4018-9d0a-fcb90d16c3a5
  modified: 2026-09-28T16:23:43.506Z
---

`info.php` (repo root) is a PHP script, not a static page. At request time it:
1. curl-fetches `https://www.klub-sousedu.cz/svj-thomasova-235/info` (the "Nástěnka"/notice board, hosted on an external CMS "Klub sousedů").
2. Parses the HTML with DOMDocument/DOMXPath, finds links inside the `.menu` div.
3. Rewrites any link starting with `https://www.klub-sousedu.cz/svj-thomasova-235/` to point at `https://svjthomasova235.cz/...`, converting `/info` → `/info.php` and `/dulezite-informace` → `/dulezite-informace.html` so the external site's nav links back to this static site correctly.
4. Echoes the resulting HTML.

Implication: the "Nástěnka" menu item content is NOT in this repo at all — it's fetched live from klub-sousedu.cz on every request. This requires a PHP runtime (won't work from a plain static file server / `file://`). If asked to preview the site locally, note that `info.php` needs `php -S` or similar, and that it also requires outbound internet access to klub-sousedu.cz.
