CREATE TABLE tipoSuino (
	idSuino			int					PRIMARY KEY,
	descricao		varchar(100)		NOT NULL
);

INSERT INTO tipoSuino VALUES (1, 'Terminação');
INSERT INTO tipoSuino VALUES (2, 'Creche');
INSERT INTO tipoSuino VALUES (3, 'Maternidade');


CREATE TABLE tipoRacao (
	idRacao				int				PRIMARY KEY,
	nomeRacao			varchar(100)	NOT NULL,
	tipoDestino			int				NOT NULL,
	FOREIGN KEY (tipoDestino) REFERENCES tipoSuino (idSuino)
);


CREATE TABLE produtor (
	idProdutor			serial			PRIMARY KEY,
	nomeProdutor		varchar(100)	NOT NULL,
	cidade				varchar(100)	NOT NULL,
	tipoSuino			int				NOT NULL,
	FOREIGN KEY (tipoSuino) REFERENCES tipoSuino(idSuino)
);

CREATE TABLE turnoPedido (
	idTurno				int				PRIMARY KEY,
	nomeTurno			varchar(5)		NOT NULL
);

INSERT INTO turnoPedido VALUES (1, 'Manhã');
INSERT INTO turnoPedido VALUES (2, 'Tarde');
INSERT INTO turnoPedido VALUES (3, 'Noite');

CREATE TABLE pedido (
	idPedido			serial			PRIMARY KEY,
	produtor			int				NOT NULL,
	tipoRacao			int				NOT NULL,
	peso				decimal(7,2)	NOT NULL,
	data				date			NOT NULL,
	turno				int				NOT NULL,
	FOREIGN KEY (produtor) REFERENCES produtor(idProdutor),
	FOREIGN KEY (tipoRacao) REFERENCES tipoRacao(idRacao),
	FOREIGN KEY (turno) REFERENCES turnoPedido(idTurno)
);

