<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


---

# JALT - Web Engineering Project


## 📌 Project Overview
**JALT** is a web application developed as part of the ##Web Engineering Lab . Built on the **Laravel** framework, this project focuses on implementing robust backend logic, expressive syntax, and modern web development practices.

## 🛠️ Tech Stack
*   **Framework:** Laravel 13
*   **Language:** PHP
*   **Frontend:** Blade Templating / Vite
*   **Database:** MySQL (Supported via Eloquent ORM)
*   **Environment:** PHP 8.2+

## 🚀 Getting Started

To get a local copy up and running, follow these steps:

### 1. Clone the repository
```bash
git clone https://github.com/Fahad133674/JALT.git
cd JALT
```

### 2. Install dependencies
Setup PHP then install composer
```bash
composer install

```

### 3. Environment Configuration
import the given jalt.sql in you database then do the next
Copy the example environment file and generate an application key:

```bash

php artisan key:generate
```

### 4. Database Setup
Configure your `.env` file with your local database credentials, then run:
```bash
php artisan migrate
```

### 5. Run the Server
```bash
php artisan serve
```

## 📂 Project Structure
*   `app/Http/Controllers` - Logic for handling requests.
*   `routes/web.php` - Main application routes.
*   `resources/views` - Frontend Blade templates.
*   `database/migrations` - Database schema definitions.

---
