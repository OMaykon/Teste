-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jun-2015 às 16:45
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aprendizagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `cd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(40) DEFAULT NULL,
  `email_admin` varchar(45) DEFAULT NULL,
  `senha_admin` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`cd_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`cd_admin`, `nm_admin`, `email_admin`, `senha_admin`) VALUES
(1, 'Super', 'super@super.com.br', 'super');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cd_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf_cliente` int(10) unsigned DEFAULT NULL,
  `nm_cliente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cd_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cd_cliente`, `cpf_cliente`, `nm_cliente`) VALUES
(1, 4294967295, 'Amanda Ramos de Oliveira'),
(2, 52934411, 'JoÃ£o Henrique Silveira Gilberto'),
(3, 888888888, 'Carlos Borba'),
(4, 836699774, 'Joelson Santana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `cd_evento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_cd_admin` int(11) NOT NULL,
  `nm_evento` varchar(40) DEFAULT NULL,
  `end_evento` varchar(45) DEFAULT NULL,
  `bairro_evento` varchar(40) DEFAULT NULL,
  `nm_cidade_evento` varchar(40) DEFAULT NULL,
  `nm_estado_evento` varchar(40) DEFAULT NULL,
  `hr_evento` time DEFAULT NULL,
  `preco_evento` float DEFAULT NULL,
  PRIMARY KEY (`cd_evento`),
  KEY `evento_FKIndex1` (`admin_cd_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`cd_evento`, `admin_cd_admin`, `nm_evento`, `end_evento`, `bairro_evento`, `nm_cidade_evento`, `nm_estado_evento`, `hr_evento`, `preco_evento`) VALUES
(2, 1, 'AA', 'AAA', 'AA', 'AA', 'AA', '00:00:00', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `cd_fornec` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_fornec` varchar(45) DEFAULT NULL,
  `cnpj_fornec` int(10) unsigned DEFAULT NULL,
  `tel_fornec` int(10) unsigned DEFAULT NULL,
  `end_fornec` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cd_fornec`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`cd_fornec`, `nm_fornec`, `cnpj_fornec`, `tel_fornec`, `end_fornec`) VALUES
(1, 'Livrarias Curitiba', 5544266, 345428599, 'R Santos Dumont 278'),
(2, 'Chocante Festas', 755829993, 34528899, 'R Passos, 425');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `cd_produto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tp_prod_cd_tp_prod` int(10) unsigned NOT NULL,
  `fornecedor_cd_fornec` int(10) unsigned NOT NULL,
  `evento_cd_evento` int(10) unsigned NOT NULL,
  `qtd_total_produto` int(11) DEFAULT NULL,
  `qtd_disp_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_produto`),
  KEY `produto_FKIndex1` (`evento_cd_evento`),
  KEY `produto_FKIndex2` (`fornecedor_cd_fornec`),
  KEY `produto_FKIndex3` (`tp_prod_cd_tp_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cd_produto`, `tp_prod_cd_tp_prod`, `fornecedor_cd_fornec`, `evento_cd_evento`, `qtd_total_produto`, `qtd_disp_produto`) VALUES
(1, 1, 1, 2, 18000, 18000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_venda`
--

CREATE TABLE IF NOT EXISTS `produto_has_venda` (
  `produto_cd_produto` int(10) unsigned NOT NULL,
  `venda_cd_venda` int(10) unsigned NOT NULL,
  `qtd_venda` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`produto_cd_produto`,`venda_cd_venda`),
  KEY `produto_has_venda_FKIndex1` (`produto_cd_produto`),
  KEY `produto_has_venda_FKIndex2` (`venda_cd_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tp_prod`
--

CREATE TABLE IF NOT EXISTS `tp_prod` (
  `cd_tp_prod` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nm_tp_prod` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cd_tp_prod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tp_prod`
--

INSERT INTO `tp_prod` (`cd_tp_prod`, `nm_tp_prod`) VALUES
(1, 'Caderno UniversitÃ¡rio'),
(2, 'CD '),
(3, 'Caderno'),
(4, 'Mochila');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `cd_venda` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_cd_cliente` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cd_venda`),
  KEY `venda_FKIndex1` (`cliente_cd_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
