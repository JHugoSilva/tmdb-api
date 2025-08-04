Este README fornece instruções completas para configurar e executar o projeto Laravel localmente usando o docker.

## 📌 **Visão Geral**

Aplicação web desenvolvida com Laravel, incluindo:

* ✅ API RESTful
* ✅ Integração com banco de dados
* ✅ Buscar filmes pelo nome usando a API do TMDB
* ✅ Adicionar filmes aos favoritos, salvando os dados localmente
* ✅ Listar filmes favoritos em uma tela dedicada, com filtro por gênero
* ✅ Remover filmes da lista de favoritos

## 🛠️ **Pré-requisitos**

* Docker instalado ([Download Docker](https://www.docker.com/get-started))
* Docker Compose (vem com o Docker Desktop)
* Git ([Download Git](https://git-scm.com/downloads))

## 🚀 **Passo a Passo para Execução**

### 1. Clone o repositório

git clone https://github.com/JHugoSilva/tmdb-api.git

### 2. Configure o ambiente do Laravel

cd tmdb-api/

Crie o arquivo `.env` baseado no exemplo:

cp backend/.env.example backend/.env

Edite o `.env` com estas configurações mínimas:

Exemplo:

DB_CONNECTION=mysql
DB_HOST=tmdb_mysql
DB_PORT=3306
DB_DATABASE=tmdb_db
DB_USERNAME=root
DB_PASSWORD=root

### 3. Construa e inicie os containers

docker-compose up -d --build

### 4. Execute os comandos de instalação

Instale as dependências PHP e gere a chave da aplicação:

docker-compose exec app composer install
docker-compose exec app php artisan key:generate

Comandos para permissão

docker exec tmdb-app sh -c "chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache && chmod -R 775 /var/www/storage /var/www/bootstrap/cache"

### 5. Execute as migrations

docker-compose exec app php artisan migrate

### 6. Acesse a aplicação

A aplicação estará disponível em:
[http://localhost:8088](http://localhost:8088)

Rota de teste para API:

[http://localhost:8088/api/ping](http://localhost:8088/api/ping)

O PHPMyAdmin estará disponível em:
[http://localhost:8081](http://localhost:8081/)
