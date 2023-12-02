USE waterfall_db;

INSERT INTO USUARIO(LOGIN, NOME, SENHA, ADMIN) 
VALUES("rochinha@gmail.com", "Rochinha Gamer", "1234", 1);

INSERT INTO USUARIO(LOGIN, NOME, SENHA, ADMIN) 
VALUES("ana@outlook.com", "Ana", "5678", 0);

INSERT INTO USUARIO(LOGIN, NOME, SENHA, ADMIN) 
VALUES("gisele@protonmail.com", "Gisele", "1423", 1);

INSERT INTO USUARIO(LOGIN, NOME, SENHA, ADMIN) 
VALUES("andre@gmail.com", "Andre", "101010", 0);

INSERT INTO USUARIO(LOGIN, NOME, SENHA, ADMIN) 
VALUES("admin", "admin", "admin", 1);

INSERT INTO CATEGORIA VALUES("JOGOS");
INSERT INTO CATEGORIA VALUES("COMPUTADORES DE MESA");
INSERT INTO CATEGORIA VALUES("NOTEBOOKS");
INSERT INTO CATEGORIA VALUES("CELULARES");
INSERT INTO CATEGORIA VALUES("PEÇAS");

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(12011,"CELULARES", "Samsung Galaxy S23 128GB", 
"Smartphone Samsung Galaxy S23 128GB Verde 5G 8GB RAM 6,1 Câm Tripla + Selfie 12MP", 
3869.10);

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO) 
VALUES(1200000,"CELULARES", "Motorola Moto E22 128G", 
"Smartphone Motorola Moto E22 4G 128GB 4GB RAM Preto, Tela de 6,5", 
749.00);

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Marca", "Samsung");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Modelo" , "S22");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Linha", "Galaxy");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Cor", "Verde");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Armazenamento Interno", "256GB");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Informações da Armazenamento Interno", "A memória total pode variar conforme aplicativos pré-instalados e sistema operacional");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Memória RAM", "8GB");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Tipo de Tela", "Infinita Dynamic AMOLED 2X");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Tamanho da Tela", "6,1");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Resolução da Tela", "FHD+ (2340x1080)");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Taxa de Atualização da Tela", "48-120Hz");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Tecnologia", "5G");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Conectividade", "Wi-Fi, Bluetooth");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Processador", "Octa-Core");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Velocidade do Processador", "2.99GHz");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Sistema Operacional", "Android");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Capacidade da Bateria", "3700mAh");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(12011, "Carregamento Rápido", "25W");

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(141423,"JOGOS", "FIFA2024", 
"EA Sports FC 24 - PlayStation 5", 
316.70);

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Idioma", "Inglês");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Dimensões do produto", "2 x 10 x 10 cm; 80 g");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Certificação", "Não aplicável");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Número do modelo", "SL-11");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Data de lançamento", "29 setembro 2023");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "Legendas", "Português, Espanhol, Inglês");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(141423, "País de origem", "Brasil");

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(9897634,"NOTEBOOKS", "Notebook acer Aspire 5 A515", 
"Notebook acer Aspire 5 A515-54G-53GP CI5 8 GB 256 GB SSD NVDIA® GeForce MX250 15.6 Win 10", 
4773.70);

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(9897634, "Processador", "Intel Core i5");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(9897634, "Memória RAM", "8GB");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(9897634, "Tela", "LED 15.6");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(9897634, "Resolução", "1920x1080 px");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(9897634, "Placa de vídeo", "Intel UHD Graphics 620");
INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(98786354,"PEÇAS", "Memória RAM 16GB", 
"Memória de 16GB DIMM DDR4 3200Mhz FURY Beast 1,35V 1Rx8 288 pinos para desktop/gamers, Preto", 
262.97);
INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Marca", "Kingston");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Modelo", "KF432C16BB1/16");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Fator de forma", "DDR4");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Velocidade", "3200 MHz");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Latência", "CL16");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(98786354, "Capacidade", "16GB");

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(954,"COMPUTADORES DE MESA", "PC GAMER RYZEN", 
"PC GAMER RYZEN 7 5700G, 16GB DDR4 3200MHZ, SSD M.2 NVME 250GB, VEGA 7", 
2679);

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Marca", "TOP SYSTEM INFORMÁTICA");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Sistema operacional", "Windows 10");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Memória RAM", "16GB");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Modelo da CPU", "Ryzen 7");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Fabricante da CPU", "AMD");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Velocidade da CPU", "3,8 GHz");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Tamanho máximo da memória RAM", "64GB");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Disco rígido", "SSD");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(954, "Número do modelo da CPU", "RYZEN 7 5700G");

INSERT INTO PRODUTO(ID_PRODUTO, NOME_CATEGORIA, NOME, DESCRICAO, PRECO)
VALUES(35709874,"JOGOS", "Lies of P", 
"Lies of P - PlayStation 4", 
2679);

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(35709874, "Plataforma", "PS4");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(35709874, "Multijogador", "Sim");
 
INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(35709874, "Formato", "Físico");

INSERT INTO INFORMACAO(ID_PRODUTO,TITULO,CORPO)
VALUES(35709874, "Jogabilidade online", "Sim");

INSERT INTO PEDIDO (ID_PEDIDO, LOGIN_USUARIO, STATUS)
VALUES(101, "andre@gmail.com", 0);

INSERT INTO PEDIDO (ID_PEDIDO, LOGIN_USUARIO, STATUS)
VALUES(102,"andre@gmail.com", 0);

INSERT INTO PEDIDO (ID_PEDIDO, LOGIN_USUARIO, STATUS)
VALUES(103,"ana@outlook.com", 0);

INSERT INTO PEDIDO (ID_PEDIDO, LOGIN_USUARIO, STATUS)
VALUES(104, "andre@gmail.com", 0);

INSERT INTO PEDIDO (ID_PEDIDO, LOGIN_USUARIO, STATUS)
VALUES(105, "ana@outlook.com", 0);

INSERT INTO ITEM_PEDIDO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
VALUES(101, 954, 1);

INSERT INTO ITEM_PEDIDO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
VALUES(102, 12011, 3);

INSERT INTO ITEM_PEDIDO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
VALUES(103, 141423, 2);

INSERT INTO ITEM_PEDIDO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
VALUES(104, 9897634, 1);

INSERT INTO ITEM_PEDIDO (ID_PEDIDO, ID_PRODUTO, QUANTIDADE)
VALUES(105, 35709874, 2);
