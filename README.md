# job-application-app
A job application web app for technical test

## Passos pra inicialização

# 1. Acesse a pasta 'src'
cd src

# 2. Copie o arquivo de exemplo do ambiente
cp .env.example .env

# 3. Suba os containers Docker
docker compose up --build -d

# 4. Instale as dependências PHP
docker compose exec app composer install

# 5. Instale as dependências JavaScript
docker compose exec app npm install

# 6. Compile os assets front-end
docker compose exec app npm run build

# 7. Execute as migrations e seeds
docker compose exec app php artisan migrate:fresh --seed
eed

######## 

👥 Credenciais de acesso
Candidato

    Email: tomcruise@dev.com

    Senha: user123

Recrutador

    Email: jonhdoe@admin.com

    Senha: password123
