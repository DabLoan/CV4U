all: build up-d sleep test


up-d:
	docker-compose up -d 

build:
	docker-compose build

logs:
	docker-compose logs --tail=200 -f 


sleep:
	sleep 2

restart:
	docker-compose  up -d 
	docker-compose  restart


#test: restart sleep
test: 
	cd tests && ./test.sh

shell:
	docker-compose exec carbone sh

