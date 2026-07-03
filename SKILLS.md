# Available Agent Skills and Slash Commands

This document lists the available agentic skills, workflows, and slash commands that you can use with Antigravity to build, debug, and review your portfolio website.

---

## 🚀 Frequently Used Slash Commands

Use these commands directly in the chat to trigger specialized workflows:

| Command | Purpose | When to Use |
| :--- | :--- | :--- |
| `/plan` | Restate requirements, assess risks, and create a step-by-step implementation plan. | Before starting any complex code changes. |
| `/goal` | Thinks thoroughly and runs until a long-running goal is fully achieved. | For complex, multi-step tasks. |
| `/code-review` | Run local code reviews or PR reviews using specialized agents. | Before committing or merging code. |
| `/grill-me` | Starts an interactive interview to align on design decisions and resolve ambiguities. | To discuss and refine system requirements. |
| `/learn` | Extract reusable patterns and learnings from the session. | When a solution or setup is successfully resolved. |
| `/save-session` | Save your current conversation and state. | To pause work and resume it later. |
| `/resume-session` | Restore the most recent saved session. | To pick up right where you left off. |
| `/security-scan` | Run security checks against agent, hook, and permission surfaces. | Before deploying code to production. |
| `/aside` | Answer a quick side question without losing context. | To ask questions during an active task. |

---

## 🎨 Highly Relevant Skills for This Portfolio Project

Since your portfolio is built using **PHP**, **HTML**, **CSS/JS**, and **MySQL**, these skills are the most relevant:

### 1. Frontend & Design Excellence
* **`impeccable`**: Design engineering, UI/UX audit, layouts, responsiveness, animations, typography, dark mode, and anti-patterns.
* **`make-interfaces-feel-better`**: Polish details (spacing, shadows, transitions, borders, and touch targets) to make interfaces feel premium.
* **`frontend-design-direction`**: Build custom, premium design systems with tailored color palettes instead of plain styles.
* **`motion-ui`**: Guidelines for implementing modern CSS/JS animations and smooth transitions.

### 2. Backend & Database Optimization
* **`backend-patterns`**: Server-side logic structure, caching, and PHP API route patterns.
* **`mysql-patterns`**: Database schema design, query indexing, transactions, and performance optimizations.
* **`database-migrations`**: Standard patterns for database schema updates and rollbacks.
* **`api-design`**: Building clean, RESTful API endpoints for backend communication.

### 3. Workflow & Code Quality
* **`tdd-workflow`**: Guidelines for test-driven development (write test first, implement minimal code, refactor).
* **`coding-standards`**: baseline naming conventions, readability, and clean code practices.
* **`error-handling`**: Robust error reporting, fallback states, and user-facing error boundaries.
* **`plankton-code-quality`**: Auto-formatting, linting, and write-time code quality enforcement.

---

## 📂 Complete List of Available Skills

Here is the full directory of skills available in the environment:

| Skill Name | Description |
| :--- | :--- |
| **`agent-introspection-debugging`** | Structured self-debugging workflow for AI agent failures. |
| **`agent-sort`** | Build an evidence-backed install plan for sorting agent resources. |
| **`ai-regression-testing`** | Regression testing strategies for AI-assisted development. |
| **`android-clean-architecture`** | Clean Architecture patterns for Android & Kotlin Multiplatform. |
| **`angular-developer`** | Reactivity, SSR, CLI tooling, and component generation in Angular. |
| **`api-design`** | REST API design patterns (naming, status codes, pagination, rate limiting). |
| **`backend-patterns`** | Backend architectures and optimizations (Node.js, Express, Next.js, PHP). |
| **`clickhouse-io`** | ClickHouse query optimization and analytical engineering. |
| **`code-tour`** | Walkthrough tours (`.tour` files) for onboarding and PRs. |
| **`coding-standards`** | Conventions for naming, readability, and code quality. |
| **`compose-multiplatform-patterns`** | Compose Multiplatform state management and UI performance. |
| **`configure-ecc`** | Installer and configuration helper for Everything Claude Code. |
| **`continuous-learning-v2`** | Instinct-based session learning for project and global scopes. |
| **`council`** | Structured disagreement framework to resolve design trade-offs. |
| **`cpp-coding-standards`** | C++ Core Guidelines and idioms for safe modern C++. |
| **`cpp-testing`** | GoogleTest configuration and test debugging. |
| **`csharp-testing`** | C# testing with xUnit, FluentAssertions, and mocking. |
| **`dart-flutter-patterns`** | Dart & Flutter Riverpod/BLoC, GoRouter, and clean architecture. |
| **`database-migrations`** | Migration best practices for zero-downtime database changes. |
| **`django-patterns`** | Django ORM, caching, middleware, and API design. |
| **`django-tdd`** | Django testing with pytest-django and DRF API testing. |
| **`django-verification`** | Verification loop (lint, migrate, test, security scan) for Django. |
| **`dotnet-patterns`** | Idiomatic C# dependency injection, async patterns, and best practices. |
| **`e2e-testing`** | Playwright E2E testing patterns, Page Object Model, and CI. |
| **`error-handling`** | Typed errors, boundaries, retries, and user-facing messages. |
| **`eval-harness`** | Evaluation framework for Claude Code sessions (EDD). |
| **`fastapi-patterns`** | FastAPI async endpoints, dependency injection, and Pydantic v2. |
| **`frontend-design-direction`** | Set custom aesthetic and premium UI design systems. |
| **`frontend-patterns`** | Modern frontend architectures (React, Next.js, state management). |
| **`frontend-slides`** | Create HTML slides and presentations with premium animations. |
| **`fsharp-testing`** | F# testing with FsCheck, xUnit, and property-based tests. |
| **`golang-patterns`** | Idiomatic Go concurrency patterns, interfaces, and architecture. |
| **`golang-testing`** | Table-driven testing, benchmarks, and fuzzing in Go. |
| **`hookify-rules`** | Syntax and patterns to build hookify trigger-based rules. |
| **`impeccable`** | Premium UI/UX design, visual hierarchy, motion, and accessibility. |
| **`iterative-retrieval`** | Progressive context retrieval patterns for subagents. |
| **`java-coding-standards`** | Conventions for Spring Boot and Quarkus. |
| **`jpa-patterns`** | Hibernate entity design, relationship optimizations, and caching. |
| **`kotlin-coroutines-flows`** | Structured concurrency, state flows, and testing. |
| **`kotlin-exposed-patterns`** | Exposed ORM DSL, DAO pattern, and migrations. |
| **`kotlin-ktor-patterns`** | Ktor routing, Koin DI, serialization, and WebSockets. |
| **`kotlin-patterns`** | Idiomatic Kotlin patterns and coroutine safety. |
| **`kotlin-testing`** | Kotest, MockK, and Kover coverage patterns. |
| **`laravel-patterns`** | Laravel Eloquent ORM, controllers, queues, and API resources. |
| **`laravel-plugin-discovery`** | Discovering and evaluating Laravel packages via LaraPlugins.io. |
| **`laravel-tdd`** | PHPUnit/Pest testing and Sanctum auth in Laravel. |
| **`laravel-verification`** | Static analysis and test coverage loops for Laravel. |
| **`make-interfaces-feel-better`** | Spacing, icons, hits, shadows, and interaction states. |
| **`mcp-server-patterns`** | Building custom Model Context Protocol servers in Node/TS. |
| **`motion-ui`** | Animations and interactive motion systems for React/CSS. |
| **`mysql-patterns`** | MySQL indexing, locking, queries, and performance. |
| **`nestjs-patterns`** | NestJS modular architecture, DTOs, guards, and interceptors. |
| **`perl-patterns`** | Modern Perl 5.36+ idioms and clean conventions. |
| **`perl-testing`** | Perl testing with Test2::V0, Test::More, and Devel::Cover. |
| **`plankton-code-quality`** | Hook-driven auto-formatting and linting. |
| **`postgres-patterns`** | Postgres schema optimization, indexing, and Supabase guidelines. |
| **`prisma-patterns`** | Prisma ORM schemas, transaction handling, and traps. |
| **`production-audit`** | Pre-launch checklists and local production readiness reviews. |
| **`python-patterns`** | Pythonic PEP 8 standards, type hints, and performance. |
| **`python-testing`** | Pytest strategies, fixtures, mocking, and coverage. |
| **`quarkus-patterns`** | Quarkus 3.x LTS REST APIs, Camel messaging, and Panache. |
| **`quarkus-tdd`** | Quarkus unit and integration testing with REST Assured. |
| **`quarkus-verification`** | Build, lint, and security checks for Quarkus applications. |
| **`react-patterns`** | React hooks, Suspense, client/server boundaries, and forms. |
| **`react-performance`** | React/Next.js performance rules and waterfall prevention. |
| **`react-testing`** | React Testing Library, MSW network mocks, and Axe accessibility. |
| **`rust-patterns`** | Rust ownership, borrow checker, traits, and error handling. |
| **`rust-testing`** | Cargo unit, integration, and async testing. |
| **`skill-scout`** | Search tool to locate existing skills before creating new ones. |
| **`skill-stocktake`** | Audit and quality evaluation tool for skills and commands. |
| **`springboot-patterns`** | Spring Boot REST APIs, layered services, and caching. |
| **`springboot-tdd`** | Spring Boot testing with Mockito, Testcontainers, and JaCoCo. |
| **`springboot-verification`** | Quality gate verification loop for Spring Boot. |
| **`strategic-compact`** | Guidelines for manual context compaction to preserve window. |
| **`tdd-workflow`** | Test-driven development methodology. |
| **`ui-to-vue`** | Image/design conversion tool into Vue 3 components. |
| **`verification-loop`** | Continuous verification and validation loop. |
| **`windows-desktop-e2e`** | pywinauto desktop app E2E testing. |
