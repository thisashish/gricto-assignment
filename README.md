# Laravel Location Management Application

## Objective
The objective of this project is to develop a Laravel application that authenticates users via phone number and OTP (One-Time Password) and provides a dashboard to manage location data.

## Task Details

### User Authentication
- Implement a user authentication system where users can register and log in using their phone number.
- Generate an OTP for verification and display it in the console (no need to send the OTP).
- Ensure secure handling of the OTP process.

### Dashboard Access
- Upon successful login, redirect users to a dashboard page.

### CRUD Operations
- Design and implement CRUD (Create, Read, Update, Delete) operations for managing 'States', 'Cities', and 'Pincodes' associated with 'Customers'.
- Utilize Laravel’s Eloquent ORM for database interactions.

## Technical Requirements
- Utilize Laravel’s built-in features for routing, controllers, and views.
- Ensure the application follows MVC (Model-View-Controller) architecture.
- Write clean, maintainable, and well-documented code.

## Getting Started
To run the project locally, follow these steps:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/thisashish/gricto-assignment
    ```
   
2. **Navigate to the project directory**:
    ```bash
    cd gricto-assignment
    ```
   
3. **Install dependencies**:
    ```bash
    composer install
    ```
   
4. **Set up your database configuration in the `.env` file**:
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=gricto-assignment
    DB_USERNAME=root
    DB_PASSWORD=
    ```
   
5. **Run migrations to create database tables**:
    ```bash
    php artisan migrate
    ```
   
6. **Serve the application**:
    ```bash
    php artisan serve
    ```
   
7. **Access the application in your browser** at [http://localhost:8000/register](http://localhost:8000/register)

Feel free to customize the project and explore its features!
