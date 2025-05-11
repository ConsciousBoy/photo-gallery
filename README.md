# Photo Gallery Web Application

A modern and secure web application for viewing and managing photos, built with PHP and MySQL following the MVC architecture.

## 🌟 Features

- **User Authentication**
  - Secure login and registration system
  - Password hashing for enhanced security
  - Session-based authentication

- **Profile Management**
  - View and edit user profiles
  - Change password functionality
  - User information display

- **Photo Gallery**
  - Browse photos with pagination
  - View detailed photo information
  - Responsive image display

- **Modern UI/UX**
  - Clean and intuitive interface
  - Responsive design for all devices
  - Font Awesome icons integration

## 🛠️ Technical Stack

- **Backend**
  - PHP 7.4+
  - MySQL 5.7+
  - PDO for database operations

- **Frontend**
  - HTML5
  - CSS3
  - Font Awesome 6.0.0
  - Responsive design

- **Architecture**
  - MVC (Model-View-Controller) pattern
  - Object-oriented programming
  - Secure session management

## 📋 Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache web server

## 🚀 Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ConsciousBoy/photo-gallery.git
   cd photo-gallery
   ```

2. **Database Setup**
   - Create a new MySQL database
   - Import the `database.sql` file into your database

3. **Configuration**
   - Open `app/config/config.php`
   - Update the database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'gallery_db');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     ```


## 📁 Directory Structure

```
├── app/
│   ├── config/
│   │   ├── config.php         # Application configuration
│   │   └── database.php       # Database connection
│   │
│   ├── controllers/
│   │   ├── AuthController.php # Handles user authentication
│   │   └── PhotoController.php # Handles photo operations
│   │
│   ├── models/
│   │   ├── UserModel.php      # User data operations
│   │   └── PhotoModel.php     # Photo data operations
│   │
│   ├── public/
│   │   ├── css/
│   │   │   └── style.css      # Main stylesheet
│   │   └── images/            # Uploaded photos
│   │
│   └── views/
│       ├── header.php         # Common header
│       ├── footer.php         # Common footer
│       ├── login.php          # Login page
│       ├── registration.php   # Registration page
│       ├── profile.php        # User profile
│       ├── editprofile.php    # Edit profile
│       ├── changepassword.php # Change password
│       └── mainpage.php       # Main gallery page
│
├── database.sql               # Database schema
├── index.php                 # Entry point
└── README.md                 # This file
```

## 🔒 Security Features

- Password hashing using PHP's `password_hash()`
- SQL injection prevention using PDO prepared statements
- XSS protection with `htmlspecialchars()`
- Session-based authentication

## 👥 Usage

1. **User Registration**
   - Visit the registration page
   - Fill in your details
   - Click register

2. **Viewing Photos**
   - Browse the gallery on the home page
   - Click any photo to view details
   - Use pagination to navigate through photos

3. **Profile Management**
   - Access your profile through the navigation menu
   - Edit your personal information
   - Change your password securely

## 👨‍💻 Author

Yashar Abbasieh - [@ConsciousBoy](https://github.com/ConsciousBoy)

## 🙏 Acknowledgments

- Font Awesome for the icons
- The PHP community for excellent documentation 