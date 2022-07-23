@echo off
title data daftar
color a
:user
set /p loli1="user :"
	if %loli1%==loli (
goto pass
) else (
cls
echo invalid code
	goto :user
)

:pass
set /p loli2="pass :"
	if %loli2%==lolis (
echo.
echo selamat datang %loli1%
goto user
) else (
cls
echo invalid code
goto :pass
)


pause >nul