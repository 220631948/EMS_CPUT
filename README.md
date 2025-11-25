# EMS Transport Application

This web application allows students to register, log in, and view available transport to various hospitals. They can also accept a transport option, which will then be moved to an "Approved" section.

## Purpose

The main purpose of this application is to provide a simple and efficient way for students to manage their transport needs for hospital shifts.

## Setup

1.  **Database Setup:**
    *   Make sure you have a MySQL server running.
    *   Create a database named `ems_db`.
    *   Import the `ems_db.sql` and `transport.sql` files to set up the necessary tables and initial data.

2.  **Backend Setup:**
    *   Install Node.js and npm.
    *   Navigate to the project directory in your terminal.
    *   Run `npm install` to install the required dependencies:
        *   `express`
        *   `body-parser`
        *   `request`
    *   Run `node app.js` to start the server.

3.  **Frontend Setup:**
    *   Make sure you have a PHP server (like XAMPP or MAMP) running.
    *   Place all the project files in the `htdocs` folder of your PHP server.
    *   Open your web browser and navigate to `http://localhost/<project-folder-name>/registration.html` to get started.

## Usage

1.  **Registration:**
    *   New users can register by filling out the registration form on `registration.html`.
    *   The form includes fields for first name, last name, student email, phone number, and password.
    *   Upon successful registration, the user is redirected to the login page.

2.  **Login:**
    *   Registered users can log in using their email and password on `login.html`.
    *   Upon successful login, the user is redirected to the `Transport-.php` page.

3.  **Transport Page:**
    *   The `Transport-.php` page displays a list of available transport options.
    *   Each option includes a title, description, and an "Accept" button.
    *   When a user clicks the "Accept" button, the selected transport option is moved to the `approved` table in the database.

4.  **Approved Page:**
    *   The `Approved.php` page displays the transport options that the user has accepted.

## Files

*   `Approved.php`: Displays the approved transport options.
*   `Home.html`: The home page of the application.
*   `Schedule.html`: The schedule page.
*   `Transport-.php`: Displays the available transport options.
*   `app.js`: The main backend file, which handles the server and form submissions.
*   `ems_db.sql`: The SQL file for the `registration` table.
*   `transport.sql`: The SQL file for the `transport` table.
*   `login.php`: The login page.
*   `process_form.php`: Handles the registration form submission.
*   `registration.html`: The registration page.
*   `server.php`: Handles the login form submission.
