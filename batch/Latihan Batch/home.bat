@echo off
:menu
color a
cls
for %%a in (1.notepad 2.CMD 3.exit ) do (
echo %%a
)
set /p loli1="silahkan pilih angka untuk membuka aplikasi :"
if  %loli1%==1 (
start notepad.exe
) else if %loli1%==2 (
start CMD.exe
) else if %loli1%==3 (
exit
) else (
echo.
echo invalid code
timeout 3 >nul
cls
)

goto :menu

pause >nul