# LT Cloud - Laravel + Livewire

Mini-aplicação desenvolvida para demonstrar domínio em Laravel, Livewire, UX responsivo, testes e versionamento Git.

## 🚀 Funcionalidades

### ✅ Autenticação Completa
- Sistema de login, registro e reset de senha
- Interface responsiva e moderna

### ✅ CRUD Desenvolvedores
- **Campos**: Nome, email único, senioridade (Jr/Pl/Sr), skills (tags)
- **Funcionalidades**: Pesquisa e filtros em tempo real por nome, skill e senioridade
- **Interface**: Grid responsivo (cards em desktop, lista em mobile)
- **Isolamento**: Cada usuário vê apenas seus próprios desenvolvedores

### ✅ CRUD Artigos
- **Campos**: Título, slug automático, conteúdo HTML, data de publicação
- **Upload**: Imagem de capa opcional (2MB max)
- **Relacionamento**: Vincular múltiplos desenvolvedores a cada artigo (N:N)
- **Interface**: Grid responsivo com preview de imagens

### ✅ Sistema de Badges
- Contagem de artigos por desenvolvedor
- Contagem de desenvolvedores por artigo
- Atualização em tempo real

### ✅ Tecnologias Utilizadas
- **Backend**: Laravel 12, Livewire 3, PHP 8.3
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: SQLite (desenvolvimento), MySQL/PostgreSQL (produção)
- **Funcionalidades**: Policies, Factories, Seeders

### 🎨 Extras Implementados
- **Tema claro/escuro persistente** com toggle
- **Interface responsiva** otimizada para mobile e desktop
- **Dados fake** gerados automaticamente

## 📋 Pré-requisitos

- **PHP 8.2+** (testado com 8.3.6)
- **Composer 2.7+**
- **Node.js 18+** e **NPM 10+**
- **SQLite3** (para desenvolvimento)
- **Git** (para versionamento)

### Verificar Pré-requisitos
```bash
php --version        # PHP 8.2+
composer --version   # Composer 2.x
node --version       # Node 18+
npm --version        # NPM 10+
git --version        # Git 2.x+
```

## 🛠️ Instalação

### 1. Clonar o repositório
```bash
git clone https://github.com/Lourencohn/LT-Laravel.git
cd LT-Laravel
```

### 2. Instalar dependências PHP
```bash
composer install
```

### 3. Instalar dependências JavaScript
```bash
npm install
```

### 4. Configurar ambiente
```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurar banco de dados (SQLite)
```bash
touch database/database.sqlite
```
> **Nota**: O arquivo SQLite já está incluído no projeto com dados de demonstração.

### 6. Executar migrations e seeders (Opcional)
```bash
php artisan migrate:fresh --seed
```
> **Nota**: O banco já vem populado. Execute apenas se quiser recriar os dados.

### 7. Criar link para storage
```bash
php artisan storage:link
```

### 8. Compilar assets
```bash
npm run build
```

### 9. Iniciar servidor
```bash
php artisan serve
```

A aplicação estará disponível em: **http://localhost:8000**

## 🔑 Credenciais Demo

### Usuário Principal
- **Email**: `demo@ltcloud.com.br`
- **Senha**: `password`

### Usuário de Teste
- **Email**: `test@example.com`
- **Senha**: `password`

## 🧪 Dados de Demonstração

O sistema vem populado com:
- **2 usuários** com dados completos
- **3-8 desenvolvedores** por usuário com skills variadas
- **2-6 artigos** por usuário com relacionamentos
- **Imagens fake** e conteúdo em HTML

## 📱 Interface Responsiva

### Desktop
- Grid de cards 4 colunas para desenvolvedores
- Grid de cards 4 colunas para artigos
- Navegação horizontal completa

### Mobile
- Lista vertical otimizada
- Cards empilhados em coluna única
- Menu hamburger responsivo

## 🔒 Segurança e Policies

- **Isolamento completo**: Usuários só veem seus próprios dados
- **Policies implementadas** para Developers e Articles
- **Validação robusta** em todos os formulários
- **Upload seguro** de imagens com validação

## 🎨 Tema Claro/Escuro

- **Toggle persistente** no header
- **Preferência salva** em cookies (1 ano)
- **Transições suaves** entre temas
- **Suporte completo** em todas as páginas

## 📂 Estrutura do Projeto

```
app/
├── Livewire/
│   ├── Developer/     # CRUD Desenvolvedores
│   ├── Article/       # CRUD Artigos
│   └── ThemeToggle.php
├── Models/
│   ├── User.php
│   ├── Developer.php
│   └── Article.php
├── Policies/
│   ├── DeveloperPolicy.php
│   └── ArticlePolicy.php
database/
├── factories/         # Dados fake
├── migrations/        # Estrutura do banco
└── seeders/          # População inicial
resources/
├── views/livewire/   # Components Livewire
└── css/              # Estilos Tailwind
```

## 🧪 Comandos Úteis

```bash
# Recriar banco com dados fresh
php artisan migrate:fresh --seed

# Compilar assets para desenvolvimento (hot reload)
npm run dev

# Compilar assets para produção
npm run build

# Limpar caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Verificar rotas
php artisan route:list

# Executar tinker para testes
php artisan tinker

# Verificar versão do Laravel
php artisan --version
```

## 📝 Funcionalidades Detalhadas

### Desenvolvedores
- ✅ Listagem com paginação
- ✅ Busca em tempo real (nome/email)
- ✅ Filtro por senioridade (Jr/Pl/Sr)
- ✅ Filtro por skills
- ✅ CRUD completo
- ✅ Validação de email único
- ✅ Sistema de tags para skills

### Artigos
- ✅ Listagem com cards
- ✅ Upload de imagem de capa
- ✅ Conteúdo em HTML
- ✅ Slug automático
- ✅ Relacionamento N:N com desenvolvedores
- ✅ Data de publicação
- ✅ Preview de imagens

### UX/UI
- ✅ Design responsivo completo
- ✅ Tema claro/escuro
- ✅ Transições suaves
- ✅ Feedback visual (loading, success, errors)
- ✅ Navegação intuitiva
- ✅ Breadcrumbs

## 📧 Contato

Projeto desenvolvido por **Lourenço Henrique Neves Pereira** para processo seletivo da **LT Cloud**.

Email de contato conforme solicitado: **CONTATO@LTCLOUD.COM.BR**
