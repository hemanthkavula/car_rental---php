# 🚗 Car Rental Management System

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white) ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white) ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black) ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)

## 📋 Overview

A comprehensive web-based car rental management system designed to streamline vehicle rental operations for agencies and customers. This platform enables car rental agencies to manage their fleet, bookings, and customer relationships efficiently while providing customers with an intuitive interface to search, book, and manage their rentals.

### 🌟 Key Highlights

✅ **Dual Interface**: Separate portals for rental agencies and customers  
✅ **Fleet Management**: Complete vehicle inventory management system  
✅ **Booking System**: Real-time availability and reservation management  
✅ **Multi-Agency Support**: Platform supports multiple rental agencies  
✅ **City-Based Search**: Find vehicles by location and availability  
✅ **PDF Reports**: Generate booking receipts and rental agreements  
✅ **Admin Dashboard**: Comprehensive control panel for platform management

## 🚀 Features

### For Customers

- 🔍 **Advanced Search**: Search vehicles by city, car type, and availability
- 📸 **Vehicle Gallery**: Browse cars with detailed images and specifications
- 📊 **Real-Time Availability**: Check instant availability and pricing
- 📅 **Flexible Booking**: Select pickup/drop-off dates and locations
- 💳 **Online Reservation**: Secure booking with instant confirmation
- 📧 **Email Notifications**: Automated booking confirmations
- 📝 **Booking History**: View past and upcoming rentals
- 📱 **Responsive Design**: Book from any device

### For Rental Agencies

- 🚘 **Vehicle Management**: Add, edit, and remove vehicles from inventory
- 📸 **Photo Upload**: Showcase vehicles with multiple images
- 📊 **Booking Management**: View and manage all reservations
- 📈 **Dashboard Analytics**: Monitor bookings and revenue
- 📍 **Location Management**: Manage pickup/drop-off locations
- ⚙️ **Pricing Control**: Set and update rental rates
- 👥 **Customer Management**: Access customer booking history
- 📧 **Notification System**: Receive alerts for new bookings

### Admin Features

- 🏢 **Agency Management**: Onboard and manage rental agencies
- 🚗 **Vehicle Oversight**: Monitor all vehicles across agencies
- 📋 **Booking Monitoring**: Track all platform bookings
- 🏛️ **City Management**: Add and manage service locations
- 📈 **Platform Analytics**: View system-wide statistics
- 🔒 **Access Control**: Manage user roles and permissions

## 🛠️ Tech Stack

| Technology | Purpose |
|------------|----------|
| **PHP** | Server-side scripting and business logic |
| **MySQL** | Relational database management |
| **HTML5** | Structure and semantic markup |
| **CSS3** | Styling and responsive layouts |
| **JavaScript** | Client-side interactivity and validation |
| **FPDF** | PDF generation for booking receipts |
| **Bootstrap** | Responsive UI framework |

## 📁 Project Structure

```
car_rental---php/
│
├── css/                      # Stylesheets
│   └── styles.css
│
├── js/                       # JavaScript files
│   └── scripts.js
│
├── img/                      # Vehicle images and assets
│
├── fpdf184/                  # PDF library
│
├── webfonts/                 # Custom fonts
│
├── database/                 # Database files
│   └── car_rental.sql       # Database schema
│
├── agency.php                # Agency login
├── agency1.php               # Agency registration
├── agencychangepassword.php  # Password management
├── agencylogout.php          # Agency logout
│
├── addcar.php                # Add new vehicle
├── caredit.php               # Edit vehicle details
├── caredit1.php              # Vehicle update handler
├── car_detail.php            # Vehicle details page
│
├── booking.php               # Booking system
├── booking_details.php       # Booking confirmation
│
├── city.php                  # City/location management
├── dashboard.php             # Agency dashboard
├── editprofile.php           # Profile management
│
├── gen_pdf.php               # PDF generation
├── header.php                # Common header
├── footer.php                # Common footer
│
└── connect.php               # Database connection
```

## ⚙️ Installation & Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache Server (XAMPP/WAMP/LAMP)
- Web browser (Chrome, Firefox, Safari)

### Step 1: Clone the Repository

```bash
git clone https://github.com/hemanthkavula/car_rental---php.git
cd car_rental---php
```

### Step 2: Set Up Database

1. Open **phpMyAdmin** or MySQL command line
2. Create a new database:
   ```sql
   CREATE DATABASE car_rental;
   ```
3. Import the database schema:
   - Navigate to the `database` folder
   - Import `car_rental.sql` file

### Step 3: Configure Database Connection

Edit `connect.php` with your database credentials:

```php
<?php
$servername = "localhost";
$username = "root";          // Your MySQL username
$password = "";              // Your MySQL password
$dbname = "car_rental";      // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### Step 4: Deploy to Web Server

- Copy the project folder to your web server directory:
  - **XAMPP**: `C:/xampp/htdocs/car_rental---php`
  - **WAMP**: `C:/wamp64/www/car_rental---php`
  - **LAMP**: `/var/www/html/car_rental---php`

### Step 5: Run the Application

1. Start Apache and MySQL servers
2. Open your browser and navigate to:
   ```
   http://localhost/car_rental---php
   ```

## 🎯 Usage

### For Customers

1. Browse available vehicles on the homepage
2. Select a city to filter vehicles by location
3. Click on a vehicle to view detailed specifications
4. Choose pickup/drop-off dates
5. Submit booking request with contact details
6. Receive confirmation email with booking details
7. Download PDF receipt for your records

### For Rental Agencies

1. Register your agency through the registration page
2. Log in to your agency dashboard
3. Add vehicles to your fleet with images and details
4. Set rental rates and availability
5. Manage incoming booking requests
6. Update vehicle information as needed
7. View booking history and revenue reports

### For Administrators

1. Access admin panel with credentials
2. Manage rental agencies and approvals
3. Monitor all bookings across the platform
4. Add new cities/locations to the system
5. Generate platform-wide reports
6. Moderate content and user accounts

## 💡 Key Features Explained

### Search & Filter System

Customers can:
- Search vehicles by city/location
- Filter by car type (Sedan, SUV, Hatchback, etc.)
- View real-time availability
- Compare rental rates across agencies

### Booking Management

The system handles:
- Date validation (prevents double-booking)
- Automatic price calculation based on rental duration
- Email notifications to both customer and agency
- PDF receipt generation with booking details

### Vehicle Gallery

Agencies can:
- Upload multiple images per vehicle
- Add detailed specifications (model, year, fuel type, etc.)
- Set custom pricing
- Mark vehicles as available/unavailable

## 🔒 Security Features

- Password hashing for user authentication
- SQL injection prevention with prepared statements
- Session management for secure login
- Input validation and sanitization
- File upload validation for images
- Role-based access control

## 🎓 Skills Demonstrated

| Category | Skills |
|----------|--------|
| **Backend** | PHP, MySQL, Server-side validation, Session handling |
| **Frontend** | HTML5, CSS3, JavaScript, Responsive web design |
| **Database** | Relational database design, Complex queries, JOINs |
| **Features** | CRUD operations, File uploads, PDF generation |
| **Architecture** | MVC pattern, Multi-user roles, Admin dashboard |

## 🔮 Future Enhancements

- [ ] Payment gateway integration (Stripe, PayPal)
- [ ] Real-time chat between customers and agencies
- [ ] GPS tracking for rented vehicles
- [ ] Mobile app (iOS & Android)
- [ ] Advanced analytics and reporting
- [ ] Vehicle maintenance tracking
- [ ] Customer review and rating system
- [ ] Multi-language support
- [ ] Insurance integration
- [ ] Loyalty points program

## 🐛 Troubleshooting

**Issue**: Images not uploading  
**Solution**: Ensure `img/` folder has write permissions (chmod 755)

**Issue**: Database connection error  
**Solution**: Verify credentials in `connect.php` and ensure MySQL is running

**Issue**: PDF not generating  
**Solution**: Check FPDF library installation and file permissions

## 📚 What I Learned

Through this project, I developed:

✔️ **Full-Stack Development**: Complete web application with frontend and backend  
✔️ **Database Design**: Multi-table relational database with complex relationships  
✔️ **User Management**: Implementing multiple user roles and permissions  
✔️ **Business Logic**: Handling real-world booking scenarios and validations  
✔️ **File Handling**: Image uploads and PDF generation

## 👨‍💻 Author

**Hemanth Kavula**

- 🌐 GitHub: [@hemanthkavula](https://github.com/hemanthkavula)
- 💼 LinkedIn: [Connect with me](https://www.linkedin.com/in/hemanthkavula)
- 📧 Email: hemanthkavula2001@gmail.com

## 📄 License

This project is open source and available for educational purposes.

## 🙏 Acknowledgments

- FPDF library for PDF generation
- Bootstrap for responsive design
- Font Awesome for icons
- Car rental industry for project inspiration

## 📞 Contact & Support

For questions, suggestions, or collaboration:

- **Email**: hemanthkavula2001@gmail.com
- **LinkedIn**: [Hemanth Kavula](https://www.linkedin.com/in/hemanthkavula)
- **GitHub Issues**: [Report bugs or request features](https://github.com/hemanthkavula/car_rental---php/issues)

---

⭐ **If you find this project useful, please consider giving it a star!**

**Made with ❤️ for streamlining car rental operations**

Last Updated: November 2025
