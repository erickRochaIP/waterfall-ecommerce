DROP DATABASE IF EXISTS waterfall_db;
CREATE DATABASE waterfall_db;
USE waterfall_db;

CREATE TABLE usuario(
  login varchar(50) NOT NULL,
  nome varchar(50) NOT NULL,
  senha varchar(50) NOT NULL,
  admin int(1) NOT NULL,
  PRIMARY KEY(login)
);

CREATE TABLE categoria(
  nome_categoria varchar(50) NOT NULL,
  PRIMARY KEY (nome_categoria)
);

CREATE TABLE produto(
  id_produto int(11) NOT NULL AUTO_INCREMENT,
  nome_categoria varchar(50) NOT NULL,
  nome varchar(50) NOT NULL,
  descricao varchar(200),
  preco decimal(10,2) NOT NULL,
  PRIMARY KEY(id_produto),
  FOREIGN KEY (nome_categoria) REFERENCES categoria(nome_categoria),
  UNIQUE(nome)
);

CREATE TABLE pedido(
  id_pedido int(11) NOT NULL AUTO_INCREMENT,
  status int(11) NOT NULL,
  login_usuario varchar(50) NOT NULL,
  PRIMARY KEY(id_pedido),
  FOREIGN KEY (login_usuario) REFERENCES usuario(login)
);

CREATE TABLE item_pedido(
  id_pedido int(11) NOT NULL,
  id_produto int(11) NOT NULL,
  quantidade int(11) NOT NULL,
  PRIMARY KEY(id_pedido, id_produto),
  FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
  FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);

CREATE TABLE pagamento(
  codigo int(11) NOT NULL AUTO_INCREMENT,
  tipo int(11) NOT NULL,
  endereco varchar(200),
  id_pedido int(11) NOT NULL,
  PRIMARY KEY(codigo),
  FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido)
);

CREATE TABLE informacao(
  id_produto int(11) NOT NULL,
  titulo varchar(50) NOT NULL,
  corpo varchar(200) NOT NULL,
  PRIMARY KEY(id_produto, titulo),
  FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);