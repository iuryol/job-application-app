# job-application-app
A job application web app for technical test

## Passos pra inicialização

1 cd src
2 cp .env.example .env
3 docker compose up --build -d
4 docker compose exec app composer install
5 docker compose exec app npm install
6 docker compose exec app npm run build
7 docker compose exec app php artisan migrate:fresh --seed

######## 

usuário candidato

tomcruise@dev.com:user123

usuário recrutador 

jonhdoe@admin.com:password123
