# 🚀 NerdHub Web

Portal web desenvolvido para gerenciamento de projetos, notícias e sistema de usuários. Sistema construído com Laravel 12, Filament 4 e TailwindCSS.

## 📋 Sobre o Projeto

O **NerdHub Web** é uma plataforma robusta desenvolvida para facilitar o gerenciamento de projetos e notícias. O sistema oferece uma interface moderna e intuitiva através do painel administrativo Filament.

### Funcionalidades Principais

- 🔐 **Autenticação e Autorização**: Sistema completo de usuários com diferentes níveis de permissão (Roles)
- 📰 **Gerenciamento de Notícias**: Publicação e gestão de notícias e atualizações
- 📦 **Gestão de Projetos**: Controle completo de projetos e suas informações
- � **Perfis de Usuários**: Gerenciamento de perfis com bio, cargo, avatar e informações adicionais
- 🎨 **Painel Administrativo**: Interface moderna e responsiva com Filament 4

## 🛠️ Stack Tecnológica

### Backend
- **PHP**: ^8.2
- **Laravel**: ^12.0
- **Filament**: ^4.0
- **SQLite**: Banco de dados (padrão para desenvolvimento)

### Frontend
- **AlpineJS**: ^3.4.2
- **TailwindCSS**: ^3.1.0
- **Vite**: ^7.0.7
- **Axios**: ^1.11.0

### Ferramentas de Desenvolvimento
- **Laravel Breeze**: Autenticação
- **Laravel Telescope**: Debug e monitoramento
- **Laravel Debugbar**: Debug de desenvolvimento
- **Pest**: Framework de testes
- **Laravel Pint**: Code style fixer

## 📦 Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados:

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM ou Yarn
- SQLite (ou outro banco de dados de sua preferência)

## 🚀 Instalação

### 1. Clone o repositório

```bash
git clone <url-do-repositorio>
cd nerdhub-web
```

### 2. Instalação Rápida (Recomendado)

O projeto possui um script de setup automatizado:

```bash
composer setup
```

Este comando irá:
- Instalar dependências PHP
- Copiar arquivo `.env.example` para `.env`
- Gerar chave da aplicação
- Executar migrations
- Instalar dependências Node.js
- Compilar assets

### 3. Instalação Manual

Se preferir realizar a instalação passo a passo:

```bash
# Instalar dependências PHP
composer install

# Copiar arquivo de ambiente
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate

# Executar migrations
php artisan migrate

# Instalar dependências Node.js
npm install

# Compilar assets
npm run build
```

### 4. Configuração do Banco de Dados

Por padrão, o projeto utiliza SQLite. Se desejar usar outro banco de dados, edite o arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nerdhub
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Seeders (Opcional)

Para popular o banco de dados com dados iniciais:

```bash
php artisan db:seed
```

## 🏃 Executando o Projeto

### Modo de Desenvolvimento (Recomendado)

O projeto possui um comando unificado que inicia todos os serviços necessários:

```bash
composer dev
```

Este comando irá iniciar simultaneamente:
- 🌐 Servidor Laravel (http://localhost:8000)
- 🔄 Worker de filas
- 📊 Laravel Pail (logs em tempo real)
- ⚡ Vite (hot reload para assets)

### Modo Manual

Se preferir executar os serviços separadamente:

```bash
# Terminal 1 - Servidor Laravel
php artisan serve

# Terminal 2 - Vite (desenvolvimento de assets)
npm run dev

# Terminal 3 - Worker de filas (opcional)
php artisan queue:listen

# Terminal 4 - Logs em tempo real (opcional)
php artisan pail
```

### Compilação para Produção

```bash
npm run build
```

## 🧪 Testes

O projeto utiliza Pest para testes automatizados:

```bash
# Executar todos os testes
composer test

# Ou diretamente com artisan
php artisan test

# Executar testes com coverage
php artisan test --coverage
```

## 📁 Estrutura do Projeto

```
nerdhub-web/
├── app/
│   ├── Filament/          # Recursos do Filament (Admin Panel)
│   ├── Http/              # Controllers, Middleware, Requests
│   ├── Models/            # Models Eloquent
│   │   ├── News.php
│   │   ├── Project.php
│   │   ├── Role.php
│   │   └── User.php
│   ├── Providers/         # Service Providers
│   └── View/              # View Composers
├── database/
│   ├── factories/         # Model Factories
│   ├── migrations/        # Migrations do banco de dados
│   └── seeders/           # Database Seeders
├── public/                # Assets públicos
├── resources/
│   ├── css/               # Arquivos CSS
│   ├── js/                # Arquivos JavaScript
│   └── views/             # Views Blade
├── routes/
│   ├── web.php            # Rotas web
│   ├── api.php            # Rotas API
│   └── console.php        # Comandos Artisan
├── storage/               # Arquivos gerados
└── tests/                 # Testes automatizados
```

## 🔒 Acesso ao Painel Administrativo

Após a instalação e execução do projeto, acesse o painel administrativo através de:

```
http://localhost:8000/admin
```

> **Nota**: Certifique-se de criar um usuário administrador através dos seeders ou manualmente no banco de dados.

## 🌍 Localização

O projeto está configurado para suportar localização em Português Brasileiro (pt-BR) através do pacote `lucascudo/laravel-pt-br-localization`.

Para ativar o idioma português, configure no `.env`:

```env
APP_LOCALE=pt_BR
APP_FALLBACK_LOCALE=pt_BR
```

## 📝 Scripts Disponíveis

O `composer.json` possui os seguintes scripts úteis:

| Comando | Descrição |
|---------|-----------|
| `composer setup` | Instalação completa do projeto |
| `composer dev` | Inicia ambiente de desenvolvimento completo |
| `composer test` | Executa testes automatizados |

## 🤝 Contribuindo

1. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
2. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
3. Push para a branch (`git push origin feature/AmazingFeature`)
4. Abra um Pull Request

## 📖 Documentação Adicional

- [Documentação do Laravel 12](https://laravel.com/docs/12.x)
- [Documentação do Filament 4](https://filamentphp.com/docs/4.x)
- [Documentação do TailwindCSS](https://tailwindcss.com/docs)
- [Documentação do AlpineJS](https://alpinejs.dev)

## 🐛 Reportar Bugs

Encontrou um bug? Por favor, abra uma issue descrevendo:
- Descrição clara do problema
- Passos para reproduzir
- Comportamento esperado vs. atual
- Screenshots (se aplicável)

## 📄 Licença

Este projeto é proprietário e confidencial. Todos os direitos reservados.

---

**Desenvolvido com ❤️ pela equipe NerdHub**
