## Boletim Online

Site em produção: https://boletimonline.online

### Instalação: 

* Você precisará do PHP instalado em seu computador, [BAIXE AQUI](https://www.php.net/downloads). 
* Na raiz do projeto use o comando `composer install`. 
* No arquivo `.ENV` edite o campo `DB_CONNECTION` e coloque os dados do seu banco de dados.
* Use o comando `php artisan migrate:fresh --seed` para fazer as migrações.
* Use o comando `php artisan serve` para rodar em seu servidor.
* Navegue para `http://localhost:8000`. O aplicativo será carregado automaticamente.

#### Observações:
* Ao propagar o banco ele já vem com usuário cadastrados:

```
Tipo: Super Admin
Email: admin@admin.com
Senha: secret
```

```
Tipo: Professor 1
Email: professor1@admin.com
Senha: secret
```

```
Tipo: Professor 2
Email: professor2@admin.com
Senha: secret
```

```
Tipo: Secretária
Email: secretaria@admin.com
Senha: secret
```
