-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Nov-2021 às 12:47
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lott`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `seisnumeros`
--

DROP TABLE IF EXISTS `seisnumeros`;
CREATE TABLE IF NOT EXISTS `seisnumeros` (
  `id` int(4) NOT NULL,
  `numero1` int(2) DEFAULT NULL,
  `numero2` int(2) DEFAULT NULL,
  `numero3` int(2) DEFAULT NULL,
  `numero4` int(2) DEFAULT NULL,
  `numero5` int(2) DEFAULT NULL,
  `numero6` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seisnumeros`
--

INSERT INTO `seisnumeros` (`id`, `numero1`, `numero2`, `numero3`, `numero4`, `numero5`, `numero6`) VALUES
(1, 33, 50, 21, 2, 3, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
