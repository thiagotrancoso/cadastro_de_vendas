## Informações
- No arquivo `docker-compose.yml` tem todos os containers necessários para executar o projeto.
- O arquivo `.env` foi versionado porque esse é um projeto teste e para facilitar a configuração.
- Acessar o projeto usando htts `https://localhost`.

## Links
- [Modelo do banco de dados](https://dbdiagram.io/d/6340d498f0018a1c5fbd49f5)

## Executar o projeto
```
docker compose up -d
```

## Configurar o projeto
**Banco de dados**  
Criar um banco de dados com o nome `cadastro_vendas`.

**Instalar dependências do composer**
```
composer install
```

**Instalar dependências do npm**
```
npm install
```

**Gerar arquivos CSS e JS**
```
npm run dev
```

**Criar tabelas e popular banco de dados**
```
php artisan migrate --seed
```
Todos os usuários gerados tem a senha `12345678`

## Dados para acessar o sistema
```
Usuário: admin@mail.com
Senha: 12345678
```
