@echo off

color a

echo Tools sekolah


timeout 3 > nul

:menu
cls

echo 1. google
echo 2. gcr
echo 3. whatsapp web
echo 4. youtube
echo 5. gmail
echo 6. all
echo -----------------
echo.
echo pilih angka di atas.
set /p data1=" pilih :"
if %data1%==1 (
    goto menu1
) else if %data1%==2 (
    goto menu2
) else if %data1%==3 (
    goto menu3
) else if %data1%==4 (
    goto menu4
) else if %data1%==5 (
    goto menu5
) else if %data1%==6 (
    goto menu6
) else if %data1%==7 (
    goto menu7
) else (
    cls
    echo invalid code
    timeout 1 >nul
    goto menu
)

:menu1
cls
echo anda memilih google
timeout 1 >nul
start www.google.com
timeout 1>nul
goto menu

:menu2
cls
echo anda memilih gcr
timeout 1 >nul
start https://classroom.google.com/u/0/h
timeout 1>nul
goto menu

:menu3
cls
echo anda memilih whatsapp web
timeout 1 >nul
start https://web.whatsapp.com
timeout 1 >nul
goto menu

:menu4
cls
echo anda memilih youtube
timeout 1 >nul
start https://www.youtube.com
timeout 1 >nul
goto menu

:menu5
cls
echo  anda memilih gmail
timeout 1 >nul
start https://mail.google.com/mail/u/1
timeout 1 >
goto menu

:menu6
cls
echo anda memilih all
timeout 1 >nul
start https://web.whatsapp.com
timeout 2 >nul
start https://classroom.google.com/u/0/h
timeout 2 >nul
start https://youtube.com
timeout 2 >nul
goto menu

:menu7
cls
start PBlauncher.exe
goto menu

pause