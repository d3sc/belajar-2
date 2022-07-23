@echo off
title script membuat file
color a
:retry
cls
	set /p loli1="tulis nama file :"
	set /p loli2="Tulis extensi file tanpa titik :"
	set /p loli3="tulis isi file :"

	echo %loli3%>%loli1%.%loli2%

goto :retry