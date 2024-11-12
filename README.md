![image](https://github.com/user-attachments/assets/82066cba-054a-462f-963b-6955cdc60321)
# FindYourMechanic

FindYourMechanic is a web application that helps users find nearby vehicle mechanics in case of a vehicle breakdown. The application supports three levels of access: Admin, Mechanic, and Customer. 

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Database Structure](#database-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

### Admin
- Manage users (customers and mechanics)
- View, approve, and manage appointments
- View and manage registered mechanics and vehicles
- Dashboard overview with quick stats

### Mechanic
- Register and update mechanic profile
- View and manage customer appointments
- Update status of appointments

### Customer
- Register and login
- Add, update, and view vehicles
- Search for mechanics nearby
- Book appointments with mechanics
- View and manage upcoming and past appointments
- Update account settings and profile picture

## Technologies Used
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Styling:** Custom CSS, no frameworks used
- **Payment Integration:** Simple payment system
- **Hosting:** Local or web server with PHP support

## Database Structure

The application uses a MySQL database with the following main tables:

1. **users** - Stores user information (admin, mechanics, customers)
2. **mechanics** - Stores information about registered mechanics
3. **vehicles** - Stores information about registered vehicles
4. **appointments** - Stores appointment details between customers and mechanics
5. **payments** - Stores payment information for appointments

You can find the complete SQL script in the `database/` directory.

## Installation

### Prerequisites
- PHP (>= 7.4)
- MySQL
- Web server (Apache, Nginx, or XAMPP)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/findyourmechanic.git
   ```
2. Import the database:
   - Create a MySQL database (e.g., `findyourmechanic_db`).
   - Import the SQL file located in `database/findyourmechanic.sql`.

3. Configure the database connection:
   - Update `db_config.php` with your MySQL database credentials.
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "findyourmechanic_db";
   ```

4. Start your local server and open the application in your browser:
   ```
   http://localhost/findyourmechanic/
   ```

## Usage

### Admin Login
- URL: `/admin/`
- Use default credentials or create an admin user in the database.

### Customer Login
- URL: `/customer/`
- Customers can register, add vehicles, and book appointments.

### Mechanic Login
- URL: `/mechanic/`
- Mechanics can register and manage their profiles and appointments.

### Key Pages
- **Homepage:** Displays the introduction and allows users to log in or register.
- **Dashboard:** Provides users with relevant information and options based on their role.
- **Appointment Management:** Customers can book, view, and update appointments.
- **Mechanic Search:** Allows customers to find nearby mechanics.

## Contributing

We welcome contributions to enhance the functionality and UI of FindYourMechanic. Please follow the steps below to contribute:

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your feature description"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or support, please contact:

** Group 11 - Group Members**
**SE/2021/001 - Isuru Ranasundara**
**SE/2021/023 - Aswini Parameswaran**
**SE/2021/027 - Ishara Dhanushan**  
**SE/2021/045 - Gobinath E.**


- GitHub: [@yourusername](https://github.com/yourusername)
- Email: your-email@example.com
