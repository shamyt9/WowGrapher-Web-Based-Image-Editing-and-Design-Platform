# Wow Grapher

A web-based image editing and design platform built with PHP, JavaScript, HTML, and CSS.

This repository is organized so that all application source files are inside the folder below:

- `wow grapher/`

The root folder now contains project metadata and assets (for example this README and screenshots), while the runnable app is inside `wow grapher/`.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Core Features](#core-features)
3. [Technology Stack](#technology-stack)
4. [Repository Structure](#repository-structure)
5. [Getting Started (Local Setup)](#getting-started-local-setup)
6. [Configuration](#configuration)
7. [How to Run](#how-to-run)
8. [Admin Panel](#admin-panel)
9. [Key Modules](#key-modules)
10. [Troubleshooting](#troubleshooting)
11. [Security Notes](#security-notes)
12. [Contributing](#contributing)
13. [License](#license)

## Project Overview

Wow Grapher provides multiple browser-based design and image utility tools in a single platform. The project includes:

- User authentication and profile management
- Template gallery and content management
- Text and design tools
- Image utilities such as compression, resizing, enhancement, and background erasing workflows
- Admin dashboard and management pages

## Core Features

- Authentication: signup, login, OTP/email verification flows
- User profile management
- Template and gallery browsing
- Online text and content editors
- Utility pages:
    - Image compressor
    - Image enhancer
    - Gradient and text design tools
    - Resizer and result workflows
- Admin module for managing content and platform data

## Technology Stack

- Backend: PHP
- Frontend: HTML, CSS, JavaScript
- Database: MySQL (or compatible MariaDB)
- Libraries/Packages:
    - Composer `vendor/` dependencies
    - TinyMCE (bundled in admin area)

## Repository Structure

```text
WowGrapher-Web-Based-Image-Editing-and-Design-Platform/
├─ .git/
├─ .notebook/
├─ screenshort.png
├─ README.md            # Root documentation (this file)
└─ wow grapher/         # Main application source
   ├─ index.php
   ├─ about.php
   ├─ create.php
   ├─ wordEditor.php
   ├─ wowGradient.php
   ├─ wowResizer.php
   ├─ WowText.php
   ├─ Admin/
   ├─ backendCode/
   ├─ css/
   ├─ Data Manipulation/
   ├─ include/
   ├─ jscode/
   ├─ vendor/
   └─ ...
```

## Getting Started (Local Setup)

### Prerequisites

- PHP 7.4+ (PHP 8.x recommended)
- MySQL/MariaDB
- Apache or Nginx
- Composer (optional if dependencies already installed)
- XAMPP/WAMP/LAMP is fine for quick local setup

### 1. Clone the repository

```bash
git clone https://github.com/shamyt9/WowGrapher-Web-Based-Image-Editing-and-Design-Platform.git
cd WowGrapher-Web-Based-Image-Editing-and-Design-Platform
```

### 2. Place in your web server root

Example for XAMPP (Windows):

- Copy the full repository folder into `htdocs`

### 3. Configure database connection

Update DB credentials in:

- `wow grapher/include/connection.php`

Typical settings to verify:

- host
- database name
- username
- password

### 4. Import database schema

If your project includes an SQL dump, import it into MySQL using phpMyAdmin or CLI.

If no SQL dump is available, create required tables according to the app queries before running the project.

### 5. Install Composer dependencies (if needed)

Run from inside `wow grapher/`:

```bash
composer install
```

## Configuration

- Base URL and asset paths should match your local server path.
- Ensure file/folder permissions allow uploads and generated outputs where needed.
- Verify mail/OTP related settings if email verification is enabled.

## How to Run

After setup, open the app in your browser.

Example local URL:

```text
http://localhost/WowGrapher-Web-Based-Image-Editing-and-Design-Platform/wow%20grapher/
```

Start from:

- `index.php` for main user flow
- `userlogin.php` for login page

## Admin Panel

Admin module location:

- `wow grapher/Admin/`

Possible entry points:

- `adminloginform.php`
- `admin.php` (post-authenticated area)

Use seeded/admin credentials from your database setup.

## Key Modules

- Public Pages: `index.php`, `about.php`, `gallery.php`, `guide.php`
- Account Flow: `savesignup.php`, `saveuserlogin.php`, `verify_otp.php`, `profile.php`
- Editors/Tools: `wordEditor.php`, `WowText.php`, `wowGradient.php`, `wowResizer.php`
- Utilities: `Imagecompress.php`, `imageEnhancer.php`, `bgeraser.php`
- Shared Includes: `include/header.php`, `include/footer.php`, `include/connection.php`
- Admin Operations: files under `Admin/` and `Data Manipulation/`

## Troubleshooting

- Blank page or errors:
    - Enable PHP error reporting in development.
    - Check web server and PHP logs.
- DB connection issues:
    - Recheck credentials in `include/connection.php`.
    - Confirm MySQL service is running.
- Missing dependencies:
    - Run `composer install` in `wow grapher/`.
- Asset path issues after folder move:
    - Verify relative paths in PHP/HTML/CSS/JS files.

## Security Notes

Before production use, review and harden:

- Input validation and output escaping
- SQL injection protection (prepared statements)
- Session and cookie security settings
- File upload validation and storage rules
- Secrets management (do not hardcode credentials)

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Open a pull request with a clear description

## License

No explicit license file is currently present in the repository root.

If you want this project to be open source, add a license file (for example MIT) and update this section.
