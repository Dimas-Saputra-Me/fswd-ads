<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project
<p align="justify">This project, developed on behalf of ADS Digital Partner - Internship Selection, is a robust web-based employee management system crafted using the Laravel framework and AdminLTE template.</p>

<p align="justify">It provides an intuitive interface for organizations to efficiently handle employee data, offering functionalities like adding, editing, and deleting records. Additionally, it features an integrated leave management system, enabling employees to request and manage their time off. With a commitment to best practices and a focus on user experience, this project represents a valuable tool for organizations aiming for an organized and streamlined approach to human resource management.</p>

## Installation Guide
Before you begin, make sure you have Laravel installed on your machine.

1. Clone the repository:
   ```bash
   git clone https://github.com/Dimas-Saputra-Me/fswd-ads.git
   ```
2. Navigate to the project directory
    ```bash
    cd fswd-ads
    ```
3. Setup the `.env` file by duplicating `.env.example`
    ```bash
    cp .env.example .env
    ```
4. Update the .env file with your database credentials and other necessary configurations.
5. Run database migrations and seed the database
    ```bash
    php artisan migrate:fresh --seed
    ```
6. Start the Laravel server
    ```bash
    php artisan serve
    ```
7. Open your browser and visit `http://localhost:{PORT}` to access the application.
</br>
</br>
Feel free to customize the instructions based on your specific setup and requirements.