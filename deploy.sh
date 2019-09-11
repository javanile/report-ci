#!/bin/bash

git add .
git commit -am "deploy"
git push

ansible-playbook -i hosts.yml -l prod deploy.yml
