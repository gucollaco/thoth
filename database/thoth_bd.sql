DROP DATABASE IF EXISTS thoth;

CREATE DATABASE thoth;

USE thoth;

CREATE TABLE unidade (
    codunidade int AUTO_INCREMENT,
    cidade varchar(50) not null,
	
    PRIMARY KEY (codunidade)
);

CREATE TABLE coordenador (
    codcoordenador int AUTO_INCREMENT,
	rm varchar(50) not null,
    nome varchar(50) not null,
    login varchar(50) not null,
    senha varchar(50) not null,
	
    PRIMARY KEY (codcoordenador)
);

CREATE TABLE corretor (
    codcorretor int AUTO_INCREMENT,
	rm varchar(50),
    nome varchar(50),
    login varchar(50),
    senha varchar(50),
    hashcorretor varchar(21) not null,
    codcoordenador int not null,
	
    codunidade int,
	
    PRIMARY KEY (codcorretor),
    FOREIGN KEY (codunidade) REFERENCES unidade (codunidade),
    FOREIGN KEY (codcoordenador) REFERENCES coordenador (codcoordenador)
);

CREATE TABLE aluno (
    codaluno int AUTO_INCREMENT,
	rm varchar(50),
    nome varchar(50),
    login varchar(50),
    senha varchar(50),
	turma varchar(20) not null,
    hashaluno varchar(21) not null,
	
    codunidade int not null,
	codcoordenador int not null,
	
    PRIMARY KEY (codaluno),
    FOREIGN KEY (codunidade) REFERENCES unidade (codunidade),
    FOREIGN KEY (codcoordenador) REFERENCES coordenador (codcoordenador)
);

CREATE TABLE categoria_redacao (
    codcategoria int AUTO_INCREMENT,
    nome varchar(50) not null,
	
    PRIMARY KEY (codcategoria)
);

CREATE TABLE criterio (
    codcriterio int AUTO_INCREMENT,
    nome varchar(50) not null,
	descricao varchar(300) not null,
	notatotal float not null,
	extra mediumtext not null,
	
	codcategoria int not null,
	
    PRIMARY KEY (codcriterio),
    FOREIGN KEY (codcategoria) REFERENCES categoria_redacao (codcategoria)
);


CREATE TABLE coletania (
    codcoletania int AUTO_INCREMENT,
    nome varchar(50) not null,
    arquivo varchar(50) not null,
	
    PRIMARY KEY (codcoletania)
);

CREATE TABLE redacao (
    codredacao int AUTO_INCREMENT,
    semana int not null,
    nota float not null,
    estado varchar(20) not null,
    caminho varchar(200) not null,
    observacao varchar(300) not null,
    datahora_correcao datetime,
	
	codaluno int not null,
	codcorretor int not null,
	codcategoria int not null,
	codcoletania int not null,
	
    PRIMARY KEY (codredacao),
    FOREIGN KEY (codaluno) REFERENCES aluno (codaluno),
    FOREIGN KEY (codcorretor) REFERENCES corretor (codcorretor),
    FOREIGN KEY (codcategoria) REFERENCES categoria_redacao (codcategoria),
    FOREIGN KEY (codcoletania) REFERENCES coletania (codcoletania)
);

CREATE TABLE resultado_criterio (
	codcriterio int not null,
	codredacao int not null,
	notaparcial float not null,
	
    PRIMARY KEY (codcriterio, codredacao),
    FOREIGN KEY (codcriterio) REFERENCES criterio (codcriterio),
    FOREIGN KEY (codredacao) REFERENCES redacao (codredacao)
);

CREATE TABLE comentario (
	codcomentario int AUTO_INCREMENT,
	codautor int not null,
	tipoautor varchar(50) not null,
	descricao varchar(300) not null,
    datahora_comentario datetime not null,
	
    PRIMARY KEY (codcomentario)
);

CREATE TABLE comentario_comum (
	codcomentariocomum int AUTO_INCREMENT,
	descricao varchar(300) not null,
	
    PRIMARY KEY (codcomentariocomum)
);

CREATE TABLE erro_comum (
	coderroscomum int AUTO_INCREMENT,
	descricao varchar(300) not null,
	
    PRIMARY KEY (coderroscomum)
);

CREATE TABLE redacao_comentario (
	codredacao int not null,
	codcomentario int not null,
	
    PRIMARY KEY (codredacao, codcomentario),
    FOREIGN KEY (codredacao) REFERENCES redacao (codredacao),
    FOREIGN KEY (codcomentario) REFERENCES comentario (codcomentario)
);

CREATE TABLE acesso (
	codcorretor int not null,
	datahora_acesso	datetime not null,
	
    PRIMARY KEY (codcorretor, datahora_acesso),
    FOREIGN KEY (codcorretor) REFERENCES corretor (codcorretor)
);

INSERT INTO unidade VALUES (NULL, 'Sao Jose dos Campos');
INSERT INTO unidade VALUES (NULL, 'Sao Paulo');
INSERT INTO unidade VALUES (NULL, 'Rio de Janeiro');

INSERT INTO coordenador VALUES (NULL, '11111', 'Danilo', 'Danilo', 'danilo123');

INSERT INTO corretor VALUES (NULL, '22222', 'Pedro', 'Pedro', 'pedro123', '...', 1, 1);
INSERT INTO corretor VALUES (NULL, '33333', 'Joana', 'Joana', 'joana123', '...', 1, 1);

INSERT INTO aluno VALUES (NULL, '44444', 'Gustavo', 'Gustavo', 'gustavo123', '1A', '...', 1, 1);
INSERT INTO aluno VALUES (NULL, '55555', 'Alexandre', 'Gustavo', 'alexandre123', '1A', '...', 1, 1);
INSERT INTO aluno VALUES (NULL, '77777', 'Marli', 'Gustavo', 'marli123', '1B', '...', 1, 1);

INSERT INTO categoria_redacao VALUES (NULL, 'ENEM');
INSERT INTO categoria_redacao VALUES (NULL, 'FUVEST');
INSERT INTO categoria_redacao VALUES (NULL, 'VUNESP');
INSERT INTO categoria_redacao VALUES (NULL, 'ITA');

INSERT INTO criterio VALUES (NULL, 'Proposta e Abordagem do Tema', 'A leitura da Proposta e da Coletânea deve ser o ponto de partida para a elaboração do projeto de texto.', 2.0, '...',  3);
INSERT INTO criterio VALUES (NULL, 'Tipo de Texto e Coerência', 'Neste critério, avalia-se o desenvolvimento do tipo de texto dissertativo e como a argumentação é construída.', 4.0, '...', 3);
INSERT INTO criterio VALUES (NULL, 'Elementos Linguísticos', 'Avalia-se, neste critério, o uso dos recursos formais da língua portuguesa expressos na superfície textual.', 4.0, '...', 3);

INSERT INTO coletania VALUES (NULL, 'Desigualdade Social no Brasil', '...');
INSERT INTO coletania VALUES (NULL, 'Pobreza no Brasil', '...');
INSERT INTO coletania VALUES (NULL, 'Preparar o Brasil para os idosos', '...');
INSERT INTO coletania VALUES (NULL, 'Sistema Educacional no Brasil', '...');

INSERT INTO redacao VALUES (NULL, 20, 7.0, 'Corrigida', '...', '...', '2018-05-18 17:00:00', 1, 1, 3, 3);
INSERT INTO redacao VALUES (NULL, 20, 7.0, 'Não corrigida', '...', '...', NULL, 2, 2, 3, 3);

INSERT INTO comentario VALUES (NULL, 1, 'corretor', 'Texto Clichê', '2018-05-18 17:30:00');
INSERT INTO comentario VALUES (NULL, 1, 'aluno', 'Ok.', '2018-05-18 18:00:00');
INSERT INTO comentario VALUES (NULL, 1, 'corretor', 'Texto Clichê', '2018-05-18 17:30:00');
INSERT INTO comentario VALUES (NULL, 1, 'corretor', 'Texto Clichê', '2018-05-18 17:30:00');

INSERT INTO comentario_comum VALUES (NULL, 'Argumentação muito bem definida.');
INSERT INTO comentario_comum VALUES (NULL, 'Texto Clichê. Buscar utilizar mais a criatividade.');
INSERT INTO comentario_comum VALUES (NULL, 'Muito bem escrito. Parabéns.');

INSERT INTO erro_comum VALUES (NULL, 'Erro gramatical.');
INSERT INTO erro_comum VALUES (NULL, 'Erro semântico.');

INSERT INTO redacao_comentario VALUES (1, 1);
INSERT INTO redacao_comentario VALUES (1, 2);

INSERT INTO resultado_criterio VALUES (1, 1, 1.0);
INSERT INTO resultado_criterio VALUES (2, 1, 2.0);
INSERT INTO resultado_criterio VALUES (3, 1, 4.0);

INSERT INTO acesso VALUES (1, '2018-05-16 15:00:00');
INSERT INTO acesso VALUES (1, '2018-05-17 16:00:00');
INSERT INTO acesso VALUES (1, '2018-05-18 17:00:00');
INSERT INTO acesso VALUES (2, '2018-05-18 17:30:00');
