/* fisico: */

CREATE TABLE EMPRESA (
    id_empresa INTEGER PRIMARY KEY,
    nome_empresa VARCHAR(100),
    cnpj VARCHAR(14)
);

CREATE TABLE PESSOA (
    id_pessoa INTEGER PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(11)
);

CREATE TABLE PROJETO (
    id_projeto INTEGER PRIMARY KEY,
    viabilidade VARCHAR(2000),
    efeitos VARCHAR(2000),
    equipe VARCHAR(2000),
    nome_projeto VARCHAR(100),
    riscos VARCHAR(2000),
    entregas VARCHAR(2000),
    premissas VARCHAR(2000),
    cronograma VARCHAR(2000),
    custo VARCHAR(2000),
    anotacoes_complementares VARCHAR(2000),
    interessados VARCHAR(2000),
    id_empresa INTEGER,
    id_pessoa INTEGER
);

CREATE TABLE PRODUTO (
    id_produto INTEGER PRIMARY KEY,
    descricao_produto VARCHAR(4000),
    id_projeto INTEGER
);
 
ALTER TABLE PROJETO ADD CONSTRAINT FK_PROJETO_1
    FOREIGN KEY (id_empresa)
    REFERENCES EMPRESA (id_empresa)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE PROJETO ADD CONSTRAINT FK_PROJETO_2
    FOREIGN KEY (id_pessoa)
    REFERENCES PESSOA (id_pessoa)
    ON DELETE RESTRICT ON UPDATE RESTRICT;
 
ALTER TABLE PRODUTO ADD CONSTRAINT FK_PRODUTO_1
    FOREIGN KEY (id_projeto)
    REFERENCES PROJETO (id_projeto)
    ON DELETE RESTRICT ON UPDATE RESTRICT;