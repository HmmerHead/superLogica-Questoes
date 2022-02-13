-- Utilizou-se o mysql para a execucao desse script


CREATE TABLE USUARIO (
    Id INTEGER not null,
    Cpf varchar(11) PRIMARY KEY NOT NULL,
    nome varchar(255) NOT NULL
);


CREATE TABLE INFO (
    Id INTEGER PRIMARY KEY,
    Cpf varchar(11),
    genero ENUM('F','M'),
    ano_nascimento SMALLINT NOT NULL,
    constraint fk_usuario foreign key (Cpf) references USUARIO (Cpf)
);

-- insert Usuario
INSERT INTO USUARIO VALUES (1, '16798125050', 'Luke Skywalker');
INSERT INTO USUARIO VALUES (2, '59875804045', 'Bruce Wayne');
INSERT INTO USUARIO VALUES (3, '04707649025', 'Diane Prince');
INSERT INTO USUARIO VALUES (4, '21142450040', 'Bruce Banner');
INSERT INTO USUARIO VALUES (5, '83257946074', 'Harley Quinn');
INSERT INTO USUARIO VALUES (6, '07583509025', 'Peter Parker');

-- insert INFO
INSERT INTO INFO VALUES (1, '16798125050', 'M', 1976);
INSERT INTO INFO VALUES (2, '59875804045', 'M', 1960);
INSERT INTO INFO VALUES (3, '04707649025', 'F', 1988);
INSERT INTO INFO VALUES (4, '21142450040', 'M', 1954);
INSERT INTO INFO VALUES (5, '83257946074', 'F', 1970);
INSERT INTO INFO VALUES (6, '07583509025', 'M', 1972);


-- Consulta
    SELECT
    concat(USUARIO.nome, ' - ', INFO.genero) as "usuário",
    case
        when (year(now()) - INFO.ano_nascimento) > 50 then "SIM"
        when (year(now()) - INFO.ano_nascimento) <= 50 then "NÃO"
    END as maior_50_anos
    FROM USUARIO
        join INFO on INFO.Cpf = USUARIO.Cpf
    where INFO.genero = 'M'
    limit 3
