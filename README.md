# Aparus - Apartment Management System

Welcome to Aparus! 👋 This is a user-friendly system designed to make apartment (Rusunawa) management easier and more efficient.

## 🌟 What Can This App Do?

### 👥 Resident Management

- **Register New Residents** - Easy registration process for new tenants
- **Manage Resident Data** - Keep track of all your residents' information
- **Update Resident Status** - Active/Inactive status management

### 💰 Payment & Billing

- **Monthly Billing** - Automatically generate monthly bills
- **Payment Processing** - Easy-to-use cashier interface
- **Virtual Account** - Support for virtual account payments
- **Payment History** - Track all payment records

### 🏠 Apartment Management

- **Room Management** - Keep track of room availability and assignments
- **Complaint Handling** - Process and track resident complaints
- **Maintenance Requests** - Handle maintenance and repair requests

### 📱 Communication

- **WhatsApp Integration** - Send notifications and updates via WhatsApp
- **Automated Reminders** - Payment reminders and important announcements
- **Bulk Messaging** - Send messages to multiple residents at once

## 🚀 Getting Started

### System Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer
- Web Server (Apache/Nginx)

### Installation Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/aparus.git
   cd aparus
   ```

2. **Install Dependencies**

   ```bash
   composer install
   ```

3. **Set Up Environment**

   ```bash
   # Copy environment file
   cp env .env

   # Edit .env file with your database settings
   database.default.hostname = localhost
   database.default.database = your_database_name
   database.default.username = your_username
   database.default.password = your_password
   database.default.DBDriver = MySQLi
   database.default.DBPrefix = aprs_
   ```

4. **Set Up Database**

   ```bash
   # Run migrations
   php spark migrate

   # Run seeder (if you want sample data)
   php spark db:seed InitialSeeder
   ```

5. **Set Folder Permissions**

   ```bash
   chmod -R 777 writable/
   ```

6. **Start the Application**

   ```bash
   php spark serve
   ```

   Visit `http://localhost:8080` in your browser

### Default Login

- Username: `admin`
- Password: `admin123`
- Please change these credentials immediately after first login!

## 📱 WhatsApp Integration Setup

1. Set up your WhatsApp gateway credentials in `.env`:

   ```
   WA_GATEWAY_URL = 'your_gateway_url'
   WA_API_KEY = 'your_api_key'
   ```

2. Test the connection through the admin panel

## 💡 Tips for Use

- Regularly backup your database
- Keep your PHP and CodeIgniter versions updated
- Monitor the `writable/logs` directory for any issues
- Use the bulk message feature wisely to avoid spamming residents

## �� Contact & Support

### Primary Contact

**Ariel Kristiawan**

- 📧 Email: arielthekillers@gmail.com
- 💼 Role: Lead Developer
- 🌐 Location: Bontang, Indonesia

### How to Get Help

1. **Technical Issues**

   - Send email with subject: `[APARUS-TECH] Your Issue`
   - Include your server environment details
   - Attach relevant error logs

2. **Feature Requests**

   - Send email with subject: `[APARUS-FEATURE] Your Request`
   - Clearly describe the feature you need
   - Explain your use case

3. **Bug Reports**

   - Send email with subject: `[APARUS-BUG] Bug Description`
   - Include steps to reproduce
   - Attach screenshots if possible

4. **General Inquiries**
   - Send email with subject: `[APARUS-INFO] Your Question`
   - We typically respond within 24-48 business hours

### Response Times

- Critical issues: 24 hours
- General questions: 2-3 business days
- Feature requests: 5-7 business days

### Working Hours

- Monday - Friday
- 09:00 - 17:00 (GMT+8)
- Indonesia Time Zone

## �� Security Notes

- Change default admin credentials immediately
- Regularly update your password
- Keep your `.env` file secure
- Monitor login attempts through the admin panel

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Made with ❤️ for better apartment management
