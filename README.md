# Moot

Projeto de teste para implementar um mecanismo de busca com filtros combinados utilizando **Laravel 11** e **Livewire**.
O ambiente está containerizado com **Docker**, incluindo PostgreSQL e Redis.

## Funcionalidades

- ✅ **Busca por nome do produto** - Campo de texto com debounce para busca em tempo real
- ✅ **Filtros por múltiplas categorias** - Checkboxes para selecionar várias categorias simultaneamente
- ✅ **Filtros por múltiplas marcas** - Checkboxes para selecionar várias marcas simultaneamente
- ✅ **Persistência de filtros após refresh** - Filtros mantidos na URL via query string
- ✅ **Limpar filtros** - Botão para resetar todos os filtros de uma vez
- Paginação de resultados (12 produtos por página)
- Indicadores visuais de filtros ativos
- Interface responsiva com Tailwind CSS
- Testes automatizados usando **Laravel Feature + Livewire**

## Requisitos

- Docker e Docker Compose 3.8
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

2. **Ignorar versionamento de permissões de arquivos**
```bash
git config core.fileMode false
```

3. **Permissões na pasta storage**
```bash
chmod -R 777 storage/
```

4. **Copiar `.env`**
```bash
cp .env.example .env
```

5. **Rodar containers Docker**
```bash
docker-compose up -d
```

6. **Instalar dependências PHP**
```bash
docker exec -it moot-php-fpm composer install
```

7. **Instalar dependências Node**
```bash
docker exec -it moot-php-fpm npm install
```

8. **Gerar chave de aplicação**
```bash
docker exec -it moot-php-fpm php artisan key:generate
```

9. **Rodar build do Vite**
```bash
docker exec -it moot-php-fpm npm run build
```

10. **Rodar migrations e seeders**
```bash
docker exec -it moot-php-fpm php artisan migrate --seed
```

11. **Acessar aplicação**
- Abra no navegador: [http://localhost:8000](http://localhost:8000)

## Testes automatizados

Para rodar os testes:
```bash
docker exec -it moot-php-fpm php artisan test
```

Ao rodar os testes, o banco de dados é limpo por conta do RefreshDatabase, então, para rodar novamente no navegador
rode os seeders novamente.

Os testes cobrem:
- ✅ Inicialização com todas as marcas e categorias
- ✅ Valida o filtro por nome
- ✅ Persistência de filtros após refresh
- ✅ Limpar filtros

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