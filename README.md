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
php spark migrate --all
```

# Métodos SHIELD comumente utilizados

### **Métodos da Classe `Session`**

| **Método** | **Descrição** | **Exemplo de Uso** | **Caminho do Arquivo** |
| --- | --- | --- | --- |
| `loggedIn()` | Verifica se o usuário está logado. | `if ($auth->loggedIn()) { ... }` | `/Shield/Auth/Authenticators/Session.php` |
| `user()` | Retorna o usuário autenticado. | `$user = $auth->user();` | `/Shield/Auth/Authenticators/Session.php` |
| `check()` | Verifica se um usuário existe. | `if ($auth->check($credentials)) { ... }` | `/Shield/Auth/Authenticators/Session.php` |
| `attempt()` | Realiza o login do usuário. | `if ($auth->attempt($credentials)) { ... }` | `/Shield/Auth/Authenticators/Session.php` |
| `logout()` | Realiza o logout do usuário. | `$auth->logout();` | `/Shield/Auth/Authenticators/Session.php` |
| `register()` | Registra um novo usuário. | `if ($auth->register($userData)) { ... }` | `/Shield/Auth/Authenticators/Session.php` |

### **Métodos da Classe `User`**

| **Método** | **Descrição** | **Exemplo de Uso** | **Caminho do Arquivo** |
| --- | --- | --- | --- |
| `can()` | Verifica permissões do usuário. | `if ($auth->user()->can('edit-posts')) { ... }` | `/Shield/Models/UserModel.php` |
| `inGroup()` | Verifica se o usuário pertence a um grupo. | `if ($auth->user()->inGroup('admin')) { ... }` | `/Shield/Models/UserModel.php` |
| `isActivated()` | Verifica se o usuário está ativo. | `if ($auth->user()->isActivated()) { ... }` | `/Shield/Models/UserModel.php` |
| `changePassword()` | Altera a senha do usuário. | `if ($auth->user()->changePassword($newPassword)) { ... }` | `/Shield/Models/UserModel.php` |

### **Métodos da Classe `Token`**

| **Método** | **Descrição** | **Exemplo de Uso** | **Caminho do Arquivo** |
| --- | --- | --- | --- |
| `loggedIn()` | Verifica se o token de API é válido. | `if ($auth->loggedIn()) { ... }` | `/Shield/Auth/Authenticators/Token.php` |

* * * * *
