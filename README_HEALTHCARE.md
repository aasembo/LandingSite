# DataRatiba - Healthcare Systems Landing Page

A beautiful and responsive landing page built with CakePHP 5 and Bootstrap 5 that showcases three integrated healthcare management systems.

## 🏥 Healthcare Systems

This landing page provides access to three comprehensive healthcare systems:

### 1. Nursing Portal
- **Purpose**: Portal to manage nursing staff
- **Features**: Staff management, shift scheduling, patient assignments, care coordination
- **Access**: http://nursing.yourdomain.com (update with your actual URL)

### 2. Imaging Scheduler  
- **Purpose**: Scheduling system for medical imaging
- **Features**: Appointment scheduling, equipment management, workflow optimization, resource allocation
- **Access**: http://imaging.yourdomain.com (update with your actual URL)

### 3. Patient Management System
- **Purpose**: Portal to manage technicians, scientists, doctors, patients, and medical records
- **Features**: Staff management, patient registration, medical records system, integrated healthcare workflow
- **Access**: http://patients.yourdomain.com (update with your actual URL)

## 🚀 Features

- **Responsive Design**: Built with Bootstrap 5 for mobile-first responsive design
- **Modern UI**: Clean, professional healthcare-themed interface with pink/magenta color scheme
- **Contact Form**: Comprehensive contact form with email functionality
- **No Authentication Required**: Public access landing page
- **SEO Optimized**: Structured HTML with proper meta tags
- **Email Integration**: Contact form submissions sent to administrator

## 🛠️ Technology Stack

- **Framework**: CakePHP 5.2.8
- **Frontend**: Bootstrap 5.3.0
- **Typography**: Google Fonts - Lato
- **Icons**: Font Awesome 6.0.0
- **Database**: MySQL (production) / SQLite (alternative for development)
- **PHP**: 8.1+ required
- **ORM**: CakePHP ORM with Migrations

## 📋 Requirements

- PHP 8.1 or higher
- Composer
- Web server (Apache/Nginx) or PHP built-in server for development

## 🔧 Installation

1. **Clone or download the project** (already done if you're reading this)

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Configure environment**:
   - Copy `config/app_local.example.php` to `config/app_local.php` if needed
   - Update email configuration in `config/app_local.php`
   - Update system URLs in templates (see Configuration section)

4. **Run database migrations**:
   ```bash
   bin/cake migrations migrate
   ```

5. **Start development server**:
   ```bash
   bin/cake server
   ```
   
   The application will be available at: http://localhost:8765

## ⚙️ Configuration

### Database Configuration

Update the database settings in `config/app_local.php`:

**For MySQL:**
```php
'Datasources' => [
    'default' => [
        'driver' => 'Cake\\Database\\Driver\\Mysql',
        'host' => 'localhost',
        'username' => 'your-username',
        'password' => 'your-password',
        'database' => 'your-database-name',
        'encoding' => 'utf8mb4',
        'timezone' => 'UTC',
    ],
],
```

**For SQLite (Development):**
```php
'Datasources' => [
    'default' => [
        'driver' => 'Cake\\Database\\Driver\\Sqlite',
        'database' => 'healthcare_systems.sqlite',
        'encoding' => 'utf8',
        'timezone' => 'UTC',
    ],
],
```

### Email Configuration

Update the email settings in `config/app_local.php`:

```php
'EmailTransport' => [
    'default' => [
        'className' => 'Smtp',
        'host' => 'your-smtp-server.com',
        'port' => 587,
        'username' => 'your-email@domain.com',
        'password' => 'your-password',
        'tls' => true,
    ],
],
```

### System URLs

Update the system URLs in the following files:
- `templates/Pages/home.php` - Update the links to your actual system URLs
- `templates/Pages/contact.php` - Update the system links in the contact page

### Administrator Email

Update the administrator email in `src/Controller/PagesController.php`:
```php
->setTo('admin@dataratiba.com') // Change this to your admin email
```

## 📁 Project Structure

```
├── src/
│   ├── Controller/
│   │   └── PagesController.php      # Main controller with home and contact actions
│   └── Model/
│       ├── Table/
│       │   └── EnquiriesTable.php   # Enquiry model with validation rules
│       └── Entity/
│           └── Enquiry.php          # Enquiry entity class
├── templates/
│   ├── layout/
│   │   └── default.php              # Main layout with Bootstrap integration
│   ├── Pages/
│   │   ├── home.php                 # Landing page template
│   │   └── contact.php              # Contact form template with validation
│   └── email/
│       └── html/
│           └── contact_form.php     # Email template for contact form
├── webroot/
│   ├── css/
│   │   └── custom.css               # Custom DataRatiba styles and theme
│   └── js/
│       └── contact-form.js          # Contact form validation JavaScript
├── config/
│   ├── routes.php                   # Route configuration
│   ├── app_local.php               # Local configuration
│   └── Migrations/
│       └── *_CreateEnquiries.php   # Database migration for enquiries table
└── webroot/                        # Public web directory
```

## 🎨 Customization

### Colors and Styling

### Colors and Styling

The main color scheme is defined in CSS custom properties in `webroot/css/custom.css`:

```css
:root {
    --primary-color: #e91e63;      /* Main pink/magenta */
    --secondary-color: #c2185b;    /* Darker pink */
    --accent-color: #f48fb1;       /* Light pink accent */
    --light-pink: #fce4ec;        /* Background pink */
    --success-color: #28a745;      /* Success green */
    --text-dark: rgb(54, 54, 55);  /* Dark text */
    --dark-bg: rgb(54, 54, 55);    /* Dark background */
}
```

### Adding New Systems

To add additional healthcare systems:

1. Update the systems section in `templates/Pages/home.php`
2. Add the new system links to `templates/Pages/contact.php`
3. Update the navigation or add new routes as needed

## 📧 Contact Form

The contact form includes the following fields:
- **Name**: Full name (required, 2-255 characters)
- **Personal Email**: Personal email address (required, valid email format)
- **Work Email**: Work email address (required, valid email format, must be different from personal email)  
- **Description**: Message or inquiry details (required, 10-5000 characters)

### Form Features:
- **Database Storage**: All submissions are saved to the `enquiries` table
- **Server-side Validation**: Comprehensive validation using CakePHP's validation system
- **Client-side Validation**: Real-time validation with custom JavaScript
- **Email Notifications**: Formatted HTML emails sent to administrators
- **Timestamp Tracking**: Automatic `created` and `modified` timestamps
- **Unique ID**: Each enquiry gets a unique ID for tracking

Form submissions are:
- Validated on both client and server side
- Saved to the database with automatic timestamps
- Sent via email to the configured administrator with enquiry ID
- Include all form data in a formatted HTML email

## 🚀 Deployment

### Production Deployment

1. **Upload files** to your web server
2. **Configure web server** to point to the `webroot` directory
3. **Update configuration**:
   - Set `debug` to `false` in `config/app_local.php`
   - Configure production email settings
   - Update system URLs to production URLs
4. **Set proper permissions** on `tmp` and `logs` directories

### Environment Variables

For production, consider using environment variables:
- `DEBUG=false`
- `EMAIL_TRANSPORT_DEFAULT_URL=smtp://...`
- `SECURITY_SALT=your-production-salt`

## 🔐 Security

- All form inputs are properly sanitized and validated
- CSRF protection is enabled by default in CakePHP
- Email templates use proper HTML escaping
- No authentication required as intended for public access

## 📱 Mobile Responsiveness

The landing page is fully responsive and optimized for:
- Desktop computers
- Tablets 
- Mobile phones
- Various screen sizes and orientations

## 🆘 Support

For technical support or questions about the healthcare systems:
- **Email**: admin@dataratiba.com
- **Phone**: +1 (555) 123-4567 (Mon-Fri, 8AM-6PM EST)
- **Live Chat**: Available on system portals (24/7)

## 📄 License

This project is built with CakePHP which is licensed under the MIT License.

---

**DataRatiba** - Connecting healthcare professionals with integrated management solutions.