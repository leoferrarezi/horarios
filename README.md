# Configuração de acesso ao banco de dados

### _**no arquivo .env:**_

```
database.default.hostname = localhost
database.default.database = horarios
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

# Criação do banco de dados (caso não tenha feito isso ainda):

### _**executar no terminal o comando:**_

```
php spark db:create horarios

```

### _**em seguida executar no terminal o comando:**_

```
php spark migrate
```

## Instalação do SHIELD

### 1) Baixar e instalar o composer:

```
Download: https://getcomposer.org/Composer-Setup.exe

Tutorial: https://www.youtube.com/watch?v=t-WoLniiBfc
```

### 2) Instalar o bendito shield usando composer:

```
Abra o terminal do VSCode e utilize o comando: composer require codeigniter4/shield
```

### 3) Configurar o shield:

```
Abra o terminal do VSCode e utilize o comando: php spark shield:setup
n -> Enter
n -> Enter
y -> Enter

Tabelas do shield criadas
```
