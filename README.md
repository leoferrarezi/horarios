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

* * * * *

| **Classe** | **Método** | **Descrição** | **Exemplo de Uso** | **Caminho do Arquivo** |
| --- | --- | --- | --- | --- |
| `Session` | `loggedIn()` | Verifica se o usuário está logado. | `if ($auth->loggedIn()) { ... }` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `Session` | `user()` | Retorna o usuário autenticado. | `$user = $auth->user();` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `Session` | `check()` | Verifica se um usuário existe no banco. | `if ($auth->check($credentials)) { ... }` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `Session` | `attempt()` | Realiza o login do usuário. | `if ($auth->attempt($credentials)) { ... }` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `Session` | `logout()` | Realiza o logout do usuário. | `$auth->logout();` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `Session` | `register()` | Registra um novo usuário. | `if ($auth->register($userData)) { ... }` | `ThirdParty/Shield/Authentication/Authenticators/Session.php` |
| `User` | `can()` | Verifica se o usuário tem uma permissão. | `if ($auth->user()->can('edit-posts')) { ... }` | `ThirdParty/Shield/Models/UserModel.php` |
| `User` | `inGroup()` | Verifica se o usuário pertence a um grupo. | `if ($auth->user()->inGroup('admin')) { ... }` | `ThirdParty/Shield/Models/UserModel.php` |
| `User` | `isActivated()` | Verifica se o usuário está ativo. | `if ($auth->user()->isActivated()) { ... }` | `ThirdParty/Shield/Models/UserModel.php` |
| `User` | `changePassword()` | Altera a senha do usuário. | `if ($auth->user()->changePassword($newPassword)) { ... }` | `ThirdParty/Shield/Models/UserModel.php` |
| `Token` | `loggedIn()` | Verifica se o token de API é válido. | `if ($auth->loggedIn()) { ... }` | `ThirdParty/Shield/Authentication/Authenticators/Token.php` |

* * * * *
