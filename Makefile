
push:
	git add .
	git commit -am "deploy"
	git push

deploy: push
	chmod 400 env/prod/id_rsa
	ansible-playbook -i hosts.yml -l prod deploy.yml

certbot: push
	chmod 400 env/prod/id_rsa
	ansible-playbook -i hosts.yml -l prod certbot.yml
