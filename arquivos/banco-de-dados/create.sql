DROP TABLE IF EXISTS empresa;
CREATE TABLE IF NOT EXISTS empresa (
  id_empresa int(11) NOT NULL AUTO_INCREMENT,
  nome_empresa varchar(150) NOT NULL,
  cnpj varchar(150) NOT NULL,
  tipo_empresa varchar(150) NOT NULL,
  PRIMARY KEY (id_empresa)
);

DROP TABLE IF EXISTS pessoa;
CREATE TABLE IF NOT EXISTS pessoa (
  id_pessoa int(11) NOT NULL AUTO_INCREMENT,
  nome_pessoa varchar(150) NOT NULL,
  email varchar(150) NOT NULL,
  telefone varchar(150) NOT NULL,
  tipo_representante varchar(150) NOT NULL,
  cargo varchar(150) NOT NULL,
  PRIMARY KEY (id_pessoa)
);

DROP TABLE IF EXISTS produto;
CREATE TABLE IF NOT EXISTS produto (
  id_produto int(11) NOT NULL AUTO_INCREMENT,
  justificativa varchar(450) NOT NULL,
  PRIMARY KEY (id_produto)
);

DROP TABLE IF EXISTS projeto;
CREATE TABLE IF NOT EXISTS projeto (
  id_projeto int(11) NOT NULL AUTO_INCREMENT,
  riscos varchar(450) DEFAULT NULL,
  restricoes varchar(450) DEFAULT NULL,
  partes_interessadas varchar(450) DEFAULT NULL,
  entregas varchar(450) DEFAULT NULL,
  premissas varchar(450) DEFAULT NULL,
  efeitos varchar(450) DEFAULT NULL,
  requisitos varchar(450) DEFAULT NULL,
  custo varchar(450) DEFAULT NULL,
  cronograma varchar(450) DEFAULT NULL,
  equipe varchar(450) DEFAULT NULL,
  nome_produto varchar(450) NOT NULL,
  PRIMARY KEY (id_projeto)
);

DROP TABLE IF EXISTS proposta;
CREATE TABLE IF NOT EXISTS proposta (
  id_proposta int(11) NOT NULL AUTO_INCREMENT,
  tipo_proposta varchar(150) NOT NULL,
  resumo_proposta varchar(8000) NOT NULL,
  fk_id_empresa int(11) NOT NULL,
  fk_id_pessoa int(11) NOT NULL,
  fk_id_produto int(11) NOT NULL,
  fk_id_projeto int(11) NOT NULL,
  PRIMARY KEY (id_proposta)
);

ALTER TABLE proposta
    ADD CONSTRAINT fk_id_empresa
    FOREIGN KEY (fk_id_empresa)
    REFERENCES empresa(id_empresa)
    ON UPDATE CASCADE;

ALTER TABLE proposta
    ADD CONSTRAINT fk_id_pessoa
    FOREIGN KEY (fk_id_pessoa)
    REFERENCES pessoa(id_pessoa)
    ON UPDATE CASCADE;

ALTER TABLE proposta
    ADD CONSTRAINT fk_id_produto
    FOREIGN KEY (fk_id_produto)
    REFERENCES produto(id_produto)
    ON UPDATE CASCADE;

ALTER TABLE proposta
    ADD CONSTRAINT fk_id_projeto
    FOREIGN KEY (fk_id_projeto)
    REFERENCES projeto(id_projeto)
    ON UPDATE CASCADE;