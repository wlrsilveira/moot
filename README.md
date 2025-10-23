# Moot

Projeto de teste para implementar um mecanismo de busca com filtros combinados utilizando **Laravel 11** e **Livewire**.
O ambiente está containerizado com **Docker**, incluindo PostgreSQL e Redis.

## Funcionalidades

- Busca de produtos com filtros combinados:
  - Nome do produto
  - Categoria (possível selecionar múltiplas)
  - Marca (possível selecionar múltiplas)
- Persistência dos filtros após refresh da página
- Possibilidade de limpar todos os filtros
- Testes automatizados usando **Laravel Feature + Livewire**

## Requisitos

- Docker e Docker Compose
- PHP >= 8.2
- Composer
- Node.js e npm/yarn

## Estrutura do Projeto

- **Migrations**: Estrutura das tabelas do banco
- **Factories**: Dados falsos para testes e seeders
- **Seeders**: Dados iniciais de produtos, categorias e marcas
- **Livewire Components**: Componentes reativos para a busca
- **Tests**: Feature tests cobrindo a busca e filtros

## Como rodar o projeto

1. **Clonar o repositório**
```bash
git clone https://github.com/wlrsilveira/moot.git && cd moot
```

2. **Copiar `.env`**
```bash
cp .env.example .env
```

3. **Rodar containers Docker**
```bash
docker-compose up -d
```

4. **Instalar dependências PHP**
```bash
docker exec -it moot-php-fpm composer install
```

5. **Instalar dependências Node**
```bash
docker exec -it moot-php-fpm npm install
```

6. **Gerar chave de aplicação**
```bash
docker exec -it moot-php-fpm php artisan key:generate
```

7. **Rodar migrations e seeders**
```bash
docker exec -it moot-php-fpm php artisan migrate --seed
```

8. **Rodar build do Vite**
```bash
docker exec -it moot-php-fpm npm run build
```

9. **Acessar aplicação**
- Abra no navegador: [http://localhost:8000](http://localhost:8000)

## Testes automatizados

Para rodar os testes:
```bash
docker exec -it moot-php-fpm php artisan test
```

Os testes cobrem:
- Busca por nome do produto
- Filtros por múltiplas categorias
- Filtros por múltiplas marcas
- Persistência de filtros após refresh
- Limpar filtros

## Observações

- O projeto está preparado para **desenvolvimento local** via Docker.
- O Redis está configurado para cache e sessão.
- Livewire foi usado para permitir filtros reativos sem reload da página.

## Estrutura de commits recomendada

- `feature:` para novas funcionalidades
- `fix:` para correções de bugs
- `chore:` para ajustes de configuração ou setup
- `test:` para inclusão de testes

## Autor

- Nome: Wagner Luis Resta Quirino Silveira
- Email: wagner.resta@outlook.com