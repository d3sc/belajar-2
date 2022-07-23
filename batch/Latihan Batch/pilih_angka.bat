@echo off
:menu
title pilih angka
	::Anda menginput angka 1
	::Anda menginput angka 2
	::Anda menginput angka 3
	::Anda menginput angka 4
	::input tidak dapat diproses

set /p loli1="pilih satu angka 1-4:"

if %loli1%==1 (
	echo anda menginput angka %loli1%

) else if %loli1%==2 (
	echo anda menginput angka %loli1%

) else if %loli1%==3 (
	echo anda menginput angka %loli1%

) else if %loli1%==4 (
	echo anda menginput angka %loli1%

) else (
	echo code eror
)
goto :menu
pause >nul