# Event Management System

This is a simple event management system web application built with PHP, HTML, CSS, and JavaScript. It allows users to register, log in, and view transport schedules. Administrators can approve transport requests.

## Setup

1.  **Database:**
    *   Create a MySQL database named `ems_db`.
    *   Import the `ems_db.sql` file to set up the necessary tables.

2.  **Web Server:**
    *   Place the project files in the root directory of your web server (e.g., Apache, Nginx).
    *   Ensure the server has PHP installed and the MySQLi extension is enabled.

## Usage

*   **Registration:**
    *   Navigate to `registration.html` to create a new user account.

*   **Login:**
    *   Navigate to `login.html` to log in.

*   **Transport:**
    *   After logging in, you will be redirected to `Transport-.php`, where you can view available transport options.
    *   Administrators can approve transport requests from this page.

*   **Approved Transport:**
    *   `Approved.php` displays the list of approved transport requests.
