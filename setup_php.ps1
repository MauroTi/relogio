# Caminho de instalação do PHP
$phpPath = "C:\php"
$phpExe = "$phpPath\php.exe"
$phpUrl = "https://windows.php.net/downloads/releases/php-8.2.25-Win32-vs16-x64.zip"
$zipFile = "$env:TEMP\php.zip"

# Função para adicionar ao PATH permanentemente
function Add-ToPath($pathToAdd) {
    $currentPath = [Environment]::GetEnvironmentVariable('Path', 'Machine')
    if ($currentPath -notlike "*$pathToAdd*") {
        [Environment]::SetEnvironmentVariable('Path', "$currentPath;$pathToAdd", 'Machine')
    }
}

# Cria pasta C:\php se não existir
if (-not (Test-Path $phpPath)) {
    New-Item -ItemType Directory -Path $phpPath | Out-Null
}

# Baixa e extrai PHP se não estiver instalado
if (-not (Test-Path $phpExe)) {
    Write-Host "Baixando PHP..."
    Invoke-WebRequest -Uri $phpUrl -OutFile $zipFile

    Write-Host "Extraindo PHP..."
    Expand-Archive -Path $zipFile -DestinationPath $phpPath -Force

    # Ajusta caso os arquivos estejam em subpasta
    $folders = Get-ChildItem $phpPath | Where-Object { $_.PSIsContainer }
    if ($folders.Count -eq 1) {
        Move-Item "$phpPath\$($folders[0].Name)\*" $phpPath -Force
        Remove-Item "$phpPath\$($folders[0].Name)" -Recurse -Force
    }
}

# Adiciona PHP ao PATH
Add-ToPath $phpPath

# Testa instalação
php -v

# Inicia servidor PHP na pasta do script
cd $PSScriptRoot
Start-Process "http://localhost:8000/relogio.php"
php -S localhost:8000
