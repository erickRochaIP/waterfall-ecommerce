DROP DATABASE IF EXISTS waterfall_db;
CREATE DATABASE waterfall_db;
USE waterfall_db;

CREATE TABLE USUARIO(
  LOGIN VARCHAR(50) NOT NULL,
  NOME VARCHAR(50) NOT NULL,
  SENHA VARCHAR(50) NOT NULL,
  ADMIN INT(1) NOT NULL,
  PRIMARY KEY(LOGIN)
);

CREATE TABLE CATEGORIA(
  NOME_CATEGORIA VARCHAR(50) NOT NULL,
  PRIMARY KEY (NOME_CATEGORIA)
);

CREATE TABLE PRODUTO(
  ID_PRODUTO INT(11) NOT NULL AUTO_INCREMENT,
  NOME_CATEGORIA VARCHAR(50) NOT NULL,
  NOME VARCHAR(50) NOT NULL,
  DESCRICAO VARCHAR(200),
  PRECO DECIMAL(10,2) NOT NULL,
  PRIMARY KEY(ID_PRODUTO),
  FOREIGN KEY (NOME_CATEGORIA) REFERENCES CATEGORIA(NOME_CATEGORIA),
  UNIQUE(NOME)
);

CREATE TABLE PEDIDO(
  ID_PEDIDO INT(11) NOT NULL AUTO_INCREMENT,
  STATUS INT(11) NOT NULL,
  LOGIN_USUARIO VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID_PEDIDO),
  FOREIGN KEY (LOGIN_USUARIO) REFERENCES USUARIO(LOGIN)
);

CREATE TABLE ITEM_PEDIDO(
  ID_PEDIDO INT(11) NOT NULL,
  ID_PRODUTO INT(11) NOT NULL,
  QUANTIDADE INT(11) NOT NULL,
  PRIMARY KEY(ID_PEDIDO, ID_PRODUTO),
  FOREIGN KEY (ID_PEDIDO) REFERENCES PEDIDO(ID_PEDIDO),
  FOREIGN KEY (ID_PRODUTO) REFERENCES PRODUTO(ID_PRODUTO)
);

CREATE TABLE PAGAMENTO(
  CODIGO INT(11) NOT NULL AUTO_INCREMENT,
  TIPO INT(11) NOT NULL,
  ENDERECO VARCHAR(200),
  ID_PEDIDO INT(11) NOT NULL,
  PRIMARY KEY(CODIGO),
  FOREIGN KEY (ID_PEDIDO) REFERENCES PEDIDO(ID_PEDIDO)
);

CREATE TABLE INFORMACAO(
  ID_PRODUTO INT(11) NOT NULL,
  TITULO VARCHAR(50) NOT NULL,
  CORPO VARCHAR(200) NOT NULL,
  PRIMARY KEY(ID_PRODUTO, TITULO),
  FOREIGN KEY (ID_PRODUTO) REFERENCES PRODUTO(ID_PRODUTO)
);

DELIMITER //
CREATE TRIGGER quantidade_item_pedido
AFTER INSERT ON ITEM_PEDIDO
FOR EACH ROW
BEGIN
	IF NEW.QUANTIDADE > 10 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: Não é permitido inserir linhas com QUANTIDADE maior que 10.';
    END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER status_pedido
AFTER UPDATE ON PEDIDO
FOR EACH ROW
BEGIN
	IF OLD.STATUS = 0 AND NEW.STATUS <> 0 THEN
		INSERT INTO PEDIDO(STATUS,LOGIN_USUARIO) VALUES(0,OLD.LOGIN_USUARIO);
    END IF;
END;
//
DELIMITER ;




DELIMITER //
CREATE TRIGGER status_pedido2
AFTER UPDATE ON PEDIDO
FOR EACH ROW
BEGIN
	IF OLD.STATUS <> 0 AND NEW.STATUS=0 THEN
		 SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: O que saiu do carrinho não pode voltar para o carrinho';
    END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER valor_item_neg_val
BEFORE INSERT ON PRODUTO
FOR EACH ROW
BEGIN
	IF NEW.PRECO <= 0  THEN
		 SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: Não é possível inserir valores negativos ';
    END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER password_condition
BEFORE INSERT ON USUARIO
FOR EACH ROW
BEGIN
	IF SUBSTRING(NEW.SENHA, 1, 1) = ' ' THEN
		 SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Erro: A senha não pode começar com um espaço em branco.';
    END IF;
END;
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER remocao_produto_carrinho
BEFORE UPDATE ON ITEM_PEDIDO
FOR EACH ROW
BEGIN
  IF NEW.QUANTIDADE = 0 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Erro: Produto não pode ser removido do carrinho.';
  END IF;
END;
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER blank_user
BEFORE UPDATE ON USUARIO
FOR EACH ROW
BEGIN
  IF LENGTH(NEW.LOGIN < 3) || SUBSTRING(NEW.LOGIN, 1, 1) = ' ' THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Erro: Usuario não pode ser inserido';
  END IF;
END;
//
DELIMITER ;
