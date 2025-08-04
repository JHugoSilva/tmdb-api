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
* Git ([Download Git](https://git-scm.com/downloads))

## 🚀 **Passo a Passo para Execução**

### 1. Clone o repositório

```
`git clone https://github.com/JHugoSilva/tmdb-api.git`
```

### 2. Acessar a pasta do projeto

```
cd tmdb-api/
```

### 3. Configurar .env

```
cp backend/.env.example backend/.env
```

### 4. Configurar conexão ao banco de dados

###### *Editar .env*Conexões do banco de dados

```
DB_CONNECTION=mysql
DB_HOST=tmdb_mysql
DB_PORT=3306
DB_DATABASE=tmdb_db
DB_USERNAME=root
DB_PASSWORD=root
```

### **5. Como obter a chave da API do TMDB**

### Link oficial do TMDB:

**[https://www.themoviedb.org/]()**

---

### Passos para criar a conta e gerar a chave da API:

1. **Acesse o site do TMDB:**

   [https://www.themoviedb.org/signup]()
2. **Crie uma conta gratuita**

   * Forneça um nome de usuário, e-mail e senha.
   * Confirme o e-mail enviado pelo TMDB.
3. **Acesse as configurações da conta:**

   * Após fazer login, clique na sua imagem de perfil (canto superior direito) e vá até  **"Settings"** .
   * No menu lateral, clique em  **"API"** .
4. **Solicite uma API Key:**

   * Escolha entre os tipos de chave:  **Developer** ,  **Personal** , ou  **Commercial** .
   * Preencha os dados solicitados (nome da aplicação, descrição, site — opcional para uso pessoal).
   * Clique em  **"Submit"** .
   * ###### Configurar Chave e URL da API em .env do Laravel

     ```
     TMDB_API_KEY=<adicione_sua_chave_aqui>
     TMDB_BASE_URL=https://api.themoviedb.org/3

     ```

---

### 6. Executar Makefile 

* Corrigir permissões
* Instalar dependências PHP com composer
* Gerar chave de app
* Subir containers e construir do zero
* Rodar migrations

### 6. Acesse a aplicação e testando

* [X] [Rota para testar API](http://localhost:8088/api/ping)
* [X] [Acessar o banco de dados](http://localhost:8081/index.php)

1. **Usuário: root**
2. **Senha: root
   *Obs*: phpMyAdmin, para facilitar o acesso e a visualização dos dados.**

* [X] [Front End VueJS](http://localhost:5177/)
