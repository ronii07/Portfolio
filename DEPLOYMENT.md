# Vercel Deployment Guide

The site is a Laravel app (Blade) served on Vercel through the community `vercel-php` runtime.

## How it is wired

| File | Purpose |
| --- | --- |
| `vercel.json` | Uses `vercel-php` for `api/index.php`; static assets (`css`, `js`, images, `favicon.svg`) are served from `public/`; every other URL goes to Laravel. Laravel caches/compiled views are redirected to `/tmp` (Vercel's filesystem is read-only). |
| `api/index.php` | Serverless entry point that boots `public/index.php`. |
| `.vercelignore` | Keeps `vendor`, `node_modules`, `.env`, tests, docs and the legacy static `index.html` out of the upload. `composer install` runs on Vercel. |
| `bootstrap/app.php` | Trusts Vercel's proxy headers so asset links are generated as `https://`. |

The CSS/JS used by the site are plain files in `public/` (no Vite build is needed).

## Deploy

1. Push to GitHub, then in the Vercel dashboard choose **Add New Project** and import the repo.
2. Framework Preset: **Other**. Leave Build, Output and Install commands empty.
3. Add these **Environment Variables** (Settings > Environment Variables):
   - `APP_KEY` : run `php artisan key:generate --show` locally and paste the `base64:...` value (required; never commit it)
   - `APP_URL` : your Vercel URL, e.g. `https://your-project.vercel.app` (optional)
4. Deploy. Every push to `main` redeploys automatically.

Or with the CLI: `npm i -g vercel`, `vercel login`, `vercel --prod`.

## Notes

- Editing styles: change `resources/css/app.css`, then copy it to `public/css/app.css` (the page loads the `public` copy).
- There is no database; sessions use cookies and the cache is in memory.
- `index.html` is an older standalone copy of the page and is not deployed.
