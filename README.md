# WowGrapher - Web-Based Image Editing and Design Platform

An all-in-one PHP + MySQL creative suite for editing images, designing templates, generating report cards, sharing gallery work, and managing content through an admin panel.

## Table of Contents

- [WowGrapher - Web-Based Image Editing and Design Platform](#wowgrapher---web-based-image-editing-and-design-platform)
    - [Table of Contents](#table-of-contents)
    - [Project Snapshot](#project-snapshot)
    - [Core Features](#core-features)
        - [User-Facing Modules](#user-facing-modules)
        - [Admin Modules](#admin-modules)
    - [Tech Stack](#tech-stack)
    - [Project Architecture](#project-architecture)
    - [Folder Structure](#folder-structure)
    - [Authentication and User Flow](#authentication-and-user-flow)
    - [Database Overview](#database-overview)
        - [Referenced Tables (from code)](#referenced-tables-from-code)
    - [Local Setup Guide](#local-setup-guide)
        - [Prerequisites](#prerequisites)
        - [Steps](#steps)
    - [How to Use](#how-to-use)
        - [User Side](#user-side)
        - [Admin Side](#admin-side)
    - [Admin Operations](#admin-operations)
    - [AJAX/Backend Endpoints](#ajaxbackend-endpoints)
    - [Known Issues and Security Notes](#known-issues-and-security-notes)
    - [Recommended Improvements](#recommended-improvements)
    - [License](#license)

## Project Snapshot

**WowGrapher** is a browser-based design platform that combines:

- A visual editor (drag/drop, layers, text, image styling)
- Utility tools (enhancer, background remover, compressor, resizer, gradient/text tools)
- Template browsing and search
- Community gallery with like/unlike
- OTP-based account verification
- Admin dashboard for managing templates and gallery media

The application is implemented as a classic PHP multi-page app with JavaScript-heavy front-end interactions.

## Core Features

### User-Facing Modules

- **Visual Design Editor** (`wordEditor.php`, `createIdCard.php`)
    - Layered editing
    - Text formatting controls
    - Image transforms, filters, shadow, blur, opacity
    - Undo support
- **Image Enhancer** (`imageEnhancer.php` + `jscode/enhancer.js`)
    - Brightness, contrast, saturation, blur, vignette, invert, opacity, rotation
    - Canvas-based export
- **Background Remover** (`bgeraser.php`)
    - Integrates remove.bg API from browser-side `fetch`
- **Image Compressor / Resizer / Gradient / Text Tools**
    - `Imagecompress.php`, `wowResizer.php`, `wowGradient.php`, `WowText.php`
- **Report Card Generator** (`result.php`)
    - Editable template with downloadable output
- **Template Explorer** (`templates.php`)
    - Orientation filter + live search via AJAX
- **Gallery** (`gallery.php`)
    - View public creations and like/unlike images
- **Profile and Feedback**
    - Profile image updates and user feedback submission

### Admin Modules

- Admin authentication (`Admin/adminloginform.php`, `Admin/saveadminlogin.php`)
- Dashboard metrics (`Admin/admin.php`)
- Template upload/update/delete
- Gallery image management
- Additional legacy content modules (books/category/publication)

## Tech Stack

- **Backend:** PHP (procedural style + partial prepared statements)
- **Database:** MySQL (via `mysqli`)
- **Frontend:** HTML, CSS, JavaScript, jQuery
- **UI Libraries:** Bootstrap, Font Awesome, RemixIcon, Swiper, MDB (Admin)
- **Editor/Utilities:** TinyMCE (Admin), Canvas API, Interact/jQuery UI (editor behavior)
- **External Service:** remove.bg API (background eraser)

## Project Architecture

```text
Browser
	-> PHP pages (routing + templating)
		-> include/header.php, include/footer.php, include/connection.php
		-> AJAX endpoints (backend.php, backendCode/*.php)
			-> MySQL database (idcardgenerator)
```

App style:

- Session-based authentication (`$_SESSION`)
- Multi-page rendering
- AJAX for dynamic sections (templates search/filter, gallery, likes)

## Folder Structure

```text
WowGrapher/
	Admin/                 # Admin dashboard, content forms, TinyMCE assets
	backendCode/           # AJAX handlers (template search/filter, likes, gallery output)
	Data Manipulation/     # CRUD screens for admin-managed data
	css/                   # Main stylesheets
	jscode/                # Front-end JS for editor/tools
	include/               # Shared includes (DB connection, header/footer, utilities)
	img/                   # Static assets and generated image resources
	backendimages/         # Uploaded template/gallery image storage
	vendor/                # Committed PHP vendor packages
	*.php                  # Main pages and feature entry points
```

## Authentication and User Flow

1. User opens `userlogin.php`.
2. Signup posts to `savesignup.php`.
3. OTP + activation code are created and mailed using `mail()`.
4. Verification completes in `verify_otp.php` and marks account as active.
5. Login posts to `saveuserlogin.php` and initializes session variables.
6. Protected pages check `$_SESSION['email']` and redirect unauthenticated users.

## Database Overview

Configured in `include/connection.php`:

- Host: `localhost`
- User: `root`
- Password: _(empty by default in code)_
- Database: `idcardgenerator`

### Referenced Tables (from code)

- `accounttable`
- `template`
- `gallery`
- `likes`
- `feedbacktable`
- `adminlogin`
- `book`
- `category`
- `publication`
- `author`

> Note: This repository does **not** include an SQL schema dump. You must create/import tables manually.

## Local Setup Guide

### Prerequisites

- PHP 7.4+ (PHP 8.x recommended)
- MySQL / MariaDB
- Apache (XAMPP/WAMP/LAMP or equivalent)

### Steps

1. Clone/download the repository.
2. Place project in your server web root.
    - Example (XAMPP): `htdocs/WowGrapher-Web-Based-Image-Editing-and-Design-Platform`
3. Create MySQL database:
    - `idcardgenerator`
4. Create/import all required tables listed above.
5. Update DB credentials in `WowGrapher/include/connection.php` if needed.
6. Ensure write permissions for upload folders:
    - `WowGrapher/backendimages/`
    - any image storage folders used by admin forms
7. Open in browser:
    - `http://localhost/WowGrapher-Web-Based-Image-Editing-and-Design-Platform/WowGrapher/userlogin.php`

## How to Use

### User Side

- Register and verify account (OTP)
- Login and open home page (`index.php`)
- Use **Tools** (`create.php`) for editor and image utilities
- Browse templates (`templates.php`) and open design flow
- Publish/view gallery content
- Submit feedback

### Admin Side

- Login via `WowGrapher/Admin/adminloginform.php`
- Use dashboard to:
    - add templates
    - add gallery images
    - review counts (templates/users/gallery)
    - manage records via Data Manipulation screens

## Admin Operations

Primary admin save handlers:

- `Admin/savetemplate.php`
- `Admin/saveGalleryImage.php`
- `Admin/savecategory.php`
- `Admin/savepublication.php`
- `Admin/savebook.php`

List/edit/delete screens are under:

- `Data Manipulation/`

## AJAX/Backend Endpoints

- `backend.php` - global template autocomplete suggestions
- `backendCode/templateRetrieve.php` - fetch templates by orientation
- `backendCode/templateLiveSearch.php` - template search output
- `backendCode/showGallery.php` - gallery + like state rendering
- `backendCode/likeImage.php` - like/unlike toggle

## Known Issues and Security Notes

This section is based on current implementation behavior in code.

1. **No schema file included**
    - Setup is manual and error-prone without SQL dump/migrations.
2. **Mixed query safety**
    - Some endpoints use prepared statements, others build raw SQL strings.
3. **No CSRF protection**
    - Forms and state-changing endpoints do not use CSRF tokens.
4. **File upload validation is minimal**
    - MIME/type/size validation is limited in several upload handlers.
5. **Hardcoded remove.bg API key in client-side JS/PHP page**
    - Secret exposure risk; should be moved server-side via environment variable.
6. **Session checks are repetitive and inconsistent**
    - Could be centralized into reusable middleware/include.
7. **Path casing inconsistencies**
    - Example: `CSS/...` and `css/...` are both used; this can break on Linux.

## Recommended Improvements

1. Add SQL migration or full dump (`database/schema.sql`).
2. Move all credentials/API keys to environment configuration.
3. Standardize prepared statements for all DB operations.
4. Add CSRF and stricter server-side validation.
5. Normalize folder name casing (`css` vs `CSS`).
6. Introduce a router/controller structure for maintainability.
7. Add automated tests for auth, template retrieval, and like toggle flows.

## License

No license file is currently included.

If you plan to open-source this project, add a `LICENSE` file (for example MIT or Apache-2.0).
