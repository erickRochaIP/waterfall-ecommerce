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

CREATE TABLE produto(
  id_produto int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_produto)
);

CREATE TABLE avaliacao(
  login_usuario varchar(50) NOT NULL,
  id_produto int(11) NOT NULL,
  nota int(1) NOT NULL,
  comentario varchar(200),
  PRIMARY KEY(login_usuario, id_produto),
  FOREIGN KEY (login_usuario) REFERENCES usuario(login),
  FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);