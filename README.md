# waterfall-ecommerce
Aplicação PHP para um e-commerce

## Autores :pencil2:
[Ana Luísa Reis Ribeiro](https://github.com/AnaLuisaReiis),
[André](https://github.com/andrehccordeiro),
[Erick Figueirôa Rocha](https://github.com/erickRochaIP),
[Gisele Núbia Santos Oliveira](https://github.com/gihNubia)


## Preparando o ambiente

Para que esse sistema funcione na sua máquina é preciso que você tenha instalado um servidor Apache e MySQL. Recomendo que instale o [XAMPP](https://www.apachefriends.org/pt_br/index.html) que é uma ferramenta que reúne tudo que utilizaremos daqui para frente.

Com o XAMPP iniciado, dê start em Apache e MySQL e abra o shell.
```shell
# Acesse o diretório raíz do apache
$ cd c:\xampp\htdocs

# Clone este repositório
$ git clone https://github.com/erickRochaIP/waterfall-ecommerce.git

# Acesse o diretório do repositório
$ cd waterfall-ecommerce

# Crie o banco de dados (Você vai precisar criar um usuário primeiro)
$ mysql -P 'porta' -u 'nome_de_usuario' -p < create_database.sql

# Popule o banco de dados
$ mysql -P 'porta' -u 'nome_de_usuario' -p < seeds.sql
```
Em que nome_de_usuario é o nome do usuário usado, e porta é a porta do MySQL.

Com o repositório clonado no diretório raíz e o banco de dados criado, agora só precisamos deixar essas informações disponíveis para o PHP. No diretório do repositório, crie o arquivo database_connection.php no seguinte formato:
```
<?php

class Database{
   private $driver;
   private $host;
   private $port;
   private $dbname;
   private $username;
   private $password;
   private $connect;

   function __construct(){
        $this->driver = "mysql";
        $this->host = "localhost";
        $this->port = "porta";
        $this->dbname = "waterfall_db";
        $this->username = "nome_de_usuario";
        $this->password = "senha_de_usuario";
    }

    function getDbname(){
        return $this->dbname;
    }

   function getConnection(){
        $this->connect = new PDO(
            "$this->driver:host=$this->host;port=$this->port;dbname=$this->dbname",
            $this->username,
            $this->password
        );
        $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $this->connect;
    }
}

?>
```
Em que nome_de_usuario é o nome do usuário usado, e senha_de_usuario é a senha deste mesmo usuário.

Para testar se está tudo funcionando, abra o navegador e pesquise por: http://localhost/waterfall-ecommerce/test_connection.php
