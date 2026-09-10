# Wecomp

Website institucional e CMS da Wecomp, construído com Laravel 12, Filament 4, Tailwind CSS 4 e Vite.

## Instalação local

Requisitos: PHP 8.2+, Composer e Node 20.15+.

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan storage:link
npm install
npm run build
```

Para desenvolvimento:

```bash
composer run dev
```

O website fica em `http://localhost:8000`. O CMS fica em `/admin`.

Crie o primeiro administrador localmente:

```bash
php artisan make:filament-user
```

## Testes

```bash
composer test
```

Os protótipos HTML e a documentação de arquitetura permanecem em `docs/`.
