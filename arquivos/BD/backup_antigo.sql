-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Nov-2018 às 17:52
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

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
  `nome_empresa` varchar(150) NOT NULL,
  `cnpj` varchar(150) NOT NULL,
  `tipo_empresa` varchar(150) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `tipo_empresa`) VALUES
(1, 'Vale', '11222333444455', 'Médio/Grande porte'),
(2, 'asdasd', '12313123131231', 'MEI/ME'),
(3, 'ArcelorMittal', '55444333222211', 'Médio/Grande porte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `id_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(150) NOT NULL,
  `tipo_representante` varchar(150) NOT NULL,
  `cargo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_pessoa`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pessoa`, `nome`, `email`, `telefone`, `tipo_representante`, `cargo`) VALUES
(1, 'Ewerson Vieira Nascimento', 'ewersonv@gmail.com', '27996187663', 'do IFES', 'Bolsista'),
(2, 'Estefano Vieira', 'estefano@gmail.com', '12312312312', 'do IFES', 'asdasd'),
(3, 'Deise', 'deise@gmail.com', '27999888998', 'do IFES', 'Coordenadora');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(450) NOT NULL,
  `justificativa` varchar(450) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `riscos` varchar(450) DEFAULT NULL,
  `restricoes` varchar(450) DEFAULT NULL,
  `partes_interessadas` varchar(450) DEFAULT NULL,
  `entregas` varchar(450) DEFAULT NULL,
  `premissas` varchar(450) DEFAULT NULL,
  `efeitos` varchar(450) DEFAULT NULL,
  `requisitos` varchar(450) DEFAULT NULL,
  `custo` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `proposta`
--

DROP TABLE IF EXISTS `proposta`;
CREATE TABLE IF NOT EXISTS `proposta` (
  `id_proposta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_proposta` varchar(150) NOT NULL,
  `resumo_proposta` varchar(8000) NOT NULL,
  PRIMARY KEY (`id_proposta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `proposta`
--

INSERT INTO `proposta` (`id_proposta`, `tipo_proposta`, `resumo_proposta`) VALUES
(1, 'Projeto de inovação', 'Aqui ficam as informações da proposta prospectada, para que haja uma conversa posteriormente a fim de detalhar melhor as especificações do projeto.'),
(2, 'Projeto de inovação', 'asdadsasddsad\r\nas\r\ndsa\r\ndsa\r\ndsa\r\ndsa\r\nads\r\ndsa\r\nasd\r\nsad\r\nasd\r\nasdasdasd\r\nasd\r\nasd\r\na\r\ndsa\r\nds'),
(3, 'Prestação de serviço tecnológica', 'nafsnsaçasfnçasnfçlkansflçkansfçkansfaksnfçaksnfçansfaksnfasfkaknfçançkfçknafçnkfnkçfasnkçfasknçfasfasfas\r\nfanfsa\r\nfasn\r\nfs\r\nff\r\nsankfnkçfsaknçfskçnfsaçknfasçkn\r\n\r\n\r\nankasfnkfasknçafsçkçfknsakfçnasknçfas\r\n\r\n\r\nkfanççknafskçnafsçknmafs\r\n\r\nafknçafsçknfkaçsçknfam\r\n\r\nafknasknfçasçkmnfasçknfas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
