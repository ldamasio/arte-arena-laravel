# arte-arena-laravel
Sistema de Contas a Pagar e Receber com autenticação, autorização, níveis de acesso, testes unitários, segurança e documentação.

# Definições Iniciais
Optei pelo Laravel Breeze em função da simplicidade do projeto e da busca por um desenvolvimento rápido.

# Especificações Técnicas
Versão do PHP: 8.3.6

Versão do Composer: 2.8.1

Startup Kit do Laravel: Breeze

# Intalação do Sistema

## Instalação das dependências do Backend

### No Linux:
```
apt update
apt install php8.3 php8.3-fpm php8.3-common php8.3-mbstring php8.3-curl php8.3-xml php8.3-json php8.3-gd
apt install nodejs npm
``` 
### No Windows:
Utilize um instalador do PHP: Baixe o instalador do PHP para Windows em https://www.php.net/downloads.php e selecione as extensões necessárias (mbstring, curl, xml, json, gd).
Baixe o instalador: Acesse https://nodejs.org/ e baixe o instalador LTS (Long Term Support) para a versão mais recente.
Execute o instalador: Siga as instruções do instalador, certificando-se de marcar a opção para adicionar o Node.js ao PATH do sistema.

### No MacOS:
```
brew install php@8.3
pecl install mbstring curl xml json gd
brew install node
```

## Instalar dependências do frontend
```
npm i
npm run build
```

### Rodar as migrações
`php artisan migrate`

### Executar Testes automatizados
`php artisan test`

## Inicializar o Sistema

```
php artisan db:seed
php artisan serve
```

Ao inicializar o sistema dessa forma, você terá dois usuários iniciais: 

gabriel@artearena.com.br e rogerio@artearena.com.br - As senhas desses usuários é a mesma: `artearena`

O comando `php artisan db:seed` é usado para popular o banco de dados com dados de teste, e o comando `php artisan serve` é usado para iniciar um servidor de desenvolvimento local para seu aplicativo Laravel.

