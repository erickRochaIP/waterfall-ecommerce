USE waterfall_db;

INSERT INTO usuario(login, nome, senha, admin) 
VALUES("rochinha@gmail.com", "Rochinha Gamer", "1234", 1);

INSERT INTO usuario(login, nome, senha, admin) 
VALUES("ana@outlook.com", "Ana", "5678", 0);

INSERT INTO usuario(login, nome, senha, admin) 
VALUES("gisele@protonmail.com", "Gisele", "1423", 1);

INSERT INTO usuario(login, nome, senha, admin) 
VALUES("andre@gmail.com", "Andre", "101010", 0);

INSERT INTO usuario(login, nome, senha, admin) 
VALUES("admin", "admin", "admin", 1);

INSERT INTO categoria VALUES("JOGOS");
INSERT INTO categoria VALUES("COMPUTADORES DE MESA");
INSERT INTO categoria VALUES("NOTEBOOKS");
INSERT INTO categoria VALUES("CELULARES");
INSERT INTO categoria VALUES("PEÇAS");

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(12011,"CELULARES", "Samsung Galaxy S23 128GB", 
"Smartphone Samsung Galaxy S23 128GB Verde 5G 8GB RAM 6,1 Câm Tripla + Selfie 12MP", 
3869.10);

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(141423,"JOGOS", "FIFA2024", 
"EA Sports FC 24 - PlayStation 5", 
316.70);

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(9897634,"NOTEBOOKS", "Notebook acer Aspire 5 A515", 
"Notebook acer Aspire 5 A515-54G-53GP CI5 8 GB 256 GB SSD NVDIA® GeForce MX250 15.6 Win 10", 
4773.70);

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(98786354,"PEÇAS", "Memória RAM 16GB", 
"Memória de 16GB DIMM DDR4 3200Mhz FURY Beast 1,35V 1Rx8 288 pinos para desktop/gamers, Preto", 
262.97);

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(954,"COMPUTADORES DE MESA", "PC GAMER RYZEN", 
"PC GAMER RYZEN 7 5700G, 16GB DDR4 3200MHZ, SSD M.2 NVME 250GB, VEGA 7", 
2679);

INSERT INTO produto(id_produto, nome_categoria, nome, descricao, preco)
VALUES(35709874,"JOGOS", "Lies of P", 
"Lies of P - PlayStation 4", 
2679);

