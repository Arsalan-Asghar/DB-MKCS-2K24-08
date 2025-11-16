# DB-MKCS-2K24-08

Student Form Project

This repository contains a simple student registration form with:

- HTML form (`index.html`)
- PHP submission script (`submit.php`)
- MySQL database table `students` with 4 fields:
  - `name` (VARCHAR)
  - `roll_number` (VARCHAR)
  - `date_of_birth` (DATE)
  - `hobby` (VARCHAR)

---

## Setup Instructions

1. Install a local PHP + MySQL server (XAMPP, WAMP, or similar).
2. Create a MySQL database named `students_db`.
3. Create the table `students` with the fields listed above.
4. Update `submit.php` with your local database credentials:
   ```php
   $host = 'localhost';
   $db   = 'students_db';
   $user = 'YOUR_DB_USERNAME';
   $pass = 'YOUR_DB_PASSWORD';
