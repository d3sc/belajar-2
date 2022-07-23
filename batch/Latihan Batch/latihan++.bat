@echo off

color a
:menu
cls
echo Silahkan Login
echo ---------------------
echo.
set /p user="masukan user :"
if %user%==121 (
goto :pass
) else (
echo user tidak terdaftar
timeout 3 >nul
goto :menu
)

:pass
set /p pass="masukan pass :"
if %pass%==1234 (
echo.
echo selamat datang %user%
timeout 3 >nul
goto koleps
) else (
echo password salah
timeout 3 >nul
goto :menu
)

:koleps
cls
set /p data1="Nama Folder :"
set /p data2="Tulis Pesan :"

echo %data2%> %data1%.txt
echo sedang memuat, mohon tunggu sebentar...
timeout 3 >nul
if exist %data1%.txt (
echo folder telah dibuat
) else (
echo folder gagal memuat
)


pause >nul