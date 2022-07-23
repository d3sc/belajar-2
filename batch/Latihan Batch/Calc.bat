@echo off
color a
title calc
:back

set /p loli1="Masukan Angka Pertama: "
echo.
set /p loli2="Masukan Angka Kedua   :"
echo.

	set /p operator="silahkan pilih operator (*,/,-,+)   :"
	echo.
		set /a hasil=%loli1% %operator% %loli2%
	echo.
	echo hasilnya %hasil%
	echo tekan enter untuk mengulang
pause >nul
goto back

pause>nul