# DataRatiba - Healthcare Systems Landing Page

## Deployment Guide

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher
- Web server (Apache/Nginx)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <your-repository-url>
   cd main-site
   ```

2. **Install dependencies**
   ```bash
   composer install --no-dev
   ```

3. **Environment Configuration**
   ```bash
   cp .env.example .env
   # Edit .env with your actual configuration values
   
   cp config/app_local.example.php config/app_local.php
   # Edit app_local.php with your database credentials
   ```

4. **Database Setup**
   ```bash
   # Create your database
   mysql -u root -p -e "CREATE DATABASE your_database_name;"
   
   # Run migrations
   bin/cake migrations migrate
   ```

5. **Set proper permissions**
   ```bash
   chmod -R 775 logs tmp
   chown -R www-data:www-data logs tmp  # On Ubuntu/Debian
   ```

### Environment Variables (.env)

Copy `.env.example` to `.env` and configure:

- `DATABASE_URL`: Your database connection string
- `SECURITY_SALT`: Generate a secure random string (32+ characters)
- `EMAIL_*`: Configure for email notifications
- `CAKE_ENV`: Set to "production" for production deployment

### Database Configuration (config/app_local.php)

Update the database configuration with your actual credentials:
```php
'Datasources' => [
    'default' => [
        'host' => 'localhost',
        'username' => 'your_username',
        'password' => 'your_password',
        'database' => 'your_database',
    ],
],
```

### Web Server Configuration

#### Apache
Ensure your document root points to the `webroot` directory and mod_rewrite is enabled.

#### Nginx
Configure your server block to point to the `webroot` directory.

### Security Considerations

- Never commit `config/app_local.php` or `.env` files
- Use strong passwords and secure database credentials
- Enable HTTPS in production
- Regular security updates

### Contact Form Features

The application includes:
- Landing page for three healthcare systems
- Contact form with name, work email, and message fields
- Email notifications to administrators
- Database storage of inquiries
- Bootstrap responsive design
- Pink/magenta healthcare theme

### Support

For technical support or questions, contact the development team.