# Single Source of Truth: Sam Cases Portfolio

This document serves as the definitive, authoritative reference for the Sam Cases personal portfolio project. All future development, architectural decisions, and AI-generated code must adhere strictly to the guidelines, standards, and rules defined herein.

---

## Table of Contents
1. [Project Overview](#1-project-overview)
2. [Architecture](#2-architecture)
3. [Technology Stack](#3-technology-stack)
4. [Coding Standards](#4-coding-standards)
5. [Development Rules](#5-development-rules)
6. [Framework-Specific Conventions](#6-framework-specific-conventions)
7. [Database Standards](#7-database-standards)
8. [API & Endpoint Standards](#8-api--endpoint-standards)
9. [Security Guidelines](#9-security-guidelines)
10. [Performance Guidelines](#10-performance-guidelines)
11. [Testing Standards](#11-testing-standards)
12. [Accuracy & Quality Standards](#12-accuracy--quality-standards)
13. [Decision Log](#13-decision-log)
14. [Common Patterns](#14-common-patterns)
15. [Things to Avoid](#15-things-to-avoid)
16. [AI Development Rules](#16-ai-development-rules)

---

## 1. Project Overview
* **Purpose**: To showcase Sam Cases' work, experience, skills, and resume in a polished, responsive, and interactive format that encourages professional contact and evaluates technical capabilities.
* **Creative Goal**: Establish a playful, tactile, and minimalist design interface with smooth micro-interactions (e.g., the interactive 3D hero dice) and a robust dark mode implementation.
* **Target Audience**: Technical recruiters, potential employers, and clients checking design/code capabilities.

---

## 2. Architecture
The project is built as a single-page frontend client with a secure, MVC-patterned administrator dashboard for managing portfolio projects. All PHP logic follows PSR-4 autoloading via Composer with the `App\` namespace rooted at `src/`.

```
myPortfolio/
├── .agents/                    # Agent guidelines and configuration
├── assets/                     # Frontend static assets
│   ├── css/                    # Modular stylesheet layout
│   ├── images/                 # Image assets
│   └── js/                     # Modular JavaScript logic
├── config/                     # Configuration and initialization
│   ├── Database.php            # PDO connection class (namespace App\Config)
│   ├── config.php              # SSOT config — loads credentials from .env
│   └── init.php                # Bootstrap: session, BASE_URL, autoloader
├── src/                        # PSR-4 autoloaded application classes (App\)
│   ├── Controllers/            # Request handlers
│   │   ├── AuthController.php  # Login / logout / session logic
│   │   └── ProjectController.php # Project CRUD operations
│   ├── Middleware/
│   │   └── AuthMiddleware.php  # Guards admin-only routes
│   └── Models/
│       ├── Project.php         # projectmain_db queries
│       └── User.php            # user_form queries
├── views/                      # Presentation templates
│   ├── layouts/                # Shared header/footer partials
│   └── admin/                  # Admin dashboard templates
├── uploads/                    # Uploaded project screenshots
├── vendor/                     # Composer dependencies (do not commit)
├── .env                        # Environment credentials (do not commit)
├── composer.json               # Dependency manifest & PSR-4 autoload map
├── phpstan.neon                # PHPStan static analysis configuration
├── phpstan-bootstrap.php       # PHPStan runtime constant stubs
├── verify.ps1                  # PowerShell verification suite (Windows)
├── verify.sh                   # Bash verification suite (Git Bash / CI)
├── index.php                   # Public front-controller
├── admin.php                   # Admin front-controller
└── SOURCE_OF_TRUTH.md          # This file
```

* **Client-Side**: Pure HTML5, Modular CSS, and Vanilla JavaScript. Dynamic interactive components are decoupled and loaded in parallel.
* **Server-Side**: Object-Oriented PHP with PSR-4 namespacing (`App\`). Handles page rendering, database communication, file uploading, session management, and authentication.
* **Configuration Layer**: Environment-aware via `.env` file. `config/config.php` is the single source of truth for all credentials. `config/init.php` bootstraps the session, `BASE_URL`, and Composer autoloader.

---

## 3. Technology Stack
* **Language Runtime**: PHP 8.2+
* **Database Engine**: MySQL / MariaDB (10.4+)
* **Local Web Server**: Apache (running on Port `8080` locally to bypass port conflicts)
* **Dependency Manager**: Composer (PSR-4 autoloading; `App\` → `src/`)
* **Database Adapter**: `PDO` (PHP Data Objects) exclusively. All queries use prepared statements via `App\Config\Database::connect()`.
  * > ⚠️ `mysqli` is no longer used. All legacy `mysqli` references should be replaced with the PDO wrapper.
* **Toolchain (Dev)**:
  * `squizlabs/php_codesniffer` — PSR-12 style linting (`vendor/bin/phpcs`)
  * `phpstan/phpstan` — Static analysis at level 5 (`vendor/bin/phpstan`)
  * `phpunit/phpunit` — Unit testing framework (`vendor/bin/phpunit`)
* **Verification**: Run `.\ verify.ps1` (Windows) or `./verify.sh` (CI/Bash) before every commit.
* **Typography (Google Fonts)**:
  * Display Headings: `'Montserrat Alternates', sans-serif`
  * Body Text: `'Jost', sans-serif`
* **External Integrations**: Swiper JS (for portfolio slides), ScrollReveal (for micro-animations).

---

## 4. Coding Standards

### HTML
* Always use semantic HTML5 elements (`<header>`, `<main>`, `<section>`, `<nav>`, `<article>`, `<footer>`).
* Ensure all interactive components have unique, descriptive `id` properties.
* Do not use inline styling (`style="..."`) or inline event handlers (`onclick="..."`). Use event listeners in JS instead.

### CSS (Design System Integration)
* All colors, rounded corners, spacing, and transition durations must refer to the variables in [style.css](file:///c:/xampp/htdocs/myPortfolio/assets/css/style.css):
  * **Primary Accent**: `--primary-color` (`#f2850d` light / `#fc931e` dark)
  * **Backgrounds**: `--bg-color` (`#faf6ed` light / `#181613` dark)
  * **Borders**: `--border-color` (`#cdbda4` light / `#46433c` dark)
  * **Shadows**: `--shadow-color` (`rgba(61, 48, 15, 0.2)` light / `rgba(2, 2, 2, 0.6)` dark)
  * **Corner Radius**: 8px (`sm`), 15px (`md` / Dice), 32px (`lg` / buttons)
* Use media queries exclusively in [responsive.css](file:///c:/xampp/htdocs/myPortfolio/assets/css/responsive.css).
* Keep styling modular: separate core styles (`style.css`), sections (`portfolio.css`, `resume.css`, etc.), and page transitions (`animations.css`).
* Respect screen-motion sensitivity using media queries:
  ```css
  @media (prefers-reduced-motion: reduce) {
      /* Disable heavy 3D transforms / transitions */
  }
  ```

### JavaScript
* Write clean, modern ES6+ JavaScript. Use `const` or `let`—never `var`.
* Structure functionality into modular files (e.g., [myPortDice.js](file:///c:/xampp/htdocs/myPortfolio/assets/js/myPortDice.js)).
* Use camelCase for variables, function names, and DOM selectors.

### PHP
* Always use standard PHP tags (`<?php ... ?>`). Do not use short tags (`<? ... ?>`).
* Class names must use PascalCase (e.g. `Database`, `ProjectController`).
* Methods and properties must use camelCase (e.g. `connect()`, `getAllProjects()`).
* Document all class methods with brief, descriptive comments.

---

## 5. Development Rules
* **No Duplicate Logic (DRY)**: Centralize repeating tasks. Database connection logic lives exclusively in `App\Config\Database`. Config credentials live exclusively in `config/config.php` (loaded from `.env`).
* **Separation of Concerns**: Keep HTML markup in Views (`views/`), database queries in Models (`src/Models/`), and routing/validation/file handling in Controllers (`src/Controllers/`).
* **Immutability (ECC rule)**: When manipulating data, return newly instantiated objects/arrays rather than mutating input structures.
* **Namespace Convention**: All application classes must be under the `App\` namespace and stored in `src/`. Infrastructure classes (e.g. `Database`) live in `App\Config\` within `config/`.
* **Environment Variables**: Never hardcode credentials. Read all database connection details from `.env` via `config/config.php`. The `.env` file must never be committed to version control.
* **Verify Before Commit**: Run `.\ verify.ps1` and confirm `VERIFICATION SUCCESS` before pushing any changes.

---

## 6. Framework-Specific Conventions (PHP MVC)
All MVC classes are under the `App\` PSR-4 namespace and autoloaded via Composer. Follow these conventions:

* **Front Controllers** (`index.php`, `admin.php`): Bootstrap the app by requiring `config/init.php`, then instantiate the appropriate controller and call its action method.
* **Controllers** (`src/Controllers/`): Receive input via `$_POST`/`$_GET`, validate input, delegate to Models, then load view templates. Must not contain raw SQL.
* **Models** (`src/Models/`): Instantiate `App\Config\Database` in their constructor and store the PDO connection. Execute **prepared statements only**. Return plain associative arrays.
* **Middleware** (`src/Middleware/`): Stateless guards called before controller actions. `AuthMiddleware::requireLogin()` checks `$_SESSION` and redirects to login if unauthenticated.
* **Views** (`views/`): Pure PHP/HTML presentation templates. All variables must be injected by the controller before including the view. Views must not instantiate classes or execute queries.

---

## 7. Database Standards

### Databases
* Local Development DB: `project2_db`
* Production DB: `project2_db` (hosted on Wasmer MySQL)

### Table Schemas

#### 1. `projectmain_db` (Portfolio Projects)
* Stores project display details, descriptions, categories, and screenshot locations.
```sql
CREATE TABLE `projectmain_db` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

#### 2. `user_form` (Admin Accounts)
* Stores credentials for administrators authorized to modify the portfolio content.
```sql
CREATE TABLE `user_form` (
  `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### Querying Rules
* **Prepared Statements Only**: All database operations must utilize prepared statements with bound parameters.
* **Connection Reuse**: Avoid establishing multiple connection instances per request. Connect once per page load via `Database::connect()`.

---

## 8. API & Endpoint Standards
* **Request Format**: Form submissions must use the `POST` method.
* **AJAX Response Format**: Endpoints returning responses to client-side scripts must respond with JSON and a standardized structure:
  ```json
  {
    "success": true,
    "data": { ... },
    "message": "Action completed successfully"
  }
  ```
* **Validation Failure Envelope**:
  ```json
  {
    "success": false,
    "errors": {
      "field_name": "Validation error message"
    }
  }
  ```

---

## 9. Security Guidelines
* **SQL Injection Prevention**: Never construct SQL queries by string concatenation. Use placeholders (`?` or `:name`) with bound parameters.
* **XSS Prevention**: Sanitize all database values output in HTML views using:
  ```php
  htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
  ```
* **Password Security**: Never store cleartext passwords. Always hash passwords using PHP's native `password_hash($password, PASSWORD_DEFAULT)` and verify them using `password_verify()`.
* **Upload Security**:
  * Verify file uploads are valid images (limit MIME types: `image/png`, `image/jpeg`, `image/webp`).
  * Enforce size limits (max 5MB).
  * Generate randomized or sanitized filenames before saving to the server to prevent directory traversal and overwrite attacks.
* **Secrets Management**: Never commit cleartext database credentials directly to repository logic. Use environment detection checks in [Database.php](file:///c:/xampp/htdocs/myPortfolio/config/Database.php) to segregate local and remote credentials.

---

## 10. Performance Guidelines
* **Avoid `SELECT *`**: Explicitly declare columns in database queries (e.g. `SELECT id, title, category FROM projectmain_db`).
* **Image Optimization**: Ensure uploaded project images are resized and compressed on upload before saving to the `/uploads/` directory.
* **Resource Optimization**: 
  * Combine modular stylesheet includes in production where possible.
  * Load heavy JavaScript libraries using `defer` or inject them at the footer of the document.
* **Lazy Loading**: Set `loading="lazy"` on all portfolio project images and thumbnails.

---

## 11. Testing Standards

### Automated Verification Suite
Run the full suite with one command before every commit:
```powershell
.\ verify.ps1        # Windows (PowerShell)
./verify.sh          # CI / Git Bash
```

The suite runs these five stages in order:

| # | Stage | Tool | Blocks Commit? |
|---|---|---|---|
| 1 | Environment check | `.env` presence | ✅ Yes |
| 2 | PHP syntax check | `php -l` (all files) | ✅ Yes |
| 3 | Code style (PSR-12) | `phpcs --warning-severity=0` | ✅ Yes (errors only) |
| 4 | Static analysis | `phpstan` (level 5, `phpstan.neon`) | ✅ Yes |
| 5 | Unit tests | `phpunit` (skips if `tests/` absent) | ✅ Yes (when tests exist) |

### PHPStan Configuration
* Config file: `phpstan.neon` (level 5, scans `src/` and `config/`)
* Bootstrap: `phpstan-bootstrap.php` — declares runtime constants (`BASE_URL`) for static analysis

### Unit Tests
* Framework: PHPUnit (installed via Composer dev dependency)
* Test directory: `tests/` (does not exist yet — skipped gracefully until created)
* Target coverage: **≥ 80%** before any feature is considered complete

### Manual Verification
* Before completing any task, verify page rendering across desktop, tablet, and mobile viewports.
* Check for PHP errors/warnings in browser and Apache error log.

---

## 12. Accuracy & Quality Standards
A feature is considered complete only when:
1. It is fully functional in both the local environment and matches production credentials logic.
2. It passes HTML/CSS validation with no layout shifting.
3. Contrast ratios meet WCAG AA standards (≥4.5:1 for body copy).
4. No console errors are triggered in JavaScript, and no PHP errors/warnings are printed to the page or logs.

---

## 13. Decision Log
* **2026-07-03 | Apache Port Configuration (8080)**:
  * *Context*: Apache failed to start locally due to a port conflict on default port `80`.
  * *Diagnosis*: Conflicting service `bio-apache0` was running on port 80 (biometric timekeeping software).
  * *Action*: Adjusted local Apache config in `httpd.conf` to bind to port `8080`; `ServerName localhost:8080`.
  * *Outcome*: XAMPP Apache starts successfully. Site accessible at `http://localhost:8080/myPortfolio/`.

* **2026-07-03 | MVC Refactor + Composer PSR-4 Autoloading**:
  * *Context*: Codebase had duplicated database connections, inline credentials, and no autoloading.
  * *Action*: Introduced `composer.json` with PSR-4 mapping (`App\` → `src/`). Moved all classes into `src/Controllers/`, `src/Models/`, `src/Middleware/`. Credentials moved to `.env` loaded by `config/config.php`.
  * *Outcome*: Single `require 'config/init.php'` bootstraps the entire application.

* **2026-07-03 | `App\Config` Namespace for `Database.php`**:
  * *Context*: PHPCS PSR-12 requires all classes to be in a namespace.
  * *Action*: Added `namespace App\Config;` + `use PDO; use PDOException;` to `config/Database.php`.
  * *Outcome*: `Database` is now instantiated as `new \App\Config\Database()` in all models.

* **2026-07-03 | PHPStan `phpstan.neon` + Bootstrap Stub**:
  * *Context*: PHPStan could not resolve the `BASE_URL` runtime constant (defined in `init.php` at request time), causing 18 false-positive errors.
  * *Action*: Created `phpstan.neon` (level 5) and `phpstan-bootstrap.php` that declares `BASE_URL` as a stub constant.
  * *Outcome*: PHPStan reports `[OK] No errors` across all 8 scanned files.

* **2026-07-03 | PHPCS `--warning-severity=0` Flag**:
  * *Context*: Bootstrap files (`config.php`, `init.php`) mix class declarations and side-effects — a structural limitation of PHP bootstrap files that PHPCS warns about but cannot auto-fix.
  * *Decision*: Suppress warnings in `verify.ps1`/`verify.sh` via `--warning-severity=0`. Only hard errors block the build.
  * *Outcome*: Style check stage passes cleanly.

---

## 14. Common Patterns

### Instantiating a Model (from a Controller)
```php
use App\Models\Project;

$projectModel = new Project();
$projects = $projectModel->all();
```

### PDO Query Pattern (inside a Model)
```php
// In src/Models/Project.php
public function all(): array
{
    $columns = 'id, title, category, description, image, created_at';
    $sql = "SELECT {$columns} FROM {$this->table} ORDER BY created_at DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```

### Database Connection (inside Model constructor)
```php
// In any src/Models/*.php
public function __construct()
{
    $db = new \App\Config\Database();
    $this->conn = $db->connect();
}
```

### Application Bootstrap (front-controller)
```php
// index.php or admin.php
require_once __DIR__ . '/config/init.php';

use App\Controllers\ProjectController;

$controller = new ProjectController();
$controller->index();
```

### Secure HTML Rendering (XSS Protection)
```php
<?php foreach ($projects as $project): ?>
  <h3><?php echo htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
  <p><?php echo htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8'); ?></p>
<?php endforeach; ?>
```

---

## 15. Things to Avoid
* **AI Slop**: Do not generate generic SaaS layout templates. Ensure all containers maintain a max border radius of `16px` (except capsule buttons) and strictly use the customized warm-contrast color palette.
* **Direct Instantiations in HTML / Views**: Never query the database or instantiate model classes inside view templates. All data must arrive pre-fetched from the controller.
* **Inline Credentials**: Never hardcode DB usernames, passwords, or host URLs. All credentials must come from `.env` via `config/config.php`.
* **`mysqli`**: Do not use `mysqli` for any new code. The canonical database adapter is PDO via `App\Config\Database`.
* **Bare `new Database()`**: Always use the fully-qualified class name: `new \App\Config\Database()`. The bare form will fail under namespaced contexts.
* **Committing `.env` or `vendor/`**: Both are excluded from version control. `.env` contains secrets; `vendor/` is regenerated via `composer install`.
* **Soft Shadows**: Avoid large, fuzzy drop shadows. Follow the *Hard-Edge Elevation Rule* (2px to 4px crisp shadows with low blur).
* **Skipping Verification**: Never push without running `.\ verify.ps1` to confirm all 5 stages pass.

---

## 16. AI Development Rules
* **Reference this Document**: Any AI assistant acting on this codebase must read `SOURCE_OF_TRUTH.md` and [DESIGN.md](file:///c:/xampp/htdocs/myPortfolio/DESIGN.md) before proposing or implementing changes.
* **Plan before Code**: Present an implementation plan (`implementation_plan.md`) and request approval for any multi-file feature addition or refactoring.
* **No TailwindCSS**: Styling must strictly use Vanilla CSS variables matching the design token variables in `style.css`.
* **Comments Preservation**: Never remove existing codebase comments, helper documentation, or docstrings unless specifically instructed.
