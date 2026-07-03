# 🎲 Sam Cases — Personal Portfolio

> A polished, interactive developer portfolio with a secure MVC admin dashboard for managing projects.

[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-MariaDB_10.4+-4479A1?style=flat&logo=mysql&logoColor=white)](https://mariadb.org/)
[![PSR-12](https://img.shields.io/badge/Code_Style-PSR--12-orange?style=flat)](https://www.php-fig.org/psr/psr-12/)
[![PHPStan](https://img.shields.io/badge/PHPStan-Level_5-blue?style=flat)](https://phpstan.org/)

---

## Table of Contents

- [Overview](#overview)
- [Project Structure](#project-structure)
- [Technology Stack](#technology-stack)
- [Getting Started](#getting-started)
- [Environment Configuration](#environment-configuration)
- [Running the App](#running-the-app)
- [Verification Suite](#verification-suite)
- [Database](#database)
- [Architecture](#architecture)
- [Contributing & AI Rules](#contributing--ai-rules)

---

## Overview

Sam Cases' personal portfolio site. The public-facing site showcases projects, skills, and experience with smooth micro-animations and an interactive 3D dice hero component. A password-protected admin dashboard allows full CRUD management of portfolio projects.

**Design goals:**
- Warm, tactile, minimalist aesthetic with a custom amber/cream color palette
- Responsive across desktop, tablet, and mobile
- Dark mode support via CSS custom properties
- Accessible (WCAG AA contrast ratios, semantic HTML)

---

## Project Structure

```
myPortfolio/
├── assets/                     # Frontend static assets
│   ├── css/                    # Modular stylesheets
│   │   ├── style.css           # Design system & CSS variables
│   │   ├── responsive.css      # All media queries
│   │   ├── animations.css      # Page transitions & ScrollReveal
│   │   ├── portfolio.css       # Portfolio section styles
│   │   └── ...
│   ├── images/                 # Static image assets
│   └── js/                     # Vanilla ES6+ JavaScript modules
│       ├── dark-mode.js        # Theme toggle logic
│       ├── myPortDice.js       # Interactive 3D dice hero
│       └── ...
├── config/                     # Server configuration layer
│   ├── Database.php            # PDO connection class (App\Config\Database)
│   ├── config.php              # Reads credentials from .env
│   └── init.php                # App bootstrap (session, BASE_URL, autoloader)
├── src/                        # PSR-4 autoloaded application classes (App\)
│   ├── Controllers/
│   │   ├── AuthController.php  # Login, logout, session management
│   │   └── ProjectController.php # Project CRUD operations & file uploads
│   ├── Middleware/
│   │   └── AuthMiddleware.php  # Session guard for admin routes
│   └── Models/
│       ├── Project.php         # Queries against `projectmain_db`
│       └── User.php            # Queries against `user_form`
├── views/                      # PHP/HTML presentation templates
│   ├── layouts/                # Shared header & footer partials
│   └── admin/                  # Admin dashboard templates
├── uploads/                    # User-uploaded project screenshots
├── .env                        # ⚠️ Local credentials — never commit
├── composer.json               # Dependency manifest & PSR-4 autoload map
├── phpstan.neon                # PHPStan static analysis config
├── phpstan-bootstrap.php       # PHPStan runtime constant stubs
├── verify.ps1                  # Windows verification suite (PowerShell)
├── verify.sh                   # CI/Bash verification suite
├── index.php                   # Public front-controller
├── admin.php                   # Admin front-controller
└── SOURCE_OF_TRUTH.md          # Authoritative architecture reference
```

---

## Technology Stack

| Layer | Technology |
|---|---|
| **Language** | PHP 8.2+ |
| **Database** | MySQL / MariaDB 10.4+ |
| **Local Server** | XAMPP Apache (port `8080`) |
| **Dependency Manager** | Composer (PSR-4 autoloading) |
| **Database Adapter** | PDO (prepared statements only) |
| **Frontend** | Vanilla HTML5, CSS3, ES6+ JavaScript |
| **Fonts** | Google Fonts — Montserrat Alternates, Jost |
| **JS Libraries** | Swiper JS, ScrollReveal |

### Dev Toolchain

| Tool | Purpose | Command |
|---|---|---|
| PHP CodeSniffer | PSR-12 style linting | `vendor/bin/phpcs` |
| PHPStan | Static analysis (level 5) | `vendor/bin/phpstan` |
| PHPUnit | Unit testing | `vendor/bin/phpunit` |

---

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) with PHP 8.2+ and MySQL/MariaDB
- [Composer](https://getcomposer.org/) installed globally
- Git Bash or PowerShell

### 1. Clone the repository

```bash
git clone <repo-url> C:/xampp/htdocs/myPortfolio
cd C:/xampp/htdocs/myPortfolio
```

### 2. Install PHP dependencies

```bash
composer install
```

> **Note:** Ensure `extension=zip` is enabled in `C:\xampp\php\php.ini` before running Composer.

### 3. Set up environment variables

```bash
cp .env.example .env
```

Then edit `.env` with your local database credentials (see [Environment Configuration](#environment-configuration)).

### 4. Import the database

```bash
# In phpMyAdmin or MySQL CLI:
CREATE DATABASE project2_db;
USE project2_db;
SOURCE projectmain_db.sql;
SOURCE user_db.sql;
```

### 5. Start XAMPP

Start **Apache** and **MySQL** from the XAMPP Control Panel.

> **Port note:** Local Apache runs on port `8080` to avoid conflicts. Site is available at:
> `http://localhost:8080/myPortfolio/`

---

## Environment Configuration

Create a `.env` file in the project root. This file is **never committed** to version control.

```ini
DB_HOST=localhost
DB_PORT=3306
DB_NAME=project2_db
DB_USER=root
DB_PASS=
```

`config/config.php` reads this file and provides credentials to the rest of the application. **Never hardcode credentials anywhere else.**

---

## Running the App

| URL | Description |
|---|---|
| `http://localhost:8080/myPortfolio/` | Public portfolio site |
| `http://localhost:8080/myPortfolio/admin.php` | Admin dashboard (login required) |

---

## Verification Suite

Run the full quality check before every commit:

```powershell
# Windows (PowerShell)
.\verify.ps1

# CI / Git Bash
./verify.sh
```

The suite runs **5 stages in sequence**:

| # | Stage | Tool | Fails Build? |
|---|---|---|---|
| 1 | Environment check | `.env` presence | ✅ Yes |
| 2 | PHP syntax check | `php -l` (all files) | ✅ Yes |
| 3 | Code style (PSR-12) | `phpcs --warning-severity=0` | ✅ Yes (errors only) |
| 4 | Static analysis | `phpstan` (level 5) | ✅ Yes |
| 5 | Unit tests | `phpunit` | ✅ Yes (when `tests/` exists) |

A clean run outputs:
```
==========================================
VERIFICATION SUCCESS: Ready for Commit!
==========================================
```

---

## Database

**Database name:** `project2_db`

### Tables

#### `projectmain_db` — Portfolio Projects
| Column | Type | Description |
|---|---|---|
| `id` | `INT UNSIGNED` | Auto-increment primary key |
| `title` | `VARCHAR(255)` | Project title |
| `category` | `VARCHAR(100)` | Project category |
| `description` | `TEXT` | Project description |
| `image` | `VARCHAR(255)` | Path to uploaded screenshot |
| `created_at` | `TIMESTAMP` | Auto-set on insert |

#### `user_form` — Admin Accounts
| Column | Type | Description |
|---|---|---|
| `id` | `INT UNSIGNED` | Auto-increment primary key |
| `name` | `VARCHAR(255)` | Admin display name |
| `email` | `VARCHAR(255)` | Login email (unique) |
| `password` | `VARCHAR(255)` | `password_hash()` bcrypt hash |

SQL schema files: [`projectmain_db.sql`](./projectmain_db.sql) · [`user_db.sql`](./user_db.sql)

---

## Architecture

The app follows a lightweight **MVC pattern** with Composer PSR-4 autoloading.

```
HTTP Request
     │
     ▼
index.php / admin.php          ← Front-controller (requires config/init.php)
     │
     ▼
App\Controllers\*              ← Validate input, coordinate models & views
     │                 │
     ▼                 ▼
App\Models\*       views/*     ← SQL queries (PDO)   HTML templates
     │
     ▼
App\Config\Database            ← Single PDO connection per request
     │
     ▼
MySQL (project2_db)
```

### Key Conventions

- **All DB queries** use PDO prepared statements. No string concatenation SQL.
- **All credentials** come from `.env` via `config/config.php`. Never hardcoded.
- **All output** is sanitized with `htmlspecialchars()` before rendering.
- **Passwords** are stored as `password_hash()` bcrypt hashes. Never plaintext.
- **Namespaces**: App classes → `App\`, DB infrastructure → `App\Config\`.

---

## Contributing & AI Rules

Before making changes:

1. **Read [`SOURCE_OF_TRUTH.md`](./SOURCE_OF_TRUTH.md)** — the canonical reference for architecture, coding standards, and design decisions.
2. **Read [`DESIGN.md`](./DESIGN.md)** — the definitive design system, color palette, and UI rules.
3. **Run `.\verify.ps1`** before every commit. All 5 stages must pass.
4. **No TailwindCSS** — styling uses only Vanilla CSS variables from `assets/css/style.css`.
5. **No `mysqli`** — use PDO via `App\Config\Database` exclusively.

---

*Last updated: 2026-07-03*
