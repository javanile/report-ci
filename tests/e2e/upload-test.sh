#!/bin/bash

docker-compose up -d

#docker-compose run --rm report-ci phpmd src html cleancode > report.html
docker-compose run --rm report-ci phpcs src html cleancode | curl -F report=@- localhost:8888/javanile/report-ci
