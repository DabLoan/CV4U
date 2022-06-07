#!/bin/bash

[ -f ../.env ] && . ../.env

curl -vvv  -X POST \
	-F "myFile=@test.xlsx" \
	http://localhost:${CARBONE_PORT:-3000}/xlsx2pdf/montest.pdf \
	--output test.pdf
	#--data-binary @test.xlsx \
