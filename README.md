#  Shopzy - E-commerce Website

Shopzy is a full-featured e-commerce web application built with **Core PHP**, **Bootstrap 5**, and **AJAX**. This platform allows users to browse products, 
manage their cart, and place orders, while admins can manage categories, products, orders, and users.

---

##  Features

### Admin Panel
- Login authentication
- Add/Edit/Delete categories
- Add/Edit/Delete products
- Order management
- Invoice generation (with Dompdf)
- User management

### User Side
- Product listing by category
- Add to cart using AJAX
- Place orders
- View order history
- User registration and login
- Checkout with address and payment method

---

## Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap 5, JavaScript, AJAX
- **Backend**: Core PHP (Procedural)
- **Database**: MySQL (phpMyAdmin)
- **PDF Generation**: Dompdf (for invoices)
- **Server**: Apache (XAMPP recommended)


---

##  Installation

1. **Clone the repository** or copy it into your local server directory (e.g. `htdocs` in XAMPP).

2. **Start XAMPP**, and ensure Apache and MySQL services are running.

3. **Database Setup**
   - Open `phpMyAdmin`
   - Create a database named `shopzy`
   - Import the SQL file from `/database/shopzy.sql` (if provided)

4. **Configure Database**
   - Edit `include/db_config.php` and update the database credentials:
     ```php
     $con = mysqli_connect("localhost", "root", "", "shopzy");
     ```

5. **Install Dependencies**
   - From project root, run:
     ```bash
     composer install
     ```
     (If `composer.json` exists and Dompdf is used)

6. **Access the site**
   - User side: [http://localhost/shopzy/user/index.php](http://localhost/shopzy/user/index.php)
   - Admin side: [http://localhost/shopzy/admin/](http://localhost/shopzy/admin/)

---

##  Testing

- Add products and categories from the admin panel.
- Try adding products to cart from the user side.
- Place an order and check the invoice.
- Test the PDF invoice download and rendering.

---

##  License

This project is for educational purposes and personal use only. Not intended for commercial deployment without further enhancements.



