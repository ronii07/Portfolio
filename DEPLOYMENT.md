# Vercel Deployment Guide

This portfolio is configured for deployment on Vercel. The project now includes a static HTML version (`index.html`) which is much easier to deploy than the Laravel version.

## Two Deployment Options

### Option 1: Static HTML Version (Recommended - Easiest)

The `index.html` file is a complete, self-contained portfolio with all styling included. This is the easiest way to deploy to Vercel.

#### Deployment Steps:

1. **Deploy via Vercel CLI:**
   ```bash
   npm install -g vercel
   vercel login
   vercel
   ```

2. **Deploy via Git Integration:**
   - Push your code to GitHub/GitLab/Bitbucket
   - Go to [Vercel Dashboard](https://vercel.com/dashboard)
   - Click "Add New Project"
   - Import your repository
   - Configure the project:
     - Framework Preset: Other
     - Root Directory: `./`
     - Build Command: (leave empty)
     - Output Directory: `./`
   - Click "Deploy"

3. **No Environment Variables Needed:**
   The static HTML version doesn't require any environment variables.

### Option 2: Laravel Version (Advanced)

If you prefer to deploy the Laravel version with PHP backend:

#### Prerequisites:
- A Vercel account (free account works)
- Git repository with this code
- PHP runtime support (Vercel supports PHP)

#### Deployment Steps:

1. **Prepare Environment Variables:**
   - `APP_ENV`: `production`
   - `APP_DEBUG`: `false`
   - `APP_KEY`: Generate using `php artisan key:generate`
   - `APP_URL`: Your Vercel deployment URL

2. **Deploy via Vercel CLI:**
   ```bash
   npm install -g vercel
   vercel login
   vercel
   ```

3. **Configure during deployment:**
   - Set up and deploy: `Yes`
   - Scope: Select your username/team
   - Project name: Enter desired project name
   - Directory: `./`
   - Override settings: Select defaults

## File Structure for Deployment

- `index.html` - Static HTML version (recommended for easy deployment)
- `vercel.json` - Vercel configuration
- `.vercelignore` - Files to exclude from deployment
- `public/` - Laravel public directory (for Laravel deployment)
- `resources/` - Laravel resources (for Laravel deployment)

## Post-Deployment Steps

1. **Test the Application:** Visit your deployed URL to ensure everything works correctly.

2. **Configure Custom Domain** (optional):
   - Go to project settings in Vercel
   - Add your custom domain
   - Update DNS records as instructed

## Troubleshooting

### Static HTML Version Issues:
- Ensure `index.html` is in the root directory
- Check that image paths are correct (relative to `index.html`)
- Verify the image file exists in the `image/` directory

### Laravel Version Issues:
- Ensure `vercel.json` is configured correctly
- Check environment variables are set properly
- Verify Composer dependencies are installed
- Check Vercel logs for specific error messages

## Additional Resources

- [Vercel Documentation](https://vercel.com/docs)
- [Vercel CLI Documentation](https://vercel.com/docs/cli)
- [Static Site Deployment Guide](https://vercel.com/docs/deployments/overview)

## Customization

### For Static HTML Version:
- Edit `index.html` directly to modify content
- CSS is embedded in the `<style>` tag
- Image paths should be relative to the HTML file

### For Laravel Version:
- Modify `vercel.json` to customize build settings
- Update environment variables in Vercel dashboard
- Modify Laravel resources as needed

## Recommendation

For the easiest deployment experience, use the static HTML version (`index.html`). It requires:
- No build process
- No environment variables
- No PHP runtime
- Instant deployment

The Laravel version is available if you need server-side functionality in the future.