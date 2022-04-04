# Criando MyStore (CRUD)


## Objetivo
Criação de CRUD Utilizando Laravel 9

## Instalação do Projeto

### 1. Clonar o projeto e logo após entre na pasta criada

### 2. No diretório, execute o comando

```bash
docker-compose up --build -d
```


### 4. Instalando as dependências
4.1 Instale as dependências do Laravel executando o comando
```bash
docker exec <CONTAINER_NAME> composer install
```
Caso não funcione o comando acima digite:

```bash
docker exec <CONTAINER_NAME> composer update
```
Para verificar o container do php basta digitar

```bash
docker ps
```

4.2 Corriga as permissões dos diretórios, executando os comandos abaixo no diretório:

```bash
sudo chown -R www-data:www-data storage && sudo chown -R www-data:www-data bootstrap/cache
```

4.3 Crie o arquivo .env, utilizando o .env.example como base:

```bash
cp .env.example .env
```
### 5. Rode as migrates
4.1 Instale as dependências do Laravel executando o comando
```bash
docker exec <CONTAINER_NAME> php artisan migrate:fresh --seed
```

Para verificar o container do php basta digitar

```bash
docker ps
```
## Melhorias Futuras

~~- Colocar SEM IMAGEM caso produto não tenha imagem~~
- Dividir responsabilidades (services/repository)
- Pagina de Login
- Relacionamento usuario a produto, para mostrar quem cadastrou o produto X.
- Carrinho
- Testes unitarios
- Retirar o "Sem Imagem" de dentro do blade, criando uma validação para que quando o usuario cadastre um produto sem imagem, uma imagem default sera direcionada a este produto.
- Paginação
