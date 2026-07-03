#!/bin/bash
set -e

echo -e "\e[36m==========================================\e[0m"
echo -e "\e[36m   Portfolio Verification Suite (Local)   \e[0m"
echo -e "\e[36m==========================================\e[0m"

# 1. Check .env configuration file
echo -e "\e[33m[1/5] Verifying environment setup...\e[0m"
if [ ! -f .env ]; then
    echo -e "\e[31m❌ Error: .env file is missing!\e[0m"
    exit 1
fi
echo -e "\e[32m✅ Environment setup verified.\e[0m"

# 2. Syntax Check (php -l)
echo -e "\e[33m[2/5] Running PHP Syntax Check (php -l)...\e[0m"

# Detect PHP binary path with fallbacks for XAMPP on Windows
PHP_BIN="php"
if ! command -v php &> /dev/null; then
    if [ -f "/c/xampp/php/php.exe" ]; then
        PHP_BIN="/c/xampp/php/php.exe"
    elif [ -f "c:/xampp/php/php.exe" ]; then
        PHP_BIN="c:/xampp/php/php.exe"
    else
        echo -e "\e[31m❌ Error: PHP command not found in PATH or at /c/xampp/php/php.exe\e[0m"
        exit 1
    fi
fi

errors=0
for file in $(find . -name "*.php" -not -path "*/vendor/*"); do
    if ! "$PHP_BIN" -l "$file" > /dev/null 2>&1; then
        echo -e "\e[31m❌ Syntax error in: $file\e[0m"
        "$PHP_BIN" -l "$file"
        errors=$((errors+1))
    fi
done
if [ $errors -ne 0 ]; then
    echo -e "\e[31m❌ Syntax verification failed with $errors errors.\e[0m"
    exit 1
fi
echo -e "\e[32m✅ All PHP files compile successfully.\e[0m"

# 3. PHP CS checks
echo -e "\e[33m[3/5] Checking style rules...\e[0m"
if [ -f vendor/bin/phpcs ]; then
    vendor/bin/phpcs --standard=PSR12 --warning-severity=0 src config
    echo -e "\e[32m✅ Coding standards checked.\e[0m"
else
    echo -e "\e[90mℹ️ PHPCS not installed. Skipping style rules.\e[0m"
fi

# 4. PHPStan Analysis
echo -e "\e[33m[4/5] Running Static Analysis (PHPStan)...\e[0m"
if [ -f vendor/bin/phpstan ]; then
    vendor/bin/phpstan analyse src config --level=5
    echo -e "\e[32m✅ Static analysis passed.\e[0m"
else
    echo -e "\e[90mℹ️ PHPStan not installed. Skipping static analysis.\e[0m"
fi

# 5. PHPUnit Checks
echo -e "\e[33m[5/5] Running Unit Tests...\e[0m"
if [ -f vendor/bin/phpunit ]; then
    vendor/bin/phpunit
    echo -e "\e[32m✅ All unit tests passed.\e[0m"
else
    echo -e "\e[90mℹ️ PHPUnit not installed. Skipping tests.\e[0m"
fi

echo -e "\e[32m==========================================\e[0m"
echo -e "\e[32m🎉 VERIFICATION SUCCESS: Ready for Commit!\e[0m"
echo -e "\e[32m==========================================\e[0m"
