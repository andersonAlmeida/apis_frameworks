CREATE TABLE FUNCAO
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20),
	NIVEL SMALLINT
);

CREATE TABLE ADMINISTRADOR
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL,
	EMAIL VARCHAR(50) NOT NULL,
	SENHA VARCHAR(255) NOT NULL,
	ID_FUNCAO INT
		REFERENCES FUNCAO(ID)
);

CREATE TABLE CLIENTE
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL,
	SOBRENOME VARCHAR(30) NOT NULL,
	NASCIMENTO DATE,
	CPF VARCHAR(20),
	RG VARCHAR(10),
	EMAIL VARCHAR(50) NOT NULL,
	SENHA VARCHAR(255) NOT NULL
);

CREATE TABLE ENDERECO
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL,
	LOGRADOURO VARCHAR(50) NOT NULL,
	NUMERO INT,
	BAIRRO VARCHAR(50),
	CEP VARCHAR(20),
	CIDADE VARCHAR(50) NOT NULL,
	ESTADO VARCHAR(50) NOT NULL,
	ID_PROPRIETARIO INT,
	TIPO INT
);

CREATE TABLE TELEFONE
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL,
	NUMERO VARCHAR(20) NOT NULL,
	ID_PROPRIETARIO INT,
	TIPO INT
);

CREATE TABLE FORNECEDOR
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(50) NOT NULL,
	RAZAO_SOCIAL VARCHAR(50) NOT NULL,
	CNPJ VARCHAR(20)
);

CREATE TABLE CATEGORIA
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL
);

CREATE TABLE MARCA
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(20) NOT NULL
);

CREATE TABLE PRODUTO
(
	ID SERIAL PRIMARY KEY,
	NOME VARCHAR(50) NOT NULL,
	PRECO DECIMAL(9,2),
	DESCRICAO VARCHAR(500),
	DESCONTO DECIMAL(9,2),
	ESTOQUE INT,
	ID_MARCA INT
		REFERENCES MARCA(ID),
	ID_CATEGORIA INT
		REFERENCES CATEGORIA(ID)
);

CREATE TABLE IMAGEM
(
	ID SERIAL PRIMARY KEY,
	TITULO VARCHAR(20),
	DESCRICAO VARCHAR(100),
	THUMB VARCHAR(100),
	IMAGEM VARCHAR(100),
	ID_PRODUTO INT
		REFERENCES PRODUTO(ID)
);

CREATE TABLE PEDIDO
(
	ID SERIAL PRIMARY KEY,
	TOTAL DECIMAL(9,2),
	PRAZO DATE,
	CODIGO_RASTREAMENTO VARCHAR(50),
	ID_CLIENTE INT
		REFERENCES CLIENTE(ID)
);

CREATE TABLE PRODUTO_PEDIDO
(
	ID SERIAL PRIMARY KEY,
	QUANTIDADE INT,
	ID_PRODUTO INT
		REFERENCES PRODUTO(ID),
	ID_PEDIDO INT
		REFERENCES PEDIDO(ID)
);






