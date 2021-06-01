CREATE TABLE tipoSuino (
	idSuino				serial			PRIMARY KEY,
	descricao		varchar(100)		NOT NULL
);

CREATE TABLE tipoRacao (
	idRacao				serial			PRIMARY KEY,
	nomeRacao			varchar(100)	NOT NULL
);

CREATE TABLE cidade (
	idCidade			serial			PRIMARY KEY,
	nomeCidade			varchar(100)	NOT NULL
);

CREATE TABLE produtor (
	idProdutor			serial			PRIMARY KEY,
	nomeProdutor		varchar(100)	NOT NULL,
	cidade				int				NOT NULL,
	tipoSuino			int				NOT NULL,
	FOREIGN KEY (tipoSuino) REFERENCES tipoSuino(idSuino),
	FOREIGN KEY	(cidade) REFERENCES cidade(idCidade)
);

CREATE TABLE registroPedido (
	idPedido			serial			PRIMARY KEY,
	produtor			int				NOT NULL,
	tipoRacao			int				NOT NULL,
	data				date			NOT NULL,
	turno				varchar(8)		NOT NULL,
	FOREIGN KEY (produtor) REFERENCES produtor(idProdutor),
	FOREIGN KEY (tipoRacao) REFERENCES tipoRacao(idRacao)
);

