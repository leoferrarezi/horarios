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

# Criação do banco de dados:

### _**executar no terminal o comando:**_
```
php spark db:create horarios
```
### _**em seguida executar no terminal o comando:**_
```
php spark migrate
```

