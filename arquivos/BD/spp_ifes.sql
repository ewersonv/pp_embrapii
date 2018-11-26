-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Nov-2018 às 15:52
-- Versão do servidor: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: 'spp_ifes'
--

-- --------------------------------------------------------

--
-- Estrutura da tabela 'empresa'
--

DROP TABLE IF EXISTS 'empresa';
CREATE TABLE IF NOT EXISTS 'empresa' (
  'id_empresa' int(11) NOT NULL AUTO_INCREMENT,
  'nome_empresa' varchar(150) NOT NULL,
  'cnpj' varchar(150) NOT NULL,
  'tipo_empresa' varchar(150) NOT NULL,
  PRIMARY KEY ('id_empresa')
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela 'empresa'
--

INSERT INTO 'empresa' ('id_empresa', 'nome_empresa', 'cnpj', 'tipo_empresa') VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', ''),
(11, 'FAPIBNAFPS', '1111444422233', 'on'),
(12, 'ASPOFINPAISFN', '1231313213', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'pessoa'
--

DROP TABLE IF EXISTS 'pessoa';
CREATE TABLE IF NOT EXISTS 'pessoa' (
  'id_pessoa' int(11) NOT NULL AUTO_INCREMENT,
  'nome_pessoa' varchar(150) NOT NULL,
  'email' varchar(150) NOT NULL,
  'telefone' varchar(150) NOT NULL,
  'tipo_representante' varchar(150) NOT NULL,
  'cargo' varchar(150) NOT NULL,
  PRIMARY KEY ('id_pessoa')
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela 'pessoa'
--

INSERT INTO 'pessoa' ('id_pessoa', 'nome_pessoa', 'email', 'telefone', 'tipo_representante', 'cargo') VALUES
(1, 'Ewerson Vieira Nascimento', 'ewersonv@gmail.com', '27996187663', 'do IFES', 'Bolsista'),
(2, 'Estefano Vieira', 'estefano@gmail.com', '12312312312', 'do IFES', 'asdasd'),
(3, 'Deise', 'deise@gmail.com', '27999888998', 'do IFES', 'do IFES'),
(12, 'ASDAFSGDZXGF', 'ASFASF@EMAIL.COM', '', 'on', 'on'),
(13, 'AFAFSASFAAFF', 'FAAFSASFSA@EMAIL.COM', '', 'on', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'produto'
--

DROP TABLE IF EXISTS 'produto';
CREATE TABLE IF NOT EXISTS 'produto' (
  'id_produto' int(11) NOT NULL AUTO_INCREMENT,
  'justificativa' varchar(450) NOT NULL,
  PRIMARY KEY ('id_produto')
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela 'produto'
--

INSERT INTO 'produto' ('id_produto', 'justificativa') VALUES
(1, 'A criação do produto é justificada por causa de blabla'),
(2, 'Justificativa aparece aqui'),
(3, 'Aqui entra a justificativa'),
(4, '11111111111111111111111la'),
(5, 'Mais um Mais um Mais um Mais um Mais um Mais um Mais um'),
(6, 'XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX XXX'),
(15, ''),
(14, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'projeto'
--

DROP TABLE IF EXISTS 'projeto';
CREATE TABLE IF NOT EXISTS 'projeto' (
  'id_projeto' int(11) NOT NULL AUTO_INCREMENT,
  'riscos' varchar(450) DEFAULT NULL,
  'restricoes' varchar(450) DEFAULT NULL,
  'partes_interessadas' varchar(450) DEFAULT NULL,
  'entregas' varchar(450) DEFAULT NULL,
  'premissas' varchar(450) DEFAULT NULL,
  'efeitos' varchar(450) DEFAULT NULL,
  'requisitos' varchar(450) DEFAULT NULL,
  'custo' varchar(450) DEFAULT NULL,
  'cronograma' varchar(450) DEFAULT NULL,
  'equipe' varchar(450) DEFAULT NULL,
  'nome_projeto' varchar(450) DEFAULT NULL,
  PRIMARY KEY ('id_projeto')
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela 'projeto'
--

INSERT INTO 'projeto' ('id_projeto', 'riscos', 'restricoes', 'partes_interessadas', 'entregas', 'premissas', 'efeitos', 'requisitos', 'custo', 'cronograma', 'equipe', 'nome_projeto') VALUES
(1, 'Riscos 1 aaaa', 'Restricoes aaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Os efeitos que poderão ser notados aaaa', 'Este projeto depende dos seguintes requisitos aaaaa', 'O projeto tem um custo estimado de aaaaaaaaaa', 'Equipe projeto 1', 'Cronograma projeto 1', 'Novo tijolo refratario'),
(2, 'Riscos 2 bbbb', 'Restricoes bbbbbbbbbb', 'As empresas interessadas sao bbbbBBBbb', 'As datas das entregas estão previstas para bbbbbb', 'O projeto parte das seguintes premissas bbbbbb', 'Os efeitos que poderão ser notados bbbbbbbbbb', 'Este projeto depende dos seguintes requisitos bbbbbbbbbb', 'O projeto tem um custo estimado de bbbbBBBBBB', 'Equipe projeto 2', 'Cronograma projeto 2', 'Produto teste'),
(3, 'Riscos 3 CCCCC', 'Restricoes CCCCCC', 'As empresas interessadas sao CCCccccCCCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Os efeitos que poderão ser notados CCCcccCC', 'Este projeto depende dos seguintes requisitos CCccC', 'O projeto tem um custo estimado de CCCccccCCC', 'Equipe projeto 3', 'Cronograma projeto 3', 'Teste teste teste'),
(4, 'Riscos projeto4projeto4projeto4projeto4projeto4', 'Restricoes projeto4', 'As empresas no projeto4', 'As datas das entregas do projeto4', 'O projeto4 parte das seguintes premissas aaaa', 'Os efeitos do projeto4', 'projeto4 depende dos seguintes requisitos', 'O projeto4 tem um custo estimado de 999999', 'Equipe projeto 4', 'Cronograma projeto 4', 'Produto novo 1'),
(5, 'Riscos de mais um projeto', 'Restricoes de mais um projeto', 'As empresas interessadas em mais um projeto', 'As datas das entregas de mais um projeto', 'Premissas de mais um projeto', 'Os efeitos que poderão ser notados de mais um projeto', 'Mais um projeto que depende dos seguintes requisitos', 'Mais um projeto que tem um custo estimado de ', 'Equipe projeto 5', 'Cronograma projeto 5', 'Mais um produto'),
(6, 'Riscos XXXXXX', 'Restricoes XXXXXX', 'As empresas interessadas sao XXXXXXXXXXXX', 'As datas das entregas estão previstas para XXXXXXXXXXXX', 'O projeto parte das seguintes premissas XXXXXXXXXXXX', 'Os efeitos que poderão ser notados XXXXXXXXXXXXXXXXXX', 'Este projeto depende dos seguintes requisitos XXXXXX', 'O projeto tem um custo estimado de XXXXXXXXXXXX', 'Equipe projeto XXX', 'Cronograma projeto XXX', 'Produto novo X'),
(14, '', '', '', '', '', '', '', '', '', '', 'LALALALAL'),
(15, '', '', '', '', '', '', '', '', '', '', 'PIAFNPANPSF');

-- --------------------------------------------------------

--
-- Estrutura da tabela 'proposta'
--

DROP TABLE IF EXISTS 'proposta';
CREATE TABLE IF NOT EXISTS 'proposta' (
  'id_proposta' int(11) NOT NULL AUTO_INCREMENT,
  'tipo_proposta' varchar(150) NOT NULL,
  'resumo_proposta' varchar(8000) NOT NULL,
  'fk_id_empresa' int(11) NOT NULL,
  'fk_id_pessoa' int(11) NOT NULL,
  'fk_id_produto' int(11) NOT NULL,
  'fk_id_projeto' int(11) NOT NULL,
  PRIMARY KEY ('id_proposta'),
  KEY 'fk_id_empresa' ('fk_id_empresa'),
  KEY 'fk_id_pessoa' ('fk_id_pessoa'),
  KEY 'fk_id_produto' ('fk_id_produto'),
  KEY 'fk_id_projeto' ('fk_id_projeto')
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela 'proposta'
--

INSERT INTO 'proposta' ('id_proposta', 'tipo_proposta', 'resumo_proposta', 'fk_id_empresa', 'fk_id_pessoa', 'fk_id_produto', 'fk_id_projeto') VALUES
(1, 'Projeto de inovação', 'Aqui ficam as informações da proposta prospectada, para que haja uma conversa posteriormente a fim de detalhar melhor as especificações do projeto.', 1, 1, 1, 1),
(2, 'Projeto de inovação', 'asdadsasddsad\r\nas\r\ndsa\r\ndsa\r\ndsa\r\ndsa\r\nads\r\ndsa\r\nasd\r\nsad\r\nasd\r\nasdasdasd\r\nasd\r\nasd\r\na\r\ndsa\r\nds', 2, 2, 2, 2),
(3, 'Prestação de serviço tecnológica', 'nafsnsaçasfnçasnfçlkansflçkansfçkansfaksnfçaksnfçansfaksnfasfkaknfçançkfçknafçnkfnkçfasnkçfasknçfasfasfas\r\nfanfsa\r\nfasn\r\nfs\r\nff\r\nsankfnkçfsaknçfskçnfsaçknfasçkn\r\n\r\n\r\nankasfnkfasknçafsçkçfknsakfçnasknçfas\r\n\r\n\r\nkfanççknafskçnafsçknmafs\r\n\r\nafknçafsçknfkaçsçknfam\r\n\r\nafknasknfçasçkmnfasçknfas', 3, 3, 3, 3),
(4, 'Projeto de inovação', 'AAAAAAAAAAAAAAAAAAAAAAA', 1, 1, 4, 4),
(5, 'Projeto de inovação', 'BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB', 2, 2, 5, 5),
(6, '', 'daisodbnpaisnfaiosfnpiasfnaf', 3, 3, 6, 6),
(9, 'on', 'OAIUFBOAISNFOASUFS', 11, 12, 14, 14),
(10, 'on', 'POUGOAIBSNFOGIANSF', 12, 13, 15, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
