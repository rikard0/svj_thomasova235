---
name: editing-playbook
description: Step-by-step approach for safely adding or modifying content on this static SVJ site
metadata:
  node_type: memory
  type: feedback
  originSessionId: 3b38859e-b447-4018-9d0a-fcb90d16c3a5
  modified: 2026-09-28T16:23:36.497Z
---

When asked to add/modify content on this site:

1. **Adding a new contact / FAQ entry** in dulezite-informace.html: find the relevant wysiwyg block (Důležité kontakty ~line 186-261, Nejčastější otázky ~line 360-387) and follow the `<p class="h3">Label</p><p>details...</p><p>&nbsp;</p>` pattern already used there. Don't invent a new heading style.

2. **Adding a whole new anchored section**: copy an existing `<section class="pbc-X pbc-7" data-section-id="N" data-anchor="slug">...</section>` block as a template, pick a new unused `data-section-id`/`data-cell-id`/`data-component-id` (check existing ones across the file with `grep -o 'data-\(section\|cell\|component\)-id="[0-9]*"'` so IDs don't collide), and register the new anchor in BOTH the guidepost `<ul>` and submenu `<ul>` at the top of the file (see [[page_structure]]).

3. **Menu changes** (adding/removing a top-nav item): the 3-item `<div class="menu"><ul>...</ul></div>` block is duplicated verbatim near the top of index.html, dulezite-informace.html, and spolecnosti-finep-holding.html — update all instances, and mark the current page's `<li>` with `class="active"`.

4. **Images/PDFs**: place new files under `files/images/...` or `files/...` following the existing directory layout, then reference with a relative path from site root (no leading slash), matching the style already in use (see [[site_overview]] for existing asset dirs).

5. Don't touch `app/www/css/min/*` or `app/www/js/min/*` — they are minified CMS-generated bundles; there's no known source/build step in this repo, so any styling change must be done as inline `style=` or a small `<style>` block if truly needed, and should be called out to the user first since it deviates from the CMS export pattern.

6. `zasady-zpracovani-osobnich-udaju.html` is single-line minified HTML — if editing it, be careful with string-based edits (no line numbers to rely on); consider reformatting first only if the user asks for legibility, and confirm before doing so since it changes the diff significantly.

**Why this matters**: the whole site is a static export from a pagebuilder CMS (FINEP), not hand-authored HTML — deviating from its ID/class conventions could break the accompanying minified CSS/JS which likely targets these classes (`.wysiwyg`, `.pbc-N`, `.g-N`, etc.) and any live re-sync from the CMS in the future would be harder to reconcile with hand-edits that don't follow the pattern.
