@echo off
net session >nul 2>&1
if %errorLevel% neq 0 (
    echo Este script precisa ser executado como Administrador.
    pause
    exit /b
)

powershell -ExecutionPolicy Bypass -File "%~dp0setup_php.ps1"
pause
