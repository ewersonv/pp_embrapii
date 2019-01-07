-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Jan-2019 às 16:19
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
-- Database: `spp_ifes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `tipo_empresa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `tipo_empresa`) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte'),
(4, 'Empresa7', '12123444433377', 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pessoa` varchar(100) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome_pessoa`, `telefone`, `email`) VALUES
(1, 'Ewerson Vieira Nascimento', '27996187663', 'ewersonv@gmail.com'),
(2, 'Estefano Vieira', '12312312312', 'estefano@gmail.com'),
(3, 'Deise', '27999888998', 'deise@gmail.com'),
(4, 'Pessoa7', '27123457777', 'pessoa7@email.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(450) DEFAULT NULL,
  `descricao_produto` varchar(4000) DEFAULT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `FK_PRODUTO_1` (`id_projeto`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `descricao_produto`, `id_projeto`) VALUES
(1, 'Tijolo refratário', 'O novo tijolo refratário consiste na ideia de ...', 1),
(2, 'Produto teste', 'O produto teste é composto por ...', 2),
(3, 'Produto projeto 3', 'Aqui entra a descrição do produto do projet 3', 3),
(4, 'Produto do projeto 4', 'Descrição produto/projeto 4', 4),
(5, 'Nome de mais um produto', 'Mais uma descrição de produto', 5),
(6, 'Produto do projeto 6', 'O produto do projeto 6 realizará tais tarefas e é composto por ...', 6),
(7, 'Produto do Projeto 7', 'Descrição do produto do Projeto 7', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `viabilidade` varchar(2000) DEFAULT NULL,
  `efeitos` varchar(2000) DEFAULT NULL,
  `equipe` varchar(2000) DEFAULT NULL,
  `nome_projeto` varchar(100) DEFAULT NULL,
  `riscos` varchar(2000) DEFAULT NULL,
  `entregas` varchar(2000) DEFAULT NULL,
  `premissas` varchar(2000) DEFAULT NULL,
  `cronograma` varchar(2000) DEFAULT NULL,
  `custo` varchar(2000) DEFAULT NULL,
  `interessados` varchar(2000) DEFAULT NULL,
  `anotacoes_complementares` varchar(2000) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `FK_PROJETO_1` (`id_empresa`),
  KEY `FK_PROJETO_2` (`id_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `viabilidade`, `efeitos`, `equipe`, `nome_projeto`, `riscos`, `entregas`, `premissas`, `cronograma`, `custo`, `interessados`, `anotacoes_complementares`, `id_empresa`, `id_pessoa`) VALUES
(1, 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados aaaa', 'Equipe projeto 1', 'Novo tijolo refratario', 'Riscos 1 aaaa', 'As datas das entregas estão previstas para aaaa', 'O projeto parte das seguintes premissas aaaa', 'Cronograma projeto 1', 'O projeto tem um custo estimado de aaaaaaaaaa', 'As empresas interessadas sao aaa aaa aaa', 'Aqui entram as anotações complementares a respeito do projeto para explicações mais profundas sobre o que será feito', 1, 1),
(2, 'A viabilidade deste projeto se dá por ...', 'Os efeitos que poderão ser notados BBBBbbbbBBBB', 'Equipe do projeto 2', 'Produto teste', 'Riscos 2 BBBBBB', 'As datas das entregas estão previstas para bbbbbbbbbbbb', 'O projeto parte das seguintes premissas BbBbBBbbB', 'Cronograma do projeto 2', 'O projeto tem um custo estimado de BBBBbbbbBBBBbbb', 'As empresas interessadas sao BBB bBB bbb Bbb', 'Aqui entram as anotações complementares a respeito do projeto 2 BBBBBbbBBBB', 2, 2),
(3, 'O projeto é viável porque ...', 'Os efeitos que poderão ser notados CCCcccCCCcc', 'Equipe projeto 3CC', 'Teste teste teste', 'Riscos 3 CccCC', 'As datas das entregas estão previstas para CCCCCCCC', 'O projeto parte das seguintes premissas CCCCC', 'Cronograma projeto 1', 'O projeto tem um custo estimado de CCCCCccccCCCC', 'As empresas interessadas sao CCCCCCC', 'Anotações complementares a respeito do projeto 3 CCCC', 1, 3),
(4, 'A viabilidade do projeto consiste em ...', 'Os efeitos que poderão ser notados 4444444', 'Equipe projeto 4 ddddd', 'Nome do novo projeto 4', 'Riscos 4 dddddd', 'As datas das entregas estão previstas para dddddddddddddddddddd', 'O projeto parte das seguintes premissas 44d4dd4d4', 'Cronograma do projeto 4', 'O projeto tem um custo estimado de 4444444444', 'As empresas interessadas sao 444 dddd DDD', 'Anotações e observações do projeto 4', 3, 1),
(5, 'Este projeto é viável por conta de ...', 'Os efeitos que poderão ser notados em 55555EEE', 'Equipe do projeto 5', 'Mais um produto 55', 'Riscos 5 EEE', 'As datas das entregas estão previstas para 5555eeee', 'O projeto parte das seguintes premissas 55555eeee', 'Cronograma projeto 5E', 'O projeto tem um custo estimado de 55EEEEEEEE', 'As empresas interessadas sao 555 eeee eeee', 'Aqui entram as anotações complementares do projeto 5E', 1, 3),
(6, 'Viabilidade do projeto ...', 'Efeitos do projeto 6 FFFF', 'Equipe do projeto 6', 'Nome do projeto 6 XXXX', 'Riscos do projeto 6 XXXx', 'Aqui entram as datas das entregas do projeto 6 XXXX', 'O projeto 6 parte das seguintes premissas 6666XXXXX', 'Cronograma do projeto 6x', 'O projeto 6 tem um custo estimado de 666666', 'As empresas interessadas no projeto 6 sao XXX xxx', 'Anotações e observações a respeito do projeto 6 XXX', 2, 3),
(7, 'Viabilidade do Projeto 7', 'Efeitos resultantes do Projeto 7', 'Equipe do Projeto 7', 'Projeto 7', 'Riscos do Projeto 7', 'Entregas do Projeto 7', 'Premissas do Projeto 7', 'Cronograma de atividades do Projeto 7', 'Custo do Projeto 7', 'Empresas interessadas no Projeto 7', 'Informações adicionais do Projeto 7', 4, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
