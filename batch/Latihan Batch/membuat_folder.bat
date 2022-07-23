@echo off
color a
title pembuatan folder
:menu
cls
	set /p loli1="Masukan nama folder :"
	echo sedang membuat folder
	timeout 2 >nul
	md %loli1%
	echo selesai
	set /p loli2="apakah anda ingin membuatnya lagi? ( y/n )  :"
if %loli2%==y goto lops
if %loli2%==n goto leps

:lops
cls
goto menu

:leps
cls
echo ok, terimakasih.
echo datang lagi ya.
timeout 3 >nul
exit
