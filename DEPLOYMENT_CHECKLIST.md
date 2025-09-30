# Pre-Deployment Checklist for DataRatiba

## Files to Remove/Clean Before Deployment

### ✅ Temporary and Cache Files
- [ ] Remove all files in `/tmp/cache/`
- [ ] Remove all files in `/logs/`
- [ ] Remove `debug_kit.sqlite`
- [ ] Clear any `.DS_Store` files

### ✅ Development Configuration Files
- [ ] Remove or exclude `.vscode/` directory
- [ ] Exclude development-specific config files:
  - `phpcs.xml`
  - `phpstan.neon`
  - `psalm.xml`
  - `.editorconfig`

### ✅ Sensitive Files (NEVER COMMIT)
- [ ] `config/app_local.php` (contains database credentials)
- [ ] `.env` file (if using environment variables)
- [ ] Any files containing passwords or API keys

### ✅ Database Files
- [ ] Remove any local SQLite database files
- [ ] Remove database backup files (*.sql, *.backup)

### ✅ Dependencies and Build Files
- [ ] Exclude `vendor/` directory (will be installed via composer)
- [ ] Exclude `node_modules/` if using npm
- [ ] Exclude `composer.lock` for libraries, include for applications

## Git Commands for Clean Deployment

```bash
# Initialize repository (if not already done)
git init

# Add all files respecting .gitignore
git add .

# Commit initial version
git commit -m "Initial commit: DataRatiba Healthcare Systems Landing Page"

# Add remote repository
git remote add origin <your-github-repository-url>

# Push to GitHub
git push -u origin main
```

## Files That SHOULD Be Included in Repository

### ✅ Application Code
- All PHP files in `src/`
- All template files in `templates/`
- Configuration files in `config/` (except `app_local.php`)
- Routes, migrations, and core application files

### ✅ Frontend Assets
- Custom CSS/JS files in `webroot/`
- Images and static assets

### ✅ Documentation
- `README.md`
- `DEPLOYMENT.md`
- `.env.example`
- `app_local.example.php`

### ✅ Configuration Templates
- `.gitignore`
- `.htaccess`
- `composer.json`

## Environment-Specific Files to Create on Server

1. **config/app_local.php** - Copy from example and configure with production values
2. **.env** - Copy from .env.example and configure
3. **logs/** directory - Ensure it exists and is writable
4. **tmp/** directory - Ensure it exists and is writable

## Security Notes

- ⚠️ **NEVER** commit database passwords
- ⚠️ **NEVER** commit API keys or secrets
- ⚠️ **ALWAYS** use environment variables for sensitive data
- ⚠️ **VERIFY** .gitignore is working before first commit

## Production Deployment Steps

1. Clone repository on production server
2. Run `composer install --no-dev`
3. Copy and configure `app_local.php`
4. Set proper file permissions
5. Run database migrations
6. Configure web server
7. Test application functionality