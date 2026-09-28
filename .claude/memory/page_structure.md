---
name: page-structure
description: "CMS pagebuilder markup conventions (sections, grid, wysiwyg blocks) used across the site's HTML"
metadata:
  node_type: memory
  type: project
  originSessionId: 3b38859e-b447-4018-9d0a-fcb90d16c3a5
  modified: 2026-09-28T16:23:24.277Z
---

Pages (other than the minified privacy-policy page) follow a consistent pattern exported from a pagebuilder CMS:

- `<section data-section-id="N" class="pbc-X pbc-Y" data-anchor="slug">` — one content block. `data-anchor` (when present) is the in-page anchor target used by nav links like `dulezite-informace.html#slug`.
  - `<div class="container"><div class="grid"> ... </div></div>`
    - Grid cells use `g-12`, `g-9`/`g-3`, `g-6` (12-column grid; suffixes `s-12 xs-12` etc. are responsive overrides). Each cell has `data-cell-id`.
    - Inside a cell: one or more `<div data-component-id="N">` blocks, each usually wrapping a `<div class="wysiwyg">` containing the actual rich-text content (h2/h3/p/ol/li/a).
    - Convention: heading component (`<h2>`) is a separate `data-component-id` block from the body-text component right after it.
    - Every cell ends with `<div class="cleaner"></div>`, and every grid ends with `<div class="xl-cleaner l-cleaner m-cleaner s-cleaner xs-cleaner"></div><div class="cleaner"></div>` — these are float-clearing spacers, always keep them when copying a block.
  - `<p class="h3">Question/label</p>` is the convention for a bold sub-heading within a wysiwyg block (used heavily in FAQ/contacts lists), not an actual `<h3>` tag.
  - `<p>&nbsp;</p>` is used as a spacer paragraph between sub-sections — keep this pattern for visual consistency when adding new Q&A-style entries.

dulezite-informace.html hero banner also has a "guidepost" nav (icon + label links to each `data-anchor`) and a duplicate "submenu" nav (text-only) with left/right gradient arrows for horizontal scroll on mobile — if adding a new anchored section, add matching entries to BOTH the guidepost `<ul>` and the submenu `<ul>` (see [[editing_playbook]]).

Asset URLs in these files often contain literal `%3F` (encoded `?`) and cache-busting query params baked into the filename, e.g. `href="app/www/css/min/2c4fe26873db84341f908656ab3d1181.css%3F_=1779366407.css"` and `files/images/pagebuilder_section/114.jpg?_=1779366407`. Don't "clean up" these — they're artifacts of the CMS export and the files on disk are named to match.
