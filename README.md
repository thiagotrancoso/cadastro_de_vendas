## Informações
- [Modelo do banco de dados](https://dbdiagram.io/d/6340d498f0018a1c5fbd49f5)

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

## Executar o projeto
```
docker compose up -d
```

## Dados para acessar o sistema
```
Usuário: admin@mail.com
Senha: 12345678
```
