@echo off
:: Get the path of this BAT file (and thus the EXE)
set "script_dir=%~dp0"

:: Name of the EXE (in the same folder)
set "compiler=%script_dir%Compiler.exe"

:: Loop through all files dragged onto the BAT file
for %%F in (%*) do (
    echo Processing: %%~nxF
    pushd "%%~dpF"
    "%compiler%" "%%~nxF"
    popd
)

pause