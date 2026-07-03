Write-Host '==========================================' -ForegroundColor Cyan
Write-Host '   Portfolio Verification Suite (Local)   ' -ForegroundColor Cyan
Write-Host '==========================================' -ForegroundColor Cyan

# 1. Check .env configuration file
Write-Host '[1/5] Verifying environment setup...' -ForegroundColor Yellow
if (-not (Test-Path ".env")) {
    Write-Host '❌ Error: .env file is missing!' -ForegroundColor Red
    Exit 1
}
Write-Host '✅ Environment setup verified.' -ForegroundColor Green

# 2. Compile Check/Syntax (Equivalent to tsc --noEmit)
Write-Host '[2/5] Running PHP Syntax Check (php -l)...' -ForegroundColor Yellow
$phpFiles = Get-ChildItem -Path . -Recurse -Filter *.php | Where-Object { $_.FullName -notmatch "vendor" }
$errors = 0
foreach ($file in $phpFiles) {
    $result = & "c:\xampp\php\php.exe" -l $file.FullName 2>&1
    if ($LASTEXITCODE -ne 0) {
        Write-Host "❌ Syntax error in: $($file.FullName)" -ForegroundColor Red
        Write-Host $result -ForegroundColor DarkRed
        $errors++
    }
}
if ($errors -gt 0) {
    Write-Host '❌ Syntax verification failed with $errors errors.' -ForegroundColor Red
    Exit 1
}
Write-Host '✅ All PHP files compile successfully.' -ForegroundColor Green

# 3. Code Standards & Linting
Write-Host '[3/5] Checking style rules (PHPCS)...' -ForegroundColor Yellow
if (Test-Path "vendor/bin/phpcs") {
    & "vendor/bin/phpcs" --standard=PSR12 --warning-severity=0 src config
    if ($LASTEXITCODE -ne 0) {
        Write-Host '❌ Code style rules violated!' -ForegroundColor Red
        Exit 1
    }
    Write-Host '✅ Coding standards checked.' -ForegroundColor Green
} else {
    Write-Host 'ℹ️ PHPCS not installed. Skipping style rules.' -ForegroundColor Gray
}

# 4. Static Analysis / Type Checker (phpstan)
Write-Host '[4/5] Running Static Analysis (PHPStan)...' -ForegroundColor Yellow
if (Test-Path "vendor/bin/phpstan") {
    & "vendor/bin/phpstan" analyse --configuration=phpstan.neon
    if ($LASTEXITCODE -ne 0) {
        Write-Host '❌ Static analysis failed!' -ForegroundColor Red
        Exit 1
    }
    Write-Host '✅ Static analysis passed.' -ForegroundColor Green
} else {
    Write-Host 'ℹ️ PHPStan not installed. Skipping static analysis.' -ForegroundColor Gray
}

# 5. Unit Tests
Write-Host '[5/5] Running Unit Tests (PHPUnit)...' -ForegroundColor Yellow
if (Test-Path "vendor/bin/phpunit") {
    if (Test-Path "tests") {
        & "vendor/bin/phpunit" --do-not-fail-on-empty-test-suite
        if ($LASTEXITCODE -ne 0) {
            Write-Host '❌ Some tests failed!' -ForegroundColor Red
            Exit 1
        }
        Write-Host '✅ All unit tests passed.' -ForegroundColor Green
    } else {
        Write-Host 'ℹ️ No tests/ directory found. Skipping unit tests.' -ForegroundColor Gray
    }
} else {
    Write-Host 'PHPUnit not installed. Skipping tests.' -ForegroundColor Gray
}

Write-Host '==========================================' -ForegroundColor Green
Write-Host 'VERIFICATION SUCCESS: Ready for Commit!' -ForegroundColor Green
Write-Host '==========================================' -ForegroundColor Green
